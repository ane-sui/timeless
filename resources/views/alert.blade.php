@if (session('success'))
    <div id="alert" class="mb-4 p-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="alert" class="mb-4 p-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
        {{ session('error') }}
    </div>
@endif

<!-- Add this script to auto-hide after 3 seconds -->
<script>
    setTimeout(() => {
        const alert = document.getElementById('alert');
        if (alert) {
            alert.style.display = 'none';
        }
    }, 3000); // 3000ms = 3 seconds
</script>
