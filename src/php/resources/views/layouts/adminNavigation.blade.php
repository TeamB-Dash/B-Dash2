<nav x-data="{ open: false }" class="bg-red-400 border-b border-red-400">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.top') }}">
                        <p class="block w-auto fill-current text-white" >Admin</p>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <!-- 月報 Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-400 hover:text-gray-600 hover:bg-white focus:outline-none transition ease-in-out duration-150">
                                        <x-adminNav-link :active="request()->routeIs('admin.users*')">
                                            <div>ユーザー</div>
                                        </x-adminNav-link>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">

                                    <x-dropdown-link :href="route('admin.users')">
                                        ユーザー検索・一覧
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('admin.users.create')">
                                        ユーザー登録
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('admin.users.role')">
                                        管理者一覧
                                    </x-dropdown-link>

                                    <x-dropdown-link :href="route('admin.users.registerNewRole')">
                                        管理者登録
                                    </x-dropdown-link>

                                </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <!-- ブログ Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-400 hover:text-gray-600 hover:bg-white focus:outline-none transition ease-in-out duration-150">
                                        <x-adminNav-link :active="request()->routeIs('admin.inquiry.*')">
                                            <div>問い合わせ</div>
                                        </x-adminNav-link>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('admin.inquiry.showAll')">
                                        問い合わせ一覧
                                    </x-dropdown-link>
                                    <x-dropdown-link :href="route('admin.inquiry.mailList')">
                                        問い合わせメーリングリスト
                                    </x-dropdown-link>
                                </x-slot>
                        </x-dropdown>
                    </div>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <!-- Q&A Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-400 hover:text-gray-600 hover:bg-white focus:outline-none transition ease-in-out duration-150">
                                        <x-adminNav-link :active="request()->routeIs('admin.announcement.*')">
                                            <div>お知らせ</div>
                                        </x-adminNav-link>

                                        <div class="ml-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                            <x-slot name="content">

                                <x-dropdown-link :href="route('admin.announcement.showAll')">
                                    お知らせ一覧
                                </x-dropdown-link>

                                <x-dropdown-link :href="route('admin.announcement.create')">
                                    お知らせ登録
                                </x-dropdown-link>

                            </x-slot>
                        </x-dropdown>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-400 hover:text-gray-600 hover:bg-white focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('dashboard')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                パスワード変更
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('dashboard')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                お問い合わせ
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-red-400 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-red-400 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-500">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    月報トップ
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    月報編集
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    マイ月報
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    ブログ新規投稿
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    お気に入りブログ
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('profile.edit')">
                    マイブログ
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('questions.index')">
                    Q&A一覧
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('questions.create')">
                    質問投稿
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('questions.showMyQuestions',Auth::user()->id)">
                    マイ質問
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>