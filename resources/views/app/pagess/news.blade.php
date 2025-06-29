<x-app-layout title='contact'>
    <div class="ps-section ps-section--hotdeal-3 pt-80 pb-40">
        <div class="ps-container">

            <div class="row"style="display: flex; justify-content: center;justify-items: center;">
                <h3 class="" style="padding-bottom:10px;margin-bottom: 17px !important ;font-size:29 !important">

                    @if (Session::get('locale') == 'ar')
                        {{ $blog->name_ar }}@else{{ $blog->name }}
                    @endif
                </h3>
            </div>
            <div class="row"style="display: flex; justify-content: center;justify-items: center;">

                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                    <div class="card" style="">
                        <img class="card-img-top" src="{{ asset('/storage/' . $blog->image) }}" style="width:100%"
                            alt="Card image cap">
                        <div class="card-body" style="padding: 10px">
                            <p class="card-title" style="color: black">
                                @if (Session::get('locale') == 'ar')
                                    {{ $blog->introduction_ar }}@else{{ $blog->introduction }}
                                @endif
                            </p>
                            <br>
                            <br>
                            <p class="card-text">
                                @if (Session::get('locale') == 'ar')
                                    {{ $blog->description_ar }}@else{{ $blog->description }}
                                @endif
                            </p>

                            <a href="/" class="">{{ trans('app.Go to home') }}</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
