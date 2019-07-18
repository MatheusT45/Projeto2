@extends('layouts.master')

@section('js')
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@stop
@section('content_header')
    <h1>Listagem de Usuários</h1>
@stop

@section('content')
<div class="card">
    <div class="card-header"></div>
    <div class="card-body">


    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Nível</th>
                <th>Data de Criação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$perfis[$user->tipo]}}</td>
                <td>{{date('d/m/Y',strtotime($user->created_at))}}</td>
            </tr>
            @endforeach
        </tbody>
      
    </table>
    </div>
</div>

@stop