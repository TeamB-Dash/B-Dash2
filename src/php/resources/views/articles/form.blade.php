@csrf
<div class="grid grid-cols-1 gap-4">

    <!--Title input-->
<div class="mb-6">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">タイトル</label>
    <input type="text" name="title" id="title" value="{{ $article->title ?? old('title') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
</div>

<!--Tag input-->
<div id="tagForm" class="mb-6">
    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tag</label>
    <div class="flex flex-wrap relative mb-6 flex justify-center" data-te-input-wrapper-init>
        <!--$tagsがあればcheckboxを表示-->
        @if (isset( $tags ))
            @foreach ($tags as $tag )
            <div class="mb-[0.125rem] mr-4 inline-block min-h-[1.5rem] pl-[1.5rem]">
                <input
                class="relative float-left -ml-[1.5rem] mr-[6px] mt-[0.15rem] h-[1.125rem] w-[1.125rem] appearance-none rounded-[0.25rem] border-[0.125rem] border-solid border-neutral-300 outline-none before:pointer-events-none before:absolute before:h-[0.875rem] before:w-[0.875rem] before:scale-0 before:rounded-full before:bg-transparent before:opacity-0 before:shadow-[0px_0px_0px_13px_transparent] before:content-[''] checked:border-primary checked:bg-primary checked:before:opacity-[0.16] checked:after:absolute checked:after:-mt-px checked:after:ml-[0.25rem] checked:after:block checked:after:h-[0.8125rem] checked:after:w-[0.375rem] checked:after:rotate-45 checked:after:border-[0.125rem] checked:after:border-l-0 checked:after:border-t-0 checked:after:border-solid checked:after:border-white checked:after:bg-transparent checked:after:content-[''] hover:cursor-pointer hover:before:opacity-[0.04] hover:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:shadow-none focus:transition-[border-color_0.2s] focus:before:scale-100 focus:before:opacity-[0.12] focus:before:shadow-[0px_0px_0px_13px_rgba(0,0,0,0.6)] focus:before:transition-[box-shadow_0.2s,transform_0.2s] focus:after:absolute focus:after:z-[1] focus:after:block focus:after:h-[0.875rem] focus:after:w-[0.875rem] focus:after:rounded-[0.125rem] focus:after:content-[''] checked:focus:before:scale-100 checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca] checked:focus:before:transition-[box-shadow_0.2s,transform_0.2s] checked:focus:after:-mt-px checked:focus:after:ml-[0.25rem] checked:focus:after:h-[0.8125rem] checked:focus:after:w-[0.375rem] checked:focus:after:rotate-45 checked:focus:after:rounded-none checked:focus:after:border-[0.125rem] checked:focus:after:border-l-0 checked:focus:after:border-t-0 checked:focus:after:border-solid checked:focus:after:border-white checked:focus:after:bg-transparent dark:border-neutral-600 dark:checked:border-primary dark:checked:bg-primary dark:focus:before:shadow-[0px_0px_0px_13px_rgba(255,255,255,0.4)] dark:checked:focus:before:shadow-[0px_0px_0px_13px_#3b71ca]"
                name="tags[]"
                type="checkbox"
                id="inlineCheckbox1"
                value="{{$tag->name}}"
                checked/>
                <label
                class="inline-block pl-[0.15rem] hover:cursor-pointer"
                for=""
                >{{$tag->name}}</label
                >
            </div>
            @endforeach
        @endif
    </div>

    <button type="button" id="addTagBtn" class="rounded mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg text-white" style="background-color:rgba(107, 159, 29, 0.89)">タグを増やす</button><br>
    <div class="tag-item">
        <label>タグ：
        <input type="text" name="tags[]" id="tag" required class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 inline-block w-2/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </label>
    </div>
</div>

<!--Category-->
<div class="mb-6 min-h-[1.5rem] items-center justify-center">
    <label for="article_category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">カテゴリー</label>
    <input type="radio" name="article_category_id" value="1" id="article_category_id1" {{ (isset($article) && $article->article_category_id == 1) ? 'checked' : '' }} required>備忘録
    <input type="radio" name="article_category_id" value="2" id="article_category_id2" {{ (isset($article) && $article->article_category_id == 2) ? 'checked' : '' }} required>技術共有
    <input type="radio" name="article_category_id" value="3" id="article_category_id3" {{ (isset($article) && $article->article_category_id == 3) ? 'checked' : '' }} required>体験共有
    <input type="radio" name="article_category_id" value="4" id="article_category_id4" {{ (isset($article) && $article->article_category_id == 4) ? 'checked' : '' }} required>その他
