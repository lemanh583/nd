@extends('admin/layoutMaster')
@section('content')
<div class="container-fluid">
    <div class="row">
        <form class = "col-sm-6">
            @csrf
            <div class="form-group">
            <label for="exampleInputEmail1">Thêm kiểu nhà đất</label>
            <input type="text" class="form-control category" name="category" placeholder="Nhập kiểu cần thêm">
            </div>
        </form>
        <button type="button" class="btn btn-primary col-sm-1 addCategory" url={{route('addCategory')}} style="height: 50px;margin-top:22px">Thêm</button>
    </div>
    <hr>
    <div class="row">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Kiểu nhà đất</th>
                <th scope="col">Thao tác</th>
            </thead>
            <tbody>
                @foreach($categories as $category)
              <tr>
                <td><input type="text" class="form-control ahihi" name="{{$category->id_category}}" value="{{$category->name}}"></td>
                <td>
                    <button class="btn btn-success suadf" url="{{route('updateCategory',$category->id_category)}}" value="{{$category->id_category}}">Sửa</button>
                    <button class="btn btn-warning xoadf" url="{{route('deleteCategory',$category->id_category)}}" value="{{$category->id_category}}">Xoá</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$categories->links()}}
    </div>
</div>
@endsection