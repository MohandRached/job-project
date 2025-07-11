@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-md">
            <h1 class="text-3xl font-extrabold text-black mb-4">{{ $job->title }}</h1>

            <ul class="space-y-2 text-gray-900 font-medium">
                <li>🏢 <strong>الشركة:</strong> {{ $job->company?->name ?? '-' }}</li>
                <li>📍 <strong>المكان:</strong> {{ $job->work_place ?? '-' }}</li>
                <li>🗓️ <strong>الفترة:</strong> من {{ $job->from_date }} إلى {{ $job->to_date }}</li>
            </ul>

            <div class="mt-6">
                <h2 class="text-lg font-bold text-black mb-2">📝 الوصف الوظيفي</h2>
                <p class="text-gray-800 leading-relaxed">{{ $job->description }}</p>
            </div>

            <div class="flex gap-4 mt-6">
                <form action="{{ route('jobs.favorite', $job->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg shadow-md font-semibold transition duration-300">
                        ✅ قدّم الآن
                    </button>
                    @if(auth()->check() && auth()->user()->favoriteJobs->contains($job->id))
                        <button type="submit"
                                class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg shadow-md font-semibold transition duration-300">
                            ✅ مضافة للمفضلة
                        </button>
                    @else
                        <button type="submit"
                                class="bg-red-600 hover:bg-red-700 text-white px-6 py-2 rounded-lg shadow-md font-semibold transition duration-300">
                            ❤️ أضف للمفضلة
                        </button>
                    @endif
                </form>

            </div>
        </div>
    </div>
@endsection
