<x-app-layout>
    <div class="py-8 max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-center">الوظائف المفضلة</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($jobs ?? [] as $job)
                <div class="bg-yellow-50 border border-yellow-300 rounded-lg p-5">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $job['title'] ?? 'بدون عنوان' }}</h2>
                    <p class="text-sm text-gray-600 mb-1">المكان: {{ $job['work_place'] ?? '-' }}</p>
                    <p class="text-sm text-gray-600 mb-1">المجال: {{ $job['work_field']['name'] ?? '-' }}</p>
                    <a href="{{ route('jobs.show', $job['id']) }}" class="inline-block mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">عرض التفاصيل</a>
                </div>
            @empty
                <p class="text-center text-gray-500">لا توجد وظائف مفضلة حالياً.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
