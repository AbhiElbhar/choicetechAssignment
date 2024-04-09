<?php

namespace App\Http\Controllers;

use App\Models\contact;
use App\Models\Departement;
use App\Models\Marks;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student =  DB::table('students')
        ->join('contacts', 'students.id', '=', 'contacts.student_id')
        ->join('marks', 'students.id', '=', 'marks.student_id')
        ->join('departements', 'students.id', '=', 'departements.student_id')
        ->select('students.*', 'contacts.*', 'marks.*', 'departements.*')
        ->get();
    
        return view('student',compact('student'));
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
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'dob'=>'required',
            'gender'=>'required',
            'email'=>'required|email',
            'phoneNumber'=>'required|digits:10',
            'city'=>'required',
            'state'=>'required',
            'zipcode'=>'required|digits:6',
            'marathi'=>'required',
            'english'=>'required',
            'hindi'=>'required',
            'math'=>'required',
            'science'=>'required',
            'deptName'=>'required',
            'std'=>'required',
            'division'=>'required',
            'rollNo'=>'required',
        ]);

        $student = student::create([
            'firstName'=> $request->firstName,
            'lastName'=>$request->lastName,
            'dob'=>$request->dob,
            'gender'=>$request->gender
        ]);

        contact::create([
            'student_id'=>$student->id,
            'email'=>$request->email,
            'phoneNumber'=>$request->phoneNumber,
            'city'=>$request->city,
            'state'=>$request->state,
            'zipcode'=>$request->zipcode
        ]);

        Marks::create([
            'student_id'=>$student->id,
            'marathi'=>$request->marathi,
            'english'=>$request->english,
            'hindi'=>$request->hindi,
            'math'=>$request->math,
            'science'=>$request->science
        ]);

        Departement::create([
            'student_id'=>$student->id,
            'deptName'=>$request->deptName,
            'std'=>$request->std,
            'division'=>$request->division,
            'rollNo'=>$request->rollNo,
        ]);

        return redirect()->route('student');
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
        $student =  DB::table('students')
        ->join('contacts', 'students.id', '=', 'contacts.student_id')
        ->join('marks', 'students.id', '=', 'marks.student_id')
        ->join('departements', 'students.id', '=', 'departements.student_id')
        ->where('students.id', $id)
        ->select('students.*', 'contacts.*', 'marks.*', 'departements.*')
        ->get();

        return view('student.edit',compact('student'));
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
        $request->validate([
            'firstName'=>'required',
            'lastName'=>'required',
            'dob'=>'required',
            'gender'=>'required',
            'email'=>'required|email',
            'phoneNumber'=>'required|digits:10',
            'city'=>'required',
            'state'=>'required',
            'zipcode'=>'required|digits:6',
            'marathi'=>'required',
            'english'=>'required',
            'hindi'=>'required',
            'math'=>'required',
            'science'=>'required',
            'deptName'=>'required',
            'std'=>'required',
            'division'=>'required',
            'rollNo'=>'required',
        ]);

        $student = DB::table('students')
        ->where('id', $id)->update([
            'firstName'=> $request->firstName,
            'lastName'=>$request->lastName,
            'dob'=>$request->dob,
            'gender'=>$request->gender
        ]);

        DB::table('contacts')
        ->where('student_id', $id)->update([
            'student_id'=>$id,
            'email'=>$request->email,
            'phoneNumber'=>$request->phoneNumber,
            'city'=>$request->city,
            'state'=>$request->state,
            'zipcode'=>$request->zipcode
        ]);

        DB::table('marks')
        ->where('student_id', $id)->update([
            'student_id'=>$id,
            'marathi'=>$request->marathi,
            'english'=>$request->english,
            'hindi'=>$request->hindi,
            'math'=>$request->math,
            'science'=>$request->science
        ]);

        DB::table('departements')
        ->where('student_id', $id)->update([
            'student_id'=>$id,
            'deptName'=>$request->deptName,
            'std'=>$request->std,
            'division'=>$request->division,
            'rollNo'=>$request->rollNo,
        ]);

        return redirect()->route('student');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('students')->where('id', $id)->delete();

        return redirect()->route('student');
    }
}
