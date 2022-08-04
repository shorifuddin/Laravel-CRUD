<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StudentRequest;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alldata = Student::all();
        return view('backend.student.all',compact('alldata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.student.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        // return $request;
        $request->validated();
        $insert=Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subj' => $request->subj,
        ]);

        if($insert)
        {
            Session::flash('success','Value');
            return redirect()->route('student.index');
        }
        Session::flash('error','Value');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('backend.student.view',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('backend.student.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $request->validated();

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->subj = $request->subj;
        $student->update();

        if($student->update())
        {
            Session::flash('success','Value');
            return redirect()->back();
        }
        Session::flash('error','Value');
        return redirect()->back();
    }

    /**
     * softdelete the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function softdelete(Student $student)
    {
        // return $student;
        $student->status = 0;
        $student->update();

        if($student->update())
        {
            Session::flash('success','Value');
            return redirect()->route('student.index');
        }
        Session::flash('error','Value');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        // return $student;
        $student->delete();
        return redirect()->route('student.index');
    }
}
