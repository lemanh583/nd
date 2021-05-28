@extends('admin/layoutMaster')
@section('content')
<div class="container-fluid">
<h6>Chọn tỉnh </h6>
<div class="row">
    <div class="col-sm-6">
        <select name="province" id="provinces" class="form-control pro" url="{{route('ajax')}}"
            update delete
        >
            <option value="">Chọn tỉnh cần thêm</option>
            @foreach($provinces as $province)
            <option value="{{$province->id_pro}}">{{$province->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<h6>Chọn huyện </h6>
<div class="row">
    <div class="col-sm-6">
        <select name="district" id="districts" class="form-control pro" url = "{{route('showVillages')}}" 
            update="{{route('updateVillages')}}" delete="{{route('deleteVillages')}}"
        >
        </select>
    </div>
</div>
<div class="row">
    <form class = "col-sm-6">
        <div class="form-group">
        <label for="exampleInputEmail1">Thêm xã</label>
        <input type="text" class="form-control" id="village" placeholder="Nhập xã cần thêm">
        </div>
    </form>
    <button type="button" class="btn btn-primary col-sm-1 addVillages" style="height: 50px;margin-top:22px" url="{{route('addVillages')}}">Thêm</button>
</div>
<hr>
<div class="row">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Tỉnh</th>
            <th scope="col">Thao tác</th>
        </thead>
        <tbody class="bodytable">
          
         
        </tbody>
    </table>
</div>
</div>


@endsection