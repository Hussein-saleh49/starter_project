<?php
namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SubscriberController extends Controller
{
    //
    public function subscribe(Request $request)
    {
        // dd($request->all());
        $form = $request->input('form');
        // dd($form);
        try {
            $data = $request->validate([
                "email" => "required|email|unique:subscribers,email",
            ]);
            Subscriber::create($data);
            return back()->with([
                'success' => 'Subscribed successfully!',
                'form_id' => $request->form_id
            ]);

        } catch (ValidationException $e) {
            return back()->withErrors($e->errors(), $form);
        }

    }
}
