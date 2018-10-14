@extends('layouts.mainlayout')

@section('content') 
<h4>Edit Grade for {{$data['student']->fname}} {{$data['student']->lname}} , {{$data['assignment']->name}}  </h4>

{{$data['grade'][0]->pivot->grade}}

{{-- {!! Form::open(['action' => ['AssignmentsController@updategrade', $data['student']->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('fname', 'Grade')}}
        {{Form::text('fname',$data['grade'][0]->pivot->grade,['class'=>'form-control'])}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
{!! Form::close() !!}  --}}
@endsection