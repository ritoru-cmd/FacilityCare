<x-guest-layout>

    <div class="w-full max-w-md">

        <div class="text-center mb-8">

            <div
                class="w-16 h-16 mx-auto rounded-2xl bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-white text-2xl font-bold shadow-lg">

                F

            </div>

            <h1 class="mt-5 text-3xl font-bold text-gray-800">
                FacilityFix
            </h1>

            <p class="text-gray-500 mt-2">
                Sistem Pelaporan Kerusakan Fasilitas
            </p>

        </div>

        <div class="bg-white rounded-3xl shadow-xl border p-8">

            <h2 class="text-2xl font-bold text-gray-800 text-center">
                Login
            </h2>

            <p class="text-gray-500 text-center mt-2 mb-8">
                Masuk untuk mengelola data fasilitas dan laporan kerusakan.
            </p>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">

                @csrf

                {{-- Email --}}
                <div>

                    <x-input-label
                        for="email"
                        :value="__('Email')" />

                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username" />

                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2" />

                </div>

                {{-- Password --}}
                <div class="mt-5">

                    <x-input-label
                        for="password"
                        :value="__('Password')" />

                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password" />

                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2" />

                </div>

                {{-- Remember --}}
                <div class="flex items-center justify-between mt-5">

                    <label
                        for="remember_me"
                        class="inline-flex items-center">

                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300 text-blue-600"
                            name="remember">

                        <span class="ms-2 text-sm text-gray-600">

                            Remember Me

                        </span>

                    </label>


                </div>

                {{-- Login Button --}}
                <button
                    type="submit"
                    class="w-full mt-8 bg-gradient-to-r
                           from-blue-600 to-indigo-600
                           hover:from-blue-700 hover:to-indigo-700
                           text-white font-semibold py-3
                           rounded-xl shadow-lg
                           transition-all duration-200">

                    🚀 Masuk ke Dashboard

                </button>

            </form>

        </div>

        <div class="text-center mt-6">

            <a
                href="{{ url('/') }}"
                class="text-gray-500 hover:text-blue-600">

                ← Kembali ke Beranda

            </a>

        </div>

    </div>

</x-guest-layout>