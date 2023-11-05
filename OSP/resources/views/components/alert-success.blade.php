@if (session()->has('success'))
    <div class="mt-5 rounded-lg fixed inset-x-0 top-0 z-50 flex justify-center">
        <div id="alert"
            class="text-center py-4 px-20 mb-4 text-sm text-green-800 rounded-lg bg-green-100 dark:bg-gray-800 dark:text-green-400"
            role="alert">
            <span class="font-medium"></span> {{ session('success') }}
        </div>
    </div>
@endif

<script>
    setTimeout(function() {
        document.getElementById('alert').style.display = 'none';
    }, 3000); // 3000 milliseconds = 5 seconds
</script>
