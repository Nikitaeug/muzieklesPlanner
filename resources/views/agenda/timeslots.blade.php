<!-- resources/views/timeslots/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Voeg een beschikbaar tijdslot toe</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('timeslots.store') }}" method="POST">
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
@endsection
