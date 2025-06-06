<x-app-layout>
    <div class="py-10 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center text-blue-800">الشروط والسياسات</h1>

        @if ($policy)
            <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200 leading-relaxed text-gray-700">
                {!! nl2br(e($policy['text'] ?? 'لم يتم العثور على المحتوى.')) !!}
            </div>
        @else
            <p class="text-center text-gray-500">لا توجد بيانات لعرضها حالياً.</p>
        @endif
    </div>
</x-app-layout>
