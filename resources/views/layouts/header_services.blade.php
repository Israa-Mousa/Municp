<div class="header-news-ticker">
  <div class="news-track">
    @foreach ($blogs->take(3) as $blog)
      <span class="news-item">
        <img src="{{ asset('image/logblog.png') }}" class="myimage" alt="icon" />
        <strong>
          {{ Session::get('locale') == 'ar' ? $blog->name_ar : $blog->name }}
        </strong>
        {{ Session::get('locale') == 'ar' ? $blog->introduction_ar : $blog->introduction }}
      </span>
    @endforeach

    {{-- نكرر نفس العناصر لخلق التمرير المستمر --}}
    @foreach ($blogs->take(3) as $blog)
      <span class="news-item">
        <img src="{{ asset('image/logblog.png') }}" class="myimage" alt="icon" />
        <strong>
          {{ Session::get('locale') == 'ar' ? $blog->name_ar : $blog->name }}
        </strong>
        {{ Session::get('locale') == 'ar' ? $blog->introduction_ar : $blog->introduction }}
      </span>
    @endforeach
  </div>
</div>
