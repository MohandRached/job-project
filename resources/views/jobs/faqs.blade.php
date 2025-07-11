@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6 max-w-3xl">
        <h1 class="text-3xl font-bold mb-6 text-black">❓ الأسئلة الشائعة</h1>

        @forelse ($faqs as $faq)
            <div class="mb-4 bg-white border border-gray-300 rounded-xl shadow-sm p-4">
                <h2 class="text-xl font-semibold text-gray-900">{{ $faq->question }}</h2>
                <p class="text-gray-800 mt-2 leading-relaxed">{{ $faq->answer }}</p>
            </div>
        @empty
            <p class="text-gray-600">لا توجد أسئلة حالياً.</p>
        @endforelse
    </div>
@endsection
