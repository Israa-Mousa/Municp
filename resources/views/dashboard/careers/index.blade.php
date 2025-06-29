
@extends('layouts.dashboard')

@section('title',__('careers'))
@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">{{ __('careers') }}</li>
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
          <h3 class="card-title">{{ trans('TOURISM AND ANTIQUITIES') }}</h3>

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

            <a href="{{ route('dashboard.careers.create') }}" class="btn btn-sm btn-success">{{ __('create') }}</a>
        </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ trans('job title') }}</th>
                        <th>{{ trans('created_userID') }}</th>
                        <th>{{ trans('email_careers') }}</th>
                        <th>{{ trans('status') }}</th>
                        <th colspan="2">{{ __('app.actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($careers as $career )
                    <tr>
                        <td>@if(Session::get('locale')=="ar"){{ $career->job_title_ar }}@else{{ $career->job_title}}@endif </td>
                        <td>@if(Session::get('locale')=="ar"){{ $career->created_userID }}@else{{ $career->created_userID}}@endif</td>
                        <td>{{ $career->emai_careers }}</td>
                        <td>{{ $career->status }}</td>

                       <td>
                           <a  href="{{ route('dashboard.careers.edit',$career->id) }}" class="btn btn-sm btn-warning float-left"> {{ __('Edit') }}</a>
                           </td>
                           <td>
                              <form action="{{route('dashboard.careers.delete',$career['id'])}}" method="POST">

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
