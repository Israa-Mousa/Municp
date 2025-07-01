<div class="ps-subscribe">
    <div class="ps-container">
        <div class="row" style="
        padding: 0px 65px;
        margin: 0 auto;">

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 col-centered">
                <h3><a href="/">
                    <i class="fa fa-envelope"></i>{{ __('app.contact us') }}</h3>
                </a>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 col-centered" style="padding-top: 18px;">
                <form class="ps-subscribe__form" action={{ route('app.contact')}} method="get" style="">
                    {{-- {{csrf_field()}} --}}
                    <input class="form-control" type="text" id="name"name="name" placeholder=""
                    value="">
                    <button>{{ __('app.contacts with Municipality') }}</button>
                </form>
            </div>


        </div>
    </div>
</div>


