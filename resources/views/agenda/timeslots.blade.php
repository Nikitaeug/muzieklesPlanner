<<<<<<< HEAD
<x-layout>
=======
<x-app-layout>
>>>>>>> 2eb60d8debb2150237f6b2e7dce449a75034d710
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Voeg een beschikbaar tijdslot toe
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

<<<<<<< HEAD
                    <form action="{{ route('timeslots.store') }}" method="POST">
=======
                    <form action="{{ route('agenda.store') }}" method="POST">
>>>>>>> 2eb60d8debb2150237f6b2e7dce449a75034d710
                        @csrf
                        <div class="mb-3">
                            <label for="date" class="form-label">Datum</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="start_time" class="form-label">Starttijd</label>
                            <input type="time" name="start_time" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="end_time" class="form-label">Eindtijd</label>
                            <input type="time" name="end_time" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary">Opslaan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
</x-layout>
=======
</x-app-layout>
>>>>>>> 2eb60d8debb2150237f6b2e7dce449a75034d710
