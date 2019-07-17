@extends('layouts.master')

@section('js')
<script>
$('#teste').click(function(){
    alert('a');
});
</script>
@stop

@section('content')
Seja Bem-vindo {{ucwords(Auth::user()->name)}}!
<button class="btn btn-primary" id="teste">aaaaaaa</button>
<br><br>

@endsection
