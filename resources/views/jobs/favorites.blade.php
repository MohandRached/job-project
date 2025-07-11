@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6 text-black">❤️ الوظائف المفضلة</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($jobs as $job)
                <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-sm hover:shadow-lg transition">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $job->title }}</h2>
                    <p class="text-gray-800">🏢 الشركة: {{ $job->company?->name ?? '-' }}</p>
                    <p class="text-gray-800">📍 المكان: {{ $job->work_place ?? '-' }}</p>
                    <p class="text-gray-800">🗓️ من: {{ $job->from_date }} → {{ $job->to_date }}</p>

                    <a href="{{ route('jobs.show', $job->id) }}"
                       class="mt-4 inline-block bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition">
                        عرض التفاصيل
                    </a>
                </div>
            @empty
                <div class="col-span-2 text-center text-gray-600">
                    لا توجد وظائف مفضلة حالياً.
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $jobs->links() }}
        </div>
    </div>
@endsection
