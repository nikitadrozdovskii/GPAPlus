@extends('layouts.mainlayout')

@section('content')
    <h4>Students</h4>
    <a class="btn btn-primary" href="/students/create" role="button">Add new student</a>
    @if(count($data['students'])>0)
        @foreach($data['students'] as $student)
            <div class="well">
                First: {{$student->fname}}
                Last: {{$student->lname}} 
                Average assignment grade: {{$data['averages'][$student->id]}}
                <div>
                        <a class="btn btn-primary" href="/students/{{$student->id}}/edit" role="button">Edit</a>
                        {!!Form::open(['action'=>['StudentsController@destroy', $student->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Remove', ['class' => 'btn btn-danger btn-outline'])}}
                        {!!Form::close()!!}
                </div>

                <hr>
            </div>
        @endforeach
    @else
            No students found
    @endif
@endsection