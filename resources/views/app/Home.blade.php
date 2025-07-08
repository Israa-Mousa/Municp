<x-app-layout title='Home'>

<div class="slider-container">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @php
                $validProjects = $projects->filter(function($project) {
                    return $project->image && file_exists(public_path('storage/' . $project->image));
                });
            @endphp

            {{-- @if ($validProjects->isNotEmpty())
                @foreach ($validProjects as $project)
                    <div class="swiper-slide">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="project image">
                    </div>
                @endforeach
            @else --}}
                @foreach (['rashid.jpg', 'side_view.jpg', 'night_waterfall.jpg', 'top_view.jpg'] as $img)
                    <div class="swiper-slide">
                        <img src="{{ asset('assets/App/images/access/' . $img) }}" alt="{{ pathinfo($img, PATHINFO_FILENAME) }}">
                    </div>
                @endforeach
            {{-- @endif --}}
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>

    <!-- قسم السياحة -->
    <div class="ps-section ps-section--hotdeal-3 pt-80 pb-40">
        <div class="ps-container">
            <div class="ps-section__header mb-50 d-flex justify-content-between align-items-center flex-{{ app()->getLocale() == 'ar' ? 'row-reverse' : 'row' }}">
                <h3 class="ps-section__title" data-mask="TOURISMS">- {{ trans('app.our tourisms') }}</h3>
            </div>
            <div class="card-container">
                @foreach ($tourisms as $tourism)
                    <div class="card">
                        <img src="{{ asset('/storage/' . ($tourism->GetImageLibrary($tourism->id)[0]->file_name ?? 'assets/App/images/access/5.jpg')) }}" alt="صورة سياحية">
                        <div class="content">
                            <h3>{{ Session::get('locale') == 'ar' ? $tourism->name_ar : $tourism->name }}</h3>
                            <p class="location-text">{{ Session::get('locale') == 'ar' ? $tourism->location_ar : $tourism->location }}</p>
                            <a href="#" class="btn-details">{{ __('app.Go for details') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- قسم الخدمات -->
    <div class="ps-container">
        <div class="ps-section__header mb-50 d-flex justify-content-between align-items-center flex-{{ app()->getLocale() == 'ar' ? 'row-reverse' : 'row' }}">
            <h3 class="ps-section__title" data-mask="SERVICES">- {{ trans('app.our services') }}</h3>
        </div>
    </div>

    <div class="card-container">
        @foreach ($services as $service)
            <div class="card">
                <img src="{{ asset('storage/' . $service->icon) }}" alt="أيقونة الخدمة">
                <div class="content">
                    <h3>{{ Session::get('locale') == 'ar' ? $service->name_ar : $service->name }}</h3>
                    <p class="location-text">{{ Session::get('locale') == 'ar' ? $service->description_ar : $service->description }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- قسم المشاريع -->
    {{-- <div class="ps-section ps-home-blog pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-section__header mb-50 d-flex justify-content-between align-items-center flex-{{ app()->getLocale() == 'ar' ? 'row-reverse' : 'row' }}">
                <h class="ps-section__title" data-mask="projects">- {{ trans('app.our projects') }}</h3>
                <div class="ps-section__action" style="float: {{app()->getLocale() == 'ar' ? 'left' : 'right' }}">
                    <a class="ps-morelink text-uppercase btn-details" href="#">{{ trans('app.View all projects') }}
                        <i class="fa fa-long-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                    </a>
                </div>
            </div>
            <div class="card-container">
                @foreach($projects as $project)
                    <div class="card">
                        <img
                            src="{{ $project->image && file_exists(public_path('storage/' . $project->image))
                                    ? asset('storage/' . $project->image)
                                    : asset('assets/App/images/access/side_view.jpg') }}"
                            alt="{{ $project->name_ar ?? 'صورة مشروع' }}">
                        <div class="content">
                            <h3>{{ Session::get('locale') == 'ar' ? $project->name_ar : $project->name }}</h3>
                            <p class="location-text">{{ Session::get('locale') == 'ar' ? $project->introduction_ar : $project->introduction }}</p>
                            <a href="#" class="btn-details">{{ trans('app.MORE') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div> --}}
    <div class="ps-section ps-home-blog pt-80 pb-80">
    <div class="ps-container">
        <div class="ps-section__header mb-50 d-flex justify-content-between align-items-center flex-{{ app()->getLocale() == 'ar' ? 'row-reverse' : 'row' }}">
            <h3 class="ps-section__title" data-mask="projects">- {{ trans('app.our projects') }}</h3>
            <div class="ps-section__action" style="float: {{ app()->getLocale() == 'ar' ? 'left' : 'right' }}">
                <a class="ps-morelink text-uppercase btn-details" href="#">{{ trans('app.View all projects') }}
                    <i class="fa fa-long-arrow-{{ app()->getLocale() == 'ar' ? 'left' : 'right' }}"></i>
                </a>
            </div>
        </div>
        <div class="card-container">
            @foreach($projects as $project)
                <div class="card">
                    <img src="{{ $project->image && file_exists(public_path('storage/' . $project->image))
                                ? asset('storage/' . $project->image)
                                : asset('assets/App/images/access/side_view.jpg') }}"
                         alt="{{ $project->name_ar ?? 'صورة مشروع' }}">
                    <div class="content">
                        <h3>{{ app()->getLocale() == 'ar' ? $project->name_ar : $project->name }}</h3>
                        <p class="location-text">{{ app()->getLocale() == 'ar' ? $project->introduction_ar : $project->introduction }}</p>
                        <a href="#" class="btn-details">{{ trans('app.MORE') }}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>


    <!-- قسم المؤسسات -->
    <div class="ps-section ps-section--partners pt-60 pb-60">
        <div class="ps-container">
            <div class="ps-section__header mb-40 d-flex justify-content-between align-items-center flex-{{ app()->getLocale() == 'ar' ? 'row-reverse' : 'row' }}">
                <h2 class="ps-section__title" data-mask="institutions">- {{ __('app.our institutions') }}</h2>
            </div>
            <div class="partners-logos">
                @foreach($institutions as $institution)
                    <div class="partner-logo">
                        <img src="{{ $institution->Image
                                    ? asset('storage/' . $institution->Image)
                                    : asset('assets/App/images/access/top_view.jpg') }}"
                             alt="{{ $institution->name }}">
                        <div class="overlay">
                            <h4>{{ app()->getLocale() == 'ar' ? $institution->name_ar : $institution->name }}</h4>
                            @if($institution->url)
                                <a href="{{ $institution->url }}" target="_blank" class="btn-details">{{ __('app.Visit site') }}</a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-app-layout>

<style>
.ps-section__title {
    position: relative;
    display: inline-block;
    font-weight: bold;
    font-size: 1.75rem;
    color: #333;
}
.ps-section__title::before {
    content: attr(data-mask);
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 0;
    left: unset;
    z-index: -1;
    font-size: 80px;
    font-weight: 900;
    color: rgba(42, 195, 125, 0.08);
    white-space: nowrap;
    text-transform: uppercase;
}

.location-text {
    color: #777;
    font-size: 0.95rem;
    margin-top: 8px;
    font-weight: 500;
}
.card-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}
.card {
    width: 300px;
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: transform 0.3s;
}
.card:hover {
    transform: translateY(-5px);
}
.card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}
.card .content {
    padding: 16px;
    text-align: {{ app()->getLocale() == 'ar' ? 'right' : 'left' }};
}
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    new Swiper('.mySwiper', {
        loop: true,
        autoplay: { delay: 5000 },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        rtl: document.documentElement.getAttribute('dir') === 'rtl',
        slidesPerView: 1,
    });
});
</script>
