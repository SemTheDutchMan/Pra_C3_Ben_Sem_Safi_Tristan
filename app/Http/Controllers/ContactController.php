<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactController extends Controller
{
    // Toon het contactformulier
    public function create()
    {
        return view('contact'); // Zorg ervoor dat je 'contact' view bestaat
    }

    // Verwerk het contactformulier
    public function store(Request $request)
    {
        // Validatie van de inkomende gegevens
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        // Hier kun je bijvoorbeeld de gegevens opslaan in de database
        // Contact::create($request->all());

        // Verstuur een bevestigingsmail naar de beheerder (optioneel)
        // Mail::to('admin@example.com')->send(new ContactMail($request->all()));

        // Toon een bevestigingsbericht
        return redirect()->back()->with('status', 'Je bericht is succesvol verstuurd!');
    }
}
