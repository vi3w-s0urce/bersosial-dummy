@extends('layouts.main')

@section('content')
    <div>
        <div class="top-nav">
            <a href="/"><iconify-icon icon="line-md:chevron-left" style="color: #abb1bb;" width="48"></iconify-icon></a>
            <h1>{{ "@" . auth()->user()->username }}</h1>
        </div>
        <div class="create-post">
            <h1>Edit Postingan</h1>
            <form method="post" action="/dashboard/{{ $post->id }}">
                @method('put')
                @csrf
                <input type="text" id="post_content" name="post_content" placeholder="Tuliskan sesuatu..." class="@error('post_content') invalid-input @enderror" value="{{ old('post_content', $post->post_content) }}" required>
                @error('post_content')
                    <div class="invalid-message">
                        <iconify-icon icon="line-md:alert-circle" style="color: #fd6969;" width="24"></iconify-icon>
                        {{ $message }}
                    </div>
                @enderror
                <div class="button-post">
                        @if ($post->image)
                        <div class="input-image">
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-preview">
                        </div>
                        @endif  
                    <button type="submit">Edit</button>
                </div>
            </form>
        </div>
    </div>
@endsection