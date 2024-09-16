<!-- resources/views/agenda/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Nieuw Tijdslot aan Agenda Toevoegen</h1>
    <form action="{{ route('timeslots.store') }}" method="POST">
        @csrf
        <div>
            <label for="date">Datum:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div>
            <label for="start_time">Starttijd:</label>
            <input type="time" name="start_time" id="start_time" required>
        </div>
        <div>
            <label for="end_time">Eindtijd:</label>
            <input type="time" name="end_time" id="end_time" required>
        </div>
        <button type="submit">Tijdslot Toevoegen</button>
    </form>
@endsection
