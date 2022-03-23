@extends('admin.admin_master')


@section('admin_dashboard_content')






<div class="container-fluid">
  <div class="db-breadcrumb">
    <h4 class="breadcrumb-title">Events</h4>
    <ul class="db-breadcrumb-list">
      <li><a href="{{route('admin.home')}}"><i class="fa fa-home"></i>Home</a></li>
      <li>Event Details</li>
    </ul>
  </div>
  <!-- Card -->
  <div class="row match-height">
    <!-- Base Nav starts -->
    <div class="col-md-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">{{$events->event_title}}</h4>
          <div class="col">



          <a class="float-right" href="{{route('manage-events')}}"><i class="fa fa-home fa-2x"></i></a>
          <a class="float-right" href="/admin/home/events/event-details/view/{{$events->id}}"><i class="fa fa-eye fa-2x"></i></a>




          <a class="float-right" href="#"  data-toggle="modal" data-target="#EventDetailsAddModal"><i class="fa fa-plus-square fa-2x"></i></a>
            @include('backend.modals.event_detailsaddmodal')

          


            </div>
        </div>

        <div class="card-body">


        </div>
      </div>
    </div>
    <!-- Base Nav ends -->


  </div>


</div>

@endsection
