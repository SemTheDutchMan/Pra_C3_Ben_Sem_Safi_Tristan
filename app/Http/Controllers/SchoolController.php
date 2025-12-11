<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $schools = School::all();
        return view('homepage', compact('schools'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sign_up');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:schools',
            'address' => 'required|string',
            'referee_name' => 'required|string|max:255',
            'referee_email' => 'required|email',
            'group_count' => 'required|integer|min:1',
            'class' => 'required|string|max:255',
        ]);

        School::create($validated);

        return redirect()->route('school.index')->with('success', 'School registered successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $school = School::findOrFail($id);
        return view('schools.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $school = School::findOrFail($id);
        return view('schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $school = School::findOrFail($id);
        $school->update($request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email|unique:schools,email,' . $id,
        ]));

        return redirect()->route('school.index')->with('success', 'School updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        School::findOrFail($id)->delete();
        return redirect()->route('school.index')->with('success', 'School deleted successfully.');
    }
}
