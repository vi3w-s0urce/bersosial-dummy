<header>
    <div class="user-auth-container">
        <form action="/logout" method="post">
            @csrf
            <button type="submit" class="logout-button"><iconify-icon icon="bx:log-out" width="48"></iconify-icon></button>
        </form>
        <iconify-icon icon="ph:dot" style="color: #abb1bb;" width="48" height="48"></iconify-icon>
        <a href="/dashboard">
        <div class="user-auth">
            <img src="" alt="">
            <div class="profile-auth">
                @if (auth()->user()->avatar)
                    <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="test" class="user-profile-image">
                @else
                    <iconify-icon icon="line-md:account" width="48"></iconify-icon>
                @endif 
                <div class="profile-auth-text">
                    <p>{{ auth()->user()->name }}</p>
                    <p>{{ "@" . auth()->user()->username }}</p>
                </div>
            </div>
        </div>
        </a>
    </div>
    <a href="/dashboard/create" class="create-button"><iconify-icon icon="line-md:plus" width="48"></iconify-icon></a>
    <form action="/" class="search-form">
        <input type="text" placeholder="Cari postingan atau user" name="search" value="{{ request('search') }}">
        <button type="submit"><iconify-icon icon="line-md:search" width="30" style="color: white;"></iconify-icon></button>
    </form>
</header>