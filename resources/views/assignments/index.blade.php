@extends('layouts.mainlayout')

@section('content')
    <h4>Assignments</h4>
    <a class="btn btn-primary" href="/assignments/create" role="button">Create new assignment</a>
    @if(count($assignments)>0)
        @foreach($assignments as $assignment)
            <div class="well">
                Name: {{$assignment->name}}
                Description: {{$assignment->desc}} 
                Due date: {{$assignment->due}}
                <a class="btn btn-primary" href="/assignments/{{$assignment->id}}/edit" role="button">Edit</a>
                {!!Form::open(['action'=>['AssignmentsController@destroy', $assignment->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger btn-outline'])}}
                        {!!Form::close()!!}
                <hr>
            </div>
        @endforeach
    @else
            No assignments found
    @endif
@endsection