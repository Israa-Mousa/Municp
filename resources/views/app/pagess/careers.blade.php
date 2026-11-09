<x-app-layout :title="__('Career opportunity')">
    @php
        $isArabic = app()->getLocale() === 'ar';
        $jobTitle = $isArabic ? $career->job_title_ar : $career->job_title;
        $jobDescription = $isArabic ? $career->job_description_ar : $career->job_description;
        $jobSkills = $isArabic ? $career->job_skills_ar : $career->job_skills;
        $isOpen = (int) $career->status === 1;
    @endphp

    <main class="municipal-career bg-slate-50 text-slate-800" dir="{{ $isArabic ? 'rtl' : 'ltr' }}">
        <section class="border-b border-slate-200 bg-white">
            <div class="mx-auto max-w-7xl px-5 py-10 sm:px-8 sm:py-14 lg:py-16">
                <a href="{{ route('app') }}" class="inline-flex items-center gap-2 rounded-lg text-sm font-semibold text-emerald-800 transition hover:text-emerald-950 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-emerald-700">
                    <span aria-hidden="true">{{ $isArabic ? '→' : '←' }}</span>
                    {{ __('Back to home') }}
                </a>

                <div class="mt-8 grid items-center gap-8 lg:grid-cols-[minmax(0,1.1fr)_minmax(20rem,0.9fr)] lg:gap-14">
                    <div class="min-w-0">
                        <p class="inline-flex items-center gap-2 rounded-full bg-emerald-50 px-3 py-1.5 text-xs font-bold uppercase tracking-wider text-emerald-800">
                            <span class="h-2 w-2 rounded-full {{ $isOpen ? 'bg-emerald-500' : 'bg-slate-400' }}" aria-hidden="true"></span>
                            {{ __('Ramallah Municipality') }}
                        </p>
                        <p class="mt-6 text-sm font-semibold text-emerald-800">{{ __('Career opportunity') }}</p>
                        <h1 class="mt-2 break-words text-3xl font-bold leading-tight tracking-tight text-slate-950 sm:text-4xl lg:text-5xl">
                            {{ $jobTitle }}
                        </h1>
                        <span class="mt-6 inline-flex rounded-full px-3 py-1.5 text-sm font-semibold {{ $isOpen ? 'bg-emerald-100 text-emerald-900' : 'bg-slate-200 text-slate-700' }}">
                            {{ $isOpen ? __('Open') : __('Closed') }}
                        </span>
                    </div>

                    <figure class="relative overflow-hidden rounded-3xl border border-slate-200 bg-emerald-950 shadow-xl shadow-emerald-950/10">
                        <img
                            src="{{ asset('image/hire.png') }}"
                            alt="{{ __('Career opportunity') }}"
                            class="aspect-[4/3] h-full w-full object-cover"
                        >
                        <figcaption class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-slate-950/80 to-transparent px-5 pb-5 pt-14 text-sm font-semibold text-white sm:px-6 sm:pb-6">
                            {{ __('Ramallah Municipality') }}
                        </figcaption>
                    </figure>
                </div>
            </div>
        </section>

        <section class="mx-auto grid max-w-7xl gap-6 px-5 py-10 sm:px-8 sm:py-14 lg:grid-cols-[minmax(0,1fr)_20rem] lg:gap-8">
            <article class="min-w-0 rounded-2xl border border-slate-200 bg-white p-5 shadow-sm sm:p-8">
                <div>
                    <h2 class="text-xl font-bold text-slate-950">{{ __('Job description') }}</h2>
                    <p class="mt-4 whitespace-pre-line break-words text-sm leading-7 text-slate-600 sm:text-base">{{ $jobDescription }}</p>
                </div>

                @if (filled($jobSkills))
                    <div class="mt-8 border-t border-slate-200 pt-7">
                        <h2 class="text-xl font-bold text-slate-950">{{ __('Required skills') }}</h2>
                        <p class="mt-4 whitespace-pre-line break-words text-sm leading-7 text-slate-600 sm:text-base">{{ $jobSkills }}</p>
                    </div>
                @endif
            </article>

            <aside class="h-fit rounded-2xl bg-slate-900 p-6 text-white shadow-lg shadow-slate-900/10 sm:p-7">
                <p class="text-sm font-semibold text-emerald-300">{{ __('Apply by email') }}</p>
                <h2 class="mt-2 text-xl font-bold">{{ __('Career opportunity') }}</h2>
                <p class="mt-3 text-sm leading-6 text-slate-300">{{ __('Ramallah Municipality') }}</p>

                @if ($isOpen && filled($career->emai_careers))
                    <a
                        href="mailto:{{ $career->emai_careers }}"
                        dir="ltr"
                        class="mt-6 flex min-h-12 w-full items-center justify-center break-all rounded-xl bg-emerald-400 px-4 py-3 text-center text-sm font-bold text-slate-950 transition hover:bg-emerald-300 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
                    >
                        {{ $career->emai_careers }}
                    </a>
                @else
                    <p class="mt-6 rounded-xl border border-white/10 bg-white/5 px-4 py-3 text-sm text-slate-300">{{ __('Closed') }}</p>
                @endif
            </aside>
        </section>
    </main>
</x-app-layout>
