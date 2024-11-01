<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'title' => 'My Account',
            'posts' => Post::latest()->where('user_id', auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create', [
            'title' => 'Buat Postingan'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'post_content' => 'required',
            'image' => 'image|file|max:10240'
        ]);

        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-image');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Post::create($validatedData);

        return redirect('/dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($post_id)
    {
        $post = Post::find($post_id);

        if (auth()->user()->id !== $post->user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses!');
        }

        return view('dashboard.edit', [
            'post' => Post::find($post_id),
            'title' => 'Buat Postingan'
        ]);
    }

    public function edit_user($user_id)
    {

        if (auth()->user()->id != $user_id) {
            return redirect()->back()->with('error', 'Anda tidak memiliki akses!');
        }

        return view('dashboard.edit-user', [
            'user' => User::find($user_id),
            'title' => 'Edit user'
        ]);
    }

    public function update_user(Request $request, $user_id)
    {
        $user = User::find($user_id);
        $validatedDataUpdateUser = $request->validate([
            'name' => 'required|min:5|max:255',
            'username' => 'required|min:3|max:255|unique:users,username,'.$user_id,
            'avatar' => 'image|file|max:20480'
        ]);
        if ($request->file('avatar')) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }
            $validatedDataUpdateUser['avatar'] = $request->file('avatar')->store('avatar');
        }
        User::where('id', $user_id)
            ->update($validatedDataUpdateUser);
        return redirect('/dashboard');
    }    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $post_id)
    {
        $validatedData = $request->validate([
            'post_content' => 'required'
        ]);

        $validatedData['user_id'] = auth()->user()->id;
        Post::where('id', $post_id)
                ->update($validatedData);
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        DB::table('comments')->where('post_id', $id)->delete();
        return redirect('/dashboard');
    }
}
