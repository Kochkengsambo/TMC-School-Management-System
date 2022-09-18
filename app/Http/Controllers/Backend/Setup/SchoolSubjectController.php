<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use App\Models\SchoolSubject;
use Illuminate\Http\Request;

class SchoolSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ViewSchoolSub()
    {
        $data['allData'] = SchoolSubject::all();
        return view('backend.setup.school_subject.view_school_subject',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SchoolSubjectAdd()
    {
        return view('backend.setup.school_subject.add_school_subject');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function SchoolSubjectStore(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name',
        ]);

        $data = new SchoolSubject();
        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => "School Subject Inserted Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
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
    public function SchoolSubjectEdit($id)
    {
        $editData = SchoolSubject::find($id);
        return view('backend.setup.school_subject.edit_school_subject', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SchoolSubjectUpdate(Request $request, $id)
    {
        $data = SchoolSubject::find($id);
        $validateData = $request->validate([
            'name' => 'required|unique:fee_categories,name,'.$data->id
        ]);

        $data->name = $request->name;
        $data->save();

        $notification = array(
            'message' => "School Subject Updated Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SchoolSubjectDelete($id)
    {
        $data = SchoolSubject::find($id);
        $data->delete();

        $notification = array(
            'message' => "School Subject Deleted Successfully",
            'alert-type' => 'info'
        );
        return redirect()->route('school.subject.view')->with($notification);
    }
}
