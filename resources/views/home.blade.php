@extends('layouts.master')

@section('content')
Seja Bem-vindo {{ucwords(Auth::user()->name)}}!
<br><br>

@endsection
