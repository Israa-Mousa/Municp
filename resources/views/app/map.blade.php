
<x-app-layout title='contact'>

    <div class="ps-section ps-section--hotdeal-3 pt-80 pb-40">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <h3 class="ps-section__title">{{ __('Ramallah Municipality') }} · {{ trans('app.Map') }}</h3>
            </div>
            <div class="ps-section__content">
                <div class="row" style="display: flex;
                justify-content: center;
                justify-items: center;">
                    <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">


              <img src="{{ asset('image/map.png') }}">
              <img src="{{ asset('image/we.png') }}">
              <div style="align-items: flex-end">
                <p></p>
                    <p>
                        {{ trans('app.ramallah info') }}
                    </p>
              </div>

                    </div>
                </div>
                </div>
            </div>
        </div>
        </div>
</x-app-layout>
