<nav class="bg-white shadow-sm border-b sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-14">

            {{-- Logo --}}
            <div class="flex items-center gap-3">

                <div
                    class="w-8 h-8 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 flex items-center justify-center text-white font-bold text-sm">

                    F

                </div>

                <span class="font-bold text-gray-800">
                    FacilityFix
                </span>

            </div>

            {{-- Menu --}}

            <div class="flex items-center gap-2 text-sm">


                @auth

                    @if(auth()->user()->role === 'admin')

                            <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg transition
                                                            {{ request()->routeIs('dashboard')
                        ? 'bg-blue-100 text-blue-700 font-semibold'
                        : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">

                                Dashboard

                            </a>

                            <a href="{{ route('kategori-fasilitas.index') }}" class="px-3 py-2 rounded-lg transition
                                                            {{ request()->routeIs('kategori-fasilitas.*')
                        ? 'bg-blue-100 text-blue-700 font-semibold'
                        : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">

                                Kategori

                            </a>

                            <a href="{{ route('fasilitas.index') }}" class="px-3 py-2 rounded-lg transition
                                                            {{ request()->routeIs('fasilitas.*')
                        ? 'bg-blue-100 text-blue-700 font-semibold'
                        : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">

                                Fasilitas

                            </a>

                            <a href="{{ route('laporan-kerusakan.index') }}" class="px-3 py-2 rounded-lg transition
                                                            {{ request()->routeIs('laporan-kerusakan.*')
                        ? 'bg-blue-100 text-blue-700 font-semibold'
                        : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">

                                Laporan

                            </a>

                    @else
                            <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg transition
                                                            {{ request()->routeIs('dashboard')
                        ? 'bg-blue-100 text-blue-700 font-semibold'
                        : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">

                                Dashboard

                            </a>
                            
                            <a href="{{ route('fasilitas.index') }}" class="px-3 py-2 rounded-lg transition
                                                            {{ request()->routeIs('fasilitas.*')
                        ? 'bg-blue-100 text-blue-700 font-semibold'
                        : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">

                                Fasilitas

                            </a>

                            <a href="{{ route('laporan-kerusakan.index') }}" class="px-3 py-2 rounded-lg transition
                                                            {{ request()->routeIs('laporan-kerusakan.*')
                        ? 'bg-blue-100 text-blue-700 font-semibold'
                        : 'text-gray-600 hover:bg-gray-100 hover:text-blue-600' }}">

                                Laporan

                            </a>

                    @endif

                @endauth

            </div>


            {{-- User --}}
            <div class="flex items-center gap-3">

                @auth

                    <span class="text-sm text-gray-500">
                        Hai, {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit"
                            class="px-4 py-2 rounded-lg bg-red-500 text-white hover:bg-red-600 transition-all duration-200 shadow-sm hover:shadow-md text-sm font-medium">

                            Logout

                        </button>

                    </form>

                @endauth

            </div>

        </div>

    </div>

</nav>