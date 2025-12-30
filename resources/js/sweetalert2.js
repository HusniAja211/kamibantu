import Swal from 'sweetalert2'
window.Swal = Swal

function alertSuccess(message) {
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: message,
        confirmButtonColor: '#16a34a',
        confirmButtonText: 'OK',
    })
}

function alertError(message) {
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: message,
        confirmButtonColor: '#dc2626',
        confirmButtonText: 'OK',
    })
}

function alertWarning(message) {
    Swal.fire({
        icon: 'warning',
        title: 'Peringatan',
        text: message,
        confirmButtonColor: '#f59e0b',
        confirmButtonText: 'Mengerti',
    })
}

function confirmDelete(url) {
    Swal.fire({
        title: 'Yakin ingin menghapus?',
        text: 'Data yang dihapus tidak dapat dikembalikan!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#dc2626',
        cancelButtonColor: '#6b7280',
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal',
    }).then((result) => {
        if (result.isConfirmed) {
            const form = document.createElement('form')
            form.method = 'POST'
            form.action = url

            const csrf = document.createElement('input')
            csrf.type = 'hidden'
            csrf.name = '_token'
            csrf.value = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content')

            const method = document.createElement('input')
            method.type = 'hidden'
            method.name = '_method'
            method.value = 'DELETE'

            form.appendChild(csrf)
            form.appendChild(method)
            document.body.appendChild(form)
            form.submit()
        }
    })
}

/**
 * 
 * Expose ke global agar bisa dipakai di Blade
 */
window.alertSuccess = alertSuccess
window.alertError = alertError
window.alertWarning = alertWarning
window.confirmDelete = confirmDelete
