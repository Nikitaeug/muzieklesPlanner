<!-- resources/views/agenda/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="agenda-container">
        <h1>Agenda Overzicht</h1>
        <div id="agenda"></div> <!-- HTML-element voor de agenda -->
        <a href="{{ route('agenda.create') }}">Nieuw Tijdslot Toevoegen</a>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/agenda.js') }}"></script>
@endsection
