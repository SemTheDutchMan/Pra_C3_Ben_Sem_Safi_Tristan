<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\School;
use App\Models\Contact;

class ProfileController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $all = User::all();
        $inschrijvingen = School::all();
        $contact = Contact::all();
        return view('dashboard', compact('user', 'all', 'inschrijvingen', 'contact'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('show_account', compact('user'));
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        // Toggle isAdmin based on checkbox presence (checked => 1, unchecked => 0)
        $request->user()->isAdmin = $request->has('isAdmin') ? 1 : 0;

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit');
    }

    /**
     * Update another user's profile (admin action).
     */
    public function updateUser(Request $request, $id): RedirectResponse
    {
        $auth = $request->user();
        if (! $auth || $auth->isAdmin != 1) {
            abort(403);
        }

        $user = User::findOrFail($id);

        // only toggle isAdmin for now
        $user->isAdmin = $request->has('isAdmin') ? 1 : 0;
        $user->save();

        return Redirect::route('dashboard');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
