<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\SmartphoneProdusen as SP;
use Validator;
use Auth;

class AdminSmartphoneProdusen extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sp = SP::all();
        return view('dashboard.crud_produsen.index')->with(['sp' => $sp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('dashboard.crud_produsen.forms');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(),[
                           'nama' =>'required|max:60',
                       ]);
           if ($validator->fails()){
                $error= $validator->errors()->first();
                 return redirect()->back()->with(['message_fail' => $error])
                                          ->withInput($request->all());
            } 

            SP::create(['nama' => $request->nama,'deskripsi' => $request->deskripsi,'updated_by' => Auth::user()->id]);
            return redirect('admin/produsen')->with(['message_success' => 'Berhasil Menambahkan Produsen']);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
