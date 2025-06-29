
@extends('layouts.dashboard')

@section('title',__('Blogs'))
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('Blogs') }}</li>
@endsection

{{-- {{dd($projects)  }} --}}
  <!-- Main content -->
  @section('content')
  <section class="content">
    <div class="container-fluid">
      <!-- Info boxes -->
      @include('dashboard.subview')
      <!-- /.row -->
      <div class="card">
        <div class="card-header border-transparent">
          <h3 class="card-title">{{ trans('PROJECTS AND ACHIEVEMENTS') }}</h3>

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


            <a href="{{ route('dashboard.projects.create') }}" class="btn btn-sm btn-success float-right">Create</a>
        </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ trans('Name') }}</th>
                        <th>{{ trans('Introduction') }}</th>
                        <th>{{ trans('imgae') }}</th>
                        <th>@lang('status')</th>
                        <th>{{ trans('City') }}</th>
                        <th colspan="2">{{ __('app.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $projects as $project )

                    <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->introduction }}</td>

                @if($project->image)
                {{-- <td><img src="{{Storage::url($project->image)}}" height="60" /></td> --}}

                <td><img src="{{asset('storage/'.$project->image)}}" height="60" /></td>
                @else
                <td><img src="{{asset('image/services.jpg')}}" height="60" /></td>
                @endif

                    <td>{{ $project->status }}</td>
                    <td>  {{__($cities['Cities'][$project->city]['name'])}}</td>
                {{-- {{ dd($project->id) }} --}}
                    <td>
                        <a  href="{{ route('dashboard.projects.edit',$project->id) }}" class="btn btn-sm btn-warning float-left"> {{ __('Edit') }}</a>
                        </td>
                        <td>
                           <form action="{{route('dashboard.projects.delete',$project['id'])}}" method="POST">

                               @csrf
                               @method('delete')
                               <button type="submit" class="btn btn-sm btn-danger float-right">{{ __('Delete') }}</button>
                            </form>
                            {{-- <a href="{{ route('dashboard.projects.delete',$project->id)}}">Destroy</a> --}}

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
