<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\roles;
use App\provinces;
use App\districts;
use App\villages;
use App\detail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    // hiển thị danh sách user 
    public function showListUsers(){
        $users = User::with('role')->where('id_role',3)->paginate(10);
        $count = 1;
        return view('admin.user',compact('users','count'));
    }

    // hiển thị danh sách moderator
    public function showListMods(){
        $users = User::with('role')->where('id_role',2)->paginate(10);
        $count = 1;
        return view('admin.user',compact('users','count'));
    }

    // hiển thị số lượng người dùng
    public function showAdmin(){
        $countUser = User::all()->where('id_role',3)->count();
        $countMod = User::all()->where('id_role',2)->count();
        $countDetail = detail::all()->count();
        return view('admin.master',compact('countUser','countMod','countDetail'));
    }

    // hiện thị form Sửa user,mod
    public function editUser($id){
        $user = User::find($id);
        return response()->json(compact('user'), 200);
    }

    // cập nhật lại user sau khi sửa
    public function updateUser(Request $request){  
        
        // $validated = Validator::make($request->all(),[
        //     'nameUp' => 'required|min:5|max:255',
        //     'emailUp' => 'required|email|unique:App\User,email',
        //     // 'passUp' => "max:255",
        //     'phoneUp' => "required|numeric",
        //     // 'file' => 'image|max:1024'
        // ],[
        //     'nameUp.required' => 'Không được bỏ trống',
        //     'nameUp.min' => 'Họ và tên lớn hơn 5 ký tự',
        //     'emailUp.required' => 'Không được bỏ trống',
        //     'emailUp.unique' => 'email đã tồn tại',
        //     'emailUp.email' => 'Chưa đúng định dạng email',
        //     // 'passUp.min' => 'Mật khẩu lớn hơn 5 ký tự',
        //     'phoneUp.require' => "Không được bỏ trống",
        //     'phoneUp.numeric' => "Số điện thoại phải là số",
        //     // 'file.image' => "Chưa đúng định dạng file ảnh",
        //     // 'file.max' => "Quá kích thước"
        // ]);
        // if($validated->fails()){
        //     return redirect()
        //             ->back()
        //             ->withErrors($validated)
        //             ->withInput();
        // }

        $id = $request->input('id');
        $user = User::find($id);
        if(($request->has('passUp')) && ($request->hasFile('file'))){
            $user->name = $request->input('nameUp');
            $user->email = $request->input('emailUp');
            $user->phone_number = $request->input('phoneUp');
            $user->id_role = $request->input('role');
            $user->images = Storage::url($request->file('file')->store('public/user_img'));
            $user->password = Hash::make($request->input('passUp'));
            $user->save();
        }else if($request->has('passUp')){
            $user->name = $request->input('nameUp');
            $user->email = $request->input('emailUp');
            $user->phone_number = $request->input('phoneUp');
            $user->id_role = $request->input('role');
            $user->password = Hash::make($request->input('passUp'));
            $user->save();
        }else if($request->hasFile('file')){
            $user->name = $request->input('nameUp');
            $user->email = $request->input('emailUp');
            $user->phone_number = $request->input('phoneUp');
            $user->id_role = $request->input('role');
            $user->images = Storage::url($request->file('file')->store('public/user_img'));
            $user->save();
        }
        else{
            $user->name = $request->input('nameUp');
            $user->email = $request->input('emailUp');
            $user->phone_number = $request->input('phoneUp');
            $user->id_role = $request->input('role');
            $user->save();
        }
        
        return redirect()->back()->with('message','Sửa thành công');
       

    }

    // tạo mới user

    public function createUser(Request $request){

        //validate form
        $validated = Validator::make($request->all(),[
            'nameUp' => 'required|min:5|max:255',
            'emailUp' => 'required|email|unique:App\User,email',
            'passUp' => "required|min:5|max:255",
            'phoneUp' => "required|numeric",
            'file' => 'image|max:1024'
        ],[
            'nameUp.required' => 'Không được bỏ trống',
            'nameUp.min' => 'Họ và tên lớn hơn 5 ký tự',
            'emailUp.required' => 'Không được bỏ trống',
            'emailUp.unique' => 'email đã tồn tại',
            'emailUp.email' => 'Chưa đúng định dạng email',
            'passUp.min' => 'Mật khẩu lớn hơn 5 ký tự',
            'passUp.required' => 'Không được bỏ trống',
            'phoneUp.require' => "Không được bỏ trống",
            'phoneUp.numeric' => "Số điện thoại phải là số",
            'file.image' => "Chưa đúng định dạng file ảnh",
            'file.max' => "Quá kích thước"
        ]);
        if($validated->fails()){
            return redirect()
                    ->back()
                    ->withErrors($validated)
                    ->withInput();
        }

        //kiểm tra người dùng tải ảnh lên không
        if($request->hasFile('file')){
            $user = new User;
            $user->name = $request->input('nameUp');
            $user->email = $request->input('emailUp');
            $user->phone_number = $request->input('phoneUp');
            $user->id_role = $request->input('role');
            $user->password = Hash::make($request->input('passUp'));
            $user->images = Storage::url($request->file('file')->store('public/user_img'));
            $user->save();
            return redirect()->back()->with('message','Tạo thành công');
        }else{
            $user = new User;
            $user->name = $request->input('nameUp');
            $user->email = $request->input('emailUp');
            $user->phone_number = $request->input('phoneUp');
            $user->id_role = $request->input('role');
            $user->password = Hash::make($request->input('passUp'));
            $user->images = Storage::url('user_img/anh_mac_dinh.jpg');
            $user->save();
            return redirect()->back()->with('message','Tạo thành công');
        }
    }

    public function deleteUser($id){

        $details = detail::where('id','=',$id)->get();
        foreach($details as $detail){
            $images = DB::table('images')->where('id_detail','=',$detail->id_detail)->delete();
            $detail->delete();
        }
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message','Xoá thành công');
    }

    public function setRole($id){
        $user = User::find($id);
        if( $user->id_role === 2){
            $user->id_role = 3;
            $user->save();
        }else if($user->id_role === 3){
            $user->id_role = 2;
            $user->save();
        }
        return redirect()->back()->with('message','Thành công');
    }

    public function search(Request $request){
        $name = $request->input('search');
        $users = User::Where('name','LIKE','%'.$name.'%')
                        ->orWhere('email','LIKE','%'.$name.'%')
                        // ->Where('id_role','>','1')
                        ->paginate(10);
        return view('admin.user',compact('users'));
    }

}
