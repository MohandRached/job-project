@auth
    <div class="hidden sm:flex sm:items-center sm:ms-6">
        <div class="relative" x-data="{ open: false }">
            <button @click="open = !open"
                    class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-700 hover:text-gray-900">
                <div>{{ Auth::user()->name }}</div>
                <div class="ms-1">
                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 011.414 1.414L10 13.414l-4.707-4.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
            </button>

            <div x-show="open" @click.away="open = false"
                 class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-50">
                <div class="py-1">
                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        ⚙️ الملف الشخصي
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            🚪 تسجيل الخروج
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endauth
