@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <h1 class="text-3xl font-bold mb-6 text-black">📑 الشروط والسياسات</h1>

        @forelse ($policies as $policy)
            <div class="mb-4 bg-white border border-gray-300 rounded-xl shadow-sm p-4">
                <h2 class="text-xl font-semibold text-gray-900">{{ $policy->title }}</h2>
                <p class="text-gray-800 mt-2 leading-relaxed">{{ $policy->content }}</p>
            </div>
        @empty
            <p class="text-gray-600">لا توجد سياسات حالياً.</p>
        @endforelse
    </div>
@endsection
