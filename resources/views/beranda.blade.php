@extends('layouts.main')

@section('content')
    <a href="/"><h1 class="top-title">Bersosial</h1></a>
    @if ($posts->count())
    @foreach ($posts as $post)
        <div class="posts">
            <div class="top-nav-dashboard-container">
                @if($post->user->username == auth()->user()->username)
                    <a href="/dashboard">
                @else
                    <a href="/users/{{ $post->user->username }}"> 
                @endif
                <div class="user-title">
                    @if ($post->user->avatar)
                        <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="test" class="user-profile-image">
                    @else
                        <iconify-icon icon="line-md:account" width="48"></iconify-icon>
                    @endif 
                    <div class="user-title-text">
                        <p class="nama-user">{{ $post->user->name }}</p>
                        <p class="username-user">{{ "@" . $post->user->username }}</p>
                    </div>
                </div>
                </a>
            </div>
            <a href="/posts/{{ $post->id }}">
            <div class="post-content post-content-hover">
                <p>{{ $post->post_content }}</p>
                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{  $post->id }}">
                @endif
            </div>
            </a>
            <div class="post-info">
                <h6>{{ $post->created_at->diffForHumans() }}</h6>
                <div>
                    <a href="/posts/{{ $post->id }}/#comment"><iconify-icon icon="iconamoon:comment" width="30"></iconify-icon></a>
                </div>
            </div>
        </div>
    @endforeach
    @else
        <h1 class="alert">Postingan tidak ditemukan</h1>
    @endif
@endsection