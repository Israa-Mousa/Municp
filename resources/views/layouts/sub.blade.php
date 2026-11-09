<section class="border-y border-emerald-700 bg-gradient-to-r from-emerald-900 via-emerald-800 to-teal-900 text-white" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    <div class="mx-auto flex max-w-7xl flex-col gap-5 px-5 py-8 sm:px-8 md:flex-row md:items-center md:justify-between">
        <div>
            <p class="text-sm font-semibold text-emerald-200">{{ __('Contact the municipality') }}</p>
            <h2 class="mt-1 text-xl font-bold">{{ __('Questions or feedback?') }}</h2>
        </div>
        <a href="{{ route('app.contact') }}" class="inline-flex w-fit items-center justify-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-emerald-900 transition hover:bg-emerald-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white">
            {{ __('Contact us') }} <span aria-hidden="true">{{ app()->getLocale() === 'ar' ? '←' : '→' }}</span>
        </a>
    </div>
</section>
