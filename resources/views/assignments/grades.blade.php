@extends('layouts.mainlayout')

@section('content')
    @foreach($grades as $student)
        {{$student->fname}}
        {{$student->lname}}
        {{$student->grade}}
        <a class="btn btn-primary" href="/assignments/{{$student->pivot->assignment_id}}/{{$student->pivot->student_id}}/edit" role="button">Edit grade</a>                
        <hr>
    @endforeach
@endsection