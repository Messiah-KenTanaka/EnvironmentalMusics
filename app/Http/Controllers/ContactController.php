<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\ContactMail;
use App\Tag;
use App\User;
use App\PostContact;

class ContactController extends Controller
{
    public function index(string $name = null)
    {
        $user = null;
        if ($name) {
            $user = User::where('name', $name)->first();
            if (is_null($user)) {
                return redirect()->route('articles.index')->with('error', 'ユーザーが見つかりませんでした。');
            }
        }

        $tags = Tag::getPopularTag();

        return view('contacts.contact', [
            'user' => $user,
            'tags' => $tags,
        ]);
    }

    public function mailToAdmin(Request $request, PostContact $postContact)
    {
        $data = $request->all();

        // ログインしていない場合、user_idを-1とする
        if (Auth::guest()) {
            $data['user_id'] = -1;
        }

        $postContact->fill($data);

        $postContact->save();

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message')
        ];

        Mail::to($data['email'])->send(new ContactMail($data));

        return redirect()->route('articles.index')->with('success', 'お問い合わせが送信されました。');
    }

    public function show()
    {
        $contactContent = PostContact::orderByDesc('created_at')
            ->paginate(config('paginate.paginate_50'));

        $tags = Tag::getPopularTag();

        return view('contacts.show', [
            'contactContent' => $contactContent,
            'tags' => $tags,
        ]);
    }
}
