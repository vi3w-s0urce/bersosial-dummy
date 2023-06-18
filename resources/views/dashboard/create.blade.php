@extends('layouts.main')

@section('content')
    <div class="user-profile">
        <div class="top-nav">
            <a href="/"><iconify-icon icon="line-md:chevron-left" style="color: #abb1bb;" width="48"></iconify-icon></a>
            <h1 style="color: var(--blue);">{{ "@" . auth()->user()->username }}</h1>
        </div>
        <div class="create-post">
            <h1>Buat Postingan</h1>
            <form method="post" action="/dashboard" enctype="multipart/form-data">
                @csrf
                {{-- <input type="text" id="post_content" name="post_content" placeholder="Tuliskan sesuatu..." class="@error('post_content') invalid-input @enderror" required> --}}
                <textarea name="post_content" id="post_content" cols="30" rows="10"></textarea>
                @error('post_content')
                    <div class="invalid-message">
                        <iconify-icon icon="line-md:alert-circle" style="color: #fd6969;" width="24"></iconify-icon>
                        {{ $message }}
                    </div>
                @enderror
                <div class="button-post">
                    <div class="upload-button">
                    <div class="input-image">
                        <input type="file" id="image" name="image" accept="image/*" onchange="previewImage()">
                            <label for="image">
                                <iconify-icon icon="line-md:document-add" style="color: #44aef3;" width="48" height="48" class="input-icon-image"></iconify-icon>
                                <img class="img-preview">
                                Tambahkan Gambar
                            </label>
                    </div>
                    @error('image')
                        <div class="invalid-message">
                            <iconify-icon icon="line-md:alert-circle" style="color: #fd6969;" width="24"></iconify-icon>
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <button type="submit">Posting</button>
                </div>
            </form>
        </div>
    </div>
@endsection