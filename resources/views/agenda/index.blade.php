<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Agenda Overzicht
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="agenda-container">
                        <h1>Agenda Overzicht</h1>
                        <div id="agenda"></div> <!-- HTML-element voor de agenda -->
                        <a href="{{ route('agenda.create') }}" class="inline-block px-4 py-2 mt-4 text-white bg-blue-500 rounded">
                            Nieuw Tijdslot Toevoegen
                        </a>        
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="{{ asset('js/agenda.js') }}"></script>
    @endpush
</x-app-layout>
