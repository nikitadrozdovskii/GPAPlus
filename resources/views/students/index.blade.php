@extends('layouts.mainlayout')

@section('content')
    <h4>Students</h4>
    <a class="btn btn-primary" href="/students/create" role="button">Add new student</a>
    @if(count($students)>0)
        @foreach($students as $student)
            <div class="well">
                First: {{$student->fname}}
                Last: {{$student->fname}} 
                Grade: {{$student->grade}}
                <hr>
            </div>
        @endforeach
    @else
            No students found
    @endif
@endsection