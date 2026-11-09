@extends('layouts.dashboard')

@section('title', __('Tender details'))

@section('content')
    @php
        $statusLabel = match ((int) $tender->status) { 1 => __('Open'), 2 => __('Closed'), default => __('Pending') };
        $statusClass = match ((int) $tender->status) { 1 => 'bg-emerald-50 text-emerald-800', 2 => 'bg-slate-100 text-slate-700', default => 'bg-amber-50 text-amber-800' };
    @endphp
    <div class="mx-auto max-w-4xl">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div><a href="{{ route('dashboard.tenders.index') }}" class="text-sm font-semibold text-teal-800 hover:text-teal-950">← {{ __('Back to tenders') }}</a><h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900">{{ __('Tender details') }}</h2></div>
            <a href="{{ route('dashboard.tenders.edit', $tender) }}" class="inline-flex items-center justify-center rounded-lg bg-teal-700 px-4 py-2.5 text-sm font-semibold text-white hover:bg-teal-800">{{ __('Edit tender') }}</a>
        </div>
        <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            <div class="flex flex-col gap-4 border-b border-slate-100 pb-6 sm:flex-row sm:items-start sm:justify-between"><div><p class="font-mono text-sm text-slate-500">{{ $tender->number_tenders }}</p><h1 class="mt-2 text-2xl font-bold text-slate-900">{{ app()->getLocale() === 'ar' ? $tender->name_ar : $tender->name }}</h1><p class="mt-2 text-sm text-slate-600">{{ app()->getLocale() === 'ar' ? $tender->name_buyer_ar : $tender->name_buyer }}</p></div><span class="w-fit rounded-full px-3 py-1 text-xs font-semibold {{ $statusClass }}">{{ $statusLabel }}</span></div>
            <div class="grid gap-6 py-6 sm:grid-cols-2">
                <section><h2 class="text-sm font-semibold text-slate-900">{{ __('Description (English)') }}</h2><p class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600">{{ $tender->description }}</p></section>
                <section dir="rtl"><h2 class="text-sm font-semibold text-slate-900">{{ __('Description (Arabic)') }}</h2><p class="mt-2 whitespace-pre-line text-sm leading-7 text-slate-600">{{ $tender->description_ar }}</p></section>
            </div>
            <div class="border-t border-slate-100 pt-5"><p class="text-sm text-slate-500">{{ __('Document reference') }}</p><p class="mt-1 break-all text-sm font-medium text-slate-800">{{ $tender->signature }}</p></div>
        </article>
    </div>
@endsection
