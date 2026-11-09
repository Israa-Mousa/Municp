@extends('layouts.dashboard')

@section('title', __('Tenders'))

@section('content')
    <div x-data="{ query: '' }">
        <div class="mb-6">
            <p class="text-sm font-medium text-teal-700">{{ __('Procurement notices') }}</p>
            <h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900">{{ __('Municipal tenders') }}</h2>
            <p class="mt-2 text-sm text-slate-600">{{ __('Review procurement notices and their current status.') }}</p>
        </div>
        <div class="mb-5 flex justify-end">
            <a href="{{ route('dashboard.tenders.create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-teal-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-800"><span class="text-lg leading-none" aria-hidden="true">+</span>{{ __('Add tender') }}</a>
        </div>
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="flex flex-col gap-3 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:px-6"><div><h3 class="font-semibold text-slate-900">{{ __('Tender register') }}</h3><p class="mt-1 text-sm text-slate-500">{{ $tenders->total() }} {{ __('notices') }}</p></div><label class="relative block w-full sm:max-w-xs"><span class="sr-only">{{ __('Search tenders') }}</span><span class="municipal-search-icon pointer-events-none absolute inset-y-0 flex items-center text-slate-400" aria-hidden="true">⌕</span><input type="search" x-model="query" placeholder="{{ __('Search tender number or title') }}" class="municipal-search-input w-full rounded-lg border border-slate-300 py-2 text-sm shadow-sm placeholder:text-slate-400 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100"></label></div>
            <div class="overflow-x-auto"><table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50 text-start text-xs font-semibold uppercase tracking-wider text-slate-500"><tr><th scope="col" class="px-6 py-3">{{ __('Tender') }}</th><th scope="col" class="px-6 py-3">{{ __('Reference') }}</th><th scope="col" class="px-6 py-3">{{ __('Issuing department') }}</th><th scope="col" class="px-6 py-3">{{ __('Status') }}</th><th scope="col" class="px-6 py-3 text-end">{{ __('Actions') }}</th></tr></thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($tenders as $tender)
                        @php
                            $tenderName = app()->getLocale() === 'ar' ? $tender->name_ar : $tender->name;
                            $statusLabel = match ((int) $tender->status) { 1 => __('Open'), 2 => __('Closed'), default => __('Pending') };
                            $statusClass = match ((int) $tender->status) { 1 => 'bg-emerald-50 text-emerald-800', 2 => 'bg-slate-100 text-slate-700', default => 'bg-amber-50 text-amber-800' };
                        @endphp
                        <tr data-search="{{ \Illuminate\Support\Str::lower($tender->name.' '.$tender->name_ar.' '.$tender->number_tenders.' '.$tender->name_buyer.' '.$tender->name_buyer_ar) }}" x-show="!query || $el.dataset.search.includes(query.trim().toLowerCase())" class="transition hover:bg-slate-50">
                            <td class="max-w-lg px-6 py-4"><div class="font-semibold text-slate-900">{{ $tenderName }}</div><p class="mt-1 line-clamp-2 text-slate-600">{{ app()->getLocale() === 'ar' ? $tender->description_ar : $tender->description }}</p></td>
                            <td class="whitespace-nowrap px-6 py-4 font-mono text-xs text-slate-600">{{ $tender->number_tenders }}</td>
                            <td class="whitespace-nowrap px-6 py-4 text-slate-600">{{ app()->getLocale() === 'ar' ? $tender->name_buyer_ar : $tender->name_buyer }}</td>
                            <td class="whitespace-nowrap px-6 py-4"><span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $statusClass }}">{{ $statusLabel }}</span></td>
                            <td class="whitespace-nowrap px-6 py-4 text-end"><div class="inline-flex items-center gap-2"><a href="{{ route('dashboard.tenders.show', $tender) }}" class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-100">{{ __('View') }}</a><a href="{{ route('dashboard.tenders.edit', $tender) }}" class="rounded-lg border border-teal-200 px-3 py-1.5 text-xs font-semibold text-teal-800 hover:bg-teal-50">{{ __('Edit') }}</a><form action="{{ route('dashboard.tenders.destroy', $tender) }}" method="POST" onsubmit="return confirm('{{ __('Delete this tender?') }}')">@csrf @method('DELETE')<button type="submit" class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-50">{{ __('Delete') }}</button></form></div></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-12 text-center text-slate-500">{{ __('No tenders are available.') }}</td></tr>
                    @endforelse
                    <tr x-cloak x-show="query && !Array.from($el.parentElement.querySelectorAll('tr[data-search]')).some(row => row.dataset.search.includes(query.trim().toLowerCase()))"><td colspan="5" class="px-6 py-8 text-center text-slate-500">{{ __('No tenders match your search.') }}</td></tr>
                </tbody>
            </table></div>
            @if ($tenders->hasPages())
                <div class="border-t border-slate-200 px-4 py-4 sm:px-6">{{ $tenders->links() }}</div>
            @endif
        </section>
    </div>
@endsection
