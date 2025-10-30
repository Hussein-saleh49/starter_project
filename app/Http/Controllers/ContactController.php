<?php
namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    //
    public function contact(Request $request)
    {
        try {
            $data = $request->validate([
                "name"    => "required|string|max:255",
                "email"   => "required|email|unique:contacts,email",
                "subject" => "required|string",
            ]);
            Contact::create($data);
            return back()->with("success", "Your contact is added successfully");
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors(),"contact");
        }
    }
}
