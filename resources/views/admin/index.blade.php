@extends('layouts.admin')
@section('content')

Welcome, {{Auth::user()->name}}

@endsection
