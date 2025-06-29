
    <div class="header-services">
        <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
           @if(count($blogs) <3)
            <p class="ps-service"><i><img src="{{ asset('image/logblog.png') }}" class="myimage"></i><strong>Need three Post</strong>: please weait till admin add post</p>
            <p class="ps-service"><i><img src="{{ asset('image/logblog.png') }}" class="myimage"></i><strong>Need three Post</strong>: please weait till admin add post</p>
            <p class="ps-service"><i><img src="{{ asset('image/logblog.png') }}" class="myimage"></i><strong>Need three Post</strong>: please weait till admin add post</p>
           @else
            @foreach ( $blogs  as $blog )
           <p class="ps-service"><i><img src="{{ asset('image/logblog.png') }}" class="myimage"></i>
            {{-- <a>@if(Session::get('locale')=="ar"){{ $blog->name_ar }}@else{{ $blog->name}}@endif</a> --}}

            <strong>@if(Session::get('locale')=="ar"){{ $blog->name_ar }}@else{{ $blog->name}}@endif</strong>@if(Session::get('locale')=="ar"){{ $blog->introduction_ar }}@else{{ $blog->introduction}}@endif</p>
           @endforeach
           @endif
        </div>
    </div>
