<footer class="municipal-footer bg-gradient-to-br from-emerald-900 via-emerald-800 to-teal-900 text-slate-100" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <div class="mx-auto max-w-7xl px-5 py-12 sm:px-8 lg:py-14">
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1fr]">
            <section>
                <a href="{{ route('app') }}" class="inline-flex rounded-xl focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-emerald-300">
                    <img src="{{ asset('image/logo2.png') }}" alt="{{ __('Ramallah Municipality') }}" class="municipal-brand__logo h-10 w-auto max-w-[7rem] object-contain sm:h-12 sm:max-w-[8.25rem]">
                </a>
                <h2 class="mt-5 text-sm font-semibold text-white">{{ __('app.ADDRESS OFFICE') }}</h2>
                <p class="mt-2 text-sm leading-6 text-slate-300">{{ __('app.location') }}</p>
                <a href="mailto:info@ramallah.ps" class="mt-2 inline-block text-sm text-slate-200 transition hover:text-emerald-200">info@ramallah.ps</a>
                <p class="mt-1 text-sm text-slate-200" dir="ltr">+970 2 296 0200</p>
            </section>

            <nav aria-label="{{ __('Municipal opportunities') }}">
                <h2 class="text-sm font-semibold text-white">{{ __('app.tenders') }}</h2>
                <ul class="mt-4 space-y-3 text-sm text-slate-200">
                    @forelse ($tenders as $tender)
                        <li>{{ app()->getLocale() === 'ar' ? $tender->name_ar : $tender->name }}</li>
                    @empty
                        <li class="text-slate-300">{{ __('No current notices') }}</li>
                    @endforelse
                </ul>
            </nav>

            <nav aria-label="{{ __('Municipal services') }}">
                <h2 class="text-sm font-semibold text-white">{{ __('Our services') }}</h2>
                <ul class="mt-4 space-y-3 text-sm text-slate-200">
                    @foreach ($services->take(5) as $service)
                        <li><a href="{{ route('app') }}#services" class="transition hover:text-emerald-200">{{ app()->getLocale() === 'ar' ? $service->name_ar : $service->name }}</a></li>
                    @endforeach
                </ul>
            </nav>

            <nav aria-label="{{ __('Explore Ramallah') }}">
                <h2 class="text-sm font-semibold text-white">{{ __('Explore') }}</h2>
                <ul class="mt-4 space-y-3 text-sm text-slate-200">
                    <li><a href="{{ route('app') }}#projects" class="transition hover:text-emerald-200">{{ __('City projects') }}</a></li>
                    <li><a href="{{ route('app') }}#tourism" class="transition hover:text-emerald-200">{{ __('Tourism and heritage') }}</a></li>
                    <li><a href="{{ route('app') }}#news" class="transition hover:text-emerald-200">{{ __('Latest news') }}</a></li>
                    <li><a href="{{ route('app.contact') }}" class="transition hover:text-emerald-200">{{ __('Contact us') }}</a></li>
                    @foreach ($careers->take(2) as $career)
                        <li><a href="{{ route('app.careers', $career->id) }}" class="transition hover:text-emerald-200">{{ app()->getLocale() === 'ar' ? $career->job_title_ar : $career->job_title }}</a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
    <div class="border-t border-white/20 bg-emerald-900/80">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-4 text-xs text-slate-300 sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <p>© {{ now()->year }} {{ __('Ramallah Municipality app') }}. {{ __('All rights reserved') }}.</p>
            <p>{{ __('Official municipal information and services') }}</p>
            <p class="text-slate-200">Designed &amp; Developed by
                <a href="https://nexorawebsite-1s2w.onrender.com" target="_blank" rel="noopener noreferrer" class="font-semibold text-emerald-400 transition hover:text-emerald-300 hover:underline">Nexura</a>
            </p>
        </div>
    </div>
</footer>
