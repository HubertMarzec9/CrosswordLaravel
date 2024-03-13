<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function data()
    {
        $crosswordData = [
            ['word' => 'apple', 'question' => 'A fruit that is red or green in color'],
            ['word' => 'banana', 'question' => 'A yellow fruit that is curved'],
            ['word' => 'orange', 'question' => 'A citrus fruit that is typically orange in color'],
        ];

        // Return JSON
        return json_encode($crosswordData);
    }
}
