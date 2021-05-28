<link rel="stylesheet" href="{{asset('')}}master.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('')}}plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('')}}dist/css/adminlte.min.css">
  <link rel="stylesheet" href="{{asset('')}}plugins/summernote/summernote-bs4.min.css">
<style>
  .carousel { width:620px; height:340px; }
  #map {
    height: 370px;
    width: 230%;}
</style>
<form action="{{route('updateDetail')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" value ="{{$detail[0]->id_detail}}" name="id">
<div class="card card-default">
    <div class="card-header">
      <div class="row">
        <h3>Tiêu đề</h3><h3 style="margin-left: 700px">{{$detail[0]->nameUser}} |</h3>
        <h3 >{{$detail[0]->email}}</h3>
        <input type="text" class = "form-control" name="tieu_de" value = "{{$detail[0]->title}}">
        {{-- <input type="hidden" name="id_user" value = ""> --}}
    </div>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          {{-- <i class="fas fa-minus"></i> --}}
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
            <select class="form-control select2" style="width: 100%;"  name="type">
              @foreach($Types as $type)
              @if($detail[0]->nameType === $type->name)
                <option selected value='{{$type->id_type}}'>{{$type->name}}</option>
               @else 
               <option value="{{$type->id_type}}">{{$type->name}}</option>
               @endif
             @endforeach

              
            </select>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Kiểu nhà đất</label>
            <select class="form-control select2"  style="width: 100%;"  name="category">

                @foreach($categories as $category)
                @if($detail[0]->nameCategory === $category->name)
                  <option selected value="{{$category->id_category}}">{{$category->name}}</option>
                 @else 
                 <option value="{{$category->id_category}}">{{$category->name}}</option>
                 @endif
               @endforeach
           
            </select>
          </div>
          <!-- /.form-group -->
           <!-- /.form-group -->
           <div class="form-group">
            <label>Tỉnh</label>
            <select class="form-control select2"  style="width: 100%;" id="provinces" url="{{route('ajax')}}" name="province">
                
                @foreach($provinces as $province)
                @if($detail[0]->tinh === $province->name)
                  <option selected value={{$province->id_pro}}>{{$province->name}}</option>
                 @else 
                 <option value={{$province->id_pro}}>{{$province->name}}</option>
                 @endif
               @endforeach
           
            </select>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label>Huyện</label>
            <select class="form-control select2" id="districts" name="district" style="width: 100%;" url="{{route('ajaxVilages')}}">    
                @foreach($districts as $district)
                @if($detail[0]->huyen === $district->name)
                  <option selected value="{{$district->id_dis}}">{{$district->name}}</option>
                 @else 
                 <option value="{{$district->id_dis}}">{{$district->name}}</option>
                 @endif
               @endforeach
           
            </select>
          </div>

          <div class="form-group">
            <label>Xã</label>
            <select class="form-control select2" id = "villages" name="village" style="width: 100%;">
                
                @foreach($villages as $village)
                @if($detail[0]->xa === $village->name)
                  <option selected value="{{$village->id_vil}}">{{$village->name}}</option>
                 @else 
                 <option value="{{$village->id_vil}}">{{$village->name}}</option>
                 @endif
               @endforeach
           
            </select>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
              <label>Diện tích(m2)</label>
              <input type="text" class = "form-control" value = "{{$detail[0]->area}}" name="area">
            </div>
            <div class="col-sm-5">
              <label>Giá</label>
              <input type="text" class = "form-control" value = "{{$detail[0]->amount}}" name="amount">
  
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
                  <textarea id="inputDescription" class="form-control" rows="16" cols="80" style="resize: none" name="mota">{{$detail[0]->descriptions}}</textarea>
                </div>
    
              </div>
            </div>
            <!-- /.col-->
          </div>
          <!-- /.form-group -->
          <div class="row">
          <div class="col-sm-6" >
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{asset($detail[0]->url)}}"  alt="First slide" style="height:340px;">
                </div>
                @foreach($detail as $b)
                @if($b->url != $detail[0]->url )
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{asset($b->url)}}"  alt="Second slide" style="height:340px;">
                </div>
                @endif
                @endforeach
                {{-- <div class="carousel-item ">
                  <img class="d-block w-100" src="https://cellphones.com.vn/sforum/wp-content/uploads/2020/04/LR-29-scaled.jpg" alt="Third slide">
                </div> --}}
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          {{-- <div class="col-sm-1"></div> --}}
          @include('admin/script')
          <div class="col-sm-5" style="margin-left: 106%;margin-top: -54%;">
            <div id="map">

            </div>
            <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKHLBgd9aVkhm4QqTgd2267j6DSLW7he8&callback=initMap&libraries=&v=weekly"
        async></script>
        </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        {{-- <div class="col-sm-3"></div> --}}
        <div class="col-sm-6"><h1 style="margin-left: 140px">Danh sách hình ảnh</h1></div>
        {{-- <div class="col-sm-3"></div> --}}
      </div>
      <div class="row">
          {{-- <div class="col-sm-3"></div> --}}
          <div class="col-sm-6">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Ảnh</th>
                  <th scope="col">Hành động</th>
                  
                </tr>
              </thead>
              <tbody>
                @foreach($detail as $a)
                <tr>
                  {{-- <th scope="row">{{$a->id_img}}</th> --}}
                  {{-- <td>{{$a->url}}</td> --}}
                  <td><img src="{{asset($a->url)}}" alt="" height="100px" width="200px"></td>
                  <td><button class="btn btn-success xoaimg" url-data="{{route('deleteImgAjax',$a->id_img)}}" type ="button">Xoá</button></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-sm-6">
            <h3>Toạ độ bản đồ</h3>
            <input type="text" class = "form-control" name="toa_do" value = "{{$detail[0]->coordinates}}">

            <h3>Chọn file</h3>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="file[]" multiple="multiple">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
            <br>
            {{-- <h3>Xác nhận </h3> --}}
            <button class="btn btn-warning" type="submit" style="margin-left: 550px; margin-top: 20px;">Xác nhận</button>
          </div>
      </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
     
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