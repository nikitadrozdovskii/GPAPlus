@extends('layouts.mainlayout')

@section('content') 
<h4>Edit student</h4>
{!! Form::open(['action' => ['StudentsController@update', $student->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('fname', 'First Name')}}
        {{Form::text('fname',$student->fname,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
            {{Form::label('lname', 'Last Name')}}
            {{Form::text('lname',$student->lname,['class'=>'form-control'])}}
    </div>
    <a class="btn btn-secondary" href="/students" role="button">Back</a>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!} 
@endsection