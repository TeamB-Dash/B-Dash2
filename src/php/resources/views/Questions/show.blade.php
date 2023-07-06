<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        質問詳細画面
        </h2>
    </x-slot>

    @if (session('status'))
    <div class="w-2/3 mx-auto container mt-6 text-center bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold">{{ session('status') }}</p>
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white pt-2 pl-3 overflow-hidden shadow-sm sm:rounded-lg">
                {{-- 自分の質問だったら編集ができる --}}
                <div>
                    @if ($question->user->id === Auth::id())
                        @if(isset($question->shipped_at))
                        <div class="rounded mb-2 rounded px-6 py-2.5 text-s text-center font-medium uppercase text-white" style="background-color:rgb(11, 146, 51)">公開済み</div>
                        @else
                        <div class="rounded mb-2 rounded px-6 py-2.5 text-s text-center font-medium uppercase text-white" style="background-color:rgb(142, 11, 146)">下書き</div>
                        @endif
                    <div>
                    <button
                    type="button"
                    onclick="location.href='{{ route('questions.edit',$question->id) }}' "
                    class="inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color:rgb(11, 146, 51)"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    編集する
                    </button>
                    <form action="{{ route('questions.destroy',$question->id) }}" method="POST" class="inline-block " >
                    @csrf
                    @method('DELETE')
                    <button
                    type="submit"
                    class="rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color:rgb(241, 45, 45)"
                    data-te-ripple-init
                    data-te-ripple-color="light"
                    onclick="return confirm('本当に削除しますか?')"
                    >
                    削除する
                    </button>
                    </form>
                </div>
                {{-- <x-answerpanel></x-answerpanel> --}}

                <div>
                    <a class="inline-flex items-center">
                    <img alt="blog" src="https://dummyimage.com/104x104" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                    <span class="flex-grow flex flex-col pl-4">
                        <span class="title-font font-medium text-gray-900">{{ $question->user->name }}</span>
                        <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{ $question->created_at->format('Y-m-d')  }}</span><span>【{{$question->user->department->name}}】</span>
                    </span>
                    </a>
                </div>
                <h3 class="text-center font-semibold text-xl text-gray-800 leading-tight">{{$question->title}}</h3>
                <div class="mx-auto block max-w-lg rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    @foreach ($question->tags as $tag )
                    <span class="bg-cyan-400 text-white">{{$tag->name}}</span>
                    @endforeach
                    <div>{{$question->body}}</div>
                </div>
                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>{{ $question->questionAnswers->count() }}
                </span>
                {{-- 自分以外の質問だったら表示のみ --}}
                @else
                <div>
                    <a class="inline-flex items-center">
                    <img alt="blog" src="https://dummyimage.com/104x104" class="w-12 h-12 rounded-full flex-shrink-0 object-cover object-center">
                    <span class="flex-grow flex flex-col pl-4">
                        <span class="title-font font-medium text-gray-900">{{ $question->user->name }}</span>
                        <span class="text-gray-400 text-xs tracking-widest mt-0.5">{{ $question->created_at->format('Y-m-d')  }}</span><span>【{{$question->user->department->name}}】</span>
                    </span>
                    </a>
                </div>
                <h3 class="text-center font-semibold text-xl text-gray-800 leading-tight">{{$question->title}}</h3>
                <div class="mx-auto block max-w-lg rounded-lg bg-white p-6 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] dark:bg-neutral-700">
                    @foreach ($question->tags as $tag )
                    <span class="bg-cyan-400 text-white">{{$tag->name}}</span>
                    @endforeach
                    <div>{{$question->body}}</div>
                </div>
                <span class="text-gray-400 inline-flex items-center leading-none text-sm">
                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>{{ $question->questionAnswers->count() }}
                </span>
                @endif
            </div>


            {{-- 質問に紐づく回答を表示 --}}
            {{-- <x-answerspanelへ置き換え予定> --}}
            <h3
            class="mt-4 mb-6 ml-3 text-2xl font-bold text-neutral-700 dark:text-neutral-300">
            {{ $question->questionAnswers->count() }}件の回答
            </h3>

            <ol class="border-l-2 border-info-100">
            <!--First item-->
            <li>
                <div class="flex-start md:flex">
                <div
                    class="-ml-[13px] flex h-[25px] w-[25px] items-center justify-center rounded-full bg-info-100 text-info-700">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="h-4 w-4">
                    <path
                        fill-rule="evenodd"
                        d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                        clip-rule="evenodd" />
                    </svg>
                </div>
                <div
                    class="mb-10 ml-6 block max-w-md rounded-lg bg-neutral-50 p-6 shadow-md shadow-black/5 dark:bg-neutral-700 dark:shadow-black/10">
                    <div class="mb-4 flex justify-between">
                    <a
                        href="#!"
                        class="text-sm text-info transition duration-150 ease-in-out hover:text-info-600 focus:text-info-600 active:text-info-700"
                        >回答者の名前</a
                    >さんが回答
                    <a
                        href="#!"
                        class="text-sm text-info transition duration-150 ease-in-out hover:text-info-600 focus:text-info-600 active:text-info-700"
                        >04 / 02 / 2022（回答日の日付）</a
                    >
                    </div>
                    <p class="mb-6 text-neutral-700 dark:text-neutral-200">
                    （回答内容）Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                    scelerisque diam non nisi semper, et elementum lorem ornare.
                    Maecenas placerat facilisis mollis. Duis sagittis ligula in
                    sodales vehicula.（回答内容）
                    </p>
                    <button
                    type="button"
                    class="inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color:rgb(0, 162, 255)"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    リプライ
                    </button>
                </div>
                </div>
            </li>

            <!--Second item-->
            <li>
                <div class="flex-start md:flex">
                <div
                    class="-ml-[13px] flex h-[25px] w-[25px] items-center justify-center rounded-full bg-info-100 text-info-700">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="h-4 w-4">
                    <path
                        fill-rule="evenodd"
                        d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                        clip-rule="evenodd" />
                    </svg>
                </div>
                <div
                    class="mb-10 ml-6 block max-w-md rounded-lg bg-neutral-50 p-6 shadow-md shadow-black/5 dark:bg-neutral-700 dark:shadow-black/10">
                    <div class="mb-4 flex justify-between">
                    <a
                        href="#!"
                        class="text-sm text-info transition duration-150 ease-in-out hover:text-info-600 focus:text-info-600 active:text-info-700"
                        >回答者の名前</a
                    >さんが回答
                    <a
                        href="#!"
                        class="text-sm text-info transition duration-150 ease-in-out hover:text-info-600 focus:text-info-600 active:text-info-700"
                        >04 / 02 / 2022（回答日の日付）</a
                    >
                    </div>
                    <p class="mb-6 text-neutral-700 dark:text-neutral-200">
                    （回答内容）Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                    scelerisque diam non nisi semper, et elementum lorem ornare.
                    Maecenas placerat facilisis mollis. Duis sagittis ligula in
                    sodales vehicula.（回答内容）
                    </p>
                    <button
                    type="button"
                    class="inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color:rgb(0, 162, 255)"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    リプライ
                    </button>
                </div>
                </div>
            </li>

            <!--Third item-->
            <li>
                <div class="flex-start md:flex">
                <div
                    class="-ml-[13px] flex h-[25px] w-[25px] items-center justify-center rounded-full bg-info-100 text-info-700">
                    <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="h-4 w-4">
                    <path
                        fill-rule="evenodd"
                        d="M6.75 2.25A.75.75 0 017.5 3v1.5h9V3A.75.75 0 0118 3v1.5h.75a3 3 0 013 3v11.25a3 3 0 01-3 3H5.25a3 3 0 01-3-3V7.5a3 3 0 013-3H6V3a.75.75 0 01.75-.75zm13.5 9a1.5 1.5 0 00-1.5-1.5H5.25a1.5 1.5 0 00-1.5 1.5v7.5a1.5 1.5 0 001.5 1.5h13.5a1.5 1.5 0 001.5-1.5v-7.5z"
                        clip-rule="evenodd" />
                    </svg>
                </div>
                <div
                    class="mb-10 ml-6 block max-w-md rounded-lg bg-neutral-50 p-6 shadow-md shadow-black/5 dark:bg-neutral-700 dark:shadow-black/10">
                    <div class="mb-4 flex justify-between">
                    <a
                        href="#!"
                        class="text-sm text-info transition duration-150 ease-in-out hover:text-info-600 focus:text-info-600 active:text-info-700"
                        >回答者の名前</a
                    >さんが回答
                    <a
                        href="#!"
                        class="text-sm text-info transition duration-150 ease-in-out hover:text-info-600 focus:text-info-600 active:text-info-700"
                        >04 / 02 / 2022（回答日の日付）</a
                    >
                    </div>
                    <p class="mb-6 text-neutral-700 dark:text-neutral-200">
                    （回答内容）Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque
                    scelerisque diam non nisi semper, et elementum lorem ornare.
                    Maecenas placerat facilisis mollis. Duis sagittis ligula in
                    sodales vehicula.（回答内容）
                    </p>
                    <button
                    type="button"
                    class="inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                    style="background-color:rgb(0, 162, 255)"
                    data-te-ripple-init
                    data-te-ripple-color="light">
                    リプライ
                    </button>
                </div>
                </div>
            </li>
            </ol>


                            {{-- ブログ流用のコメント機能 --}}
                            <div class="py-12">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                    <div class="bg-white pt-2 pl-3 overflow-hidden shadow-sm sm:rounded-lg">
                                        <!-- コメントフォーム -->
                                        <form action="{{ route('questions.commentStore', ['question' => $question->id]) }}" method="POST">
                                            @csrf
                                            <textarea name="answer" rows="3" cols="50"></textarea>
                                            <button type="submit">コメントする</button>
                                        </form>
                            
                            <!-- コメント一覧 -->
                            <h2>コメント一覧</h2>
                            <hr>
                                        <div>
                                            <ul>
                                            @forelse ($question->questionAnswers as $comment)
                                            @if (!$comment->is_deleted)
                                                <li>
                                                        <strong><h3 id="comment-{{ $comment->id }}-name">{{ $comment->user->name }}</h3></strong>
                                                        <p id="comment-{{ $comment->id }}-answer">{{ $comment->answer }}</p>
                                                    <hr>
                                                    <br>
                                                    @if (Auth::check() && Auth::user()->id === $comment->user->id)
                                                        <!-- コメント編集フォーム -->
                                                        <form id="edit-comment-form-{{ $comment->id }}" class="edit-comment-form" action="{{ route('questions.commentUpdate', ['question' => $question->id, 'comment' => $comment->id]) }}" method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <textarea id="edit-comment-{{ $comment->id }}-answer" name="answer" rows="2" cols="40">{{ $comment->answer }}</textarea>
                                                            <button type="button" class="update-comment-button inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" data-comment-id="{{ $comment->id }}" style="background-color: rgb(11, 146, 51)" data-te-ripple-init data-te-ripple-color="light">
                                                                更新
                                                            </button>
                                                        </form>                                                        
                                                        <button type="button" class="edit-comment-button inline-block rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg" data-comment-id="{{ $comment->id }}" style="background-color: rgb(11, 146, 51)" data-te-ripple-init data-te-ripple-color="light">
                                                            編集する
                                                        </button>
                                                        {{-- <form action="{{ route('articles.commentDestroy',$article->id) }}" method="POST" class="inline-block"> --}}
                                                            {{-- <form action="{{ route('articles.commentDestroy', ['article' => $article->id]) }}" method="POST" class="inline-block"> --}}
                                                            <form action="{{ route('questions.commentDestroy', ['question' => $question->id, 'comment' => $comment->id]) }}" method="POST" class="inline-block">
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
                                            // $(document).ready(function() {
                                            //     $('.edit-comment-form').hide();
                                        
                                            //     // 編集ボタンのクリックイベント
                                            //     $('.edit-comment-button').click(function() {
                                            //         var commentId = $(this).data('comment-id');
                                            //         var commentText = $('#comment-' + commentId).text().trim();
                                        
                                            //         // 編集フォームを表示してコメントテキストをセット
                                            //         $('#comment-' + commentId).hide();
                                            //         $('#edit-comment-' + commentId).val(commentText);
                                            //         $('#edit-comment-form-' + commentId).show();
                                            //     });
                                        
                                            //     // 更新ボタンのクリックイベント
                                            //     $('.update-comment-button').click(function() {
                                            //         var commentId = $(this).data('comment-id');
                                            //         // var updatedComment = $('#edit-comment-' + commentId).val();
                                            //         var updatedComment = $('#edit-comment-' + commentId + '-answer').val();
                                        
                                            //         // Ajaxリクエストを送信
                                            //         $.ajax({
                                            //             url: '/questions/{{ $question->id }}/comments/' + commentId,
                                            //             type: 'POST', // POSTメソッドに変更
                                            //             data: {
                                            //                 _method: 'PATCH', // _methodフィールドを追加
                                            //                 comment: updatedComment,
                                            //                 _token: '{{ csrf_token() }}'
                                            //             },
                                            //             success: function(response) {
                                            //                 // ページをリロードして更新したコメントを表示
                                            //                 location.reload();
                                            //             },
                                            //             error: function(xhr) {
                                            //                 console.log(xhr.responseText);
                                            //             }
                                            //         });
                                            //     });
                                            // });
                                            $(document).ready(function() {
                                            $('.edit-comment-form').hide();

                                            // 編集ボタンのクリックイベント
                                            $('.edit-comment-button').click(function() {
                                                var commentId = $(this).data('comment-id');
                                                var commentAnswer = $('#comment-' + commentId + '-answer').text().trim();

                                                // 編集フォームを表示してコメントテキストをセット
                                                $('#comment-' + commentId + '-answer').hide();
                                                $('#edit-comment-' + commentId + '-answer').val(commentAnswer);
                                                $('#edit-comment-form-' + commentId).show();
                                            });

                                            // 更新ボタンのクリックイベント
                                            $('.update-comment-button').click(function() {
                                                var commentId = $(this).data('comment-id');
                                                var updatedComment = $('#edit-comment-' + commentId + '-answer').val();

                                                // Ajaxリクエストを送信
                                                $.ajax({
                                                    url: '/questions/' + {{ $question->id }} + '/comments/' + commentId,
                                                    type: 'POST',
                                                    data: {
                                                        _method: 'PATCH',
                                                        answer: updatedComment,
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
            
                                                        {{-- ブログ流用のコメント機能　ここまで --}}


        </div>
    </div>
</x-app-layout>
