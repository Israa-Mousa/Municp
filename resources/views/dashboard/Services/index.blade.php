
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
          <h3 class="card-title">{{ trans('CITIZEN SERVICES') }}</h3>

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


            <a href="{{ route('dashboard.services.create') }}" class="btn btn-sm btn-success float-right">Create</a>
        </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ trans('Name') }}</th>
                        <th>{{ trans('Description') }}</th>
                        <th>{{ trans('PArentID') }}</th>
                        <th colspan="2">{{ __('app.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($services as $service )
                 <tr>
                     <td>@if(Session::get('locale')=="ar"){{ $service->name_ar }}@else{{ $service->name}}@endif </td>
                     <td>@if(Session::get('locale')=="ar"){{ $service->description }}@else{{ $service->description}}@endif </td>
                    <td>{{ $service->parentID }}</td>
                    <td>
                        <a  href="{{ route('dashboard.services.edit',$service->id) }}" class="btn btn-sm btn-warning float-left"> {{ __('Edit') }}</a>
                        </td>
                        <td>
                           <form action="{{route('dashboard.services.delete',$service['id'])}}" method="POST">

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
