@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-extrabold mb-6 text-black">📋 الوظائف المتاحة</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($jobs as $job)
                <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-md hover:shadow-lg transition">
                    <h2 class="text-xl font-bold text-black mb-2">{{ $job->title }}</h2>
                    <p class="text-gray-800">🏢 <span class="font-semibold">الشركة:</span> {{ $job->company?->name ?? '-' }}</p>
                    <p class="text-gray-800">📍 <span class="font-semibold">المكان:</span> {{ $job->work_place ?? '-' }}</p>
                    <p class="text-gray-800">🗓️ <span class="font-semibold">الفترة:</span> {{ $job->from_date }} → {{ $job->to_date }}</p>

                    <a href="{{ route('jobs.show', $job->id) }}"
                       class="mt-4 inline-block bg-blue-700 hover:bg-blue-800 text-red-700 px-4 py-2 rounded-md transition font-medium">
                        عرض التفاصيل
                    </a>
                </div>
            @empty
                <div class="col-span-2 text-center text-gray-700">لا توجد وظائف حالياً.</div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $jobs->links() }}
        </div>
    </div>
@endsection
