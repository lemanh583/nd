
@extends('admin/layoutMaster')

{{-- @if(Session::has('message'))
  <script>
      let message = @json(Session::pull('message'));
      setTimeout(() => {
        alert(message);
        message = "";
        }, 200);
  </script>
  {{-- {{session(['message' => ''])}} --}}
{{-- @endif --}} 
@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    <table class="table" >
      <thead>
        <tr>
          <th scope="col">Tên</th>
          <th scope="col">Email</th>
          <th scope="col">kiểu</th>
          <th scope="col">Loại</th>
          <th scope="col">Tiêu đề</th>
          <th scope="col">Hành động</th>
          
        </tr>
      </thead>
      @foreach($listDetail as $detail)
      <tbody>
        <tr>
          <td>{{$detail->nameUser}}</td>
          <td>{{$detail->email}}</td>
          <td>{{$detail->nameCategory}}</td>
          <td>{{$detail->nameType}}</td>
          <td>{{$detail->des}}...</td>
          <td><a href="{{route('viewDetail',$detail->id_detail)}}"><button class = "btn btn-success" >Chi tiết</button></a>
          <a href="{{route('editDetail',$detail->id_detail)}}"><button class = "btn btn-warning">Sửa</button></a>
          <button class = "btn btn-danger xoact" type="button" url="{{route('deleteDetail',$detail->id_detail)}}">Xoá</button></td>   
        </tr>
        @endforeach
      </tbody>
  </table>
  {{ $listDetail->links() }}
    </div>
  </div>
  
</div>
@isset($message)
<script>
  let message = @json($message));
  setTimeout(() => {
    alert(message);
    message = "";
    }, 200);
</script>
@endisset
  @endsection