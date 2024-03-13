<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Score;

class ScoreController extends Controller
{
    public function save(Request $request)
    {
        try {
            $request->validate([
                'nick' => 'required|string|max:255',
                'time' => 'required|integer',
            ]);

            $nick = $request->input('nick');
            $time = $request->input('time');

            Score::create([
                'nick' => $nick,
                'time' => $time,
            ]);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            \Log::error('Error saving score: ' . $e->getMessage());
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}
