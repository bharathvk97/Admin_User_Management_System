<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ProfileUpdatable;
use Illuminate\Support\Facades\Http;

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

    public function getCategories()
    {
        $response = Http::get(env('QUIZ_CATEGORIES'));
        if ($response->successful()) {
            return response()->json($response->json());
        }
        return response()->json(['error' => 'Something went wrong'], 500);
    }

    public function index()
    {
        return view('quiz.quiz');
    }

    public function fetchQuestions($category)
    {
        $categories_in_formatted = strtolower(str_replace([' & ', ' ', '-'], ['_', '_', '_'], $category));
        $response = Http::get(env('QUIZ_QUESTIONS'), [
            'categories' => $categories_in_formatted,
            'limit' => 15,
        ]);
        return response()->json([
            $category => $response->json()
        ]);
    }
}
