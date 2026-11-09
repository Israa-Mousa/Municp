@extends('layouts.dashboard')

@section('title', __('Dashboard'))

@section('content')
    <div class="mb-8 flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
        <div>
            <p class="text-sm font-semibold text-teal-700">{{ __('Municipal services at a glance') }}</p>
            <h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">{{ __('Welcome to your dashboard') }}</h2>
            <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-600">{{ __('Manage public information, community updates, and opportunities from one place.') }}</p>
        </div>
        <p class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm text-slate-600">{{ now()->translatedFormat('l, d F Y') }}</p>
    </div>

    <section aria-label="{{ __('Content overview') }}" class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
        @foreach ($metrics as $metric)
            <x-dashboard.stat-card :label="$metric['label']" :count="$metric['count']" :icon="$metric['icon']" :route="$metric['route']" />
        @endforeach
    </section>

    <section class="mt-8 grid gap-6 lg:grid-cols-[minmax(0,1.5fr)_minmax(18rem,1fr)]">
        <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between gap-4">
                <div>
                    <h3 class="text-lg font-semibold text-slate-900">{{ __('Quick actions') }}</h3>
                    <p class="mt-1 text-sm text-slate-500">{{ __('Common content management tasks') }}</p>
                </div>
            </div>
            <div class="mt-5 grid gap-3 sm:grid-cols-2">
                <a href="{{ route('dashboard.services.create') }}" class="rounded-xl border border-slate-200 p-4 transition hover:border-teal-300 hover:bg-teal-50/50">
                    <span class="font-semibold text-slate-900">{{ __('Add a service') }}</span>
                    <span class="mt-1 block text-sm text-slate-500">{{ __('Publish information about a citizen service.') }}</span>
                </a>
                <a href="{{ route('dashboard.projects.create') }}" class="rounded-xl border border-slate-200 p-4 transition hover:border-teal-300 hover:bg-teal-50/50">
                    <span class="font-semibold text-slate-900">{{ __('Add a project') }}</span>
                    <span class="mt-1 block text-sm text-slate-500">{{ __('Share municipal work and progress.') }}</span>
                </a>
                <a href="{{ route('dashboard.blogs.create') }}" class="rounded-xl border border-slate-200 p-4 transition hover:border-teal-300 hover:bg-teal-50/50">
                    <span class="font-semibold text-slate-900">{{ __('Publish an update') }}</span>
                    <span class="mt-1 block text-sm text-slate-500">{{ __('Keep residents informed with news.') }}</span>
                </a>
                <a href="{{ route('dashboard.careers.create') }}" class="rounded-xl border border-slate-200 p-4 transition hover:border-teal-300 hover:bg-teal-50/50">
                    <span class="font-semibold text-slate-900">{{ __('Post an opportunity') }}</span>
                    <span class="mt-1 block text-sm text-slate-500">{{ __('Share a municipal job opening.') }}</span>
                </a>
                <a href="{{ route('dashboard.tenders.create') }}" class="rounded-xl border border-slate-200 p-4 transition hover:border-teal-300 hover:bg-teal-50/50">
                    <span class="font-semibold text-slate-900">{{ __('Publish a tender') }}</span>
                    <span class="mt-1 block text-sm text-slate-500">{{ __('Share a municipal procurement notice.') }}</span>
                </a>
            </div>
        </div>

        <aside class="rounded-2xl bg-slate-900 p-6 text-white shadow-sm">
            <span class="text-xs font-semibold uppercase tracking-wider text-teal-300">{{ __('Public service') }}</span>
            <h3 class="mt-3 text-xl font-semibold">{{ __('Clear information builds public trust.') }}</h3>
            <p class="mt-3 text-sm leading-6 text-slate-300">{{ __('Keep content accurate, accessible, and available in both Arabic and English.') }}</p>
            <a href="{{ route('app') }}" class="mt-6 inline-flex items-center gap-2 rounded-lg bg-white px-4 py-2.5 text-sm font-semibold text-slate-900 transition hover:bg-teal-50">
                {{ __('Open public portal') }} <span aria-hidden="true">↗</span>
            </a>
        </aside>
    </section>
@endsection
