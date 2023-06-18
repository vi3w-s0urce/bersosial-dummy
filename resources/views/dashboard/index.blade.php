@extends('layouts.main')

@section('content')
    <div>
        <div class="top-nav">
            <a href="/"><iconify-icon icon="line-md:chevron-left" style="color: #abb1bb;" width="48"></iconify-icon></a>
            <h1 style="color: var(--blue);">{{ "@" . auth()->user()->username }}</h1>
            <a href="/dashboard/edit-user/{{ auth()->user()->id }}"><iconify-icon icon="line-md:edit-twotone" width="48" height="48" class="edit-button"></iconify-icon></a>
        </div>
        <div class="profile-container">
            @if (auth()->user()->avatar)
                <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="test" class="user-profile-image avatar-dashboard">
            @else
                <iconify-icon icon="line-md:account" width="128"></iconify-icon>
            @endif 
            <h1>{{ auth()->user()->name }}</h1>
            <p>Anda</p>
        </div>
        <div class="user-postingan">
            <h1>Postingan Saya</h1>
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
                            <div class="top-nav-toogle">
                                <a href="/dashboard/{{ $post->id }}/edit"><iconify-icon icon="line-md:edit-twotone" width="48" height="48" class="edit-button"></iconify-icon></a>
                                <form action="/dashboard/{{ $post->id }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="delete-button"><iconify-icon icon="line-md:close" width="48" height="48" onclick="return confirm('Apakah anda yakin ingin menghapus postingan?')"></iconify-icon></button>
                                </form>
                            </div>
                        </div>
                    <a href="/posts/{{ $post->id }}">
                    <div class="post-content">
                        <p>{{ $post->post_content }}</p>
                        @if ($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{  $post->id }}">
                        @endif
                    </div>
                    </a>
                    <div class="post-info">
                        <h6>{{ $post->created_at->diffForHumans() }}</h6>
                    </div>
                </div>
            @endforeach
            @else
                <h1 class="alert">Anda belum memosting apapun</h1>
            @endif
        </div>
    </div>
@endsection