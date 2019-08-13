@extends('layouts.master')

@section('js')
{{-- Alertas --}}
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

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
    </div>
@endif


<div class="row">
    <div class="col-lg-12">
        <form class="form-horizontal" action="{{route('atualiza_dados')}}" method="POST">
        @csrf
                
        <div class="card">
                <div class="card-header"> Detalhes </div>
                <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                      
                        <div class="input-group">
                                <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-user"></i></div>
                                </div>
                                <input type="text" class="form-control" placeholder="Nome" name="name" value="{{$user->name}}"  required>
                              </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-at"></i></div>
                                </div>
                            <input type="text" class="form-control" placeholder="E-mail" name="email" value="{{$user->email}}"  required>
                        </div>
                    </div>

                </div><br>
                <label><b>Alterar senha</b></label>
                 <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                      </div>
                            <input type="password" class="form-control" placeholder="Senha" name="password" >
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="input-group">
                                <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-check"></i></div>
                                      </div>
                            <input type="password" class="form-control" placeholder="Confirme sua senha"  name="password_confirmation" >
                        </div>
                    </div>
                </div><br>
                <div class="row">
                    <div class="col-lg-4">
                        <button type="submit" class="btn btn-primary">Alterar</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</div>


@stop