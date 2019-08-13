@extends('layouts.master')

@section('js')
<script>
    $(document).ready(function() {
    $('#usuarios').DataTable();
} );
$('#excluir_usuario').click(function(){
   
    bootbox.confirm({
    message: "Tem certeza que deseja excluir esse usuário?",
    buttons: {
        confirm: {
            label: 'Excluir',
            className: 'btn-danger'
        },
        cancel: {
            label: 'Cancelar',
            className: 'btn-secondary'
        }
    },
    callback: function (result) {
        
    }
});
});

</script>
@stop


@section('content')
<div class="card">
    <div class="card-header">Listagem de Usuários</div>
    <div class="card-body">


    <table id="usuarios" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>E-mail</th>
                <th>Nível</th>
                <th>Data de Criação</th>
                @can('admin')
                <th>Opções</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$perfis[$user->tipo]}}</td>
                <td>{{date('d/m/Y',strtotime($user->created_at))}}</td>
                @can('admin')
                <td width="20px">
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('editar_usuario',$user->id)}}"><i class="fas fa-edit"></i> Editar</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" id="excluir_usuario" href="#"><i class="fas fa-ban"></i> Excluir</a>
                            {{-- formulário de exclusãod e usuários --}}
                            {{-- <form action="#" method="post"></form> --}}
                        </div>
                    </div>
                </td>
                @endcan
            </tr>
            @endforeach
        </tbody>
      
    </table>
    </div>
    <div class="card-footer">
        <a href="{{route('incluir_usuario')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Incluir</a>
    </div>
</div>

@stop