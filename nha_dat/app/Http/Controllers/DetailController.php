<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\districts;
use App\villages;
use App\maps;
use App\detail;
use Auth;
use App\User;
use App\images;

class DetailController extends Controller
{
    public function showlistDetail(){

        $listDetail = DB::table('provinces')
                            ->join('districts','provinces.id_pro','=','districts.id_pro')
                            ->join('villages','districts.id_dis','=','villages.id_dis')
                            ->join('maps','villages.id_vil','=','maps.id_vil')
                            ->join('details','maps.id_map','=','details.id_map')
                            ->join('types','details.id_type','=','types.id_type')
                            ->join('categories','details.id_category','=','categories.id_category')
                            // ->join('images','details.id_detail','=','images.id_detail')
                            ->join('users','details.id','=','users.id')
                            ->select('users.name as nameUser',
                                        'users.email' ,
                                        'categories.name as nameCategory',
                                        'types.name as nameType',
                                        // 'details.title',
                                        'details.id_detail',
                                        DB::raw("substr(details.title,1,15) as des ")
                                    )
                            ->paginate(10);
        return view('admin.detail',compact('listDetail'));
        // dd($listDetail);
    }

    public function viewDetail($id){
        $detail = DB::table('provinces')
                            ->join('districts','provinces.id_pro','=','districts.id_pro')
                            ->join('villages','districts.id_dis','=','villages.id_dis')
                            ->join('maps','villages.id_vil','=','maps.id_vil')
                            ->join('details','maps.id_map','=','details.id_map')
                            ->join('types','details.id_type','=','types.id_type')
                            ->join('categories','details.id_category','=','categories.id_category')
                            ->join('images','details.id_detail','=','images.id_detail')
                            ->join('users','details.id','=','users.id')
                            ->where('details.id_detail','=',$id)
                            ->select(
                                    'users.name as nameUser',
                                        'users.email' ,
                                        'categories.name as nameCategory',
                                        'types.name as nameType',
                                        'details.title',
                                        'details.descriptions',
                                        'details.area',
                                        'details.amount',
                                        'provinces.name as tinh',
                                        'districts.name as huyen',
                                        'villages.name as xa',
                                        'provinces.id_pro',
                                        'villages.id_vil',
                                        'districts.id_dis',
                                        'images.url',
                                        'images.id_img',
                                        'maps.coordinates'
                                    )
                            ->get();
        $data = $detail[0]->coordinates;
        $coordiantes = explode(',',  $data);
        $lat = $coordiantes[0];
        $lng = $coordiantes[1];
        $Types = DB::table('types')->get();
        $categories = DB::table('categories')->get();
        $provinces = DB::table('provinces')->get();
        $districts = DB::table('districts')->where('districts.id_pro','=',$detail[0]->id_pro)->get();
        $villages = DB::table('villages')->where('villages.id_dis','=',$detail[0]->id_dis)->get();  
        // dd($Types);
        return view('admin.formDetail',compact('detail','Types','categories','provinces',
                                'districts','villages','lat','lng'
                    ));
        // return response()->json(compact('detail','Types','categories','provinces',
        //                         'districts','villages'),200);
                            
    }

    public function editDetail($id){
        $detail = DB::table('provinces')
                            ->join('districts','provinces.id_pro','=','districts.id_pro')
                            ->join('villages','districts.id_dis','=','villages.id_dis')
                            ->join('maps','villages.id_vil','=','maps.id_vil')
                            ->join('details','maps.id_map','=','details.id_map')
                            ->join('types','details.id_type','=','types.id_type')
                            ->join('categories','details.id_category','=','categories.id_category')
                            ->join('images','details.id_detail','=','images.id_detail')
                            ->join('users','details.id','=','users.id')
                            ->where('details.id_detail','=',$id)
                            ->select(
                                    'users.name as nameUser',
                                        'users.email' ,
                                        'categories.name as nameCategory',
                                        'types.name as nameType',
                                        'details.title',
                                        'details.descriptions',
                                        'details.area',
                                        'details.amount',
                                        'provinces.name as tinh',
                                        'districts.name as huyen',
                                        'villages.name as xa',
                                        'provinces.id_pro',
                                        'villages.id_vil',
                                        'districts.id_dis',
                                        'images.url',
                                        'images.id_img',
                                        'maps.coordinates',
                                        'details.id_detail'
                                    
                                    )
                            ->get();
        $data = $detail[0]->coordinates;
        $coordiantes = explode(',',  $data);
        $lat = $coordiantes[0];
        $lng = $coordiantes[1];
         $Types = DB::table('types')->get();
        $categories = DB::table('categories')->get();
        $provinces = DB::table('provinces')->get();
        $districts = DB::table('districts')->where('districts.id_pro','=',$detail[0]->id_pro)->get();
        $villages = DB::table('villages')->where('villages.id_dis','=',$detail[0]->id_dis)->get();  
        return view('admin.updateDetail',compact('detail','Types','categories','provinces',
                                'districts','villages','lat','lng'
                    ));

    }

