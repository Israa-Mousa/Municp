@extends('layouts.dashboard')

@section('title', __('Tourism and heritage'))

@section('content')
    <div x-data="{ query: '' }">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-medium text-teal-700">{{ __('Discover the city') }}</p>
                <h2 class="mt-1 text-2xl font-bold tracking-tight text-slate-900">{{ __('Tourism and heritage') }}</h2>
                <p class="mt-2 text-sm text-slate-600">{{ __('Manage places, culture, and local history.') }}</p>
            </div>
            <a href="{{ route('dashboard.tourisms.create') }}" class="inline-flex items-center justify-center gap-2 rounded-lg bg-teal-700 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-800">
                <span class="text-lg leading-none" aria-hidden="true">+</span>{{ __('Add tourism location') }}
            </a>
        </div>

        <section class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="flex flex-col gap-3 border-b border-slate-200 p-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <div>
                    <h3 class="font-semibold text-slate-900">{{ __('Tourism directory') }}</h3>
                    <p class="mt-1 text-sm text-slate-500">{{ $tourisms->total() }} {{ __('locations') }}</p>
                </div>
                <label class="relative block w-full sm:max-w-xs">
                    <span class="sr-only">{{ __('Search tourism locations') }}</span>
                    <span class="municipal-search-icon pointer-events-none absolute inset-y-0 flex items-center text-slate-400" aria-hidden="true">⌕</span>
                    <input type="search" x-model="query" placeholder="{{ __('Search tourism locations') }}" class="municipal-search-input w-full rounded-lg border border-slate-300 py-2 text-sm shadow-sm placeholder:text-slate-400 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">
                </label>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200 text-sm">
                    <thead class="bg-slate-50 text-start text-xs font-semibold uppercase tracking-wider text-slate-500">
                        <tr>
                            <th scope="col" class="px-6 py-3">{{ __('Location') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Description') }}</th>
                            <th scope="col" class="px-6 py-3">{{ __('Address') }}</th>
                            <th scope="col" class="px-6 py-3 text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse ($tourisms as $tourism)
                            @php
                                $tourismName = app()->getLocale() === 'ar' ? $tourism->name_ar : $tourism->name;
                                $tourismDescription = app()->getLocale() === 'ar' ? $tourism->description_ar : $tourism->description;
                                $tourismLocation = app()->getLocale() === 'ar' ? $tourism->location_ar : $tourism->location;
                                $imagePath = $tourism->images->first()?->file_name;
                            @endphp
                            <tr data-search="{{ \Illuminate\Support\Str::lower($tourism->name.' '.$tourism->name_ar.' '.$tourism->location.' '.$tourism->location_ar.' '.$tourism->description.' '.$tourism->description_ar) }}" x-show="!query || $el.dataset.search.includes(query.trim().toLowerCase())" class="transition hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if ($imagePath && \Illuminate\Support\Facades\Storage::disk('public')->exists($imagePath))
                                            <img src="{{ asset('storage/'.$imagePath) }}" alt="" class="h-10 w-12 rounded-lg object-cover">
                                        @else
                                            <div class="h-10 w-12 rounded-lg bg-teal-50" aria-hidden="true"></div>
                                        @endif
                                        <span class="font-semibold text-slate-900">{{ $tourismName }}</span>
                                    </div>
                                </td>
                                <td class="max-w-md px-6 py-4 text-slate-600"><p class="line-clamp-2">{{ $tourismDescription }}</p></td>
                                <td class="whitespace-nowrap px-6 py-4 text-slate-600">{{ $tourismLocation }}</td>
                                <td class="whitespace-nowrap px-6 py-4 text-end">
                                    <div class="inline-flex items-center gap-2">
                                        <a href="{{ route('app') }}#tourism" class="rounded-lg border border-slate-200 px-3 py-1.5 text-xs font-semibold text-slate-700 hover:bg-slate-100">{{ __('View') }}</a>
                                        <a href="{{ route('dashboard.tourisms.edit', $tourism->id) }}" class="rounded-lg border border-teal-200 px-3 py-1.5 text-xs font-semibold text-teal-800 hover:bg-teal-50">{{ __('Edit') }}</a>
                                        <form action="{{ route('dashboard.tourisms.delete', $tourism->id) }}" method="POST" onsubmit="return confirm('{{ __('Delete this tourism location?') }}')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg border border-rose-200 px-3 py-1.5 text-xs font-semibold text-rose-700 hover:bg-rose-50">{{ __('Delete') }}</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="px-6 py-12 text-center text-slate-500">{{ __('Tourism information will be available soon.') }}</td></tr>
                        @endforelse
                        <tr x-cloak x-show="query && !Array.from($el.parentElement.querySelectorAll('tr[data-search]')).some(row => row.dataset.search.includes(query.trim().toLowerCase()))">
                            <td colspan="4" class="px-6 py-8 text-center text-slate-500">{{ __('No tourism locations match your search.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @if ($tourisms->hasPages())
                <div class="border-t border-slate-200 px-4 py-4 sm:px-6">{{ $tourisms->links() }}</div>
            @endif
        </section>
    </div>
@endsection
