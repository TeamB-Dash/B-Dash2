<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ユーザー登録
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font overflow-hidden">
        @if (session('status'))
            <div class="w-2/3 mx-auto container mt-6 text-center bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3"
                role="alert">
                <p class="font-bold">{{ session('status') }}</p>
            </div>
        @endif
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-12">
                <div class="py-12">
                    <form method="POST" action="{{ route('admin.users.store') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="name" :value="__('氏名')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="email" :value="__('メールアドレス')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password" :value="__('パスワード')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('パスワード確認')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="" :value="__('アイコン')" />
                            {{-- <x-text-input id="" name="" type="text" class="mt-1 block w-full" :value="old('', $user->)"
                          required autofocus autocomplete="" /> --}}
                            <x-input-error class="mt-2" :messages="$errors->get('')" />
                        </div>

                        <div>
                            <label for="department_id">所属</label>
                            <select id="department_id" name="department_id" type="text" class="mt-1 block w-full">
                                @foreach ($departments as $department)
                                    <option value={{ $department->id }}
                                        {{ old('department_id') == $department->id ? 'checked' : '' }}>
                                        {{ $department->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="beginner_flg">アサイン状況</label>
                            <select id="beginner_flg" name="beginner_flg" type="boolean" class="mt-1 block w-full">
                                <option value="" {{ old('beginner_flg') == '' ? 'checked' : '' }}>指定なし</option>
                                <option value="true" {{ old('beginner_flg') == true ? 'checked' : '' }}>アサイン中</option>
                                <option value="false" {{ old('beginner_flg') == false ? 'checked' : '' }}>待機中</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label for="entry_date" :value="__('入社日')" />
                            <x-text-input id="entry_date" name="entry_date" type="date" class="mt-1 block w-full"
                                required autofocus autocomplete="entry_date" />
                            <x-input-error class="mt-2" :messages="$errors->get('entry_date')" />
                        </div>

                        <div>
                            <label for="gender">性別</label><br>
                            <input id="gender" name="gender" type="radio" value="1"
                                {{ old('gender') == 1 ? 'checked' : '' }}>男性<br>
                            <input id="gender" name="gender" type="radio" value="2"
                                {{ old('gender') == 2 ? 'checked' : '' }}>女性
                        </div>

                        <div>
                            <label for="blood_type">血液型</label>
                            <select id="blood_type" name="blood_type" type="text" class="mt-1 block w-full">
                                <option value="0" {{ old('beginner_flg') == 0 ? 'checked' : '' }}>未設定</option>
                                <option value="1" {{ old('beginner_flg') == 1 ? 'checked' : '' }}>A型</option>
                                <option value="2" {{ old('beginner_flg') == 2 ? 'checked' : '' }}>B型</option>
                                <option value="3" {{ old('beginner_flg') == 3 ? 'checked' : '' }}>AB型</option>
                                <option value="4" {{ old('beginner_flg') == 4 ? 'checked' : '' }}>O型</option>
                            </select>
                        </div>

                        <div>
                            <x-input-label for="birthday" :value="__('誕生日')" />
                            <x-text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full"
                                required autofocus autocomplete="birthday" />
                            <x-input-error class="mt-2" :messages="$errors->get('birthday')" />
                        </div>

                        <div>
                            <x-input-label for="github_url" :value="__('GitHubアカウント')" />
                            <x-text-input id="github_url" name="github_url" type="text" class="mt-1 block w-full"
                                required autofocus autocomplete="github_url" />
                            <x-input-error class="mt-2" :messages="$errors->get('github_url')" />
                        </div>

                        <div>
                            <x-input-label for="qiita_url" :value="__('Qiitaアカウント')" />
                            <x-text-input id="qiita_url" name="qiita_url" type="text" class="mt-1 block w-full"
                                required autofocus autocomplete="qiita_url" />
                            <x-input-error class="mt-2" :messages="$errors->get('qiita_url')" />
                        </div>

                        <div>
                            <x-input-label for="self_introduction" :value="__('自己紹介')" />
                            <x-text-input id="self_introduction" name="self_introduction" type="text"
                                class="mt-1 block w-full" : required autofocus autocomplete="self_introduction" />
                            <x-input-error class="mt-2" :messages="$errors->get('self_introduction')" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-primary-button class="ml-4">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
