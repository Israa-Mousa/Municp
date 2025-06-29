<x-app-layout title='contact'>

    <div class="ps-section ps-section--hotdeal-3 pt-80 pb-40">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <h3 class="ps-section__title" data-mask="Ramllah Muncipilty">Contact us</h3>
            </div>
            <div class="ps-section__content">
                <div class="row"
                    style="display: flex;
                justify-content: center;
                justify-items: center;">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 ">
                        <form action="" method="post" action="{{ route('contact.save') }}">
                            @csrf

                            <div class="form-group">
                                <label>{{ trans('name') }}</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="@if($name){{ $name ?: old('name')}}@else @auth{{ Auth::User()->name }}@endauth @endif">

                                <!-- Show error -->
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>{{ trans('app.email') }}</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="@auth
{{ Auth::User()->email }} @endauth">

                                <!-- Show error -->
                                @if ($errors->has('email'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label> {{ trans('app.phone') }}</label>
                                <input type="text" class="form-control" name="phone" id="phone">

                                <!-- Show error -->
                                @if ($errors->has('phone'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>{{ trans('app.subject') }}</label>
                                <input type="text" class="form-control" name="subject" id="subject">

                                <!-- Show error -->
                                @if ($errors->has('subject'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('subject') }}
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>{{ trans('app.message') }}</label>
                                <textarea class="form-control" name="text" id="text" rows="5"></textarea>

                                <!-- Show error -->
                                @if ($errors->has('text'))
                                    <div class="alert alert-danger">
                                        {{ $errors->first('text') }}
                                    </div>
                                @endif
                            </div>

                            <input type="submit" name="send" value="{{ trans('app.send') }}"
                                class="btn btn-dark btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
