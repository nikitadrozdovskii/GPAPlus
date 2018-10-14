@extends('layouts.mainlayout')

@section('content') 
<h4>Edit Grade for {{$data['student']->fname}} {{$data['student']->lname}} , {{$data['assignment']->name}}  </h4>

{{$data['assignment']}}


@endsection