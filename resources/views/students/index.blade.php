@extends('layouts.mainlayout')

@section('content')
    <h4>Students</h4>
    @if(count($students)>0)
        @foreach($students as $student)
            <div class="well">
                First: {{$student->fname}}
                Last: {{$student->fname}} 
                Grade: {{$student->fname}}
                <hr>
            </div>
        @endforeach
    @else
            No students found
    @endif
@endsection