<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:rounded-lg"> 
                <h3 class="text-lg font-medium leading-6 text-gray-900">
                    Settings
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    Update settings and stuff...
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
