<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function index(){
        return view('beranda', [
            "title" => "Beranda",
            "posts" => Post::latest()->filter(request(['search']))->get()
        ]);
    }
    public function show(Post $post){
        return view('post', [
            "title" => "Postingan" . " " . $post->id,
            "post" => $post
        ]);
    }
    public function user_profile(User $user) {
        return view('user', [
            "title" => $user->username,
            "user" => $user,
            "posts" => $user->posts->load('user')
        ]);
    }
    public function comment(Request $request, Post $post){
        $validatedData = $request->validate([
            'comment_content' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['post_id'] = $post->id;
        Comment::create($validatedData);
        return redirect('/posts' . '/' . $post->id);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        Comment::destroy($comment->id);
        return redirect('/posts/' . $comment->post_id);
    }
}
