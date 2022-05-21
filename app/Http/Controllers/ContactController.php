<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(ContactRequest $request)
    {
        $create = Contact::query()->create([
            'fullname' => $request->get('fullName'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'message' => $request->get('message'),
        ]);
        if (isset($create)) {
            return redirect(route('welcome'))
                ->with('success', 'We will contact to you soon!');
        } else {
            return redirect(route('welcome'))
                ->with('error', 'Something went wrong!');
        }
    }
}
