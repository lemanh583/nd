@extends('admin/layoutMaster')
@section('content')
<div class="container-fluid">
    <div class="row">
        <form class = "col-sm-6">
            @csrf
            <div class="form-group">
            <label for="exampleInputEmail1">Thêm tỉnh</label>
            <input type="text" class="form-control province" name="province" placeholder="Nhập tỉnh cần thêm">
            </div>
        </form>
        <button type="button" class="btn btn-primary col-sm-1 addProvince" url={{route('addProvince')}} style="height: 50px;margin-top:22px">Thêm</button>
    </div>
    <hr>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Tỉnh</th>
                <th scope="col">Thao tác</th>
            </thead>
            <tbody>
                @foreach($provinces as $province)
              <tr>
                <td><input type="text" class="form-control ahihi" name="{{$province->id_pro}}" value="{{$province->name}}"></td>
                <td>
                    <button class="btn btn-success suadf" url="{{route('updateProvince',$province->id_pro)}}" value="{{$province->id_pro}}">Sửa</button>
                    <button class="btn btn-warning xoadf" url="{{route('deleteProvince',$province->id_pro)}}" value="{{$province->id_pro}}">Xoá</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$provinces->links()}}
    </div>
</div>
@endsection