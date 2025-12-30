<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\EventParticipant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Dashboard - list semua kegiatan
     */
    public function index()
    {
        $events = Event::with('organizer')
        ->where('status', 'active')
        ->latest()
        ->get();

        return view('dashboard', compact('events'));
    }

    /**
     * Form create event
     */
    public function create(Event $event)
    {
         $categories = Category::all();

        return view('events.create', compact('categories'));
    }

    /**
     * Simpan event baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'              => ['required', 'string', 'max:255'],
            'description'        => ['required', 'string'],
            'location_name'      => ['required', 'string', 'max:255'],
            'latitude'           => ['required', 'numeric'],
            'longitude'          => ['required', 'numeric'],
            'start_date'         => ['required', 'date'],
            'end_date'           => ['required', 'date', 'after:start_date'],
            'target_volunteers'  => ['nullable', 'integer', 'min:1'],
            'banner'             => ['nullable', 'image', 'max:5120'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        // Handle banner upload
        if ($request->hasFile('banner')) {
            $validated['banner_path'] =
                $request->file('banner')->store('event-banners', 'public');
        }

        $validated['organizer_id'] = Auth::id();
        $validated['status'] = 'active';

        $event = Event::create($validated);

        return redirect()
            ->route('events.show', $event)
            ->with('success', 'Kegiatan berhasil dibuat ');
    }

    /**
     * Detail event
     */
    public function show(Event $event)
    {
        $event->load('organizer', 'participants.user');

        return view('events.show', compact('event'));
    }

    /**
     * Form edit event
     */
    public function edit(Event $event)
    {
        $this->authorizeOwner($event);

        $categories = Category::all();

        return view('events.edit', compact('event', 'categories'));
    }

    /**
     * Update event
     */
    public function update(Request $request, Event $event)
    {
        $this->authorizeOwner($event);

        $validated = $request->validate([
            'title'              => ['required', 'string', 'max:255'],
            'description'        => ['required', 'string'],
            'category_id'        => ['required', 'exist:categories,id'],
            'location_name'      => ['required', 'string', 'max:255'],
            'latitude'           => ['nullable', 'numeric'],
            'longitude'          => ['nullable', 'numeric'],
            'start_date'         => ['required', 'date'],
            'end_date'           => ['required', 'date', 'after:start_date'],
            'target_volunteers'  => ['nullable', 'integer', 'min:1'],
            'banner'             => ['nullable', 'image', 'max:5120'],
        ]);

        if ($request->hasFile('banner')) {
            $validated['banner_path'] =
                $request->file('banner')->store('event-banners', 'public');
        }

        $event->update($validated);

        return back()
            ->with('success', 'Kegiatan berhasil diperbarui ');
    }

    /**
     * Kelola event (progress, relawan, 80% rule)
     */
    public function manage(Event $event)
    {
        $this->authorizeOwner($event);

        $event->load('participants.user');
        $categories = Category::all();

        return view('events.manage', compact('event', 'categories'));
    }

    /**
     * Hapus event
     */
    public function destroy(Event $event)
    {
        $this->authorizeOwner($event);

        $event->delete();

        return redirect()
            ->route('dashboard')
            ->with('success', 'Kegiatan berhasil dihapus');
    }

    /**
     * Aktivitas saya
     */
    public function myActivities()
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        $joinedEvents = $user->joinedEvents()->with('organizer')->get();
        $organizedEvents = $user->organizedEvents()->get();

        return view('myActivities', compact('joinedEvents', 'organizedEvents'));
    }

    /**
     * Helper: pastikan pemilik event
     */
    private function authorizeOwner(Event $event)
    {
        if ($event->organizer_id !== Auth::id()) {
            abort(403, 'Akses ditolak');
        }
    }

    public function join(Event $event)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Tidak boleh ikut event sendiri
        if ($event->organizer_id === $user->id) {
            return back()->with('error', 'Kamu adalah penyelenggara kegiatan ini.');
        }

        // Tidak boleh ikut event yang sudah selesai
        if ($event->status !== 'active') {
            return back()->with('error', 'Kegiatan ini sudah tidak aktif.');
        }

        // Cek apakah target sudah penuh
        $joinedCount = $event->participants()->count();

        if ($event->target_volunteers !== null &&
            $joinedCount >= $event->target_volunteers) {
            return back()->with('error', 'Kuota relawan sudah penuh.');
        }

        // Tidak boleh join dua kali
        $alreadyJoined = $event->participants()
            ->where('user_id', $user->id)
            ->exists();

        if ($alreadyJoined) {
            return back()->with('error', 'Kamu sudah terdaftar di kegiatan ini.');
        }

        // Simpan ke pivot
        EventParticipant::create([
            'event_id' => $event->id,
            'user_id'  => $user->id,
            'status'   => 'joined',
        ]);

        return back()->with('success', 'Berhasil bergabung sebagai relawan');
    }

    public function completeParticipation(Event $event)
    {
         /** @var \App\Models\User $user */
        $user = Auth::user();

        $participant = EventParticipant::where('event_id', $event->id)
            ->where('user_id', $user->id)
            ->firstOrFail();

        // tidak boleh selesai dua kali
        if ($participant->status === 'completed') {
            return back()->with('error', 'Kegiatan ini sudah kamu selesaikan.');
        }

        $participant->update([
            'status' => 'completed'
        ]);

        return back()->with('success', 'Terima kasih! Partisipasimu telah dicatat');
    }

    public function finishEvent(Event $event)
    {
        $this->authorizeOwner($event);

        if (! $event->canBeFinished()) {
            return back()->with('error', 'Belum memenuhi syarat 80% penyelesaian.');
        }

        $event->update([
            'status' => 'finished'
        ]);

        return back()->with('success', 'Kegiatan berhasil diselesaikan');
    }

}
