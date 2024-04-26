<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index()
    {
        $home = Home::all();
        $message = [
            'massage' => 'get tabel home',
            'data' => $home
        ];

        return response($message, 200);
    }

    public function store(Request $request)
    {
        $validator =   $request->validate([
            'fileUpload' => 'required|mimes:png,jpg'
        ]);

        if (!$validator) {
            return 'validation error';
        } else {
            $home = new Home();

            $file = $request->file('fileUpload');
            $fileName = time() . rand(-10000, 10000) . $file->getClientOriginalName();
            $location = public_path('./uploads/home/');
            $file->move($location, $fileName);

            $home->file = $fileName;

            $home->save();

            $message = [
                'message' => 'add img to home done',
                'data' => $home
            ];

            return response($message, 200);
        }
    }
}
