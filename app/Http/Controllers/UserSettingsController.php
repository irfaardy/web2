<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\User;
use Validator;
use Hash;
use Auth;
use DB;

class UserSettingsController extends Controller
{
	public function profile(){
		$user = Pengguna::cabangPengguna(Auth::user()->id);
		return view('user_setting.profile')->with(['user' => $user]);
	}
    public function change_pwd(){
    	return view('user_setting.change_pwd');
    } 
    public function update_pwd(Request $request){
    	 if(Auth::user()->password != ""){
	    	 $validator = Validator::make($request->all(),[
	                           'password_old' =>'required',
	                           'password' =>'required|confirmed|min:8',
	                           'password_confirmation' => 'required',
	                       ]);

    	   if ($validator->fails()){
	            $error= $validator->errors()->first();
	             return redirect()->back()->with(['message_fail' => $error])
	                                      ->withInput($request->all());
	        } 

	        $model = User::where('id',Auth::user()->id);
	        $get_user = $model->first();

	        if($get_user != null){
	        	if (Hash::check($request->password_old, $get_user->password)) {
	        		 DB::beginTransaction();
	                try {
	               
						$model->update(['password' => bcrypt($request->password)]);
						DB::commit();

						return redirect()->back()
										 ->with(['message_success' => 'Password Berhasil diubah.']);

					} catch (\Exception $e) {
	                    DB::rollback();
	                     return redirect()->back()->with(['message_fail' => 'Gagal mengubah kata sandi, silahkan coba lagi']);
	                }
	        		
				} else{
				  	return redirect()->back()->with(['message_fail' => 'Password Lama tidak sesuai.']);
				}
	        } else{
				  	return redirect()->back()->with(['message_fail' => 'Pengguna Tidak ditemukan.']);
				}

			} else{

				 $validator = Validator::make($request->all(),[
	                           'password' =>'required|confirmed|min:8',
	                           'password_confirmation' => 'required',
	                       ]);

	    	   if ($validator->fails()){
		            $error= $validator->errors()->first();
		             return redirect()->back()->with(['message_fail' => $error])
		                                      ->withInput($request->all());
		        } 

		        $model = User::where('id',Auth::user()->id);
		        $get_user = $model->first();

		        if($get_user != null){
		        	
		        		 DB::beginTransaction();
		                try {
		                	
							$model->update(['password' => bcrypt($request->password)]);
							
							DB::commit();

							return redirect()->back()
											 ->with(['message_success' => 'Password Berhasil diubah.']);

						} catch (\Exception $e) {
		                    DB::rollback();
		                    dd($e);
		                     return redirect()->back()->with(['message_fail' => 'Gagal mengubah kata sandi, silahkan coba lagi']);
		                }
		        		
					
		        } else{
					  	return redirect()->back()->with(['message_fail' => 'Pengguna Tidak ditemukan.']);
					}

			}
    }
}
