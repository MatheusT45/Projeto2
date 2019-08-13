@extends('layouts.master')
@section('js')

@if(session()->has('erro'))
    <script>
        alertaErro("{!! session()->get('erro') !!}")
    </script>
@endif

@stop

@section('content')
Seja Bem-vindo {{ucwords(Auth::user()->name)}}!
<br><br>

@endsection
