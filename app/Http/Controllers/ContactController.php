<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Tag;

class ContactController extends Controller
{
    public function show()
    {
        $tags = Tag::getPopularTag();

        return view('contacts.contact', [
            'tags' => $tags,
        ]);
    }

    public function mailToAdmin(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];

        Mail::to($data['email'])->send(new ContactMail($data));

        return redirect('/contact')->with('message', 'お問い合わせが送信されました。');
    }
}
