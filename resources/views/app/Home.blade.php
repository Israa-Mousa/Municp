<x-app-layout title="{{ __('Municipal services') }}">
    @php
        $isArabic = app()->getLocale() === 'ar';
        $heroTitle = $isArabic ? 'معاً لمدينة أفضل' : 'Working together for a better city';
        $heroDescription = $isArabic
            ? 'اكتشف الخدمات البلدية، وتابع مشاريع المدينة، وابقَ على اطلاع بآخر الأخبار.'
            : 'Find municipal services, follow city projects, and stay up to date with community news.';
    @endphp

    <div
        x-data="{ portalSearch: '' }"
        @portal-search.window="portalSearch = $event.detail.trim().toLocaleLowerCase(); $nextTick(() => { const match = Array.from(document.querySelectorAll('[data-portal-search]')).find(card => card.dataset.portalSearch.includes(portalSearch)); (match || document.getElementById('services')).scrollIntoView({ behavior: 'smooth' }) })"
        class="municipal-home bg-slate-50 text-slate-800"
        dir="{{ $isArabic ? 'rtl' : 'ltr' }}"
    >
        <section class="municipal-hero relative isolate overflow-hidden bg-slate-900">
            <img src="{{ asset('assets/App/images/access/side_view.jpg') }}" alt="" class="absolute inset-0 z-0 h-full w-full object-cover">
            <div aria-hidden="true" class="municipal-hero__overlay absolute inset-0 z-10 bg-gradient-to-r from-slate-950/80 via-slate-900/60 to-emerald-950/70"></div>
            <div class="relative z-20 mx-auto flex min-h-[560px] max-w-7xl items-center justify-center px-5 py-20 text-center sm:min-h-[620px] sm:px-8 lg:py-28">
                <div class="w-full max-w-4xl">
                    <p class="mx-auto inline-flex items-center gap-2 rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-medium text-emerald-100 shadow-lg backdrop-blur-sm">
                        <span class="h-2 w-2 rounded-full bg-emerald-300" aria-hidden="true"></span>{{ __('Official municipal portal') }}
                    </p>
                    <h1 class="mt-6 text-4xl font-bold leading-tight tracking-tight text-white drop-shadow sm:text-5xl lg:text-7xl">{{ $heroTitle }}</h1>
                    <p class="mx-auto mt-5 max-w-2xl text-base leading-8 text-slate-100 sm:text-lg">{{ $heroDescription }}</p>

                    <form role="search" aria-label="{{ __('Search the portal') }}" @submit.prevent="$dispatch('portal-search', portalSearch)" class="mx-auto mt-8 flex w-full max-w-2xl items-center gap-2 rounded-2xl border border-white/25 bg-slate-950/25 p-2 shadow-2xl shadow-slate-950/20 backdrop-blur-xl transition focus-within:border-white/50 focus-within:ring-4 focus-within:ring-white/10">
                        <label class="sr-only" for="portal-search-hero">{{ __('Search the portal') }}</label>
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" class="ms-2 h-5 w-5 shrink-0 text-white/75" aria-hidden="true"><circle cx="11" cy="11" r="7"></circle><path stroke-linecap="round" d="m16 16 4 4"></path></svg>
                        <input id="portal-search-hero" type="search" dir="auto" x-model="portalSearch" placeholder="{{ __('Search services and updates') }}" class="min-w-0 flex-1 border-0 bg-transparent px-2 py-3 text-sm text-white placeholder:text-white/65 focus:outline-none focus:ring-0 sm:text-base">
                        <button type="submit" class="inline-flex min-h-11 shrink-0 items-center justify-center gap-2 rounded-xl border border-white/20 bg-white/15 px-4 text-sm font-semibold text-white transition hover:border-white/35 hover:bg-white/25 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white sm:px-5">
                            <span>{{ __('Search') }}</span>
                        </button>
                    </form>

                    <div class="mt-7 flex flex-wrap justify-center gap-3">
                        <a href="#services" class="rounded-xl bg-emerald-400 px-5 py-3 text-sm font-bold text-slate-900 shadow-lg transition hover:bg-emerald-300 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-slate-900">{{ __('Explore services') }}</a>
                        <a href="{{ route('app.contact') }}" class="rounded-xl border border-white/40 bg-white/10 px-5 py-3 text-sm font-semibold text-white transition hover:border-white/60 hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white">{{ __('Contact the municipality') }}</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="services" class="scroll-mt-24 mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:py-20">
            <div class="flex flex-col gap-3 sm:flex-row sm:items-end sm:justify-between">
                <div><p class="text-sm font-semibold uppercase tracking-wider text-teal-700">{{ __('For residents') }}</p><h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">{{ __('Our services') }}</h2><p class="mt-3 max-w-2xl text-slate-600">{{ __('Clear guidance to help you access municipal services.') }}</p></div>
                <a href="{{ route('app.contact') }}" class="font-semibold text-teal-800 hover:text-teal-900">{{ __('Need help? Contact us') }} <span aria-hidden="true">{{ $isArabic ? '←' : '→' }}</span></a>
            </div>
            <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @forelse ($services as $service)
                    @php
                        $serviceText = \Illuminate\Support\Str::lower($service->name.' '.$service->name_ar.' '.$service->description.' '.$service->description_ar);
                        $fallbackServiceImage = \Illuminate\Support\Str::contains($serviceText, ['park', 'environment', 'green', 'حدائق', 'البيئة', 'مساحات خضراء'])
                            ? asset('image/night_waterfall.jpg')
                            : asset('image/services.jpg');
                        $serviceImage = $service->icon && \Illuminate\Support\Facades\Storage::disk('public')->exists($service->icon)
                            ? asset('storage/'.$service->icon)
                            : $fallbackServiceImage;
                    @endphp
                    <article data-portal-search="{{ $serviceText }}" x-show="!portalSearch || $el.dataset.portalSearch.includes(portalSearch)" class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:border-emerald-200 hover:shadow-xl">
                        <div class="relative h-48 overflow-hidden bg-slate-200">
                            <img src="{{ $serviceImage }}" alt="{{ $isArabic ? $service->name_ar : $service->name }}" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-slate-900/10 to-transparent"></div>
                            <span class="absolute bottom-4 inset-inline-start-4 rounded-full border border-white/25 bg-slate-900/50 px-3 py-1 text-xs font-semibold text-white backdrop-blur-sm">{{ __('Municipal services') }}</span>
                        </div>
                        <div class="p-5 sm:p-6">
                            <h3 class="text-lg font-bold text-slate-900">{{ $isArabic ? $service->name_ar : $service->name }}</h3>
                            <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">{{ $isArabic ? $service->description_ar : $service->description }}</p>
                            <a href="{{ route('app.contact') }}" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-emerald-800 transition hover:text-emerald-900">
                                {{ __('Contact us') }} <span aria-hidden="true">{{ $isArabic ? '←' : '→' }}</span>
                            </a>
                        </div>
                    </article>
                @empty
                    <p class="rounded-xl border border-slate-200 bg-white p-6 text-slate-600">{{ __('Service information will be available soon.') }}</p>
                @endforelse
                <p x-cloak x-show="portalSearch && !Array.from(document.querySelectorAll('[data-portal-search]')).some(card => card.dataset.portalSearch.includes(portalSearch))" class="col-span-full rounded-xl border border-slate-200 bg-white p-6 text-center text-slate-600">{{ __('No matching services found.') }}</p>
            </div>
        </section>

        <section id="projects" class="border-y border-slate-200 bg-white">
            <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:py-20">
                <div><p class="text-sm font-semibold uppercase tracking-wider text-teal-700">{{ __('Building our future') }}</p><h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">{{ __('City projects') }}</h2><p class="mt-3 max-w-2xl text-slate-600">{{ __('Follow the initiatives improving neighborhoods and public spaces.') }}</p></div>
                <div class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                    @forelse ($projects as $project)
                        @php
                            $projectText = \Illuminate\Support\Str::lower($project->name.' '.$project->name_ar.' '.$project->introduction.' '.$project->introduction_ar.' '.$project->description.' '.$project->description_ar.' '.$project->city);
                            $projectImage = $project->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($project->image)
                                ? asset('storage/'.$project->image)
                                : (\Illuminate\Support\Str::contains($projectText, ['park', 'green', 'environment', 'حديقة', 'حدائق', 'البيئة'])
                                    ? asset('image/night_waterfall.jpg')
                                    : asset('assets/App/images/access/building_l.jpg'));
                        @endphp
                        <article data-portal-search="{{ $projectText }}" x-show="!portalSearch || $el.dataset.portalSearch.includes(portalSearch)" class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <div class="relative h-56 overflow-hidden bg-slate-200">
                                <img src="{{ $projectImage }}" alt="{{ $isArabic ? $project->name_ar : $project->name }}" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-slate-900/75 via-slate-900/10 to-transparent"></div>
                                <span class="absolute bottom-4 inset-inline-start-4 rounded-full border border-white/25 bg-slate-900/50 px-3 py-1 text-xs font-semibold text-white backdrop-blur-sm">{{ $project->city }}</span>
                            </div>
                            <div class="p-5 sm:p-6">
                                <h3 class="text-lg font-bold text-slate-900">{{ $isArabic ? $project->name_ar : $project->name }}</h3>
                                <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">{{ $isArabic ? $project->introduction_ar : $project->introduction }}</p>
                                <a href="{{ route('app.projects', $project->id) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-emerald-800 transition hover:text-emerald-900">{{ __('Project details') }} <span aria-hidden="true">{{ $isArabic ? '←' : '→' }}</span></a>
                            </div>
                        </article>
                    @empty
                        <p class="rounded-xl border border-slate-200 bg-slate-50 p-6 text-slate-600">{{ __('Project updates will be available soon.') }}</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="tenders" class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:py-20">
            <div><p class="text-sm font-semibold uppercase tracking-wider text-teal-700">{{ __('Open opportunities') }}</p><h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">{{ __('Public tenders') }}</h2><p class="mt-3 max-w-2xl text-slate-600">{{ __('Current municipal procurement notices.') }}</p></div>
            <div class="mt-8 grid gap-4 lg:grid-cols-2">
                @forelse ($tenders as $tender)
                    <article data-portal-search="{{ \Illuminate\Support\Str::lower($tender->name.' '.$tender->name_ar.' '.$tender->number_tenders.' '.$tender->description.' '.$tender->description_ar) }}" x-show="!portalSearch || $el.dataset.portalSearch.includes(portalSearch)" class="rounded-xl border border-slate-200 bg-white p-5 shadow-md transition hover:shadow-lg">
                        <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between"><div><p class="font-mono text-xs font-semibold text-slate-500">{{ $tender->number_tenders }}</p><h3 class="mt-2 text-lg font-semibold text-slate-900">{{ $isArabic ? $tender->name_ar : $tender->name }}</h3></div><span class="w-fit rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-800">{{ __('Open') }}</span></div>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $isArabic ? $tender->description_ar : $tender->description }}</p>
                        <p class="mt-4 text-xs text-slate-500">{{ __('Issued by') }}: {{ $isArabic ? $tender->name_buyer_ar : $tender->name_buyer }}</p>
                    </article>
                @empty
                    <p class="rounded-xl border border-slate-200 bg-white p-6 text-slate-600">{{ __('There are no open tenders at this time.') }}</p>
                @endforelse
            </div>
        </section>

        <section id="tourism" class="border-y border-slate-200 bg-white">
            <div class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:py-20">
                <div><p class="text-sm font-semibold uppercase tracking-wider text-teal-700">{{ __('Discover the city') }}</p><h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">{{ __('Tourism and heritage') }}</h2><p class="mt-3 max-w-2xl text-slate-600">{{ __('Explore places, culture, and local history.') }}</p></div>
                <div class="mt-8 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                    @forelse ($tourisms as $tourism)
                        @php
                            $tourismImagePath = $tourism->images
                                ->first(fn ($image) => \Illuminate\Support\Facades\Storage::disk('public')->exists($image->file_name))
                                ?->file_name;
                            $tourismAssetPath = $tourism->image && is_file(public_path($tourism->image))
                                ? $tourism->image
                                : null;
                            $tourismImage = $tourismImagePath
                                ? asset('storage/'.$tourismImagePath)
                                : ($tourismAssetPath
                                    ? asset($tourismAssetPath)
                                    : asset('assets/App/images/access/top_view.jpg'));
                        @endphp
                        <article data-portal-search="{{ \Illuminate\Support\Str::lower($tourism->name.' '.$tourism->name_ar.' '.$tourism->location.' '.$tourism->location_ar.' '.$tourism->description.' '.$tourism->description_ar) }}" x-show="!portalSearch || $el.dataset.portalSearch.includes(portalSearch)" class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                            <div class="relative h-52 overflow-hidden bg-slate-200">
                                <img src="{{ $tourismImage }}" alt="{{ $isArabic ? $tourism->name_ar : $tourism->name }}" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-slate-900/70 via-transparent to-transparent"></div>
                                <span class="absolute bottom-4 inset-inline-start-4 rounded-full border border-white/25 bg-slate-900/50 px-3 py-1 text-xs font-semibold text-white backdrop-blur-sm">{{ $isArabic ? $tourism->location_ar : $tourism->location }}</span>
                            </div>
                            <div class="p-5"><h3 class="text-lg font-bold text-slate-900">{{ $isArabic ? $tourism->name_ar : $tourism->name }}</h3><p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">{{ $isArabic ? $tourism->description_ar : $tourism->description }}</p></div>
                        </article>
                    @empty
                        <p class="rounded-xl border border-slate-200 bg-slate-50 p-6 text-slate-600">{{ __('Tourism information will be available soon.') }}</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section id="news" class="mx-auto max-w-7xl px-5 py-16 sm:px-8 lg:py-20">
            <div><p class="text-sm font-semibold uppercase tracking-wider text-teal-700">{{ __('Stay informed') }}</p><h2 class="mt-2 text-3xl font-bold tracking-tight text-slate-900">{{ __('Latest news') }}</h2><p class="mt-3 max-w-2xl text-slate-600">{{ __('Municipal announcements and community updates.') }}</p></div>
            <div class="mt-8 grid gap-5 md:grid-cols-2 lg:grid-cols-3">
                @forelse ($blogs as $blog)
                    @php
                        $blogText = \Illuminate\Support\Str::lower($blog->name.' '.$blog->name_ar.' '.$blog->introduction.' '.$blog->introduction_ar.' '.$blog->description.' '.$blog->description_ar);
                        $blogTitle = $isArabic ? $blog->name_ar : $blog->name;
                        $blogIntroduction = $isArabic ? $blog->introduction_ar : $blog->introduction;
                        $normaliseBlogText = static fn ($text) => \Illuminate\Support\Str::of($text)
                            ->lower()
                            ->replaceMatches('/[\s\p{P}\p{S}]+/u', '')
                            ->toString();
                        $normalisedTitle = $normaliseBlogText($blogTitle);
                        $normalisedIntroduction = $normaliseBlogText($blogIntroduction);
                        $repeatedTitleAsIntroduction = $normalisedIntroduction === $normalisedTitle
                            || $normalisedIntroduction === $normalisedTitle.$normalisedTitle;
                        $blogImagePath = collect([$blog->image, $blog->blogs_banner])
                            ->first(fn ($path) => $path && \Illuminate\Support\Facades\Storage::disk('public')->exists($path));
                        $blogImage = $blogImagePath
                            ? asset('storage/'.$blogImagePath)
                            : (\Illuminate\Support\Str::contains($blogText, ['tree', 'park', 'environment', 'green', 'شجر', 'حدائق', 'البيئة'])
                                ? asset('image/night_waterfall.jpg')
                                : asset('assets/App/images/access/top_view.jpg'));
                    @endphp
                    <article data-portal-search="{{ $blogText }}" x-show="!portalSearch || $el.dataset.portalSearch.includes(portalSearch)" class="group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl">
                        <div class="relative h-48 overflow-hidden bg-slate-200">
                            <img src="{{ $blogImage }}" alt="{{ $isArabic ? $blog->name_ar : $blog->name }}" loading="lazy" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-slate-900/65 via-transparent to-transparent"></div>
                            <span class="absolute bottom-4 inset-inline-start-4 rounded-full border border-white/25 bg-slate-900/50 px-3 py-1 text-xs font-semibold text-white backdrop-blur-sm">{{ $blog->created_at?->translatedFormat('j F Y') }}</span>
                        </div>
                        <div class="p-5">
                            <h3 class="text-lg font-bold text-slate-900">{{ $blogTitle }}</h3>
                            @if (filled($blogIntroduction) && ! $repeatedTitleAsIntroduction)
                                <p class="mt-2 line-clamp-3 text-sm leading-6 text-slate-600">{{ $blogIntroduction }}</p>
                            @endif
                            <a href="{{ route('app.blogs', $blog->id) }}" class="mt-4 inline-flex items-center gap-2 text-sm font-bold text-emerald-800 transition hover:text-emerald-900">{{ __('Read more') }} <span aria-hidden="true">{{ $isArabic ? '←' : '→' }}</span></a>
                        </div>
                    </article>
                @empty
                    <p class="rounded-xl border border-slate-200 bg-white p-6 text-slate-600">{{ __('News and announcements will be available soon.') }}</p>
                @endforelse
            </div>
        </section>

    </div>
</x-app-layout>
