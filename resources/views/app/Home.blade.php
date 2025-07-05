<x-app-layout title='Home'>

    <!-- السلايدر العلوي -->
   <div class="swiper mySwiper" style="height: 300px;">
  <div class="swiper-wrapper">
    @php
      // فلتر المشاريع اللي تحتوي صور صالحة فقط
      $validProjects = $projects->filter(function($project) {
          return $project->image && file_exists(public_path('storage/' . $project->image));
      });
    @endphp

    @if ($validProjects->isNotEmpty())
      @foreach ($validProjects as $project)
        <div class="swiper-slide">
          <img src="{{ asset('storage/' . $project->image) }}"
               style="width: 100%; height: 100%; object-fit: cover;"
               alt="project image">
        </div>
      @endforeach
    @else
      @foreach (['rashid.jpg', 'side_view.jpg', 'night_waterfall.jpg', 'top_view.jpg'] as $img)
        <div class="swiper-slide">
          <img src="{{ asset('assets/App/images/access/' . $img) }}"
               style="width: 100%; height: 100%; object-fit: cover;"
               alt="{{ pathinfo($img, PATHINFO_FILENAME) }}">
        </div>
      @endforeach
    @endif
  </div>

  <!-- أزرار التنقل -->
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
</div>


    <!-- قسم السياحة -->
    <div class="ps-section ps-section--hotdeal-3 pt-80 pb-40">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <h3 class="ps-section__title" data-mask="tourisms">-{{ trans('app.our tourisms') }}</h3>
            </div>

            <div class="card-container">
                @foreach ($tourisms as $tourism)
                    <div class="card">
                        <img src="{{ asset('/storage/' . ($tourism->GetImageLibrary($tourism->id)[0]->file_name ?? 'assets/App/images/access/5.jpg')) }}" alt="صورة سياحية">
                        <div class="content">
                            <h3>{{ Session::get('locale') == 'ar' ? $tourism->name_ar : $tourism->name }}</h3>
                            <p>{{ Session::get('locale') == 'ar' ? $tourism->location_ar : $tourism->location }}</p>
                            <a href="#">{{ __('app.Go for details') }} &raquo;</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- قسم الخدمات -->
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="services">-{{ trans('app.our services') }}</h3>
        </div>
    </div>

    <div class="card-container">
        @foreach ($services as $service)
            <div class="card">
                <img src="{{ asset('storage/' . $service->icon) }}" alt="أيقونة الخدمة">
                <div class="content">
                    <h3>{{ Session::get('locale') == 'ar' ? $service->name_ar : $service->name }}</h3>
                    <p>{{ Session::get('locale') == 'ar' ? $service->description_ar : $service->description }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <!-- قسم المشاريع -->
    <div class="ps-section ps-home-blog pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <h2 class="ps-section__title" data-mask="Projects">- {{ __('app.our projects') }}</h2>
                <div class="ps-section__action">
                    <a class="ps-morelink text-uppercase" href="#">{{ trans('app.View all projects') }}
                        <i class="fa fa-long-arrow-right"></i>
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
                            <p>{{ Session::get('locale') == 'ar' ? $project->introduction_ar : $project->introduction }}</p>
                            <a href="#">{{ trans('app.MORE') }} &raquo;</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- الشركاء -->
    <div class="ps-home-partner">
        <div class="ps-container">
            <div class="owl-slider"
                 data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="40"
                 data-owl-nav="false" data-owl-dots="false" data-owl-item="6"
                 data-owl-item-xs="2" data-owl-item-sm="4" data-owl-item-md="5"
                 data-owl-item-lg="6" data-owl-duration="1000" data-owl-mousedrag="on">

                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>
                <a href="#"><img src="" alt=""></a>

            </div>
        </div>
    </div>

</x-app-layout>
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
