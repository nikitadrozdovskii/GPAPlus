@extends('layouts.mainlayout')

@section('content') 
<h4>Add student</h4>
{!! Form::open(['action' => 'StudentsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('fname', 'First Name')}}
        {{Form::text('fname','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
            {{Form::label('lname', 'Last Name')}}
            {{Form::text('lname','',['class'=>'form-control'])}}
    </div>
    <a class="btn btn-secondary" href="/students" role="button">Back</a>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!} 
@endsection