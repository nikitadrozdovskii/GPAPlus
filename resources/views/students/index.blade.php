@extends('layouts.mainlayout')

@section('content')
    <a class="btn btn-primary" href="/students/create" role="button">Add new student</a>
    <h4>Students</h4>
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