<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\Student;


class AssignmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assignments = Assignment::all();
        return view('assignments.index')->with('assignments',$assignments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('assignments.create');
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
                'name' => 'required',
                'due' => 'required'
            ])
        ]);

        //create assignment
        $assignment = new Assignment;
        $assignment->name = $request->input('name');
        $assignment->desc = $request->input('desc');
        $assignment->due = $request->input('due');
        $assignment->save();

        return redirect('/assignments')->with('success', 'Assignment added');
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
        $assignment = Assignment::find($id);
        return view('assignments.edit')->with('assignment',$assignment);
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
                'name' => 'required',
                'due' => 'required'
            ])
        ]);

        $assignment = Assignment::find($id);
        $assignment->name = $request->input('name');
        $assignment->desc = $request->input('desc');
        $assignment->due = $request->input('due');
        $assignment->save();

        return redirect('/assignments')->with('success', 'Assignment updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $assignment = Assignment::find($id);
        $assignment->delete();
        return redirect('/assignments')->with('success', 'Assignment deleted');
    }

    public function grades($id){
        $grades = Assignment::find($id)->grades;
        $data = array("grades"=>$grades,"assignment"=>Assignment::find($id));
        return view('assignments.grades')->with('data',$data);
    }

    public function editgrade($assignment, $student){
        $a = Assignment::find($assignment);
        $s = Student::find($student);
        // $g = Assignment::find($assignment)->grades()->
        //get grade for this assignment and this student
        $g = Assignment::findOrFail($assignment)->grades()->wherePivot('student_id', '=', $student)
    ->get(); // execute the query

        $data = array('assignment'=>$a,'student'=>$s, 'grade'=>$g);
        return view('assignments.editgrade')->with('data', $data);
    }

    //update grade in database
    public function updategrade(Request $request, $student,$assignment){
        $grade = Assignment::find($assignment)->grades()->updateExistingPivot($student, ['grade' => (double)$request->grade]);
        return redirect()->route('assignments.grades',[$assignment])->with('success', 'Grade updated');
    }

    //show new grade page
    public function newgrade(Request $request,$assignment){
        $students = Student::all();
        $studentsdropdown=array();
        foreach($students as $student)
        {
            $studentsdropdown[$student->id] = $student->fname." ".$student->lname;

        }
        $assignmentname = Assignment::find($assignment)->name;
        $data = array('students'=>$studentsdropdown, 'assignmentname'=>$assignmentname, 'assignment'=>$assignment);        
        return view('assignments.newgrade')->with('data', $data);
    }

    //add new grade to database
       public function savenewgrade(Request $request, $assignment){
           $student =  $request->input('student');
           $grade =  $request->input('grade');
           //check for duplicates
           if ( Assignment::findOrFail($assignment)->grades->contains($student)){
                return redirect()->route('assignments.grades',[$assignment])->with('error', 'Grade for this student already exists');
           }
           $g = Assignment::findOrFail($assignment)->grades()->attach($student, ['grade' => $grade]);
        return redirect()->route('assignments.grades',[$assignment])->with('success', 'Grade added');

    }

    public function deletegrade(Request $request, $assignment,$student){
        Assignment::findOrFail($assignment)->grades()->detach($student);
        return redirect()->route('assignments.grades',[$assignment])->with('success', 'Grade deleted');
 }
}
