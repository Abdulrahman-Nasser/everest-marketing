<?php

namespace App\Http\Controllers\Contacts;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class contactController extends Controller
{
    //
    public function index()
    {
        $contact = Contact::all();
        $message = [
            'massage' => 'get tabel contact',
            'data' => $contact
        ];
        return response($message, 200);
    }

    public function store(Request $request)
    {
        $validator =   $request->validate([
            'f_name' => 'required',
            's_name' => "required",
            'email' => 'required|email|unique:contacts,email',
            'topic' => 'required',
            'message' => 'required'
        ]);

        if (!$validator) {
            return 'Validation Error';
        } else {
            $contacts = new Contact();

            $contacts->f_name = $request->f_name;
            $contacts->s_name = $request->s_name;
            $contacts->email = $request->email;
            $contacts->topic = $request->topic;
            $contacts->message = $request->message;

            $contacts->save();

            $message = [
                'message' => 'contact has been sent',
                'data' => $contacts
            ];

            return response($message, 200);
        }
    }
}
