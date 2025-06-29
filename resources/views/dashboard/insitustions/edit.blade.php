@extends('layouts.dashboard')
@section('title',__('Blogs'))
@section('breadcrumb')
@parent
<li class="breadcrumb-item active">{{ __('Blogs') }}</li>
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
                <h3 class="card-title">{{ trans('edit Blogs') }}</h3>

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
                <form action="{{route('dashboard.blogs.update',$blog->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="padding: 20px">
                        <div class="col-md-8">
                            <div class="form-group mb-3">

                                <label for="name">{{__('name')}}</label>
                                <input type="text" id="name" name="name" value="{{old('name',$blog->name)}}" class="form-control @error('name') is-invalid @enderror"> @if($errors->has('name'))
                                <p class="text-danger">{{trans($errors->first('name'))}}</p>
                                @endif
                            </div>

                            <div class="form-group mb-3">

                                <label for="name_ar">{{__('name_ar')}}</label>
                                <input type="text" id="name_ar" name="name_ar" value="{{old('name_ar',$blog->name)}}" class="form-control @error('name_ar') is-invalid @enderror"> @if($errors->has('name_ar'))
                                <p class="text-danger">{{trans($errors->first('name_ar'))}}</p>
                                @endif
                            </div>

                            <div class="class form-group">

                                <div class="form-group mb-3">
                                    <label for="introduction">Introduction</label>
                                    <textarea id="introduction" name="introduction" class="form-control @error('introduction') is-invalid @enderror">{{ old('introduction',$blog->introduction) }}</textarea>
                                </div>
                                @error('introduction')
                                <p class="text-danger">{{$errors->first('introduction')}}</p>
                                @enderror

                            </div>
                            <div class="class form-group">
                                <div class="form-group mb-3">
                                    <label for="introduction_ar">introdcution_ar</label>
                                    <textarea id="introduction_ar" name="introduction_ar" class="form-control @error('introduction_ar') is-invalid @enderror">{{ old('introduction_ar',$blog->introduction_ar) }}</textarea>
                                </div>
                                @error('introduction_ar')
                                <p class="text-danger">{{$errors->first('introduction_ar')}}</p>
                                @enderror
                            </div>




                            <div class="class form-group">
                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description',$blog->description) }}</textarea>
                                </div>
                                @error('description')
                                <p class="text-danger">{{$errors->first('description')}}</p>
                                @enderror
                            </div>
                            <div class="class form-group">
                                <div class="form-group mb-3">
                                    <label for="description_ar">Description_ar</label>
                                    <textarea id="description_ar" name="description_ar" class="form-control @error('description_ar') is-invalid @enderror"> {{ old('description_ar',$blog->description_ar) }}</textarea>
                                </div>
                                @error('description_ar')
                                <p class="text-danger">{{$errors->first('description_ar')}}</p>
                                @enderror
                            </div>

                            <div class="class form-group">
                                <div class="form-group mb-3">
                                    <label for="status">status</label>
                                    <select id="status" name="status" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select One</option>
                                        @foreach($status as $key =>$index)
                                        <option value="{{$key}}" @if($key==old('status',$blog->status)) selected @endif>{{$index}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('status'))
                                    <p class="text-danger">{{$errors->status}} </p>
                                    @endif
                                </div>

                            </div>

                        </div>


                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="blogs_banner">Banner Image</label>
                                <br>
                                @if($blog->blogs_banner)
                                <img id="thumbnails" src="{{ asset('Storage/'.$blog->blogs_banner) }}" alt="   " height="50">
                                @else
                                <img id="thumbnails" src="/test.png" alt="   " height="50">
                                <input type="file" style="display:none" id="blogs_banner" name="blogs_banner" class="form-control">
                             @endif
                            </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="image">Thumbnail2</label>
                                <br>
                                @if($blog->image)
                                <img id="thumbnails2" src="{{ asset('Storage/'.$blog->image) }}" alt="   " height="50">
                                @else
                                <img id="thumbnails2" src="/test.png" alt="   " height="50">
                                <input type="file" style="display:none" id="image" name="image" class="form-control">
                             @endif
                            </div>
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

            @endsection @push('scripts')
            <script>
                //click on image triger of image chosen
                document.getElementById('thumbnails').addEventListener('click', function(e) {
                    document.getElementById('blogs_banner').click();
                });
                //js image preview
                document.getElementById('blogs_banner').addEventListener('change', function(e) {
                    if (this.files && this.files[0]) {
                        document.getElementById('thumbnails').src = URL.createObjectURL(this.files[0])
                    }
                });
                document.getElementById('thumbnails2').addEventListener('click', function(e) {
                    document.getElementById('image').click();
                });
                //js image preview
                document.getElementById('image').addEventListener('change', function(e) {
                    if (this.files && this.files[0]) {
                        document.getElementById('thumbnails2').src = URL.createObjectURL(this.files[0])
                    }
                });
            </script>
            @endpush
