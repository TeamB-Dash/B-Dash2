<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        ユーザー検索・一覧
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font overflow-hidden">
        @if (session('status'))
        <div class="w-2/3 mx-auto container mt-6 text-center bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">{{ session('status') }}</p>
        </div>
        @endif
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-wrap -m-12">

            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                    <tbody>
                        @foreach ($users as $user )
                        <tr
                        class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                        <td class="whitespace-nowrap px-6 py-4 font-medium"><span>{{$user->name}}</span><span class="text-gray-400 text-xsmt-0.5">入社日：{{ $user->entry_date  }}</span><span>【{{$user->department->name}}】</span></td>
                        @endforeach
                        </tr>
                    </tbody>
                    </table>
                </div>
                {{$users->links()}}
            </div>

          </div>
        </div>
      </section>
</x-app-layout>
