<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\CrosswordSet;

class DataController extends Controller
{
    public function dataAll()
    {
        $date = Carbon::now()->addDay()->toDateString();
        $crosswordSet = CrosswordSet::where('date', $date)->with(['questions:id,set_id,question,answer'])->first();

        if (!$crosswordSet) {
            return response()->json(['message' => 'Nie znaleziono zestawu krzyżówki'], 404);
        }

        $crossword = $crosswordSet->questions->map(function ($question) {
            return [
                'answer' => strtolower($question->answer),
                'question' => $question->question,
            ];
        });

        return response()->json(['holiday' => $crosswordSet->holiday, 'crossword' => $crossword], 200);
    }

    public function dataHoliday()
    {
        $date = Carbon::now()->addDay()->toDateString();
        $crosswordSet = CrosswordSet::where('date', $date)->first();

        if (!$crosswordSet) {
            return response()->json(['message' => 'Nie znaleziono zestawu krzyżówki'], 404);
        }

        return response()->json(['holiday' => $crosswordSet->holiday], 200);
    }

    public function dataAnswerQuestion()
    {
        $date = Carbon::now()->addDay()->toDateString();
        $crosswordSet = CrosswordSet::where('date', $date)->with(['questions:id,set_id,question,answer'])->first();

        if (!$crosswordSet) {
            return response()->json(['message' => 'Nie znaleziono zestawu krzyżówki'], 404);
        }

        $crossword = $crosswordSet->questions->map(function ($question) {
            return [
                'answer' => $question->answer,
                'question' => $question->question,
            ];
        });

        return response()->json(['crossword' => $crossword], 200);
    }
}
