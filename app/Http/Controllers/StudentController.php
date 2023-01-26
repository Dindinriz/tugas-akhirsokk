<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $students = Student::all();

        return view('student.index', ['student' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student/create');
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
            'code'=>'required',
            'name'=>'required',
            'gender'=>'required',
            'birth_place'=>'required',
            'birth_date'=>'required',
        ]);

        $student = new Student([
            'code' => $request->get('code'),
            'name' => $request->get('name'),
            'gender' => $request->get('gender'),
            'birth_place' => $request->get('birth_place'),
            'birth_date' => $request->get('birth_date')
        ]);
        $student->save();
        return redirect('/student')->with('success', 'Student Saved!');
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
        $student = Student::find($id);
        return view('student.edit', compact('student'));
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
            'code'=>'required',
            'name'=>'required',
            'gender'=>'required',
            'birth_place'=>'required',
            'birth_date'=>'required',
        ]);

        $student = Student::find($id);
        $student->code = $request->get('code');
        $student->name = $request->get('name');
        $student->gender = $request->get('gender');
        $student->birth_place = $request->get('birth_place');
        $student->birth_date = $request->get('birth_date');
        $student->save();

        return redirect('/student')->with('success', 'Student Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect('/student')->with('success', 'Student Deleted!');
    }
}