</div>

<!--Body input-->
{{-- <div class="mb-6 min-h-[1.5rem] items-center justify-center">
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ブログ内容</label> --}}
    {{-- <textarea id="message" name="body" rows="30" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $article->body ?? old('body') }}</textarea> --}}
    {{-- <textarea id="message" name="body" rows="30" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ htmlspecialchars($article->body ?? old('body')) }}</textarea>
</div> --}}
<div class="mb-6 min-h-[1.5rem] items-center justify-center">
    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ブログ内容</label>
    <textarea id="message" name="body" rows="30" required class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here...">{{ $article->body ?? old('body') }}</textarea>
</div>



{{-- @push('scripts')
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<script>
    const easyMDE = new EasyMDE({
        showIcons: ['strikethrough', 'code', 'table', 'redo', 'heading', 'undo', 'heading-bigger', 'heading-smaller', 'heading-1', 'heading-2', 'heading-3', 'clean-block', 'horizontal-rule'], element: document.getElementById('markdown-editor')});
</script>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/easymde/dist/easymde.min.js"></script>
<script>
    const markdownParser = new EasyMDE({
        element: document.getElementById('message'),
    });
</script>
@endpush --}}

 {{-- タグ機能のjs --}}
 {{-- <script>
    const addTagBtn = document.getElementById('addTagBtn');
    const form = document.getElementById('tagForm');
    const closeIcons = document.querySelectorAll('.close-icon');
    const tagItems = document.querySelectorAll('.tag-item');

    function createNewForm(){
        const newDiv = document.createElement('div');
        newDiv.classList.add('tag-item');

        const newForm = document.createElement('input');
        newForm.type = 'text';
        newForm.className = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 inline-block w-2/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";
        newForm.setAttribute('name','tags[]');

        const newLabel = document.createElement('label');
        newLabel.textContent = 'タグ：';

        const newSpan = document.createElement('span');
        newSpan.classList.add('close-icon', 'text-white', 'rounded-full', 'bg-red-600', 'hover:bg-red-500', 'px-2', 'py-1');
        newSpan.textContent = '✖';

        newLabel.appendChild(newForm);
        newDiv.appendChild(newLabel);
        newDiv.appendChild(newSpan);

        // 「✖」をクリックしたときの処理を追加
        newSpan.addEventListener('click', () => {
            newDiv.remove();
        });

        return newDiv;
    }

    // 「✖」をクリックしたときの処理
    for (let j = 0; j < closeIcons.length; j++) {
    closeIcons[j].addEventListener('click', () => {
        tagItems[j].remove();
    });
    }

    // ボタンをクリックしたときの処理
    addTagBtn.addEventListener('click', () => {
    form.appendChild(createNewForm());
    });
</script> --}}

<script>
    // タグを追加するボタン
    const addTagBtn = document.getElementById('addTagBtn');
    // タグ入力フォームの親要素
    const form = document.getElementById('tagForm');
    // 「✖」をクリックしてタグを削除するアイコン
    const closeIcons = document.querySelectorAll('.close-icon');
    // タグの入力フォームの要素
    const tagItems = document.querySelectorAll('.tag-item');

    // 新しいタグ入力フォームを作成する関数
    function createNewForm() {
        const newDiv = document.createElement('div');
        newDiv.classList.add('tag-item');

        const newForm = document.createElement('input');
        newForm.type = 'text';
        newForm.className = "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 inline-block w-2/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500";
        newForm.setAttribute('name', 'tags[]');

        const newLabel = document.createElement('label');
        newLabel.textContent = 'タグ：';

        const newSpan = document.createElement('span');
        newSpan.classList.add('close-icon', 'text-white', 'rounded-full', 'bg-red-600', 'hover:bg-red-500', 'px-2', 'py-1');
        newSpan.textContent = '✖';

        newLabel.appendChild(newForm);
        newDiv.appendChild(newLabel);
        newDiv.appendChild(newSpan);

        // 「✖」をクリックしたときの処理を追加
        newSpan.addEventListener('click', () => {
            newDiv.remove();
        });

        return newDiv;
    }

    // 「✖」をクリックしたときの処理
    for (let j = 0; j < closeIcons.length; j++) {
        closeIcons[j].addEventListener('click', () => {
            tagItems[j].remove();
        });
    }

    // ボタンをクリックしたときの処理
    addTagBtn.addEventListener('click', () => {
        form.appendChild(createNewForm());
    });
</script>


