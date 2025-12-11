<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function tournaments()
    {
        return view('layouts.tournaments');
    }

    public function index()
    {
        return Redirect::route('contact.create');
    }

    public function create()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        // Mail::to('admin@example.com')->send(new ContactMail($request->all()));

        return Redirect::route('contact.create')->with('status', 'Je bericht is succesvol verstuurd!');
    }

    public function show(Contact $contact)
    {
        return view('show_contact', compact('contact'));
    }
}
