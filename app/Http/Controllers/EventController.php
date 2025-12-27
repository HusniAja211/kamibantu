<?php

namespace App\Http\Controllers;

use App\Models\Event;
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
    public function create()
    {
        return view('events.create');
    }

    /**
     * Simpan event baru
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'              => ['required', 'string', 'max:255'],
            'description'        => ['required', 'string'],
            'category'           => ['required', 'string'],
            'location_name'      => ['required', 'string', 'max:255'],
            'latitude'           => ['required', 'numeric'],
            'longitude'          => ['required', 'numeric'],
            'start_date'         => ['required', 'date'],
            'end_date'           => ['required', 'date', 'after:start_date'],
            'target_volunteers'  => ['nullable', 'integer', 'min:1'],
            'banner'             => ['nullable', 'image', 'max:5120'],
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
            ->with('success', 'Kegiatan berhasil dibuat 🎉');
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

        return view('events.edit', compact('event'));
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
            'category'           => ['required', 'string'],
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

        return redirect()
            ->route('events.show', $event)
            ->with('success', 'Kegiatan berhasil diperbarui ✅');
    }

    /**
     * Kelola event (progress, relawan, 80% rule)
     */
    public function manage(Event $event)
    {
        $this->authorizeOwner($event);

        $event->load('participants.user');

        return view('events.manage', compact('event'));
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
}
