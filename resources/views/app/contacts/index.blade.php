<x-app-layout title='Contact Us'>
    <div class="ps-section ps-section--contact pt-80 pb-40">
        <div class="ps-container">
            <div class="ps-section__header mb-50 text-left">
                <h3 class="ps-section__title" data-mask="Ramallah Municipality">{{ __('Contact Us') }}</h3>
            </div>

            <div class="ps-section__content">
                <div class="row justify-content-start">
                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <form action="{{ route('contact.save') }}" method="POST" class="contact-form">
                            @csrf

                            <div class="form-group">
                                <label for="name">{{ __('Name') }}</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    value="@if($name){{ $name ?: old('name') }}@else @auth{{ Auth::user()->name }}@endauth @endif">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">{{ __('Email') }}</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="@auth{{ Auth::user()->email }}@endauth">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phone">{{ __('Phone') }}</label>
                                <input type="text" class="form-control" name="phone" id="phone">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="subject">{{ __('Subject') }}</label>
                                <input type="text" class="form-control" name="subject" id="subject">
                                @error('subject')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="text">{{ __('Message') }}</label>
                                <textarea class="form-control" name="text" id="text" rows="5"></textarea>
                                @error('text')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-dark btn-block">{{ __('Send') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .contact-form .form-group {
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 20px; /* حواف مستديرة */
        padding: 12px 20px; /* رفع المسافة داخل الحقل */
        border: 2px solid #ccc; /* حواف خفيفة */
        transition: border-color 0.3s ease; /* تأثير الانتقال عند التفاعل */
    }

    .form-control:focus {
        border-color: #2ac37d; /* تغيير اللون عند التفاعل */
        box-shadow: 0 0 5px rgba(42, 195, 125, 0.5); /* تأثير الظل عند التفاعل */
    }

    .ps-section__header h3 {
        font-size: 32px; /* تكبير حجم العنوان */
        font-weight: bold;
    }

    .contact-form {
        margin-left: 0; /* محاذاة الفورم إلى اليسار */
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
    }

    .btn-dark {
        background-color: #2ac37d; /* اللون الداكن للأزرار */
        border: none;
        border-radius: 20px; /* حواف مستديرة */
        padding: 12px;
    }

    .btn-dark:hover {
        background-color: #1a9f61; /* تأثير عند المرور على الزر */
    }
</style>
