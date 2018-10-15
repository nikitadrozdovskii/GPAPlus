@extends('layouts.mainlayout')

@section('content') 
<h4>Edit Assignment</h4>
{!! Form::open(['action' => ['AssignmentsController@update', $assignment->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Assignment Name')}}
        {{Form::text('name',$assignment->name,['class'=>'form-control'])}}
    </div>
    <div class="form-group">
            {{Form::label('due', 'Due Date')}}
            {{Form::date('due',$assignment->due,['class'=>'form-control'])}}
        </div>
    <div class="form-group">
            {{Form::label('desc', 'Description')}}
            {{Form::textarea('desc',$assignment->desc,['class'=>'form-control'])}}
    </div>
    <a class="btn btn-secondary" href="/assignments" role="button">Back</a>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!} 
@endsection