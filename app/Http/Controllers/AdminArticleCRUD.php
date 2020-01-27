<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Model\Article;
use App\Model\ImagesStorage;
use Intervention\Image\ImageManagerStatic as Intervention;
use Auth;
use Validator;
use DB;

class AdminArticleCRUD extends Controller
{
     public function index(){
        $smp = Article::paginate(12);
        return view('dashboard.crud_artikel.index')->with(['artikel' => $smp]);
    }

     public function edit($id)
    {
         $ark = Article::where(['id_artikel' => $id])->first();
         if($ark != null){
          return view('dashboard.crud_artikel.forms')->with(['act' => route('adm_artikel_update'),'ark' =>$ark]);
         } else{
          return redirect()->route('adm_article')->with(['message_fail' => 'Artikel tidak ditemukan']);
         }
    } 
    public function delete($id)
    {
         $ark = Article::where(['id_artikel' => $id]);
         if($ark->first() != null){
          $ark->delete();
          return redirect()->route('adm_article')->with(['message_success' => 'Berhasil menghapus Artikel']);
         } else{
          return redirect()->route('adm_article')->with(['message_fail' => 'Artikel tidak ditemukan']);
         }
    } 
    public function update(Request $request)
    {

        if($request->file('img') !=null){
        $imgs =count($request->file('img'));
        foreach(range(0,$imgs) as $img)
        {
            $validator = Validator::make($request->all(),[
                            'judul' =>'required|max:60',
                            'deskripsi' =>'required',
                            'id' => 'exist:tb_artikel,id_artikel',
                            'img.'.$img =>'image|mimes:jpeg,gif,png|max:4000',]);
           
        }
    
       } else{
                $validator = Validator::make($request->all(),[
                            'judul' =>'required|max:60',
                            'id' => 'exist:tb_artikel,id_artikel',
                            'deskripsi' =>'required',]);
       }

         if ($validator->fails()) 
         {
            $error= $validator->errors()->first();
             return redirect()->back()->with(['message_fail' => $error])
                                      ->withInput($request->all());

         }


        $files= $request->img;
        if($files != null){
          if(count($files) <= 10){
            foreach($files as $file)
            {
            //Script Upload.....
            $rand=Str::random(5);
            $dest_path= storage_path('app/public/img/uploaded/');
            $imgname="IMG_".time()."_".Auth::user()->id."_".$rand;
           //$imgname=hash('crc32',Auth::user()->id).'profile';
            $imglink="img_".$request->id.date("Ymd").$rand;
           
            ImagesStorage::create([
                                      'user_id'=>Auth::user()->id,
                                      'id_object'=> $request->id,
                                      'type'=>'ARK',
                                      'img_file_name'=>$imgname."_o",
                                      'img_file_name_small'=>$imgname."_s",
                                      'img_link'=>$imglink,
                                      'size'=> $file->getSize(),
                                      'ip_addr'=>$request->ip(),
                                      'mime_type'=>$file->getMimeType(),
                                  ]);
        
            Intervention::make($file->getRealPath())
              ->resize(null,1500,function($constraint)
                {
                  $constraint->aspectRatio();
                  $constraint->upsize();
                })
              ->save($dest_path."/".$imgname."_o",70);

            
            Intervention::make($dest_path."/".$imgname."_o")
              ->resize(null,320,function($constraint)
                {
                  $constraint->aspectRatio();
                  $constraint->upsize();
                })
              ->save($dest_path."/".$imgname."_s",60);
            }
          }
        }

         $ark = Article::where(['id_artikel' => $request->id])->update($this->init_params($request));
        return redirect()->route('adm_article')->with(['message_success' => 'Berhasil mengubah Artikel']);
    }

     public function create()
    {
         
         return view('dashboard.crud_artikel.forms')->with(['act' => route('adm_artikel_store')]);
    }

    public function store(Request $request){
    	$imgs =count($request->file('img'));
        foreach(range(0,$imgs) as $img)
        {
            $validator = Validator::make($request->all(),[
                            'judul' =>'required|max:60',
                            'deskripsi' =>'required',
                            'img.'.$img =>'image|mimes:jpeg,gif,png|max:4000',]);
           
        }
      if ($validator->fails()) 
         {
            $error= $validator->errors()->first();
             return redirect()->back()->with(['message_fail' => $error])
                                      ->withInput($request->all());

         }
         $generate = "ARK-".date("Ymd")."-".time().strtoupper(Str::random(6));
         Article::create(['id_artikel' => $generate,
              'judul' => $request->judul,
              'deskripsi' => $request->deskripsi,
              'updated_by'=>Auth::user()->id,]);
         $files= $request->img;

       if($files != null AND count($files) <= 10){
          foreach($files as $file)
          {
          //Script Upload.....
          $rand=Str::random(5);
          $dest_path= storage_path('app/public/img/uploaded/');
          $imgname="IMG_".time()."_".Auth::user()->id."_".$rand;
         //$imgname=hash('crc32',Auth::user()->id).'profile';
          $imglink="img_".$generate.date("Ymd").$rand;
         
          ImagesStorage::create([
                                    'user_id'=>Auth::user()->id,
                                    'id_object'=> $generate,
                                    'type'=>'ARK',
                                    'img_file_name'=>$imgname."_o",
                                    'img_file_name_small'=>$imgname."_s",
                                    'img_link'=>$imglink,
                                    'size'=> $file->getSize(),
                                    'ip_addr'=>$request->ip(),
                                    'mime_type'=>$file->getMimeType(),
                                ]);
      
          Intervention::make($file->getRealPath())
            ->resize(null,1500,function($constraint)
              {
                $constraint->aspectRatio();
                $constraint->upsize();
              })
            ->save($dest_path."/".$imgname."_o",70);

          
          Intervention::make($dest_path."/".$imgname."_o")
            ->resize(null,320,function($constraint)
              {
                $constraint->aspectRatio();
                $constraint->upsize();
              })
            ->save($dest_path."/".$imgname."_s",60);
          }
        }
         return redirect()->route('adm_article')->with(['message_success' => 'Berhasil Menambah Artikel']);

    }

    private function init_params($request){
      $ret = [
              'judul' => $request->judul,
              'deskripsi' => $request->deskripsi,
              'updated_by'=>Auth::user()->id,];

      return  $ret;

    }
}
