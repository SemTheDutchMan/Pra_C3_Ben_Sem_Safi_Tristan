<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\models\Contact;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function tournaments()
    {
        return view('layouts.tournaments');
    }

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

        contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Verstuur een bevestigingsmail naar de beheerder (optioneel)
        // Mail::to('admin@example.com')->send(new ContactMail($request->all()));

        // Toon een bevestigingsbericht
       return Redirect::to('/')->with('status', 'Je bericht is succesvol verstuurd!');
    }
}
