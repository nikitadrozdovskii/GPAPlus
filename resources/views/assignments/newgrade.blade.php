@extends('layouts.mainlayout')

@section('content') 
<h4>Add new grade for {{$data['assignmentname']}}</h4>
{{-- populate dropdown with students, add grade --}}
{!! Form::open(['action' => ['AssignmentsController@savenewgrade', $data['assignment']], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('student', 'Student Name')}}
        {{Form::select('student', $data['students'])}}
    </div>
    <div class="form-group">
            {{Form::label('grade', 'Assignment Grade')}}
            {{Form::text('grade','',['class'=>'form-control'])}}
    </div>
    <a class="btn btn-secondary" href="/assignments" role="button">Back</a>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!} 
@endsection