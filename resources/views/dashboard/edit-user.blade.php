@extends('layouts.main')

@section('content')
    <div>
        <div class="top-nav">
            <a href="/"><iconify-icon icon="line-md:chevron-left" style="color: #abb1bb;" width="48"></iconify-icon></a>
            <h1>{{ "@" . auth()->user()->username }}</h1>
        </div>
        <div>
            <h1>Edit Profile</h1>
            <form action="/dashboard/edit-user/update/{{ auth()->user()->id }}" method="post" class="form-login" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="edit-user">
                <div class="input-profile-image">
                    <input type="file" id="image" name="avatar" accept="image/*" onchange="previewImage()">
                    <label for="image">
                        @if (auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="img-preview">
                        @else
                            <iconify-icon icon="line-md:document-add" style="color: #44aef3;" width="48" height="48" class="input-icon-image"></iconify-icon>
                            <img class="img-preview">
                        @endif
                    </label>
                </div>
                <div class="input-container">
                    <p>Nama</p>
                    <input type="text" name="name" placeholder="Tuliskan nama" value="{{ auth()->user()->name }}">
                </div>
                <div class="input-container">
                    <p>Username</p>
                    <input type="text" name="username" placeholder="Tuliskan username" value="{{ auth()->user()->username }}">
                </div>
                <button type="submit">Edit</button>
            </div>
            </form>
        </div>
    </div>
@endsection