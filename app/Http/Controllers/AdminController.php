<?php

namespace App\Http\Controllers;

use App\Mail\SubadminMail;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Intervention\Image\ImageManagerStatic as Image;
use Nette\Utils\Random;

class AdminController extends Controller
{
    public function password_change(Request $request){
        $request->validate([
            '*'=>'required',
            'password' => ['required', 'confirmed',Password::min(8),'different:current_password'],

        ]);

        if(Hash::check($request->current_password,auth()->user()->password)){

            User::find(auth()->id())->update([
                'password'=>Hash::make($request->password),
            ]);

            return back()->with('change_message','Your passwoerd change successfully');
         }else{

            return back()->withErrors('change_error_message','Your current password is wrong');

        }
        return back();
    }

    public function info_change(Request $request){

        $request->validate([
            'name'=> 'required',
            'phone'=> 'required',
            'name'=> 'required',
            'profile_photo'=> 'image',
        ]);

               $old_img = User::find(auth()->id())->profile_photo;

               $localStore =  $request->file('profile_photo');
               $extension_img = $request->file('profile_photo')->extension();
               $image_name =  $request->file('profile_photo')->getClientOriginalName();
               $newName = 'profile_photo'.'_'.time().'_'.$image_name;



        if($request->hasFile('profile_photo')){
            if($old_img){
                unlink(base_path('public/uploads/profile/'.$old_img));
               }
           $img = Image::make($localStore)->resize(320, 320)->save(base_path('public/uploads/profile/'.$newName));
          User::find(auth()->id())->update($request->except('_token','profile_photo')+['profile_photo'=>$newName]);

       }else{
          User::find(auth()->id())->update($request->except('_token'));
       }

          return back();
    }
    public function add_sub_admin(){
          return view('backend.admin.add_sub_admin');
    }

    function post_sub_admin(Request $request){
        $request->validate([
            '*' => 'required',
            'email' =>'email:rfc,dns|unique:App\Models\User,email',
        ]);

        $random_password = Str::random(8);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => Carbon::now(),
            'password' => bcrypt($random_password),
            'user_type' => 'subadmin',
        ]);
        Mail::to($request->email)->send(new SubadminMail($request->name,$request->email,$random_password));
        return back()->with('success','Successfully added a new user');
    }
    function user_list(){
        $users = User::all();
        return view('backend.admin.user_list',compact('users'));
    }
    function user_list_delete($id){
         User::find($id)->delete();
         return back()->with('user_delete','successfully deleted a user');
    }
    function user_status_update($id){
          $status =  User::find($id);
           if($status->status == 'active'){
            $status->status = 'deactive';
           }else{
            $status->status = 'active';
           }
           $status->save();
         return back();
    }
}
