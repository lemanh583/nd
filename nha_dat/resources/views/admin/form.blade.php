 <style>
   ::placeholder{
    color: #dc3545 !important;
}
 </style>
 <div class="login">
    <div class="col-md-6">
    <div class="card card-primary">
      <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
      </div>
      <!-- /.card-header -->
      <!-- form start -->
      <form method ="POST" action="{{route('updateUser')}}" id="formUpdate" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
          <div class="form-group">
            <label for="">id</label>
            <input name="id" id="id" type="text" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="">Name</label>
            <input name="nameUp" id="nameUp" value="{{old('nameUp')}}" type="text" class="form-control" placeholder=" @error('nameUp'){{$message}}@enderror">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input name="emailUp" id="emailUp" value="{{old('emailUp')}}" type="email" class="form-control" placeholder=" @error('emailUp'){{$message}}@enderror">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input name="passUp" id="passUp" value="{{old('passUp')}}"  type="password" class="form-control"  placeholder=" @error('passUp'){{$message}}@enderror">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Số điện thoại</label>
            <input name="phoneUp" id="phoneUp" value="{{old('phoneUp')}}" type="text" class="form-control" placeholder=" @error('phoneUp'){{$message}}@enderror" >
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="role" id="flexRadioDefault1" checked value='3'>
            <label class="form-check-label" >
              Người dùng
            </label>
            <input style = "margin-left: 65px;" class="form-check-input" type="radio" name="role" id="flexRadioDefault2" value='2'>
            <label class="form-check-label"  style = "margin-left: 83px;">
              Quản lý
            </label>
          </div>
        </div>
        <!-- /.card-body -->
        {{-- <div class="form-group" style="width: 91%;margin-left: 20px;"> --}}
          <label for="exampleInputFile">File input @error('file')/{{$message}}@enderror</label>
           <div class="input-group"> 
            <div >
              <input type="file"  name="file" id="exampleInputFile">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
          </div>
        {{-- </div> --}} 

        <div class="card-footer">
          <a href=""><button type="submit" class="btn btn-primary" style=" position: relative;">Submit</button></a>
          <button type="button" class="btn btn-primary huy" style="  position: absolute; margin-left: 300px;">Huỷ</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script>
 
      let clickUpdate = document.getElementsByClassName('sua');
      let den = document.querySelector('.den');
      let login = document.querySelector('.login');
      let huy = document.querySelector('.huy');
      let creatUser = document.querySelector('#addUser');
      let form = document.querySelector('#formUpdate');
      let check = document.querySelector('#flexRadioDefault1');
     
      creatUser.onclick = () => {
          den.classList.add('thaydoi');
          login.classList.add('thaydoi');
          form.reset();
          check.checked = true;
          form.setAttribute('action','http://127.0.0.1:8000/admin/createUser');
      }

      for(let i = 0 ; i < clickUpdate.length;i++){
        clickUpdate[i].onclick = function(){
          den.classList.add('thaydoi');
          login.classList.add('thaydoi');
          form.setAttribute('action','http://127.0.0.1:8000/admin/updateUser');
        };
      };
      huy.onclick = () => {
          den.classList.remove('thaydoi');
          login.classList.remove('thaydoi');
          // check.checked = false;
      };
     
</script>
