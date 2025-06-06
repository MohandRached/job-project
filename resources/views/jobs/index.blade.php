<x-app-layout>
    <div class="py-8 max-w-6xl mx-auto">
        <h1 class="text-2xl font-bold mb-6 text-center">الوظائف المتاحة</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @forelse ($jobs ?? [] as $job)
                <div class="bg-white shadow-md rounded-lg p-5">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2">{{ $job['title'] ?? 'بدون عنوان' }}</h2>
                    <p class="text-sm text-gray-600 mb-1">المكان: {{ $job['work_place'] ?? '-' }}</p>
                    <p class="text-sm text-gray-600 mb-1">المجال: {{ $job['work_field']['name'] ?? '-' }}</p>
                    <a href="{{ route('jobs.show', $job['id']) }}" class="text-blue-600 hover:underline">
                        عرض التفاصيل
                    </a>

                </div>
            @empty
                <p class="text-center text-gray-500">لا توجد وظائف حالياً.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
