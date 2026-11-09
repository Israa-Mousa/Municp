<x-app-layout title="{{ app()->getLocale() === 'ar' ? $blog->name_ar : $blog->name }}">
    @php $isArabic = app()->getLocale() === 'ar'; @endphp
    <main class="bg-slate-50 px-5 py-12 sm:px-8 sm:py-16">
        <article class="mx-auto max-w-4xl overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            @php
                $blogImage = collect([$blog->image, $blog->blogs_banner])
                    ->first(fn ($path) => $path && \Illuminate\Support\Facades\Storage::disk('public')->exists($path));
            @endphp
            @if ($blogImage)
                <img src="{{ asset('storage/'.$blogImage) }}" alt="{{ app()->getLocale() === 'ar' ? $blog->name_ar : $blog->name }}" class="h-64 w-full object-cover sm:h-96">
            @endif
            <div class="p-6 sm:p-10">
                <a href="{{ route('app') }}#news" class="text-sm font-semibold text-teal-800 hover:text-teal-950">← {{ __('Back to news') }}</a>
                <p class="mt-7 text-sm text-slate-500">{{ $blog->created_at?->format('M j, Y') }}</p>
                <h1 class="mt-3 text-3xl font-bold leading-tight tracking-tight text-slate-900 sm:text-4xl">{{ $isArabic ? $blog->name_ar : $blog->name }}</h1>
                <p class="municipal-inline-start mt-5 text-lg leading-8 text-slate-700">{{ $isArabic ? $blog->introduction_ar : $blog->introduction }}</p>
                <div class="prose prose-slate mt-8 max-w-none whitespace-pre-line leading-8 text-slate-700">{{ $isArabic ? $blog->description_ar : $blog->description }}</div>
            </div>
        </article>
    </main>
</x-app-layout>
