@extends('layouts.dashboard')

@section('title', __('Citizen services'))

@section('content')
    <div x-data="{ query: '' }">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-medium text-teal-700">{{ __('Public information') }}</p>
                <h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900">{{ __('Citizen services') }}</h2>
                <p class="mt-2 text-sm text-slate-600">{{ __('Manage service categories and information for residents.') }}</p>
            </div>
            <a href="{{ route('dashboard.services.create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-teal-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">
                <span class="text-lg leading-none" aria-hidden="true">+</span>{{ __('Add service') }}
            </a>
        </div>

        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="flex flex-col gap-3 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div>
                    <h3 class="font-semibold text-slate-900">{{ __('Service directory') }}</h3>
                    <p class="mt-1 text-sm text-slate-500">{{ trans_choice(':count service|:count services', $services->total(), ['count' => $services->total()]) }}</p>
                </div>
                <label class="relative block w-full sm:max-w-xs">
                    <span class="sr-only">{{ __('Search services') }}</span>
                    <span class="municipal-search-icon pointer-events-none absolute inset-y-0 flex items-center text-slate-400" aria-hidden="true">⌕</span>
                    <input type="search" x-model="query" placeholder="{{ __('Search by name or description') }}" class="municipal-search-input w-full rounded-lg border border-slate-300 py-2 text-sm shadow-sm placeholder:text-slate-400 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">
                </label>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50 text-start text-xs font-semibold uppercase tracking-wider text-slate-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">{{ __('Service') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Description') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Type') }}</th>
                            <th scope="col" class="px-6 py-3 text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($services as $service)
                            @php
                                $serviceName = app()->getLocale() === 'ar' ? $service->name_ar : $service->name;
                                $serviceDescription = app()->getLocale() === 'ar' ? $service->description_ar : $service->description;
                            @endphp
                            <tr data-search="{{ \Illuminate\Support\Str::lower($service->name.' '.$service->name_ar.' '.$service->description.' '.$service->description_ar) }}" x-show="!query || $el.dataset.search.includes(query.trim().toLowerCase())" class="transition hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4"><div class="flex items-center gap-3">@if ($service->icon && \Illuminate\Support\Facades\Storage::disk('public')->exists($service->icon))<img src="{{ asset('storage/'.$service->icon) }}" alt="" class="h-10 w-12 rounded-lg object-cover">@else<div class="h-10 w-12 rounded-lg bg-teal-50" aria-hidden="true"></div>@endif<span class="font-semibold text-slate-900">{{ $serviceName }}</span></div></td>
                                <td class="max-w-md px-6 py-4 text-slate-600"><p class="line-clamp-2">{{ $serviceDescription }}</p></td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <span class="rounded-full px-2.5 py-1 text-xs font-semibold {{ $service->parentID ? 'bg-slate-100 text-slate-700' : 'bg-teal-50 text-teal-800' }}">{{ $service->parentID ? __('Subservice') : __('Main service') }}</span>
                                </td>
                                <td class="whitespace-nowrap px-6 py-4 text-end">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('app') }}#services" class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-100">{{ __('View') }}</a>
                                        <a href="{{ route('dashboard.services.edit', $service->id) }}" class="rounded-lg border border-teal-200 px-3 py-1.5 text-xs font-semibold text-teal-800 hover:bg-teal-50">{{ __('Edit') }}</a>
                                        <form action="{{ route('dashboard.services.delete', $service->id) }}" method="POST" onsubmit="return confirm('{{ __('Delete this service?') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-50">{{ __('Delete') }}</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-6 py-12 text-center text-slate-500">{{ __('No services have been added yet.') }}</td></tr>
                        @endforelse
                        <tr x-cloak x-show="query && !Array.from($el.parentElement.querySelectorAll('tr[data-search]')).some(row => row.dataset.search.includes(query.trim().toLowerCase()))"><td colspan="4" class="px-6 py-8 text-center text-slate-500">{{ __('No services match your search.') }}</td></tr>
                    </tbody>
                </table>
            </div>
            @if ($services->hasPages())
                <div class="border-t border-slate-200 px-4 py-4 sm:px-6">{{ $services->links() }}</div>
            @endif
        </section>
    </div>
@endsection
