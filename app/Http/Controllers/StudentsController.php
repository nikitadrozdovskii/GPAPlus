<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        $averages = array();
        //iterate through students, get all their assignments, calculate GPA here, pass straight into view
        foreach($students as $student){
            $assignment_grades = Student::find($student->id)->grades;
            $total_grade = 0;
            $counter = null;
            foreach($assignment_grades as $assignment_grade){
                $counter+=1;
                $total_grade += $assignment_grade->pivot->grade;
            }
            if ($counter>0){
                $averages[$student->id] = $total_grade/$counter;
            } else {
                $averages[$student->id] = 0;
            }

        }
        $data = array('averages'=>$averages,'students'=>$students);
        // return $data;
        return view('students.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            $this->validate($request, [
                'fname' => 'required',
                'lname' => 'required'
            ])
        ]);

        //create student
        $student = new Student;
        $student->fname = $request->input('fname');
        $student->lname = $request->input('lname');
        $student->grade = 0;
        $student->save();

        return redirect('/students')->with('success', 'Student added');
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
        return view('students.edit')->with('student',$student);
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
        $this->validate($request, [
            $this->validate($request, [
                'fname' => 'required',
                'lname' => 'required'
            ])
        ]);

        //create student
        $student = Student::find($id);
        $student->fname = $request->input('fname');
        $student->lname = $request->input('lname');
        $student->grade = 0;
        $student->save();

        return redirect('/students')->with('success', 'Student updated');
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
        return redirect('/students')->with('success', 'Student removed');
        
    }
}
