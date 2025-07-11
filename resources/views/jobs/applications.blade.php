@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold mb-6 text-black">📥 الوظائف التي تم التقديم عليها</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse($applications as $app)
                <div class="bg-white border border-gray-300 rounded-xl p-6 shadow-sm hover:shadow-md transition">
                    <h2 class="text-xl font-bold text-gray-900 mb-2">{{ $app->job?->title }}</h2>
                    <p class="text-gray-800">🏢 الشركة: {{ $app->job?->company?->name ?? '-' }}</p>
                    <p class="text-gray-800">📍 المكان: {{ $app->job?->work_place ?? '-' }}</p>
                    <p class="text-gray-800">📅 تاريخ التقديم: {{ $app->created_at->format('Y-m-d') }}</p>

                    @if($app->video_path)
                        <a href="{{ asset('storage/' . $app->video_path) }}" target="_blank"
                           class="inline-block mt-3 bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md font-medium transition">
                            🎥 مشاهدة الفيديو
                        </a>
                    @else
                        <p class="text-sm text-gray-500 mt-3">لا يوجد فيديو مرفوع.</p>
                    @endif
                </div>
            @empty
                <div class="col-span-2 text-center text-gray-600">
                    لم تقم بالتقديم على أي وظيفة حتى الآن.
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $applications->links() }}
        </div>
    </div>
@endsection
