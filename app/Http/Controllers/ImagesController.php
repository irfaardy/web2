<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\ImagesStorage;

class ImagesController extends Controller
{
   public function showImgSmart($ukuran,$link)
   {

    $pic= ImagesStorage::where(['img_link'=>$link,'type' => "SMP"])->first();

        if($pic != null)
    {
        if($ukuran=="original")
        {
            if(file_exists(storage_path('app/public/img/uploaded/'.$pic->img_file_name)))
            { 
               $img = file_get_contents(storage_path('app/public/img/uploaded/'.$pic->img_file_name));
                return response($img)->header('Content-type','image/jpeg');
            }

            else
            {
                return abort('404');
            }
        }
        else if($ukuran=="small")
        {
            if(file_exists(storage_path('app/public/img/uploaded/'.$pic->img_file_name_small))) {
                
                    $img = file_get_contents(storage_path('app/public/img/uploaded/'.$pic->img_file_name_small));
                    return response($img)->header('Content-type','image/jpeg');
                }

            else
            {
                return abort('404');
            }
        }
        else
        {
            return abort('404');
        }
    }
    ///Jika Tidak Ditemukan tampilkan 404 not found
    else{

        return abort('404');
    }

   }

   public function showImgArk($ukuran,$link)
   {

    $pic= ImagesStorage::where(['img_link'=>$link,'type' => "ARK"])->first();

        if($pic != null)
    {
        if($ukuran=="original")
        {
            if(file_exists(storage_path('app/public/img/uploaded/'.$pic->img_file_name)))
            { 
               $img = file_get_contents(storage_path('app/public/img/uploaded/'.$pic->img_file_name));
                return response($img)->header('Content-type','image/jpeg');
            }

            else
            {
                return abort('404');
            }
        }
        else if($ukuran=="small")
        {
            if(file_exists(storage_path('app/public/img/uploaded/'.$pic->img_file_name_small))) {
                
                    $img = file_get_contents(storage_path('app/public/img/uploaded/'.$pic->img_file_name_small));
                    return response($img)->header('Content-type','image/jpeg');
                }

            else
            {
                return abort('404');
            }
        }
        else
        {
            return abort('404');
        }
    }
    ///Jika Tidak Ditemukan tampilkan 404 not found
    else{

        return abort('404');
    }

   }

   public function deleteIMG(Request $request){
     $image = ImagesStorage::where(['id'=>$request->id_gambar])->first();
       
      if(file_exists(storage_path('app/public/img/uploaded/'.$image->img_file_name_small)) AND file_exists(storage_path('app/public/img/uploaded/'.$image->img_file_name))){
        if($image != null){
            ImagesStorage::where(['id'=>$request->id_gambar])->delete();
            unlink(storage_path('app/public/img/uploaded/'.$image->img_file_name_small));
            unlink(storage_path('app/public/img/uploaded/'.$image->img_file_name));
            $arr = ['message' => 'Sukses Menghapus gambar','status' => true];
        } else{

             $arr = ['message' => 'Gambar tidak ditemukan','status' => false];
        }

          }else{

                $arr = ['message' => 'Gambar tidak ditemukan','status' => false];

          }
       

        return response()->json($arr);
   }

  
}
