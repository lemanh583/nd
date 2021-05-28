<link rel="stylesheet" href="{{asset('')}}master.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('')}}plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('')}}dist/css/adminlte.min.css">

<form action="{{route('addDetail')}}" method="POST" enctype="multipart/form-data">
    @csrf
<div class="card card-default">
    <div class="card-header">
        <h3>Tiêu đề</h3>
      <input type="text" class = "form-control" name="tieu_de">

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          {{-- <i class="fas fa-times"></i> --}}
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Loại</label>
            <select class="form-control select2" style="width: 100%;" name="type">
               <option>Chọn loại</option>
               @foreach($types as $type)
                    <option value = "{{$type->id_type}}">{{$type->name}}</option>
                @endforeach
            </select>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Kiểu nhà đất</label>
            <select class="form-control select2"  style="width: 100%;" name="category">
                 <option>Chọn kiểu</option>
                @foreach($categories as $category)
                    <option value="{{$category->id_category}}">{{$category->name}}</option>
                @endforeach   
            </select>
          </div>
          <!-- /.form-group -->
           <!-- /.form-group -->
           <div class="form-group">
            <label>Tỉnh/Thành phố</label>
            <select class="form-control select2" name="province" style="width: 100%;" id="provinces" url="{{route('ajax')}}">
                <option>Chọn Tỉnh</option>
                @foreach($provinces as $province)
                 <option value="{{$province->id_pro}}">{{$province->name}}</option> 
                @endforeach 
            </select>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>Huyện/Phường</label>
            <select class="form-control select2" name="district" id="districts" style="width: 100%;" url="{{route('ajaxVilages')}}">               
               <option >Chọn huyện</option>
            </select>
          </div>

          <div class="form-group">
            <label>Xóm/Thôn</label>
            <select class="form-control select2" name="village" id = "villages" style="width: 100%;">         
                 <option>Chọn xã</option>
            </select>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
              <label>Diện tích(m2)</label>
              <input type="text" class = "form-control" name="area">
            </div>
            <div class="col-sm-5">
              <label>Giá</label>
              <input type="text" class = "form-control" name="amount">
  
            </div>
            </div>
           
          </div>

        </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title">
                    Mô tả
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <textarea id="inputDescription" class="form-control" rows="16" cols="80" style="resize: none" name="mota"></textarea>
                </div>
    
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.form-group -->
  </div>
  <div class="row">
    <div class="col-sm-6">
        <h3>Nhập toạ độ</h3>
        <input type="text" class = "form-control" name="toa_do">
      </div>
      <div class="col-sm-4">
        <h3>Chọn file</h3>
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="file[]" multiple="multiple">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
      </div>
      <div class="col-sm-2">
          <h3>Xác nhận </h3>
        <button class="btn btn-warning" type="submit">Xác nhận</button>
      </div>
  </div>
</form>
  <script src="{{asset('')}}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('')}}dist/js/adminlte.min.js"></script>
<script src="{{asset('index.js')}}"></script>
<script src="{{asset('')}}plugins/summernote/summernote-bs4.min.js"></script>