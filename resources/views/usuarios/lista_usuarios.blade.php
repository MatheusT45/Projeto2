@extends('layouts.master')

@section('js')
<script>
    $(document).ready(function() {
    $('#usuarios').DataTable();
    $('#usuarios_exc').DataTable();
} );

</script>

@if(session()->has('success'))
    <script>
        alertaSucesso("{!! session()->get('success') !!}")
    </script>
@endif

@if(session()->has('erro'))
    <script>
        alertaErro("{!! session()->get('erro') !!}")
    </script>
@endif
@stop


@section('content')
<div class="card">
    <div class="card-header">
        <ul class="nav nav-tabs" id="tabUsers" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="users-tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="true">Listagem de Usuários</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="users-exc-tab" data-toggle="tab" href="#exc" role="tab" aria-controls="exc" aria-selected="true">Usuários Excluídos</a>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="tabUsersContent">
            <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">
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
                                        <a class="dropdown-item" href="{{route('excluir_usuario', $user->id)}}"><i class="fas fa-ban"></i> Excluir</a>
                                    </div>
                                </div>
                            </td>
                            @endcan
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="exc" role="tabpanel" aria-labelledby="users-exc-tab">
                    <table id="usuarios_exc" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Data de Exclusão</th>
                                    @can('admin')
                                    <th>Opções</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users_exc as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{date('d/m/Y',strtotime($user->deleted_at))}}</td>
                                    @can('admin')
                                    <td width="20px">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{route('retornar_usuario',$user->id)}}"><i class="fas fa-undo-alt"></i> Retornar</a>
                                               
                                            </div>
                                        </div>
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{route('incluir_usuario')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Incluir</a>
        </div>
</div>

@stop