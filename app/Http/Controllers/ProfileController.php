<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ProfileUpdatable;

class ProfileController extends Controller
{
    use ProfileUpdatable;

    /**
     * Update the authenticated user's profile.
     */
    public function update(Request $request)
    {
        $this->updateProfile($request, auth()->user());

        return back()->with('success', 'Profile updated successfully.');
    }
}
