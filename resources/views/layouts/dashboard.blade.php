<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('image/logo2.png') }}" rel="icon">
    <title>@yield('title', __('Dashboard')) · {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="municipal-admin min-h-screen bg-slate-50 text-slate-800 antialiased">
<div x-data="{ sidebarOpen: false }" class="min-h-screen lg:flex">
    <div x-cloak x-show="sidebarOpen" class="fixed inset-0 z-30 bg-slate-900/70 lg:hidden" @click="sidebarOpen = false"></div>

    <aside
        class="fixed inset-y-0 z-40 flex w-72 flex-col bg-slate-900 text-slate-200 transition-transform duration-200 lg:sticky lg:top-0 lg:h-screen lg:translate-x-0 {{ app()->getLocale() === 'ar' ? 'right-0' : 'left-0' }}"
        :class="sidebarOpen ? 'translate-x-0' : '{{ app()->getLocale() === 'ar' ? 'translate-x-full' : '-translate-x-full' }}'"
        aria-label="{{ __('Admin navigation') }}"
    >
        <div class="flex h-20 items-center gap-2 border-b border-white/10 px-4">
            <span class="flex h-12 w-28 shrink-0 items-center justify-center">
                <img src="{{ asset('image/logo2.png') }}" alt="{{ __('Ramallah Municipality') }}" class="h-10 w-auto max-w-full object-contain sm:h-12">
            </span>
            <div class="flex min-h-screen min-w-0 flex-1 flex-col">
                <p class="font-semibold tracking-wide text-white">{{ __('Municipal Portal') }}</p>
                <p class="mt-0.5 text-xs text-slate-400">{{ __('Administration') }}</p>
            </div>
            <button type="button" class="sidebar-close rounded-lg p-2 text-slate-400 hover:bg-white/10 lg:hidden" @click="sidebarOpen = false" aria-label="{{ __('Close navigation') }}">✕</button>
        </div>

        <div class="border-b border-white/10 px-6 py-5">
            <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">{{ __('Signed in as') }}</p>
            @auth
                <p class="mt-2 truncate font-medium text-white">{{ Auth::user()->name }}</p>
                <p class="truncate text-sm text-slate-400">{{ Auth::user()->email }}</p>
            @endauth
        </div>

        <nav class="flex-1 space-y-1 overflow-y-auto px-3 py-5" aria-label="{{ __('Main navigation') }}">
            <p class="px-3 pb-2 text-xs font-semibold uppercase tracking-wider text-slate-500">{{ __('Workspace') }}</p>
            @foreach (config('nav', []) as $key => $item)
                @php
                    $isDashboard = $item['title'] === 'Dashboard' && request()->is('dashboard');
                    $isActive = $isDashboard || Route::is($item['route.active']);
                @endphp
                <a
                    href="{{ is_callable($item['route']) ? $item['route']() : url($item['route']) }}"
                    @click="sidebarOpen = false"
                    @if ($isActive) aria-current="page" @endif
                    class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm font-medium transition {{ $isActive ? 'bg-emerald-700 text-white shadow-sm' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}"
                >
                    <span class="w-5 text-center {{ $isActive ? 'text-emerald-100' : 'text-slate-400' }}" aria-hidden="true">{{ $loop->first ? '⌂' : '•' }}</span>
                    <span>{{ trans($item['title']) }}</span>
                </a>
            @endforeach
        </nav>

        <div class="space-y-1 border-t border-white/10 p-3">
            <a href="{{ route('app') }}" class="flex items-center gap-3 rounded-xl px-3 py-2.5 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
                <span aria-hidden="true">↗</span>{{ __('View public portal') }}
            </a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex w-full items-center gap-3 rounded-xl px-3 py-2.5 text-start text-sm text-slate-300 hover:bg-slate-800 hover:text-white">
                        <span aria-hidden="true">⇥</span>{{ __('Log out') }}
                    </button>
                </form>
            @endauth
        </div>
    </aside>

    <div class="flex min-h-screen min-w-0 flex-1 flex-col">
        <header class="sticky top-0 z-20 border-b border-slate-200 bg-white/95 backdrop-blur">
            <div class="flex h-16 items-center justify-between gap-4 px-4 sm:px-8">
                <div class="flex min-w-0 items-center gap-3">
                    <button type="button" class="rounded-lg border border-slate-200 p-2 text-slate-600 hover:bg-slate-50 lg:hidden" @click="sidebarOpen = true" aria-label="{{ __('Open navigation') }}">☰</button>
                    <div class="min-w-0">
                        <p class="truncate text-xs font-medium uppercase tracking-wider text-slate-500">{{ __('Municipal administration') }}</p>
                        <h1 class="truncate text-lg font-semibold text-slate-900">@yield('title', __('Dashboard'))</h1>
                    </div>
                </div>
                <a href="{{ route('app') }}" class="hidden rounded-lg border border-slate-200 px-3 py-2 text-sm font-medium text-slate-700 transition hover:border-teal-600 hover:text-teal-700 sm:inline-flex">
                    {{ __('Public portal') }} <span aria-hidden="true">↗</span>
                </a>
            </div>
        </header>

        <main class="mx-auto w-full max-w-screen-2xl flex-1 px-4 py-6 sm:px-8 sm:py-8">
            @if (session('success'))
                <div role="status" class="mb-6 flex items-start gap-3 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">
                    <span class="font-bold" aria-hidden="true">✓</span><p>{{ session('success') }}</p>
                </div>
            @endif
            @if ($errors->any())
                <div role="alert" class="mb-6 rounded-xl border border-rose-200 bg-rose-50 px-4 py-4 text-sm text-rose-800">
                    <p class="font-semibold">{{ __('Please review the highlighted fields.') }}</p>
                    <ul class="mt-2 list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>

        <footer class="mt-auto border-t border-slate-200 bg-white px-4 py-5 text-center text-xs text-slate-500 sm:px-8">
            © {{ now()->year }} {{ config('app.name') }} · {{ __('Municipal administration portal') }}
        </footer>
    </div>
</div>
@stack('scripts')
</body>
</html>
