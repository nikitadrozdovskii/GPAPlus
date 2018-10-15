@extends('layouts.mainlayout')

@section('content')
<div><a class="btn btn-secondary" href="/assignments" role="button">Back</a> 
    <a class="btn btn-primary" href="/assignments/{{$data['assignment']->id}}/grades/new " role="button">Add grades</a> 
</div>
<h3>Grades for {{$data['assignment']->name}}</h3>
    @foreach($data['grades'] as $student)
        {{$student->fname}}
        {{$student->lname}}
        {{$student->pivot->grade}} 
        <a class="btn btn-primary" href="/assignments/{{$student->pivot->assignment_id}}/{{$student->pivot->student_id}}/edit" role="button">Edit grade</a>                
        <hr>
    @endforeach
@endsection 