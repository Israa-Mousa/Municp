@extends('layouts.dashboard')

@section('title', __('Projects'))
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Projects') }}</li>
@endsection

<!-- Main content -->
@section('content')
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            @include('dashboard.subview')
            <!-- /.row -->
            <div class="card">
                <div class="card-header border-transparent">
                    <h3 class="card-title">{{ trans('Edit Projects') }}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <form action="{{ route('dashboard.projects.update', $project->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="padding: 20px">
                            <div class="col-md-8">
                                <div class="form-group mb-3">
                                    <label for="name">{{ __('name') }}</label>
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $project->name) }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                                                    {{-- @error('name')
                                            <p class="invalid-feedback">{{$message}}</p>
                                            @enderror --}}

                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ trans($errors->first('name')) }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="name_ar">{{ __('name_ar') }}</label>
                                    <input type="text" id="name_ar" name="name_ar"
                                        value="{{ old('name_ar', $project->name_ar) }}"
                                        class="form-control @error('name_ar') is-invalid @enderror">
                                    @error('name_ar')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="class form-group">

                                    <label for="status">status</label>
                                    <select id="status" name="status"
                                        class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select One</option>
                                        @foreach ($status as $key => $index)
                                            <option value="{{ $key }}"
                                                @if ($key == old('status', $project->status)) selected @endif>{{ $index }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('status'))
                                        <p class="text-danger">{{ $errors->status }} </p>
                                    @endif
                                </div>


                                <div class="class form-group">
                                    <label for="city">City</label>
                                    <select id="city" name="city"
                                        class="form-control @error('city') is-invalid @enderror">
                                        <option value="">Select One</option>
                                        @foreach ($cities as $key)
                                            @foreach ($key as $index)
                                                <option value="{{ $index['id'] }}"
                                                    @if ($index['id'] == old('city', $project->city)) selected @endif>
                                                    {{ trans($index['name']) }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @if ($errors->has('city'))
                                        <p class="text-danger">{{ $errors->city }} </p>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="introduction">Introduction</label>
                                    <textarea id="introduction" name="introduction" class="form-control @error('introduction') is-invalid @enderror">{{ old('introduction', $project->introduction) }}</textarea>
                                </div>
                                @if ($errors->has('introduction'))
                                    <p class="text-danger">{{ $errors->first('introduction') }}</p>
                                @endif
                                <div class="form-group mb-3">
                                    <label for="introduction_ar">{{ __('Introduction (Arabic)') }}</label>
                                    <textarea id="introduction_ar" name="introduction_ar" class="form-control @error('introduction_ar') is-invalid @enderror">{{ old('introduction_ar', $project->introduction_ar) }}</textarea>
                                </div>
                                @error('introduction_ar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $project->description) }}</textarea>
                                </div>
                                @error('description')
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                @enderror
                                <div class="form-group mb-3">
                                    <label for="description_ar">{{ __('Description (Arabic)') }}</label>
                                    <textarea id="description_ar" name="description_ar" class="form-control @error('description_ar') is-invalid @enderror">{{ old('description_ar', $project->description_ar) }}</textarea>
                                </div>
                                @error('description_ar')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="image">Thumbnail</label>
                                    <br>
                                    @if ($project->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($project->image))
                                        <img id="thumbnails" src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->name }}" height="60">

                                        {{-- <img id="thumbnails" src="{{Storage::disk('public')->url($project->image)}}" height="60"> --}}
                                    @else
                                        <img id="thumbnails" src="{{ asset('image/services.jpg') }}" alt="{{ __('Project thumbnail preview') }}" height="60">
                                    @endif
                                    <input type="file" style="display:none"id="image" name="image"
                                        class="form-control" accept="image/*">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-primary" style="background: #214761">Save</button>
                                </div>
                            </div>
                        </div>

                    </form>



                </div>

            @endsection

            @push('scripts')
                <script>
                    //click on image triger of image chosen
                    document.getElementById('thumbnails').addEventListener('click', function(e) {
                        document.getElementById('image').click();
                    });
                    //js image preview
                    document.getElementById('image').addEventListener('change', function(e) {
                        if (this.files && this.files[0]) {
                            document.getElementById('thumbnails').src = URL.createObjectURL(this.files[0])
                        }
                    });
                </script>
            @endpush
