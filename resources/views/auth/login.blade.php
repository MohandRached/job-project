<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100 px-4 py-12 rtl">
        <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">تسجيل الدخول</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email / Phone -->
                <div>
                    <label for="email" class="block mb-1 text-sm font-medium text-gray-700">البريد الإلكتروني</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block mb-1 text-sm font-medium text-gray-700">كلمة المرور</label>
                    <input id="password" type="password" name="password" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200">
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center">
                        <input type="checkbox" name="remember" class="form-checkbox text-blue-500">
                        <span class="ml-2 text-sm text-gray-600">تذكرني</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-blue-500 hover:underline" href="{{ route('password.request') }}">
                            نسيت كلمة المرور؟
                        </a>
                    @endif
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                            class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                        تسجيل الدخول
                    </button>
                </div>

                <!-- Register Link -->
                <div class="text-center mt-4">
                    <a href="{{ route('register') }}" class="text-sm text-gray-600 hover:text-blue-600">ليس لديك حساب؟ سجل الآن</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
