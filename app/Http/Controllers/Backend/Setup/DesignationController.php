<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DesignationView()
    {
        $data['allData'] = Designation::all();
        return view('backend.setup.designation.view_designation',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DesignationAdd()
    {
        // dd('Hello World');
        return view('backend.setup.designation.add_designation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function DesignationStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name',
        ]);

        $data = new Designation();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => "Designation Inserted Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
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
    public function DesignationEdit($id)
    {
        $editData = Designation::find($id);
        return view('backend.setup.designation.edit_designation', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DesignationUpdate(Request $request, $id)
    {
        $data = Designation::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:designations,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => "Designation Updated Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('designation.view')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function DesignationDelete($id)
    {
        $data = Designation::find($id);
        $data->delete();

        $notification = array(
            'message' => "Designation Deleted Successfully",
            'alert-type' => 'info'
        );
        return redirect()->route('designation.view')->with($notification);
    }
}
