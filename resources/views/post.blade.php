@extends('layouts.main')

@section('content')
<div class="single-post">
    <div class="top-nav">
        <a href="/"><iconify-icon icon="line-md:chevron-left" style="color: #abb1bb;" width="48"></iconify-icon></a>
        <h1>Postingan</h1>
    </div>
    <div class="user-title">
        @if ($post->user->avatar)
            <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="test" class="user-profile-image">
        @else
            <iconify-icon icon="line-md:account" width="48"></iconify-icon>
        @endif
        @if($post->user->username == auth()->user()->username)
            <a href="/dashboard">
        @else
            <a href="/users/{{ $post->user->username }}"> 
        @endif
        <div class="user-title-text">
            <p class="nama-user">{{ $post->user->name }}</p>
            <p class="username-user">{{ "@" . $post->user->username }}</p>
        </div>
        </a>
    </div>
    <div class="post-content">
        <p>{{ $post->post_content }}</p>
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{  $post->id }}">
        @endif
        <div class="post-info">
            <h6>{{ $post->created_at->format('d M Y') }}</h6>
            <iconify-icon icon="ph:dot" style="color: #abb1bb;" width="24"></iconify-icon>
            <h6>{{ $post->created_at->format('H:i') }}</h6>
        </div>
    </div>
    <div class="comment-container">
        <h2>Komentar</h2>
        <form action="" class="comment-form" method="POST">
            @csrf
            <input type="text" id="comment_content" name="comment_content" placeholder="Tuliskan komentar..." required>
            <button type="submit">Kirim</button>
        </form>
        @foreach ($post->comment as $comment)
        <section id="comment" class="comment">
            <div class="nav-comment">
                @if($comment->user->username == auth()->user()->username)
                    <a href="/dashboard">
                @else
                    <a href="/users/{{ $comment->user->username }}"> 
                @endif
                <div class="user-title">
                    <iconify-icon icon="line-md:account" width="48"></iconify-icon>
                    <div class="user-title-text">
                        <p class="nama-user">{{ $comment->user->name }}</p>
                        <p class="username-user">{{ "@" . $comment->user->username }}</p>
                    </div>
                </div>
                </a>
                @if($comment->user->username == auth()->user()->username)
                    <div class="top-nav-toogle">
                        <form action="/posts/{{ $comment->id }}" method="post">
                            @method('delete')
                            @csrf
                            <button class="delete-button"><iconify-icon icon="line-md:close" width="48" height="48" onclick="return confirm('Apakah anda yakin ingin menghapus komentar?')"></iconify-icon></button>
                        </form>
                    </div>
                @endif
            </div>
            <div class="comment-content">
                <p>{{ $comment->comment_content }}</p>
            </div>
            <div class="post-info">
                <h6>{{ $comment->created_at->diffForHumans() }}</h6>
            </div>
        </section>
        @endforeach
    </div>
</div>
@endsection