    public function updateDetail(Request $request){
        // dd($request->all());
        $id = $request->input('id');
        $title = $request->input('tieu_de');
        $type = $request->input('type');
        $category = $request->input('category');
        $area = $request->input('area');
        $amount = $request->input('amount');
        $mota = $request->input('mota');
        $toa_do = $request->input('toa_do');

        if($request->hasFile('file')){
            $detail = detail::find($id);
            $detail->title = $title;
            $detail->amount = $amount;
            $detail->area = $area;
            $detail->descriptions = $mota;
            $detail->id_category = $category;
            $detail->id_type = $type;
            $detail->save();

            $map = maps::find($detail->id_map);
            $map->coordinates =  $toa_do;
            $map->save();

            $images = $request->file('file');
            foreach( $images as $img){
                $image = new images;
                $image->url = Storage::url($img->store('public/detail_img'));
                $image->id_detail = $id;
                $image->save();    
            }
        }
        else{
            $detail = detail::find($id);
            $detail->title = $title;
            $detail->amount = $amount;
            $detail->area = $area;
            $detail->descriptions = $mota;
            $detail->id_category = $category;
            $detail->id_type = $type;
            $detail->save();
    
            $map = maps::find($detail->id_map);
            $map->coordinates =  $toa_do;
            $map->save();
        }
        return redirect()->route('showlistDetail')->with('message','Sửa thành công');
    }

    public function deleteDetail($id){
        $images = DB::table('images')->where('id_detail','=',$id)->delete();
        $detail = detail::find($id);
        $detail->delete();
        $message = "xoá thành công";
        return response()->json(compact('message'), 200);
    }

    public function ajax(Request $request){
        $req = $request->get('name');
        $districts = districts::all()->where('id_pro','=',$req);
        // $villages = villages::all()->where('id_dis','=',$districts->id_dis);
        return response()->json(compact('districts'), 200);
    }

    public function ajaxVilages(Request $request){
        $req = $request->get('name');
        $villages = villages::all()->where('id_dis','=',$req);
        return response()->json(compact('villages'), 200);
    }

    public function showAddDetail(){
        $provinces = DB::table('provinces')->get();
        $types = DB::table('types')->get();
        $categories = DB::table('categories')->get();
        // dd($categories);
        return view('admin.formAddDetail',compact('provinces','types','categories'));
    }
    
    public function addDetail(Request $request){
            // dd($request->all());
            $title = $request->input('tieu_de');
            $type = $request->input('type');
            $category = $request->input('category');
            $village = $request->input('village');
            $area = $request->input('area');
            $amount = $request->input('amount');
            $mota = $request->input('mota');
            $toa_do = $request->input('toa_do');
            $file = $request->file('file');

            //thêm bảng maps
            $map = new maps;
            $map->coordinates = $toa_do;
            $map->id_vil = $village;
            $map->save();
            
            //lấy idmap mới thêm
            $id_map = DB::table('maps')->select(DB::raw('MAX(id_map) as idMax'))->get();
            // dd($id_map);
            // dd()

            //thêm bảng detail
            $detail = new detail;
            $detail->title = $title;
            $detail->amount = $amount;
            $detail->area = $area;
            $detail->descriptions = $mota;
            $detail->id_category = $category;
            $detail->id_type = $type;
            $detail->id_map = $id_map[0]->idMax;
            $detail->id = Auth::user()->id;
            $detail->save();

            $id_detail = DB::table('details')->select(DB::raw('MAX(id_detail) as idMax'))->get();

            //thêm bảng images
           
            foreach($file as $img){
                $image = new images;
                $image->url = Storage::url($img->store('public/detail_img'));    
                $image->id_detail = $id_detail[0]->idMax;
                $image->save();
            }

            return redirect()->back();
            // dd($type);
    }
    
    public function deleteImgAjax($id){
            $image = images::find($id);
            $image->delete();
            $message = "Xoá ảnh thành công";
            return response()->json(compact('message'), 200);
    }

    public function searchDetail(Request $request){
        $title = $request->input('search');
        // $listDetail = detail::Where('title','LIKE', '%'.$title.'%')->get();
        $listDetail = DB::table('provinces')
        ->join('districts','provinces.id_pro','=','districts.id_pro')
        ->join('villages','districts.id_dis','=','villages.id_dis')
        ->join('maps','villages.id_vil','=','maps.id_vil')
        ->join('details','maps.id_map','=','details.id_map')
        ->join('types','details.id_type','=','types.id_type')
        ->join('categories','details.id_category','=','categories.id_category')
        ->join('users','details.id','=','users.id')
        ->where('details.title','LIKE', '%'.$title.'%')
        ->select('users.name as nameUser',
                    'users.email' ,
                    'categories.name as nameCategory',
                    'types.name as nameType',
                    'details.title',
                    'details.id_detail',
                    DB::raw("substr(details.descriptions,1,15) as des ")
                )
        ->paginate(10);

        return view('admin.detail',compact('listDetail'));
    }

}
