@extends('admin/layoutMaster')
@section('content')
<div class="container-fluid">
<h6>Chọn tỉnh </h6>
<div class="row">
    <div class="col-sm-6">
        <select name="selectPro" id="" class="form-control pro" url = "{{route('showDistricts')}}" 
            update = "{{route('updateDistrict')}}"  delete="{{route('deleteDistrict')}}"
        >
            <option value="">Chọn tỉnh cần thêm</option>
            @foreach($provinces as $province)
            <option value="{{$province->id_pro}}">{{$province->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="row">
    <form class = "col-sm-6">
        <div class="form-group">
        <label for="exampleInputEmail1">Thêm huyện</label>
        <input type="text" class="form-control" id="district" placeholder="Nhập huyện cần thêm">
        </div>
    </form>
    <button type="button" class="btn btn-primary col-sm-1 addDistrict" style="height: 50px;margin-top:22px" url="{{route('addDistrict')}}">Thêm</button>
    {{-- <button type="button" class="btn btn-primary col-sm-3" style="height: 50px;margin-top:22px;margin-left:20px">Xem danh sách các huyện</button> --}}
</div>
<hr>
<div class="row">
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Huyện</th>
            <th scope="col">Thao tác</th>
        </thead>
        <tbody class="bodytable">
          
         
        </tbody>
    </table>
</div>
</div>


@endsection