@extends('layouts.dashboard')

@section('title', __('Careers'))

@section('content')
    <div x-data="{ query: '' }">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div><p class="text-sm font-medium text-teal-700">{{ __('Work with us') }}</p><h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900">{{ __('Career opportunities') }}</h2><p class="mt-2 text-sm text-slate-600">{{ __('Manage open municipal roles and application details.') }}</p></div>
            <a href="{{ route('dashboard.careers.create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-teal-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-800"><span class="text-lg leading-none" aria-hidden="true">+</span>{{ __('Add opportunity') }}</a>
        </div>
        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="flex flex-col gap-3 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:px-6"><div><h3 class="font-semibold text-slate-900">{{ __('Job listings') }}</h3><p class="mt-1 text-sm text-slate-500">{{ $careers->total() }} {{ __('opportunities') }}</p></div><label class="relative block w-full sm:max-w-xs"><span class="sr-only">{{ __('Search jobs') }}</span><span class="municipal-search-icon pointer-events-none absolute inset-y-0 flex items-center text-slate-400" aria-hidden="true">⌕</span><input type="search" x-model="query" placeholder="{{ __('Search job title or email') }}" class="municipal-search-input w-full rounded-lg border border-slate-300 py-2 text-sm shadow-sm placeholder:text-slate-400 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100"></label></div>
            <div class="overflow-x-auto"><table class="min-w-full divide-y divide-slate-200 text-sm">
                <thead class="bg-slate-50 text-start text-xs font-semibold uppercase tracking-wider text-slate-500"><tr><th scope="col" class="px-6 py-3">{{ __('Position') }}</th><th scope="col" class="px-6 py-3">{{ __('Applications') }}</th><th scope="col" class="px-6 py-3">{{ __('Status') }}</th><th scope="col" class="px-6 py-3">{{ __('Created') }}</th><th scope="col" class="px-6 py-3 text-end">{{ __('Actions') }}</th></tr></thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($careers as $career)
                        @php $jobTitle = app()->getLocale() === 'ar' ? $career->job_title_ar : $career->job_title; @endphp
                        <tr data-search="{{ \Illuminate\Support\Str::lower($career->job_title.' '.$career->job_title_ar.' '.$career->emai_careers) }}" x-show="!query || $el.dataset.search.includes(query.trim().toLowerCase())" class="transition hover:bg-slate-50">
                            <td class="whitespace-nowrap px-6 py-4 font-semibold text-slate-900">{{ $jobTitle }}</td><td class="whitespace-nowrap px-6 py-4"><a href="mailto:{{ $career->emai_careers }}" class="text-teal-800 hover:underline">{{ $career->emai_careers }}</a></td><td class="whitespace-nowrap px-6 py-4"><span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ (int) $career->status === 1 ? 'bg-emerald-50 text-emerald-800' : 'bg-slate-100 text-slate-700' }}">{{ (int) $career->status === 1 ? __('Open') : __('Closed') }}</span></td><td class="whitespace-nowrap px-6 py-4 text-slate-600">{{ $career->created_at?->format('M j, Y') }}</td><td class="whitespace-nowrap px-6 py-4 text-end"><div class="inline-flex items-center gap-2"><a href="{{ route('app.careers', $career->id) }}" class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-100">{{ __('View') }}</a><a href="{{ route('dashboard.careers.edit', $career->id) }}" class="rounded-lg border border-teal-200 px-3 py-1.5 text-xs font-semibold text-teal-800 hover:bg-teal-50">{{ __('Edit') }}</a><form action="{{ route('dashboard.careers.delete', $career->id) }}" method="POST" onsubmit="return confirm('{{ __('Delete this opportunity?') }}')">@csrf @method('DELETE')<button type="submit" class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-50">{{ __('Delete') }}</button></form></div></td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-6 py-12 text-center text-slate-500">{{ __('No opportunities have been posted yet.') }}</td></tr>
                    @endforelse
                    <tr x-cloak x-show="query && !Array.from($el.parentElement.querySelectorAll('tr[data-search]')).some(row => row.dataset.search.includes(query.trim().toLowerCase()))"><td colspan="5" class="px-6 py-8 text-center text-slate-500">{{ __('No opportunities match your search.') }}</td></tr>
                </tbody>
            </table></div>
            @if ($careers->hasPages())
                <div class="border-t border-slate-200 px-4 py-4 sm:px-6">{{ $careers->links() }}</div>
            @endif
        </section>
    </div>
@endsection
