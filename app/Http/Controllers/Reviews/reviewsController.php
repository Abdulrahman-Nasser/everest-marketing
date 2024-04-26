<?php

namespace App\Http\Controllers\Reviews;

use App\Http\Controllers\Controller;
use App\Models\Reviews;
use Illuminate\Http\Request;

class reviewsController extends Controller
{
    //
    public function index()
    {
        $review = Reviews::all();
            $message = [
                'massage' => 'get tabel Reviews',
                'data' => $review
            ];
        return response($message, 200);
    }
}
