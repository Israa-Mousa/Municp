
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
          <h3 class="card-title">{{ trans('Blogs and news') }}</h3>

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

      <div class="table-toolbar mb-3 d-flex justify-content-between" style="justify-content: space-evenly!important">

        <div>
            <form  class="d-flex">
          <input type="text" name="search" placeholder="{{__('search')}}"class="form-control"id="search" value="">
          <button type="submit" class="btn btn-dark ml-2"> Search</button>
        </form>
        </div>

        <div>

            {{-- <form action="{{route('dashboard.blogs.store')}}" method="Post">
                @csrf
                <button type="submit" class="btn btn-sm btn-success float-right">{{ __('create') }}</button>
            </form> --}}
            <a href="{{ route('dashboard.blogs.create') }}" class="btn btn-sm btn-success float-right">Create</a>
        </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ trans('Name') }}</th>
                        <th>{{ trans('Description') }}</th>
                        <th>{{ trans('Introduction') }}</th>
                        <th>@lang('Created User')</th>
                        <th>{{ trans('Created At') }}</th>
                        <th colspan="2">{{ __('app.actions') }}</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data as $blog )
                    <tr>
                      @if(Session::get('locale')=="ar")
                    <td><a href="pages/examples/invoice.html">{{ $blog['name_ar'] }}</a></td>
                    <td>{{ $blog['introduction_ar'] }}</td>
                     @else
                     <td><a href="pages/examples/invoice.html">{{ $blog['name'] }}</a></td>
                     <td>{{ $blog['introduction'] }}</td>
                     @endif
                    @if($blog['status']=='active')
                    <td><span class="badge badge-success" >Active</span></td>
                    @else
                    <td><span class="badge badge-secondary" >nonActive</span></td>
                    @endif
                   <td>{{ $blog['created_at'] }}</td>
                   <td></td>
                   <td>
                   <a href="{{ route('dashboard.blogs.edit',$blog['id'])}}" class="btn btn-sm btn-warning float-left"> {{ __('Edit') }}</a>
                   </td>

                   <td>
                      <form action="{{route('dashboard.blogs.delete',$blog['id'])}}" method="GET">

                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-sm btn-danger float-right">{{ __('Delete') }}</button>
                      </form>
                  </td>
                    </tr>
                    @endforeach

                    </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        </div>
      </div>

        @endsection
