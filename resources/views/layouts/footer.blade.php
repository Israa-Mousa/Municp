<div class="ps-footer bg--cover" data-background="">
    <div class="ps-footer__content">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info">
                        <header><a class="ps-logo" href="index.html"><img src="{{asset('/image/logo2.png') }}" alt=""></a>
                            <h3 class="ps-widget__title">{{__('app.ADDRESS OFFICE')}}</h3>
                        </header>
                        <footer>
                            <p><strong>{{__('app.location')  }}</strong></p>
                            <p>{{__('app.email')}}: <a href='mailto: info@ramallah.ps'> info@ramallah.ps</a></p>
                            <p>{{ __('app.phone') }}: +2945555
                            </p>
                            <p>{{__('app.fax')  }}: Fax 022963214
                            </p>
                        </footer>
                    </aside>
                </div>

                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                        <header>
                            <h3 class="ps-widget__title">{{ __('app.tenders')}}</h3>
                        </header>
                        <footer>
                            <ul class="ps-list--line">
                                @foreach ($tenders as $tender)
                                <li><a>
                                    @if(Session::get('locale')=='ar')
                                    {{$tender->name_ar}}
                                    @else
                                    {{$tender->name}}
                                    @endif</a></li>
                                    @endforeach
                            </ul>
                        </footer>
                    </aside>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                        <header>
                            <h3 class="ps-widget__title">{{ trans('app.institutions') }}</h3>
                        </header>
                        <footer>
                            <ul class="ps-list--line">
                                @if($institutions)
                                @foreach ($institutions as $institution)
                                <li><a>
                                    @if(Session::get('locale')=='ar')
                                    {{$institution->name_ar}}
                                    @else
                                    {{$institution->name}}
                                    @endif</a></li>
                                    @endforeach
                                    @endif
                            </ul>
                        </footer>
                    </aside>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                        <header>
                            <h3 class="ps-widget__title">{{ __('app.careers')}}</h3>
                        </header>
                        <footer>
                            <ul class="ps-list--line">
                               @foreach ($careers as $career )
                                   <li><a href="{{ route('app.careers',$career->id) }}">
                                    @if(Session::get('locale')=='ar')
                                    {{$career->job_title_ar}}
                                    @else
                                    {{$career->job_title}}
                                    @endif
                                </a></li>
                               @endforeach
                            </ul>
                        </footer>
                    </aside>
                </div>
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                        <header>
                            <h3 class="ps-widget__title">{{ trans('app.CITIZEN SERVICES') }}</h3>
                        </header>
                        <footer>
                            <ul class="ps-list--line">
                                @foreach ($services as $service )
                                <li><a>
                                @if(Session::get('locale')=='ar')
                                {{$service->name_ar  }}
                                @else
                                {{$service->name  }}
                                @endif</a></li>
                                @endforeach

                            </ul>
                        </footer>
                    </aside>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-footer__copyright" @if(app()->getLocale() == 'ar') dir="rtl" @endif>
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 " style="text-align: left">
                    {{-- <p>&copy; <a href="#">{{ __('Ramallah Municipality app') }}</a>  {{ __('All rights reserved') }} {{ __('Design by') }} <a href="#"> {{ __('designer name') }}</a></p> --}}
                  <p>{{ __('All rights reserved') }}.{{ __('Ramallah Municipality app') }} &copy; {{ date('Y') }} – {{ __('Design by') }}:
                                   <a href="#"> {{ __('designer name') }}</a></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <ul class="ps-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
