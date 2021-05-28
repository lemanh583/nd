@extends('admin/layoutMaster')
@section('content')
<div class="container-fluid">
    <div class="row">
        <form class = "col-sm-6">
            @csrf
            <div class="form-group">
            <label for="exampleInputEmail1">Thêm Loại</label>
            <input type="text" class="form-control type" name="type" placeholder="Nhập loại cần thêm">
            </div>
        </form>
        <button type="button" class="btn btn-primary col-sm-1 addType" url={{route('addType')}} style="height: 50px;margin-top:22px">Thêm</button>
    </div>
    <hr>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Loại</th>
                <th scope="col">Thao tác</th>
            </thead>
            <tbody>
                @foreach($types as $type)
              <tr>
                <td><input type="text" class="form-control ahihi" name="{{$type->id_type}}" value="{{$type->name}}"></td>
                <td>
                    <button class="btn btn-success suadf" url="{{route('updateType',$type->id_type)}}" value="{{$type->id_type}}">Sửa</button>
                    <button class="btn btn-warning xoadf" url="{{route('deleteType',$type->id_type)}}" value="{{$type->id_type}}">Xoá</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$types->links()}}
    </div>
</div>
@endsection