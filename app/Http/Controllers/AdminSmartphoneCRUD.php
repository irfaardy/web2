<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Smartphone;
use App\Model\ImagesStorage;
use Auth;
use Intervention\Image\ImageManagerStatic as Intervention;
use App\Model\SmartphoneProdusen as SP;
use Validator;
use DB;
use Illuminate\Support\Str;

class AdminSmartphoneCRUD extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $smp = Smartphone::select(['id as id_ponsel','nama','id_merk','spesifikasi','updated_at','updated_by'])->paginate(12);
        return view('dashboard.crud_smartphone.index')->with(['smp' => $smp]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sp = SP::all();
         return view('dashboard.crud_smartphone.forms')->with(['act' => route('adm_phone_store'),'sp' => $sp]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $imgs =count($request->file('img'));
        foreach(range(0,$imgs) as $img)
        {
            $validator = Validator::make($request->all(),[
                            'nama' =>'required|max:60',
                            'id_merk' =>'required|exists:tb_merk_ponsel,id',
                            'deskripsi' =>'required',
                            'img.'.$img =>'image|mimes:jpeg,gif,png|max:4000',]);
           
        }
      if ($validator->fails()) 
         {
            $error= $validator->errors()->first();
             return redirect()->back()->with(['message_fail' => $error])
                                      ->withInput($request->all());

         }
         $generate = "SMP".$request->id_merk.date("Ymd").strtoupper(Str::random(4));
         Smartphone::create(['id'=>$generate,
                            'nama'=>$request->nama,
                            'id_merk'=>$request->id_merk,
                            'spesifikasi'=>$request->deskripsi,
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
          $imglink="img_".$request->id_merk.date("Ymd").$rand;
         
          ImagesStorage::create([
                                    'user_id'=>Auth::user()->id,
                                    'id_object'=> $generate,
                                    'type'=>'SMP',
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
         return redirect()->back()->with(['message_success' => 'Berhasil Menambahkan data Smartphone']);

    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $sp = SP::all();
         $phone = Smartphone::select(['id as id_ponsel','nama','id_merk','spesifikasi','updated_at','updated_by'])->where('id',$id)->first();
         // dd($phone);
         if($phone != null){
            return view('dashboard.crud_smartphone.forms')->with(['act' => route('adm_phone_update'),'sp' => $sp,'phone' => $phone]);
         } else{
            return redirect()->back()->with(['message_fail' => 'Smartphone tidak ditemukan']);
         }
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         if($request->file('img') !=null){
        $imgs =count($request->file('img'));
        foreach(range(0,$imgs) as $img)
        {
            $validator = Validator::make($request->all(),[
                            'nama' =>'required|max:60',
                            'id_merk' =>'required|exists:tb_merk_ponsel,id',
                            'deskripsi' =>'required',
                            'img.'.$img =>'image|mimes:jpeg,gif,png|max:4000',]);
           
        }
    
       } else{
                $validator = Validator::make($request->all(),[
                            'nama' =>'required|max:60',
                            'id_merk' =>'required|exists:tb_merk_ponsel,id',
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
                                      'type'=>'SMP',
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
        Smartphone::where(['id'=>$request->id])->update(['nama'=>$request->nama,
                            'id_merk'=>$request->id_merk,
                            'spesifikasi'=>$request->deskripsi,
                            'updated_by'=>Auth::user()->id,]);
        return redirect()->back()->with(['message_success' => 'Berhasil Mengubah data Smartphone']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
         $ark = Smartphone::where(['id' => $id]);
         if($ark->first() != null){
          $ark->delete();
          return redirect()->route('adm_phone')->with(['message_success' => 'Berhasil menghapus Smartphone']);
         } else{
          return redirect()->route('adm_phone')->with(['message_fail' => 'Smartphone tidak ditemukan']);
         }
    } 
}
