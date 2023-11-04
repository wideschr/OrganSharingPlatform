@if (session()->has('error'))
    <div class="mt-5 rounded-lg fixed inset-x-0 top-0 z-50 flex justify-center">
        <div id="alert"
            class="text-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
            role="alert">
            <span class="font-medium"></span> {{ session('error') }}
        </div>
    </div>
@endif

<script>
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 4000); // 4000 milliseconds = 5 seconds
</script>
