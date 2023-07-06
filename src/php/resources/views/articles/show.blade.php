<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ブログ詳細画面
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white pt-2 pl-3 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- 自分のブログだったら編集ができる --}}
                <div>
                    @if ($article->user->id === Auth::id())
                        @if (isset($article->shipped_at))
                            <div class="rounded mb-2 rounded px-6 py-2.5 text-s text-center font-medium uppercase text-white"
                                style="background-color:rgb(11, 146, 51)">公開済み</div>
                        @else
                            <div class="rounded mb-2 rounded px-6 py-2.5 text-s text-center font-medium uppercase text-white"
                                style="background-color:rgb(142, 11, 146)">下書き</div>
                        @endif
                        <div>
                            <button type="button" onclick="location.href='{{ route('articles.edit', $article->id) }}' "
                                class="inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                                style="background-color:rgb(11, 146, 51)" data-te-ripple-init
                                data-te-ripple-color="light">
                                編集する
                            </button>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST"
                                class="inline-block ">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                                    style="background-color:rgb(241, 45, 45)" data-te-ripple-init
                                    data-te-ripple-color="light" onclick="return confirm('本当に削除しますか?')">
                                    削除する
                                </button>
                            </form>
                        </div>                
                                <div>
                                    <a class="inline-flex items-center">
                                        <img alt="blog" src="https://dummyimage.com/104x104"
                                            class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                                        <span class="flex-grow flex flex-col pl-4">
											<span class="title-font font-medium text-gray-900">
												<a class="text-info" href="{{ $article->user->id === auth()->user()->id ? route('profile.edit') : route('profile.show', ['id' => $article->user->id]) }}">{{ $article->user->name }}</a>
											</span><br>
												<span>{{ $article->user->entry_date }}</span><span>【{{ $article->user->department->name }}】</span><br>
                                            <span
                                                class="text-gray-400 text-xs tracking-widest mt-0.5">{{ $article->created_at->format('Y-m-d') }}に作成</span>
                                    </a>
                                </div>
                                <h3 class="text-center font-semibold text-xl text-gray-800 leading-tight">
									【{{$articleCategory->name}}】
                                    {{ $article->title }}
                                </h3>
                                <div
                                    class="mx-auto block max-w-lg rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                                    @foreach ($article->tags as $tag)
                                        <span class="bg-cyan-400 text-white">{{ $tag->name }}</span>
                                    @endforeach
                                    <div>{{ $article->body }}</div>
                                </div>
                                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                                    <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <path
                                            d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                        </path>
                                    </svg>
                                    {{ $article->articleComments->count() }}
                                </span>

                        {{-- 自分以外のブログだったら表示のみ --}}
                    @else
                        <div>
                            <a class="inline-flex items-center">
                                <img alt="blog" src="https://dummyimage.com/104x104"
                                    class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                                <span class="flex-grow flex flex-col pl-4">
                                    <span class="title-font font-medium text-gray-900">
										<a class="text-info" href="{{ $article->user->id === auth()->user()->id ? route('profile.edit') : route('profile.show', ['id' => $article->user->id]) }}">{{ $article->user->name }}</a>
									</span><br>
										<span>{{ $article->user->entry_date }}</span><span>【{{ $article->user->department->name }}】</span><br>
                                    <span
                                        class="text-gray-400 text-xs tracking-widest mt-0.5">{{ $article->created_at->format('Y-m-d') }}に作成</span>
                                </span>
                            </a>
                        </div>
                        <h3 class="text-center font-semibold text-xl text-gray-800 leading-tight">
							【{{$articleCategory->name}}】
                            {{ $article->title }}</h3>
                        <div
                            class="mx-auto block max-w-lg rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                            @foreach ($article->tags as $tag)
                                <span class="bg-cyan-400 text-white">{{ $tag->name }}</span>
                            @endforeach
                            <div>{{ $article->body }}</div>
                        </div>
                        <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                <path
                                    d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                </path>
                            </svg>
                            {{ $article->articleComments->count() }}
                        </span>
                    @endif
                </div>

            <favorite-button>
@if (Auth::check())
    @if ($article->isFavoritedByUser(Auth::user()))
        <form action="{{ route('articles.unfavorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            @method('DELETE')
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <button type="submit">
                お気に入り解除
            </button>
        </form>
    @else
        <form action="{{ route('articles.favorite', ['article' => $article->id]) }}" method="POST" class="mb-4">
            @csrf
            <input type="hidden" name="article_id" value="{{ $article->id }}">
            <button type="submit">
                お気に入り
            </button>
        </form>
    @endif
	@else
	<p>お気に入り機能を利用するにはログインしてください。</p>
