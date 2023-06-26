<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('フォロー') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <div>
        @foreach ($followings as $following)
            {{ $following->name }}

            <form action="{{ route('following.destroy', [$following->id]) }}" method="POST">
                @csrf
                <button type="submit">削除</button>
            </form>
        @endforeach
    </div>
</section>
