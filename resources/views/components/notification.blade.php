<div x-data="{ showSuccess: false, showError: false }" class="relative">
    @if (session('success'))
        <div x-init="showSuccess = true; setTimeout(() => showSuccess = false, 3000);" 
             x-show="showSuccess" 
             class="fixed top-0 right-0 p-4 m-4 text-white bg-green-500 rounded shadow-md"
             style="transition: opacity 0.5s ease;">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div x-init="showError = true; setTimeout(() => showError = false, 3000);" 
             x-show="showError" 
             class="fixed top-0 right-0 p-4 m-4 text-white bg-red-500 rounded shadow-md"
             style="transition: opacity 0.5s ease;">
            {{ session('error') }}
        </div>
    @endif
</div>