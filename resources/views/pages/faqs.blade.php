<x-app-layout>
    <div class="py-10 max-w-4xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center text-blue-800">الأسئلة الشائعة</h1>

        <div class="space-y-6">
            @forelse ($faqs as $faq)
                <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800 mb-2">❓ {{ $faq['question'] }}</h2>
                    <p class="text-gray-600 leading-relaxed">💬 {{ $faq['answer'] }}</p>
                </div>
            @empty
                <p class="text-center text-gray-500">لا توجد أسئلة شائعة حالياً.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
