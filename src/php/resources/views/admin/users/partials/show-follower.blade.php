<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('フォロワー') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- <div>
        @foreach ($followers as $follower)
            {{ $follower->name }}
            @if ($follower->isFollowing(Auth::user()))
                <form action="{{ route('admin.users.unfollow', [$follower->id]) }}" method="POST">
                    @csrf
                    <button type="submit">フォロー解除する</button>
                </form>
            @else
                <form action="{{ route('admin.users.follow', [$follower->id]) }}" method="POST">
                    @csrf
                    <button type="submit">フォローする</button>
                </form>
            @endif
        @endforeach
    </div> --}}
</section>