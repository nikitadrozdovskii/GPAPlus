@extends('layouts.mainlayout')

@section('content')
    <h4>Students</h4>
    <a class="btn btn-primary" href="/students/create" role="button">Add new student</a>
    @if(count($data['students'])>0)
        @foreach($data['students'] as $student)
            <div class="well">
                <span class="inline_heading">Name:</span> {{$student->fname}}{{$student->lname}} 
                <span class="inline_heading">Average assignment grade:</span> 
                @if($data['averages'][$student->id]<70)
                <span class="F badge badge-secondary">{{$data['averages'][$student->id]}} - F</span>         
                @elseif($data['averages'][$student->id]<80)
                <span class="C badge badge-secondary">{{$data['averages'][$student->id]}} - C</span> 
                @elseif($data['averages'][$student->id]<90)
                <span class="B badge badge-secondary">{{$data['averages'][$student->id]}} - B</span> 
                @elseif($data['averages'][$student->id]<101)
                <span class="A badge badge-secondary align-bottom">{{$data['averages'][$student->id]}} - A</span>  
                @endif       
                {{-- <div> --}}
                        <a class="btn btn-primary" href="/students/{{$student->id}}/edit" role="button">Edit</a>
                        {!!Form::open(['action'=>['StudentsController@destroy', $student->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Remove', ['class' => 'btn btn-danger btn-outline'])}}
                        {!!Form::close()!!}
                {{-- </div> --}}

                <hr>
            </div>
        @endforeach
    @else
            No students found
    @endif
@endsection