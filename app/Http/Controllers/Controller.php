<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //Controllers moeten gevalideerd worden
    //Met het maken van een request make:request aanroepen eerst zet return op true en daarna in de array een return met data
    // aanroepen doen we door de request te injecteren in de controller met de methode store(Request $request) de Request is de naam van de validatie
}
