@extends('layouts.dashboard')

@section('title', $tender->exists ? __('Edit tender') : __('Create tender'))

@section('content')
    @php $editing = $tender->exists; @endphp
    <div class="mx-auto max-w-4xl">
        <div class="mb-6">
            <a href="{{ route('dashboard.tenders.index') }}" class="text-sm font-semibold text-teal-800 hover:text-teal-950">← {{ __('Back to tenders') }}</a>
            <h2 class="mt-3 text-2xl font-bold tracking-tight text-slate-900">{{ $editing ? __('Edit tender') : __('Create tender') }}</h2>
            <p class="mt-2 text-sm text-slate-600">{{ __('Provide accurate tender information in both languages.') }}</p>
        </div>

        <form action="{{ $editing ? route('dashboard.tenders.update', $tender) : route('dashboard.tenders.store') }}" method="POST" class="space-y-6 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
            @csrf
            @if ($editing)
                @method('PUT')
            @endif
            <div class="grid gap-5 sm:grid-cols-2">
                <div><label for="name" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Title (English)') }}</label><input id="name" name="name" required value="{{ old('name', $tender->name) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">@error('name')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
                <div><label for="name_ar" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Title (Arabic)') }}</label><input id="name_ar" name="name_ar" dir="rtl" required value="{{ old('name_ar', $tender->name_ar) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">@error('name_ar')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
                <div><label for="number_tenders" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Tender reference') }}</label><input id="number_tenders" name="number_tenders" required value="{{ old('number_tenders', $tender->number_tenders) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">@error('number_tenders')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
                <div><label for="status" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Status') }}</label><select id="status" name="status" required class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100"><option value="">{{ __('Choose status') }}</option>@foreach ($statuses as $value => $label)<option value="{{ $value }}" @selected((string) old('status', $tender->status) === (string) $value)>{{ $label }}</option>@endforeach</select>@error('status')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
                <div><label for="name_buyer" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Issuing department (English)') }}</label><input id="name_buyer" name="name_buyer" required value="{{ old('name_buyer', $tender->name_buyer) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">@error('name_buyer')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
                <div><label for="name_buyer_ar" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Issuing department (Arabic)') }}</label><input id="name_buyer_ar" name="name_buyer_ar" dir="rtl" required value="{{ old('name_buyer_ar', $tender->name_buyer_ar) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">@error('name_buyer_ar')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
                <div><label for="parentID" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Related service (optional)') }}</label><select id="parentID" name="parentID" class="w-full rounded-lg border border-slate-300 bg-white px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100"><option value="">{{ __('None') }}</option>@foreach ($services as $service)<option value="{{ $service->id }}" @selected((string) old('parentID', $tender->parentID) === (string) $service->id)>{{ $service->name }}</option>@endforeach</select>@error('parentID')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
                <div><label for="signature" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Document reference or URL') }}</label><input id="signature" name="signature" required value="{{ old('signature', $tender->signature) }}" class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">@error('signature')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
            </div>
            <div class="grid gap-5 sm:grid-cols-2">
                <div><label for="description" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Description (English)') }}</label><textarea id="description" name="description" rows="5" required class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">{{ old('description', $tender->description) }}</textarea>@error('description')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
                <div><label for="description_ar" class="mb-1.5 block text-sm font-semibold text-slate-700">{{ __('Description (Arabic)') }}</label><textarea id="description_ar" name="description_ar" dir="rtl" rows="5" required class="w-full rounded-lg border border-slate-300 px-3 py-2.5 text-sm focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-100">{{ old('description_ar', $tender->description_ar) }}</textarea>@error('description_ar')<p class="mt-1 text-sm text-rose-700">{{ $message }}</p>@enderror</div>
            </div>
            <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-5 sm:flex-row sm:justify-end">
                <a href="{{ route('dashboard.tenders.index') }}" class="inline-flex items-center justify-center rounded-lg border border-slate-300 px-4 py-2.5 text-sm font-semibold text-slate-700 hover:bg-slate-50">{{ __('Cancel') }}</a>
                <button type="submit" class="inline-flex items-center justify-center rounded-lg bg-teal-700 px-5 py-2.5 text-sm font-semibold text-white hover:bg-teal-800 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2">{{ $editing ? __('Save changes') : __('Create tender') }}</button>
            </div>
        </form>
    </div>
@endsection
