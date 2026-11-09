@extends('layouts.dashboard')
 @section('title',__('Services'))
  @section('breadcrumb')
   @parent
<li class="breadcrumb-item active">{{ __('Services') }}</li>
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
                <h3 class="card-title">{{ trans('edit Services') }}</h3>

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
                <form action="{{route('dashboard.services.update',$service->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="padding: 20px">
                        <div class="col-md-8">
                            <div class="form-group mb-3">

                                <label for="name">{{__('name')}}</label>
                                <input type="text" id="name" name="name" value="{{old('name',$service->name)}}" class="form-control @error('name') is-invalid @enderror"> @if($errors->has('name'))
                                <p class="text-danger">{{trans($errors->first('name'))}}</p>
                                @endif
                            </div>

                            <div class="form-group mb-3">

                                <label for="name_ar">{{__('name_ar')}}</label>
                                <input type="text" id="name_ar" name="name_ar" value="{{old('name_ar',$service->name_ar)}}" class="form-control @error('name_ar') is-invalid @enderror"> @if($errors->has('name_ar'))
                                <p class="text-danger">{{trans($errors->first('name_ar'))}}</p>
                                @endif
                            </div>

                            <div class="class form-group">
                                <label for="parentID">parentID</label>
                                <select id="parentID" name="parentID" class="form-control @error('status') is-invalid @enderror">
                                        <option value="">Select One</option>
                                        @foreach(\App\Models\Services::all()  as $parent)
                                        <option value="{{$parent->id }}" @if($service->parentID==$parent->id) selected @endif>{{$parent->name}}</option>
                                        @endforeach
                                    </select> @if($errors->has('parentID'))
                                <p class="text-danger">{{$errors->parentID}} </p>
                                @endif
                            </div>




                            <div class="class form-group">

                                <div class="form-group mb-3">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">
                                   {{old('description', $service->description )}}
                                </textarea>
                                </div>
                                @error('description')
                                <p class="text-danger">{{$errors->first('description')}}</p>
                                @enderror

                            </div>
                            <div class="class form-group">

                                <div class="form-group mb-3">
                                    <label for="description_ar">Description_ar</label>
                                    <textarea id="description_ar" name="description_ar" class="form-control @error('description_ar') is-invalid @enderror">
                                        {{old('description_ar', $service->description_ar )}}
                                    </textarea>
                                </div>
                                @error('description_ar')
                                <p class="text-danger">{{$errors->first('description_ar')}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="image">Thumbnail</label>
                                <br> @if($service->icon && \Illuminate\Support\Facades\Storage::disk('public')->exists($service->icon))
                                <img id="thumbnails" src="{{asset('storage/'.$service->icon)}}" alt="{{ $service->name }}" height="60"> @else
                                <img id="thumbnails" src="{{asset('image/services.jpg')}}" alt="{{ $service->name }}" height="60">
                                @endif
                                <input type="file" style="display:none" id="image" name="icon" class="form-control" accept="image/*">
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
