@props(['label', 'count', 'icon', 'route'])

<article class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
    <div class="flex items-start justify-between gap-3">
        <div>
            <p class="text-sm font-medium text-slate-600">{{ $label }}</p>
            <p class="mt-3 text-3xl font-bold tracking-tight text-slate-900">{{ number_format($count) }}</p>
        </div>
        <span class="flex h-11 w-11 items-center justify-center rounded-xl bg-teal-50 text-lg font-semibold text-teal-700" aria-hidden="true">{{ $icon }}</span>
    </div>
    <a href="{{ route($route) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-teal-700 transition hover:text-teal-900">
        {{ __('Manage') }} <span aria-hidden="true">{{ app()->getLocale() === 'ar' ? '←' : '→' }}</span>
    </a>
</article>
