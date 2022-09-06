<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notifikasi = array(
            'message'=>'Selamat Anda Berhasil Keluar',
            'alert-type'=>'success'
            );

        return redirect('/login')->with($notifikasi);
    }

    public function Profile()
    {
        $id=Auth::user()->id;
        $DataAdmin=User::find($id);
        return view('admin.adminProfile_view',compact('DataAdmin'));
    }
    /**
     * A function that is used to edit the profile of the admin.
     */
    public function EditProfile()
    {
        $id=Auth::user()->id;
        $EditData=User::find($id);
        return view('admin.admin_editProfile',compact('EditData'));
    }
    public function StoreProfile(Request $request){
        $id=Auth::user()->id;
        $DataProfile=User::find($id);
        $DataProfile->name=$request->name;
        $DataProfile->email=$request->email;
        $DataProfile->username=$request->username;
        if ($request->file('foto_profile')) {
            $file=$request->file('foto_profile');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload\foto_admin'),$filename);
            $DataProfile['foto_profile']=$filename;

        }
        $DataProfile->save();
        $notifikasi = array(
            'message'=>'Admin Profile Berhasil diperbarui',
            'alert-type'=>'info'
            );
        return redirect()->route('admin.adminProfile')->with($notifikasi);
    }

    public function ChangePassword(){
        return view('admin.admin_changePass');
    }
    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'confirm_password'=>'required|same:newpassword'
        ]);
        $hashedPass= Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPass)) {
            $users=User::find(Auth::id());
            $users->password=bcrypt($request->newpassword);
            $users->save();
            session()->flash('message','password berhasil diperbarui');
            return redirect()->back();
        } else {
            session()->flash('message','Belum bisa diupdate cek lagi');
            return redirect()->back();
        }

    }
}
