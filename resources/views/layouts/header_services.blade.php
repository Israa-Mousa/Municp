<div class="header-news-ticker">
  <div class="news-track" id="news-track">
    @php
        $minItems = 3;
        $loopCount = 1;
        $displayBlogs = $blogs->take($minItems);
        if ($displayBlogs->count() < $minItems) {
            for ($i = $displayBlogs->count(); $i < $minItems; $i++) {
                $displayBlogs->push(null);
            }
        }
    @endphp

    @foreach ($displayBlogs as $blog)
      <span class="news-item">
        <img src="{{ asset('image/logblog.png') }}" class="myimage" alt="icon" />
        <strong>
          @if ($blog)
            {{ Session::get('locale') == "ar" ? $blog->name_ar : $blog->name }}
          @else
            {{ __('Need Post') }}
          @endif
        </strong>
        @if ($blog)
          {{ Session::get('locale') == "ar" ? $blog->introduction_ar : $blog->introduction }}
        @else
          {{ __('Please wait till admin adds post') }}
        @endif
      </span>
    @endforeach
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const track = document.getElementById('news-track');
    const clone = track.cloneNode(true);
    clone.id = 'news-track-clone';
    track.parentNode.appendChild(clone);

    const fullWidth = track.scrollWidth;
    const duration = fullWidth / 50; // كلما زاد الطول زادت المدة

    track.style.animationDuration = duration + 's';
    clone.style.animation = `tickerMove ${duration}s linear infinite`;
    clone.style.position = 'absolute';
    clone.style.left = fullWidth + 'px';
    clone.style.top = '0';
  });
</script>
