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
        return view('assignments.grades')->with('grades',$grades);
    }

    public function editgrade($assignment, $student){
        $a = Assignment::find($assignment);
        $s = Student::find($student);
        $data = array('assignment'=>$a,'student'=>$s);
        return view('assignments.editgrade')->with('data', $data);
    }
}
