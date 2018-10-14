@extends('layouts.mainlayout')

@section('content') 
<h4>Add assignment</h4>
{!! Form::open(['action' => 'AssignmentsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Assignment Name')}}
        {{Form::text('name','',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
            {{Form::label('due', 'Due Date')}}
            {{Form::date('due',\Carbon\Carbon::now(),['class'=>'form-control'])}}
        </div>
    <div class="form-group">
            {{Form::label('desc', 'Assignment Description')}}
            {{Form::textarea('desc','',['class'=>'form-control'])}}
    </div>
    <a class="btn btn-secondary" href="/assignments" role="button">Back</a>
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!} 
@endsection