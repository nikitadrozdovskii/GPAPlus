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
                <hr>
            </div>
        @endforeach
    @else
            No assignments found
    @endif
@endsection