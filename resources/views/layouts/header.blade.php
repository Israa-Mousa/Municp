<header
    x-data="{ menuOpen: false }"
    class="municipal-header sticky top-0 z-50 border-b border-slate-800 bg-slate-900/95 text-white shadow-lg shadow-slate-900/10 backdrop-blur-md"
    dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
>
    <nav aria-label="{{ __('Main navigation') }}" class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex min-h-[4.75rem] items-center justify-between gap-2 sm:gap-4">
            <a href="{{ route('app') }}" class="municipal-brand flex min-w-0 shrink-0 items-center gap-2 rounded-xl focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-emerald-300 sm:gap-3" aria-label="{{ __('Ramallah Municipality home') }}">
                <img src="{{ asset('image/logo2.png') }}" alt="{{ __('Ramallah Municipality') }}" class="municipal-brand__logo h-10 w-auto max-w-[7rem] object-contain sm:h-12 sm:max-w-[8.25rem]">
                <span class="municipal-brand-copy min-w-0">
                    <span class="block truncate text-sm font-bold tracking-tight text-white sm:text-base">{{ __('Ramallah Municipality') }}</span>
                    <span class="mt-0.5 hidden text-[11px] font-medium text-slate-300 sm:block">{{ __('Official municipal portal') }}</span>
                </span>
            </a>

            <div class="municipal-desktop-links min-w-0 flex-1 items-center justify-center gap-1">
                <a href="{{ route('app') }}" class="whitespace-nowrap rounded-lg px-2.5 py-2 text-sm font-semibold text-slate-200 transition duration-200 hover:bg-white/10 hover:text-white 2xl:px-3">{{ __('app.Home') }}</a>
                <a href="{{ route('app') }}" class="whitespace-nowrap rounded-lg px-2.5 py-2 text-sm font-semibold text-slate-200 transition duration-200 hover:bg-white/10 hover:text-white 2xl:px-3">{{ __('Municipality') }}</a>
                <a href="{{ route('app') }}#services" class="whitespace-nowrap rounded-lg px-2.5 py-2 text-sm font-semibold text-slate-200 transition duration-200 hover:bg-white/10 hover:text-white 2xl:px-3">{{ __('Services') }}</a>
                <a href="{{ route('map') }}" class="whitespace-nowrap rounded-lg px-2.5 py-2 text-sm font-semibold text-slate-200 transition duration-200 hover:bg-white/10 hover:text-white 2xl:px-3">{{ __('City map') }}</a>
                <a href="{{ route('app') }}#news" class="whitespace-nowrap rounded-lg px-2.5 py-2 text-sm font-semibold text-slate-200 transition duration-200 hover:bg-white/10 hover:text-white 2xl:px-3">{{ __('Latest news') }}</a>
                <a href="{{ route('app.contact') }}" class="whitespace-nowrap rounded-lg px-2.5 py-2 text-sm font-semibold text-slate-200 transition duration-200 hover:bg-white/10 hover:text-white 2xl:px-3">{{ __('Contact us') }}</a>
            </div>

            <div class="municipal-header__actions flex shrink-0 items-center gap-1.5 sm:gap-2">
                <a
                    href="{{ url(app()->getLocale() === 'ar' ? '/en' : '/ar') }}"
                    lang="{{ app()->getLocale() === 'ar' ? 'en' : 'ar' }}"
                    aria-label="{{ app()->getLocale() === 'ar' ? 'Switch language to English' : 'Switch language to Arabic' }}"
                    class="grid h-9 min-w-9 place-items-center rounded-lg px-2 text-xs font-bold tracking-wider text-slate-200 transition-all duration-200 hover:bg-white/10 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-300"
                >{{ app()->getLocale() === 'ar' ? 'EN' : 'AR' }}</a>
                <a href="{{ route('login') }}" class="municipal-login-link inline-flex min-h-9 items-center justify-center whitespace-nowrap rounded-lg px-3 py-2 text-sm font-semibold text-slate-200 transition-all duration-200 hover:bg-white/10 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-300">{{ __('Log in') }}</a>
                <button type="button" class="municipal-mobile-toggle grid h-10 w-10 shrink-0 place-items-center rounded-lg border border-white/20 text-slate-100 transition hover:border-white/30 hover:bg-white/10 xl:hidden" @click="menuOpen = !menuOpen" :aria-expanded="menuOpen.toString()" aria-controls="mobile-primary-navigation" aria-label="{{ __('Toggle navigation') }}">
                    <span class="text-xl" x-text="menuOpen ? '×' : '☰'" aria-hidden="true"></span>
                </button>
            </div>
        </div>

        <div id="mobile-primary-navigation" x-cloak x-show="menuOpen" class="municipal-mobile-navigation border-t border-white/10 py-3 xl:hidden">
            <div class="grid gap-1 sm:grid-cols-2">
                <a @click="menuOpen = false" href="{{ route('app') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-200 transition hover:bg-white/10 hover:text-white">{{ __('app.Home') }}</a>
                <a @click="menuOpen = false" href="{{ route('app') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-200 transition hover:bg-white/10 hover:text-white">{{ __('Municipality') }}</a>
                <a @click="menuOpen = false" href="{{ route('app') }}#services" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-200 transition hover:bg-white/10 hover:text-white">{{ __('Services') }}</a>
                <a @click="menuOpen = false" href="{{ route('map') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-200 transition hover:bg-white/10 hover:text-white">{{ __('City map') }}</a>
                <a @click="menuOpen = false" href="{{ route('app') }}#news" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-200 transition hover:bg-white/10 hover:text-white">{{ __('Latest news') }}</a>
                <a @click="menuOpen = false" href="{{ route('app.contact') }}" class="rounded-lg px-3 py-2.5 text-sm font-semibold text-slate-200 transition hover:bg-white/10 hover:text-white">{{ __('Contact us') }}</a>
            </div>
        </div>
    </nav>
</header>
