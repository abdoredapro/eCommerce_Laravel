<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    
    public function profile() {
        $profile = Admin::find(1);
        // dd($profileData);
        return view('admin.profile', compact('profile'));
    }

    public function AdminProfileEdit() {
        $profileEdit = Admin::find(1);
        return view('admin.profile_edit', compact('profileEdit'));
    }
    public function AdminProfileStore(Request $request) {
        $data = Admin::find(1);
        $data ->name = $request ->name;
        $data ->email = $request ->email;
        if($request->file('image')) {
            // get file from request
            $file = $request->file('image');
            if(!empty($data->profile_photo_path)) {
                unlink(public_path('backend/upload/admin_images/'.$data->profile_photo_path));
            }
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('backend/upload/admin_images'),$filename);
            $data['profile_photo_path'] = $filename;
            // dd($filename);
        }
        $data->save();
        $notfication =  array(
            'message' => 'Done Edit',
            'alert-type' => 'success'
        );
        return redirect() ->route('admin.profile')->with($notfication);


    }

    public function AdminChangePassword() {
        return view('admin.admin_change_password');
    }
    public function AdminUpdatePassword(Request $request) {

        $validateData = $request->validate([
            'current_pass' => 'required',
            'password' => 'required|confirmed'
        ]);

        $adminOldPassword = Admin::find(1)->password;

        if(Hash::check($request->current_pass, $adminOldPassword)) {
            $adminData = Admin::find(1);
            $adminData->password = Hash::make($request ->password);
            $adminData->save();
            Auth::logout();
            return redirect() ->route('admin.profile');
        } else {
            return redirect() -> route('dashboard');
        }


    }   

    public function allUser() {
        $users = User::all();

        return view('backend.user.user_view',compact('users'));
    }

}
