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
  .carousel-inner > .item > img {
    width:620px;
    height:340px;
  }
  #map {
    height: 370px;
    width: 230%;}

</style>
<div class="card card-default">
    <div class="card-header">
      <div class="row">
      <h3 class="card-title col-sm-6">{{$detail[0]->title}}</h3>

      <h3 class="card-title col-sm-3">{{$detail[0]->nameUser}} |</h3>
      <h3 class="card-title col-sm-3">{{$detail[0]->email}}</h3>
    </div>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
        <button type="button" class="btn btn-tool" data-card-widget="remove">
          <i class="fas fa-times"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Loại</label>
            <select class="form-control select2" style="width: 100%;">
              @foreach($Types as $type)
              @if($detail[0]->nameType === $type->name)
                <option selected>{{$type->name}}</option>
               @else 
               <option>{{$type->name}}</option>
               @endif
             @endforeach

              
            </select>
          </div>
          <!-- /.form-group -->
          <div class="form-group">
            <label>Kiểu nhà đất</label>
            <select class="form-control select2"  style="width: 100%;">

                @foreach($categories as $category)
                @if($detail[0]->nameCategory === $category->name)
                  <option selected>{{$category->name}}</option>
                 @else 
                 <option>{{$category->name}}</option>
                 @endif
               @endforeach
           
            </select>
          </div>
          <!-- /.form-group -->
           <!-- /.form-group -->
           <div class="form-group">
            <label>Tỉnh/Thành phố</label>
            <select class="form-control select2"  style="width: 100%;" id="provinces" url="{{route('ajax')}}">
                
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
            <label>Huyện/Phường</label>
            <select class="form-control select2" id="districts" style="width: 100%;" url="{{route('ajaxVilages')}}">    
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
            <label>Xóm/Thôn</label>
            <select class="form-control select2" id = "villages" style="width: 100%;">
                
                @foreach($villages as $village)
                @if($detail[0]->xa === $village->name)
                  <option selected>{{$village->name}}</option>
                 @else 
                 <option>{{$village->name}}</option>
                 @endif
               @endforeach
           
            </select>
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-sm-1"></div>
              <div class="col-sm-5">
              <label>Diện tích(m2)</label>
              <input type="text" class = "form-control" value = "{{$detail[0]->area}}">
            </div>
            <div class="col-sm-5">
              <label>Giá</label>
              <input type="text" class = "form-control" value = "{{$detail[0]->amount}}">
  
            </div>
            </div>
           
          </div>

        </div>
          <div class="row">
            <div class="col-sm-12 col-md-12">
              <div class="card card-outline card-info">
                <div class="card-header">
                  <h3 class="card-title">
                    Mô tả
                  </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <textarea id="inputDescription" class="form-control" rows="16" cols="80" style="resize: none">{{$detail[0]->descriptions}}</textarea>
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
                  <img class="d-block w-100" src="{{asset($b->url)}}"  style="height:340px;" alt="Second slide">
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
            {{-- <div>{!!$detail[0]->coordinates!!}</div> --}}
          </div>
        </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
      </div>
      {{-- <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6"><h1 style="margin-left: 140px">Danh sách hình ảnh</h1></div>
        <div class="col-sm-3"></div>
      </div>
      <div class="row">
          <div class="col-sm-3"></div>
          <div class="col-sm-6">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                </tr>
              </thead>
              <tbody>
                @foreach($detail as $a)
                <tr>
                  <th scope="row">{{$a->id_img}}</th>
                  <td>{{$a->url}}</td>
                  <td><button class="btn btn-success">Xoá</button></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <div class="col-sm-3"></div>
      </div> --}}
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
      {{-- Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
      the plugin. --}}
    </div>
  </div>
  <script src="{{asset('')}}plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('')}}plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('')}}dist/js/adminlte.min.js"></script>
<script src="{{asset('index.js')}}"></script>
<script src="{{asset('')}}plugins/summernote/summernote-bs4.min.js"></script>