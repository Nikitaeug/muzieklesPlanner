<x-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Agenda Overzicht
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="agenda-container">
                        <h1>Agenda Overzicht</h1>
                        <div id="agenda"></div> <!-- HTML-element voor de agenda -->
                        <a href="{{ route('agenda.create') }}" class="mt-4 inline-block bg-blue-500 text-white py-2 px-4 rounded">
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
</x-layout>
