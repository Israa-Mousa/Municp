@if ($blogs->isNotEmpty())
    @php
        $tickerBlogs = $blogs->take(5);
    @endphp
    <section
        aria-label="{{ __('Latest news') }}"
        class="border-y border-emerald-500/20 bg-emerald-900/40 text-emerald-100 backdrop-blur-md"
        dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}"
    >
        <div class="mx-auto flex min-h-12 max-w-7xl items-center gap-3 px-4 sm:gap-4 sm:px-6 lg:px-8">
            <span class="inline-flex shrink-0 items-center gap-2 rounded-full border border-emerald-300/20 bg-emerald-400/10 px-3 py-1.5 text-xs font-bold text-emerald-50 sm:text-sm">
                <span class="h-1.5 w-1.5 rounded-full bg-emerald-300" aria-hidden="true"></span>
                {{ __('Latest news') }}
            </span>
            <div class="municipal-ticker__viewport min-w-0 flex-1" role="region" aria-label="{{ __('Latest news') }}">
                <div class="municipal-ticker__track flex w-max items-center">
                    @foreach ([0, 1] as $copy)
                        <div class="flex shrink-0 items-center gap-8 pe-8" @if ($copy === 1) aria-hidden="true" @endif>
                            @foreach ($tickerBlogs as $blog)
                                @php
                                    $newsTitle = app()->getLocale() === 'ar' ? $blog->name_ar : $blog->name;
                                    $newsSummary = app()->getLocale() === 'ar' ? $blog->introduction_ar : $blog->introduction;
                                    $normaliseTickerText = static fn ($text) => \Illuminate\Support\Str::of($text)
                                        ->lower()
                                        ->replaceMatches('/[\s\p{P}\p{S}]+/u', '')
                                        ->toString();
                                    $normalisedTitle = $normaliseTickerText($newsTitle);
                                    $normalisedSummary = $normaliseTickerText($newsSummary);
                                    $repeatedTitleAsSummary = $normalisedSummary === $normalisedTitle
                                        || $normalisedSummary === $normalisedTitle.$normalisedTitle;
                                @endphp
                                <a href="{{ route('app.blogs', $blog->id) }}" tabindex="{{ $copy === 1 ? '-1' : '0' }}" class="inline-flex max-w-[min(72vw,32rem)] shrink-0 items-center gap-2 rounded-md py-3 text-sm transition hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-emerald-200 sm:max-w-[min(48vw,34rem)]">
                                    <span class="shrink-0 font-semibold text-white">{{ $newsTitle }}</span>
                                    @if (filled($newsSummary) && ! $repeatedTitleAsSummary)
                                        <span class="hidden truncate text-emerald-100/80 sm:inline">{{ $newsSummary }}</span>
                                    @endif
                                </a>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
