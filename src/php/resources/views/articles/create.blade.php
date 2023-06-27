{{-- @extends('app') --}}

{{-- @section('title', 'ブログ投稿') --}}

{{-- @include('nav') --}}

{{-- @section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card mt-3">
          <div class="card-body pt-0">
            @include('error_card_list') --}}
            <div class="card-text">
              <form method="POST" action="{{ route('articles.store') }}">
                @include('articles.form')
          <!--Submit button-->
          <button
          type="submit"
          name="saveAsDraft"
          value="saveAsDraft"
          data-te-ripple-init
          data-te-ripple-color="light"
          class="mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
          style="background-color: #f21dab">
          下書き保存する
          </button>
          <button
          type="submit"
          name="create"
          value="create"
          data-te-ripple-init
          data-te-ripple-color="light"
          class="mb-2 rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
          style="background-color: #1da1f2">
          登録する
          </button>
              </form>
            </div>
          {{-- </div>
        </div>
      </div>
    </div>
  </div> --}}
{{-- @endsection --}}
