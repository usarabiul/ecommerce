<?php

namespace App\Http\Controllers\Customer;

use Mail;
use Auth;
use Hash;
use Session;
use Response;
use Cookie;
use Str;
use File;
use Carbon\Carbon;
use App\Models\Country;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Media;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    

    public function dashboard(Request $request){

        return view(welcomeTheme().'customer.dashboard');

    }

    public function profile(Request $r){
      $user =Auth::user();
      if($r->isMethod('post')){
          $r->validate([
              'name' => 'required|max:100',
              'email' => 'required|email|max:100|unique:users,email,'.$user->id,
              'mobile' => 'nullable|max:20|unique:users,mobile,'.$user->id,
              'address' => 'nullable|max:200',
              'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp,bmp,tiff,webp|max:2048',
          ]);

          $user->name =$r->name;
          $user->mobile =$r->mobile;
          $user->email =$r->email;
          $user->address_line1 =$r->address;

          ///////Image UploadStart////////////
          if($r->hasFile('image')){
            $file =$r->image;
            $src  =$user->id;
            $srcType  =6;
            $fileUse  =1;
            $author=Auth::id();
            uploadFile($file,$src,$srcType,$fileUse,$author);
          }
          ///////Image Upload End////////////
          $user->save();
  
          Session()->flash('success','Your Updated Are Successfully Done!');
          return redirect()->back();
      }
      return view(welcomeTheme().'customer.profile',compact('user'));
    }
   
    public function changePassword(Request $r){
      $user =Auth::user();
      if($r->isMethod('post')){
        $r->validate([
            'current_password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed|different:current_password',
        ]);
        if(Hash::check($r->current_password, $user->password)){
          $user->password_show=$r->password;
          $user->password=Hash::make($r->password);
          $user->save();
          Session()->flash('success','Your Are Successfully Done');
        }else{
          Session()->flash('error','Carrent Password Are Not Match');
        }
        return redirect()->back();
      }
      return view(welcomeTheme().'customer.changePassword',compact('user'));
    }
    
    public function reviews(){
      $user =Auth::user();

      return view(welcomeTheme().'customer.reviews',compact('user'));
    }

    public function orders(Request $request){

        return view(welcomeTheme().'customer.orders');

    }
    


}