@endif
		</favorite-button>

		<div class="pull-right article-user-link">
			@if($article->user_id === Auth::id())
				<li><a class="bg-primary" href="{{ route('articles.myblog', Auth::id()) }}">マイブログへ</a></li>
			@else
				<a href="{{ route('articles.myblog', ['id' => $article->user_id]) }}"><span>{{ $article->user->name }}</span>さんのブログ一覧へ</a>
			@endif
		</div>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white pt-2 pl-3 overflow-hidden shadow-sm sm:rounded-lg">
            <!-- コメントフォーム -->
            <form action="{{ route('articles.commentStore', ['article' => $article->id]) }}" method="POST">
                @csrf
                <textarea name="comment" rows="3" cols="50"></textarea>
                <button type="submit">コメントする</button>
            </form>

<!-- コメント一覧 -->
<h2>コメント一覧</h2>
<hr>
			<div>
				<ul>
				@forelse ($article->articleComments as $comment)
				@if (!$comment->is_deleted)
					<li>
						<p id="comment-{{ $comment->id }}">{{ $comment->comment }}</p>
						@if (Auth::check() && Auth::user()->id === $comment->user->id)
							<!-- コメント編集フォーム -->
							<form id="edit-comment-form-{{ $comment->id }}" class="edit-comment-form" action="{{ route('articles.commentUpdate', ['comment' => $comment->id, 'article' => $article->id]) }}" method="POST">
								@csrf
								@method('POST')
								<input type="hidden" name="_method" value="PATCH">
								<textarea id="edit-comment-{{ $comment->id }}" name="comment" rows="2" cols="40"></textarea>
								<button type="button" class="update-comment-button inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" data-comment-id="{{ $comment->id }}" style="background-color: rgb(11, 146, 51)" data-te-ripple-init data-te-ripple-color="light">
									更新
								</button>
							</form>
							<button type="button" class="edit-comment-button inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" data-comment-id="{{ $comment->id }}" style="background-color: rgb(11, 146, 51)" data-te-ripple-init data-te-ripple-color="light">
								編集する
							</button>
							{{-- <form action="{{ route('articles.commentDestroy',$article->id) }}" method="POST" class="inline-block"> --}}
								{{-- <form action="{{ route('articles.commentDestroy', ['article' => $article->id]) }}" method="POST" class="inline-block"> --}}
								<form action="{{ route('articles.commentDestroy', ['article' => $article->id, 'comment' => $comment->id]) }}" method="POST" class="inline-block">
								@csrf
								@method('DELETE')
								<button type="submit"
									class="rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
									style="background-color:rgb(241, 45, 45)"
									data-te-ripple-init
									data-te-ripple-color="light"
									onclick="return confirm('本当に削除しますか?')">
									削除する
								</button>
							</form>
						@endif
					</li>
					@endif
				@empty
					<li>コメントはありません</li>
					@endforelse
				</ul>
			</div> 
			
			<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
			<script>
				$(document).ready(function() {
					$('.edit-comment-form').hide();
			
					// 編集ボタンのクリックイベント
					$('.edit-comment-button').click(function() {
						var commentId = $(this).data('comment-id');
						var commentText = $('#comment-' + commentId).text().trim();
			
						// 編集フォームを表示してコメントテキストをセット
						$('#comment-' + commentId).hide();
						$('#edit-comment-' + commentId).val(commentText);
						$('#edit-comment-form-' + commentId).show();
					});
			
					// 更新ボタンのクリックイベント
					$('.update-comment-button').click(function() {
						var commentId = $(this).data('comment-id');
						var updatedComment = $('#edit-comment-' + commentId).val();
			
						// Ajaxリクエストを送信
						$.ajax({
							url: '/articles/{{ $article->id }}/comments/' + commentId,
							type: 'POST', // POSTメソッドに変更
							data: {
								_method: 'PATCH', // _methodフィールドを追加
								comment: updatedComment,
								_token: '{{ csrf_token() }}'
							},
							success: function(response) {
								// ページをリロードして更新したコメントを表示
								location.reload();
							},
							error: function(xhr) {
								console.log(xhr.responseText);
							}
						});
					});
				});
			</script>

{{-- <x-answerpanel></x-answerpanel> --}}

        </div>
    </div>
</div>
</x-app-layout>

