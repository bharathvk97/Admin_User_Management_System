<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignedValue;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Enums\UserType;

class AdminController extends Controller
{
    // Constructor to apply middleware (only admins allowed)
     public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (auth()->check() && auth()->user()->type !== 'admin') {
                abort(403, 'Unauthorized');
            }

            return $next($request);
        });
    }

    /**
     * Show assign value form
     */
    public function assignForm()
    {
        // This could also be handled in the Blade file using the helper
        $clients = User::where('type', 'client')->get();
        return view('admin.assign', compact('clients'));
    }

    /**
     * Assign value to selected clients
     */
    public function assignValue(Request $request)
    {
        $validated = $request->validate([
            'value'      => 'required|string|max:255',
            'user_ids'   => 'required|array',
            'user_ids.*' => 'exists:users,id'
        ]);

        DB::transaction(function () use ($validated) {
            foreach ($validated['user_ids'] as $id) {
                AssignedValue::create([
                    'value'   => $validated['value'],
                    'user_id' => $id
                ]);
            }
        });

        return back()->with('success', 'Value assigned to selected clients.');
    }
}
