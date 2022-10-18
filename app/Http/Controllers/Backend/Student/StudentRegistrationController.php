<?php

namespace App\Http\Controllers\Backend\Student;

use App\Models\User;
use App\Models\StudentYear;
use App\Models\StudentClass;
use App\Models\StudentGroup;
use App\Models\StudentShift;
use Illuminate\Http\Request;
use App\Models\AssignStudent;
use App\Models\DiscountStudent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use PDF;

class StudentRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StudentRegView()
    {
        // dd('Welcome');
        // $data['allData'] = AssignStudent::all();
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = StudentYear::orderBy('id', 'desc')->first()->id;
        $data['class_id'] = StudentClass::orderBy('id', 'desc')->first()->id;
        // dd($data['class_id']);
        $data['allData'] = AssignStudent::where('year_id', $data['year_id'])->where('class_id', $data['class_id'])->get();
        return view('backend.student.student_reg.view_student', $data);
    }

    public function StudentClassYearSearch(Request $request)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();

        $data['year_id'] = $request->year_id;
        $data['class_id'] = $request->class_id;

        $data['allData'] = AssignStudent::where('year_id', $request->year_id)->where('class_id', $request->class_id)->get();
        return view('backend.student.student_reg.view_student', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function StudentRegAdd()
    {
        // dd('Welcome');
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();
        return view('backend.student.student_reg.add_student', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function StudentRegStore(Request $request)
    {
        // dd($request->all());
        DB::transaction(function () use ($request) {
            $checkYear = StudentYear::find($request->year_id)->name;
            $student = User::where('usertype', 'student')->orderBY('id', 'DESC')->first();

            if ($student == null) {
                $firstReg = 0;
                $studentId = $firstReg + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } else {
                $student = User::where('usertype', 'student')->orderBY('id', 'DESC')->first()->id;


                $studentId = $student + 1;
                if ($studentId < 10) {
                    $id_no = '000' . $studentId;
                } elseif ($studentId < 100) {
                    $id_no = '00' . $studentId;
                } elseif ($studentId < 1000) {
                    $id_no = '0' . $studentId;
                }
            } //end else
            $final_id_no = $checkYear . $id_no;
            $user = new User();
            $code = rand(0000, 9999);
            $user->id_no = $final_id_no;
            $user->password = bcrypt($code);
            $user->usertype = 'Student';
            $user->code = $code;
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assign_student = new AssignStudent();
            $assign_student->student_id = $user->id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => "Student Registration Inserted Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
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
    public function StudentRegEdit($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        $data['editData'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();
        // dd($data['editData']->toArray());
        return view('backend.student.student_reg.edit_student', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function StudentRegUpdate(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {
            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/' . $user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assign_student = AssignStudent::where('id', $request->id)->where('student_id', $student_id)->first();

            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();
            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();

            $discount_student = DiscountStudent::where('assign_student_id', $request->id)->first();

            $discount_student->discount = $request->discount;
            $discount_student->save();
        });

        $notification = array(
            'message' => "Student Registration Updated Successfully",
            'alert-type' => 'success'
        );
        return redirect()->route('student.registration.view')->with($notification);
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

    public function StudentRegPromotion($student_id)
    {
        $data['years'] = StudentYear::all();
        $data['classes'] = StudentClass::all();
        $data['groups'] = StudentGroup::all();
        $data['shifts'] = StudentShift::all();

        $data['editData'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();

        return view('backend.student.student_reg.promotion_student', $data);
    }

    public function StudentUpdatePromotion(Request $request, $student_id)
    {
        DB::transaction(function () use ($request, $student_id) {



            $user = User::where('id', $student_id)->first();
            $user->name = $request->name;
            $user->fname = $request->fname;
            $user->mname = $request->mname;
            $user->mobile = $request->mobile;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->religion = $request->religion;
            $user->dob = date('Y-m-d', strtotime($request->dob));

            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/student_images/' . $user->image));
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('upload/student_images'), $filename);
                $user['image'] = $filename;
            }
            $user->save();

            $assign_student = new AssignStudent();

            $assign_student->student_id = $student_id;
            $assign_student->year_id = $request->year_id;
            $assign_student->class_id = $request->class_id;
            $assign_student->group_id = $request->group_id;
            $assign_student->shift_id = $request->shift_id;
            $assign_student->save();

            $discount_student = new DiscountStudent();

            $discount_student->assign_student_id = $assign_student->id;
            $discount_student->fee_category_id = '1';
            $discount_student->discount = $request->discount;
            $discount_student->save();
        });


        $notification = array(
            'message' => 'Student Promotion Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('student.registration.view')->with($notification);
    }

    public function StudentRegDetails($student_id)
    {
        $data['details'] = AssignStudent::with(['student', 'discount'])->where('student_id', $student_id)->first();

        $pdf = PDF::loadView('backend.student.student_reg.details_student_pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }
}
