<x-app-layout>
    <div class="py-10 max-w-3xl mx-auto">
        @if($job)
            <h1 class="text-2xl font-bold text-gray-800 mb-4">{{ $job['title'] ?? '-' }}</h1>
            <p class="text-gray-600 mb-2"><strong>الوصف:</strong> {{ $job['description'] ?? '-' }}</p>
            <p class="text-gray-600 mb-2"><strong>المكان:</strong> {{ $job['work_place'] ?? '-' }}</p>
            <p class="text-gray-600 mb-2"><strong>الخبرة:</strong> {{ $job['work_experience'] ?? '-' }} سنوات</p>
            <p class="text-gray-600 mb-2"><strong>المجال:</strong> {{ $job['work_field']['name'] ?? '-' }}</p>
            <p class="text-gray-600 mb-2"><strong>المستوى التعليمي:</strong> {{ $job['education_level'] ?? '-' }}</p>
        @else
            <p class="text-center text-gray-500">لم يتم العثور على بيانات الوظيفة.</p>
        @endif
    </div>
</x-app-layout>
