<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\provinces;
use App\districts;
use App\villages;
use App\types;
use App\categories;

class DefaultController extends Controller
{
    public function showDefaultProvinces()
    {
        $provinces = provinces::paginate(10);
        return view('admin.defaultProvince',compact('provinces'));
    }
    public function addProvince(Request $request)   
    {       
        $name = $request->get('name');
        if(provinces::where('name','=', $name)->exists()){
            $message = "Đã tồn tại tỉnh này";
            return response()->json(compact('message'), 200);
        }else{
            $province = new provinces;
            $province->name = $name;
            $province->save();
            $message = "Thêm thành công";
        return response()->json(compact('message'), 200);
        }
       
    }
    public function updateProvince(Request $request,$id)
    {
        $name = $request->get('name');
        if(provinces::where('name','=', $name)->exists()){
            $message = "Tỉnh này đã tồn tại";
        }else{
            $province = provinces::find($id);
            $province->name = $name;
            $province->save();
            $message = "Sửa thành công";
        }
        return response()->json(compact('message'), 200);
    }

    public function deleteProvince($id)
    {
        $district = districts::where('id_pro','=',$id)->get();
        foreach($district as $dt){
            $village = villages::where('id_dis','=',$dt->id_dis)->delete();
            $dt->delete();
        }
        $province = provinces::find($id)->delete();
        $message = "Xoá thành công";
       return response()->json(compact('message'), 200);
    }

    public function showDefaultDistricts()
    {
        $provinces = provinces::all();
        return view('admin.defaultDistrict',compact('provinces'));
    }

    public function showDistricts(Request $request)
    {
        $id = $request->get('id');
        $districts = districts::where('id_pro','=',$id)->get();
        return response()->json(compact('districts'), 200);
    }

    public function addDistrict(Request $request)
    {
       $id = $request->get('id');
       $name = $request->get('name');
       if(districts::where('name','=', $name)->exists()){
           $message = "Đã tồn tại tỉnh này";
       }else{
            $district = new districts;
            $district->name = $name;
            $district->id_pro = $id;
            $district->save();
            $message = "Thêm thành công";
       }
       return response()->json(compact('message'), 200);
    }

    public function updateDistrict(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $district = districts::find($id);
        $district->name = $name;
        $district->save();
        $message = "Sửa thành công";
        return response()->json(compact('message'), 200);
    }
    public function deleteDistrict(Request $request)
    {
        $id = $request->get('id');
        $villages = villages::where('id_dis','=',$id )->get();
        foreach($villages as $village){
            $village->delete();
        }
        $district = districts::find($id)->delete();
        $message = "Xoá thành công";
        return response()->json(compact('message'), 200);
    }

    public function showDefaultVillages()
    {
        $provinces = provinces::all();
        return view('admin.defaultVillage',compact('provinces'));
    }

    public function showVillages(Request $request)
    {
        $id = $request->get('id');
        $villages = villages::where('id_dis','=',$id)->get();
        return response()->json(compact('villages'), 200);
    }

    public function addVillages(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        if(villages::where('name','=', $name)->exists()){
            $message = "Đã tồn tại tỉnh này";
        }else{
             $village = new villages;
             $village->name = $name;
             $village->id_dis = $id;
             $village->save();
             $message = "Thêm thành công";
        }
        return response()->json(compact('message'), 200);
    }

    public function updateVillages(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $village = villages::find($id);
        $village->name = $name;
        $village->save();
        $message = "Sửa thành công";
        return response()->json(compact('message'), 200);
    }

    public function deleteVillages(Request $request)
    {
        $id = $request->get('id');
        $village = villages::find($id)->delete();
        $message = "Xoá thành công";
        return response()->json(compact('message'), 200);
    }

    public function showDefaultTypes()
    {
        $types = types::paginate(10);
        return view('admin.defaultType',compact('types'));
    }

    public function addType(Request $request)
    {
        $name = $request->get('name');
        if(types::where('name','=', $name)->exists()){
            $message = "Đã tồn tại tỉnh này";
            return response()->json(compact('message'), 200);
        }else{
            $type = new types;
            $type->name = $name;
            $type->save();
            $message = "Thêm thành công";
        return response()->json(compact('message'), 200);
        }
    }

    public function updateType(Request $request,$id)
    {
        $name = $request->get('name');
        if(types::where('name','=', $name)->exists()){
            $message = "Tỉnh này đã tồn tại";
        }else{
            $type = types::find($id);
            $type->name = $name;
            $type->save();
            $message = "Sửa thành công";
        }
        return response()->json(compact('message'), 200);
    }

    public function deleteType($id)
    {
        $type = types::find($id)->delete();
        $message = "Xoá thành công";
        return response()->json(compact('message'), 200);
    }



    public function showDefaultCategories()
    {
        $categories = categories::paginate(10);
        return view('admin.defaultCategories',compact('categories'));
    }

    public function addCategory(Request $request)
    {
        $name = $request->get('name');
        if(categories::where('name','=', $name)->exists()){
            $message = "Đã tồn tại tỉnh này";
            return response()->json(compact('message'), 200);
        }else{
            $category = new categories;
            $category->name = $name;
            $category->title = $name;
            $category->save();
            $message = "Thêm thành công";
            return response()->json(compact('message'), 200);
        }
    }

    public function updateCategory(Request $request,$id)
    {
        $name = $request->get('name');
        if(categories::where('name','=', $name)->exists()){
            $message = "Tỉnh này đã tồn tại";
        }else{
            $category = categories::find($id);
            $category->name = $name;
            $category->title = $name;
            $category->save();
            $message = "Sửa thành công";
        }
        return response()->json(compact('message'), 200);
    }

    public function deleteCategory($id)
    {
        $category = categories::find($id)->delete();
        $message = "Xoá thành công";
        return response()->json(compact('message'), 200);
    }


}
