@extends('admin/layoutMaster')
@if(Session::has('message'))
  <script>
      let message = @json(Session::get('message'));
      setTimeout(() => {
        alert(message);
      }, 300);
     
  </script>
@endif
@section('content') 

<div class="content-header" >
    <div class="container-fluid">
      <div class="row mb-2">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Ảnh</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Số điện thoại</th>
              <th scope="col">Mô tả</th>
              <th scope="col">Xoá/Sửa</th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
              <th scope="row"><img id="if1" src="{{asset($user->images)}}" style="width:45px;height:45px;border-radius: 50%;"alt=""></th>
              <td id="if2" class = "if">{{$user->name}}</td>
              <td id="if3" class = "if">{{$user->email}}</td>
              <td id="if4" class = "if">{{$user->phone_number}}</td>     
              <td id="if5" class = "if">{{$user->role->descriptions}}</td>     
              <td>
                <button url="{{route('editUser',$user->id)}}"  type="button" class="btn btn-success sua">Sửa</button>
                @if($user->id_role != 1)
                <a href="{{route('deleteUser',$user->id)}}" onclick="return confirm('Bạn có chắc muốn xoá!')?"> <button type="button" class="btn btn-danger" >Xoá</button></a>
                @endif
                @if($user->id_role === 3)
                <a href={{route('setRole',$user->id)}}><button type="button" class="btn btn-danger">Nâng quyền</button></a>
                @endif
                @if($user->id_role === 2)
                <a href="{{route('setRole',$user->id)}}"><button type="button" class="btn btn-danger">Hạ quyền</button></a>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $users->links() }}
      </div><!-- /.col -->
      </div><!-- /.row -->
    
    </div><!-- /.container-fluid -->
  </div>

  {{-- @include('admin.form') --}}
  @endsection
  
  
  