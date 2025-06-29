@extends('layouts.dashboard')

@section('content')
@if($errors->any())

@foreach($errors->all() as $error)
<li> {{$error}}</li>

@endforeach
@endif
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group mb-3">

                <label for="name">Newsletters Name</label>
                <input type="text" id="news_letter_name" name="news_letter_name"  value="{{old('news_letter_name',$newsletter->news_letter_name)}}"class="form-control">
            </div>
        <div class="class form-group m-3">
         <label for="time">Time period</label>
         <select id="news_letter_time" name="news_letter_time" class="form-control">
            <option value="">Select One</option>
            @foreach($timePeriod as  $key => $time)
            <option value="{{ $key }}">{{ $time }}</option>
            @endforeach
        </select>        </div>
        <div class="class form-group m-3">
            <label for="template">Template</label>
            <select id="news_letter_tempid" name="news_letter_tempid" class="form-control">
                <option value="">Select One</option>
                @foreach($template as $template)
                <option value="{{$template->template_id}}">{{$template->template_name}}</option>
                @endforeach
            </select>
           </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control"></textarea>
            </div>

        </div>

        <div class="col-md-4">
            <div class="form-group mb-3">
                <label for="news_letter_banner">Thumbnail</label>
                <br>
                <img id="thumbnails" src="/test.png" alt="   " height="50">
                <input type="file"  style="display:none"id="news_letter_banner" name="news_letter_banner" class="form-control">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group mb-3">
                <button type="submit" class="btn btn-primary" style="background: #214761">Save</button>
            </div>
        </div>
    </div>

</form>
@endsection

@push('scripts')
<script>
    //click on image triger of image chosen
    document.getElementById('thumbnails').addEventListener('click',function(e){
        document.getElementById('news_letter_banner').click();
    });
    //js image preview
document.getElementById('news_letter_banner').addEventListener('change',function(e){
   if(this.files && this.files[0]){
   document.getElementById('thumbnails').src=URL.createObjectURL(this.files[0])
   }
} );
    </script>
@endpush
