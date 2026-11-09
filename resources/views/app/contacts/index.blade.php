<x-app-layout title="{{ __('Contact us') }}">
    <main class="min-h-[65vh] bg-slate-50 px-5 py-8 sm:px-8 sm:py-10">
        <div class="mx-auto max-w-5xl">
            <div class="max-w-2xl">
                <p class="text-sm font-semibold uppercase tracking-wider text-teal-700">{{ __('We are here to help') }}</p>
                <h1 class="mt-2 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">{{ __('Contact the municipality') }}</h1>
                <p class="mt-4 leading-7 text-slate-600">{{ __('Send your question or feedback and our team will follow up.') }}</p>
            </div>
            <div class="mt-8 grid gap-8 lg:grid-cols-[minmax(0,1.3fr)_minmax(16rem,0.7fr)]">
                <form action="{{ route('contact.save') }}" method="POST" class="space-y-5 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
                    @csrf
                    @if (session('success'))
                        <div role="status" class="rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-800">{{ session('success') }}</div>
                    @endif
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Name') }}</label>
                            <input id="name" name="name" type="text" dir="auto" autocomplete="name" required value="{{ old('name', $name ?: (Auth::user()->name ?? '')) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-start text-sm shadow-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">
                            @error('name')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="email" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Email address') }}</label>
                            <input id="email" name="email" type="email" dir="ltr" autocomplete="email" required value="{{ old('email', Auth::user()->email ?? '') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-start text-sm shadow-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">
                            @error('email')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="phone" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Phone') }}</label>
                            <input id="phone" name="phone" type="tel" dir="ltr" autocomplete="tel" required value="{{ old('phone') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-start text-sm shadow-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">
                            @error('phone')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="subject" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Subject') }}</label>
                            <input id="subject" name="subject" type="text" dir="auto" required value="{{ old('subject') }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-start text-sm shadow-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">
                            @error('subject')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror
                        </div>
                    </div>
                    <div>
                        <label for="text" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Message') }}</label>
                        <textarea id="text" name="text" rows="6" dir="auto" required class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-start text-sm shadow-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">{{ old('text') }}</textarea>
                        @error('text')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-teal-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">{{ __('Send message') }}</button>
                </form>
                <aside class="rounded-2xl bg-slate-900 p-6 text-white sm:p-8">
                    <p class="text-sm font-semibold uppercase tracking-wider text-white">{{ __('Municipal support') }}</p>
                    <h2 class="mt-3 text-xl font-semibold text-white">{{ __('Your feedback matters.') }}</h2>
                    <p class="mt-3 text-sm leading-6 text-slate-300">{{ __('Please include the relevant details so our team can direct your inquiry to the right department.') }}</p>
                    <a href="{{ route('app') }}" class="mt-6 inline-flex items-center gap-2 font-semibold text-white hover:text-teal-200">{{ __('Return to home') }} <span aria-hidden="true">{{ app()->getLocale() === 'ar' ? '←' : '→' }}</span></a>
                </aside>
            </div>
        </div>
    </main>
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
