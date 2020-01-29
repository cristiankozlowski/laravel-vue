@extends('layouts.master')

@section('content')

<list-users all-users="{{$users}}"></list-users>

@endsection
