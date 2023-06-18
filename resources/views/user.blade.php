@extends('layouts.main')

@section('content')
    <div class="user-profile">
        <div class="top-nav">
            <a href="/"><iconify-icon icon="line-md:chevron-left" style="color: #abb1bb;" width="48"></iconify-icon></a>
            <h1>{{ "@" . $user->username }}</h1>
        </div>
        <div class="profile-container">
            @if ($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="test" class="user-profile-image avatar-dashboard">
            @else
                <iconify-icon icon="line-md:account" width="128"></iconify-icon>
            @endif 
            <h1>{{ $user->name }}</h1>
        </div>
        <div class="user-postingan">
            <h1>Postingan</h1>
            @foreach ($posts as $post)
                <div class="posts">
                    <a href="/users/{{ $post->user->username }}"><div class="user-title">
                        @if ($post->user->avatar)
                            <img src="{{ asset('storage/' . $post->user->avatar) }}" alt="test" class="user-profile-image">
                        @else
                            <iconify-icon icon="line-md:account" width="48"></iconify-icon>
                        @endif 
                        <div class="user-title-text">
                            <p class="nama-user">{{ $post->user->name }}</p>
                            <p class="username-user">{{ $post->user->username }}</p>
                        </div>
                    </div>
                    </a>
                    <a href="/posts/{{ $post->id }}">
                    <div class="post-content post-content-hover">
                        <p>{{ $post->post_content }}</p>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{  $post->id }}">
                        @endif
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection