@extends('layouts.master')

@section('content')

<users-table users="{{ $users }}"></users-table>

@endsection
