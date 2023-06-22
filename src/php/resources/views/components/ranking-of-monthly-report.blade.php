<div class="">
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
          <div class="flex flex-col text-center w-full mb-6">
            <h3 class="sm:text-4xl text-3xl font-medium title-font mb-2 text-gray-900">いいね！獲得ランキング（月報）</h3>
            <p class="mx-auto leading-relaxed text-base">対象月：{{\Carbon\Carbon::now()->subMonthsWithNoOverflow(6)->format("Y年m月")}}～{{\Carbon\Carbon::now()->subMonthWithNoOverflow(1)->format("Y年m月")}}
            </p>
          </div>
          <div class="lg:w-2/3 w-full mx-auto overflow-auto">
            <table class="table-auto w-full text-left whitespace-no-wrap">
              <tbody>
                @foreach ($monthlyReportRanking as $item )
                <tr>
                  <td class="px-4 py-3">{{$item->user->name}}</td>
                  <td class="px-4 py-3 text-lg text-gray-900">{{$item->number_of_likes_count}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </section>
    </div>

