<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\AdminProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Admin;
use App\Models\Subject;


class ProfileOfAdminController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, Subject $subject): View
    {
        return view('admin.profile.edit', [
            'user' => $request->user(),
            'subjects' => $subject->all(),
        ]);
    }
    
    
    /**
     * Update the user's profile information.
     */
    public function update(AdminProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();
        
        $subjects = $request->subjects_array;
        Auth::guard('admin')->user()->subjects()->detach();
        Auth::guard('admin')->user()->subjects()->attach($subjects);

        return Redirect::route('admin.profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
