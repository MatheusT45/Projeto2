@extends('layouts.master')

@section('content')
coe {{Auth::user()->name}}
@endsection
