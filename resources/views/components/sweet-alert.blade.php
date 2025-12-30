@if (session('success'))
<script>
    window.addEventListener('DOMContentLoaded', () => {
        if (window.alertSuccess) {
            window.alertSuccess(@json(session('success')))
        }
    })
</script>
@endif

@if (session('error'))
<script>
    window.addEventListener('DOMContentLoaded', () => {
        if (window.alertError) {
            window.alertError(@json(session('error')))
        }
    })
</script>
@endif

@if (session('warning'))
<script>
    window.addEventListener('DOMContentLoaded', () => {
        if (window.alertWarning) {
            window.alertWarning(@json(session('warning')))
        }
    })
</script>
@endif

<script>
    console.log('SweetAlert component loaded')
</script>

<script>
    console.log('Session success:', @json(session('success')))
</script>