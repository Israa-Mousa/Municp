@extends('layouts.dashboard')

@section('title', __('tourisms'))
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('tourisms') }}</li>
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
                    <h3 class="card-title">{{ trans('create tourisms') }}</h3>

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
                    <form action="{{ route('dashboard.tourisms.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row" style="padding: 20px">
                            <div class="col-md-8">
                                <div class="form-group mb-3">

                                    <label for="name">{{ __('name') }}</label>
                                    <input type="text" id="name" name="name"
                                        value="{{ old('name', $tourisms->name) }}"
                                        class="form-control @error('name') is-invalid @enderror">

                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ trans($errors->first('name')) }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-3">

                                    <label for="name_ar">{{ __('name_ar') }}</label>
                                    <input type="text" id="name_ar" name="name_ar"
                                        value="{{ old('name_ar', $tourisms->name) }}"
                                        class="form-control @error('name_ar') is-invalid @enderror">

                                    @if ($errors->has('name_ar'))
                                        <p class="text-danger">{{ trans($errors->first('name_ar')) }}</p>
                                    @endif
                                </div>


                                <div class="class form-group">

                                    <div class="form-group mb-3">
                                        <label for="location">location</label>
                                        <textarea id="location" name="location" class="form-control @error('location') is-invalid @enderror"></textarea>
                                    </div>
                                    @error('location')
                                        <p class="text-danger">{{ $errors->first('location') }}</p>
                                    @enderror

                                </div>
                                <div class="class form-group">

                                    <div class="form-group mb-3">
                                        <label for="location_ar">location_ar</label>
                                        <textarea id="location_ar" name="location_ar" class="form-control @error('location_ar') is-invalid @enderror"></textarea>
                                    </div>
                                    @error('location_ar')
                                        <p class="text-danger">{{ $errors->first('location_ar') }}</p>
                                    @enderror
                                </div>


                                <div class="class form-group">

                                    <div class="form-group mb-3">
                                        <label for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                                    </div>
                                    @error('description')
                                        <p class="text-danger">{{ $errors->first('description') }}</p>
                                    @enderror

                                </div>
                                <div class="class form-group">

                                    <div class="form-group mb-3">
                                        <label for="description_ar">Description_ar</label>
                                        <textarea id="description_ar" name="description_ar" class="form-control @error('description_ar') is-invalid @enderror"></textarea>
                                    </div>
                                    @error('description_ar')
                                        <p class="text-danger">{{ $errors->first('description_ar') }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="image">Thumbnail</label>
                                    <br>
                                    <img id="thumbnails" src="{{ asset('assets/App/images/access/top_view.jpg') }}" alt="{{ __('Tourism image preview') }}" height="50">
                                    <input type="file" style="display:none" id="image" name="image[]"
                                        class="form-control" multiple>
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
    </section>
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
