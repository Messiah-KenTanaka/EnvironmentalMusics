<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;
use App\Tag;
use App\User;
use App\PostContact;

class ContactController extends Controller
{
    public function index(string $name)
    {
        $user = User::where('name', $name)->first();
        if (is_null($user)) {
            return redirect()->route('articles.index')->with('error', 'ユーザーが見つかりませんでした。');
        }

        $tags = Tag::getPopularTag();

        return view('contacts.contact', [
            'user' => $user,
            'tags' => $tags,
        ]);
    }

    public function mailToAdmin(Request $request, PostContact $postContact)
    {
        $postContact->fill($request->all());

        $postContact->save();

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];

        Mail::to($data['email'])->send(new ContactMail($data));

        return redirect()->route('articles.index')->with('success', 'お問い合わせが送信されました。');
    }
}
