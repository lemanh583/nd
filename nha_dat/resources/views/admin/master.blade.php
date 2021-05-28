@extends('admin/layoutMaster')
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$countUser}}</h3>

          <p>User</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="{{route('showListUsers')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$countMod}}</h3>

          <p>Moderator</p>
        </div>
        <div class="icon">
          <i class="fas fa-user-cog"></i>
        </div>
        <a href="{{route('showListMods')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
         <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$countDetail}}</h3>

          <p>Số lượng bài viết</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="{{route('showlistDetail')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      {{-- <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div> --}}
    </div>
     {{-- ./col  --}}
  </div>
</div>

{{-- @include('admin/form') --}}

@endsection