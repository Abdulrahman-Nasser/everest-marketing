<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class adminHomeController extends Controller
{
    //
    public function index(){
        return view('admin.home');
    }
    public function showAdd(){
        return view('admin.home.addFile');
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
            return redirect()-back()-with('success','Data Inserted Success');
        }
    }

}
