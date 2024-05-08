<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class servicesController extends Controller
{
    //
    public function index()
    {
        $services = Services::all();
        $message = [
            'massage' => 'get tabel services',
            'data' => $services
        ];
        return response($message, 200);
    }
    public function store(Request $request)
    {
        $validator =   $request->validate([
            'fileUpload' => 'required|mimes:png,jpg',
            'description' => 'required'
        ]);

        if (!$validator) {
            return 'validation error';
        } else {
            $services = new Services();

            $file = $request->file('fileUpload');
            $fileName = time() . rand(-10000, 10000) . $file->getClientOriginalName();
            $location = public_path('./uploads/services/');
            $file->move($location, $fileName);

            $services->file = $fileName;
            $services->description = $request->description;
            $services->path = 'uploads/services/' . $fileName;

            $services->save();
            $message = [
                'message' => 'add img to services done',
                'data' => $services
            ];

            return response($message, 200);
        }
    }
}
