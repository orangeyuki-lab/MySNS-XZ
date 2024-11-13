@extends('layouts.app')

@section('content')
<div class="container">
    <div class="profile-header">
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profile Picture" class="profile-picture">
        <h2>{{ $user->name }}</h2>
        <p>{{ $user->bio }}</p>
        
        @auth
            @if (auth()->user()->id === $user->id)
                <a href="{{ route('profile.edit', $user->username) }}" class="btn btn-primary">Edit Profile</a>
            @endif
        @endauth
    </div>

    <div class="user-posts">
        <h3>{{ $user->name }}'s Posts</h3>
        @foreach ($posts as $post)
            <div class="post">
                <p>{{ $post->content }}</p>
                <span>{{ $post->created_at->format('Y-m-d H:i') }}</span>
            </div>
        @endforeach

        {{ $posts->links() }}
    </div>
</div>
@endsection