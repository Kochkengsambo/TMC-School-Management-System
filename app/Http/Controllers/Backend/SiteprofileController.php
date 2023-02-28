<?php

namespace App\Http\Controllers\backend;

use App\Models\Siteprofile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiteprofileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $siteprofile = Siteprofile::get()->first();
        // $type = Type::pluck('title','id');
        $data['siteprofile'] = $siteprofile;
        // $data['type'] = $type;
        return view('backend.siteprofile.siteprofile',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'site_name' => 'required',
            'phone' => 'required',
            'email'=>'required',
            'address' => 'required',
            // 'service_order'=>'required|numeric|not_in:0',
            // 'package_m3'=>'required|numeric|not_in:0',
            // 'package_kg'=>'required|numeric|not_in:0',
            // 'type_of_receive' => 'required'
        ],[],[
            'site_name' => 'Site Name',
            'phone'=>'Phone Number',
            'email'=>'E-mail',
            'address'=>'Address',
            // 'service_order'=>'Service Order',
            // 'package_m3'=>'Price Package per M3',
            // 'package_kg'=>'Price Package per KG',
            // 'type_of_receive' => 'Type of Receive'
        ]);
        $user_id = Auth::user()->id;
        $add_by = Auth::user()->name;
        $site_name = $request->site_name;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        // $map = $request->map;
        // $facebook = $request->facebook;
        // $telegram = $request->telegram;
        // $wechat = $request->wechat;
        // $line = $request->line;
        $corent_date = date('Y-m-d');
        $siteprofile = Siteprofile::get()->first();
        if($siteprofile){
                $logo_name = '';
                $logos=$request->file('logo');
                  if($request->hasFile('logo')){
                    if($siteprofile->logo){
                        if(file_exists((string)($siteprofile->logo))){
                            unlink($siteprofile->logo);
                        }
                    }
                        $logo_name=time().$logos->getClientOriginalName();
                        $logos->move('upload/siteprofile/',$logo_name);
                        $logo_name = 'upload/siteprofile/'.$logo_name;
                }else{
                    $logo_name = $siteprofile->logo;
                }
                $icon_name = '';
                $icons=$request->file('icon');
                  if($request->hasFile('icon')){
                    if($siteprofile->icon){
                        if(file_exists((string)($siteprofile->icon))){
                            unlink($siteprofile->icon);
                        }
                    }
                        $icon_name=time().$icons->getClientOriginalName();
                        $icons->move('upload/siteprofile/',$icon_name);
                        $icon_name = 'upload/siteprofile/'.$icon_name;
                }else{
                    $icon_name = $siteprofile->icon;
                }

            $siteprofile->update([
                    'site_name'       => $site_name,
                    'phone'           => $phone,
                    'user_id'         => $user_id,
                    'add_by'          => $add_by,
                    'email'           => $email,
                    'address'         => $address,
                    'logo'            => $logo_name,
                    'icon'            => $icon_name,
                    'updater_id'      => $user_id,
                    // 'facebook'        => $facebook,
                    // 'telegram'        => $telegram,
                    // 'wechat'          => $wechat,
                    // 'map'             => $map,
                    // 'line'            => $line,
                ]);
        }else{
            $logo_name = '';
            $logos=$request->file('logo');
              if($request->hasFile('logo')){
                    $logo_name=time().$logos->getClientOriginalName();
                    $logos->move('upload/siteprofile/',$logo_name);
                    $logo_name = 'upload/siteprofile/'.$logo_name;
                }
            $icon_name = '';
            $icons=$request->file('icon');
              if($request->hasFile('icon')){
                    $icon_name=time().$icons->getClientOriginalName();
                    $icons->move('upload/siteprofile/',$icon_name);
                    $icon_name = 'upload/siteprofile/'.$icon_name;
                }
            $site = Siteprofile::create([
                'site_name'     => $site_name,
                'phone'         => $phone,
                'user_id'       => $user_id,
                'add_by'        => $add_by,
                'email'         => $email,
                'address'       => $address,
                'logo'          => $logo_name,
                'icon'          => $icon_name,
                'creator_id'    => $user_id,
                // 'facebook'      => $facebook,
                // 'telegram'      => $telegram,
                // 'wechat'        => $wechat,
                // 'map'           => $map,
                // 'line'          => $line,
            ]);
        }



        $notification = array(
            'message' => "Site Profile Inserted Successfully",
            'alert-type' => 'success'
        );
        $siteprofile = Siteprofile::get()->first();
        $session = Session()->put('siteprofile',$siteprofile);
        return redirect()->back()->with($notification);
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
