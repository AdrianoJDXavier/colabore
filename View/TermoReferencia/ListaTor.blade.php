@extends('Layout.principal')
@section('conteudo')
    @if(empty($tors))
        <section class="panel">
        <header class="panel-heading">
            TOR
        </header>
            <div class="panel-body">
                <h3>Você não possui termos de referencia no sistema!</h3>
            </div>
            @else
        </section>
        <section class="panel">
        <header class="panel-heading">
            Termos de Referencia
        </header>
            <div>
                <a href="PessoaF"><button class="btn btn-primary" style="margin: 10px">Inserir TOR</button></a>
            </div>
        <div class="panel-body">
            <table class="table table-striped table-advance table-hover">
                <tbody>
                <tr>
                    <th><i class="icon_key_alt"></i> ID </th>
                    <th><i class="icon_id"></i> Tipo</th>
                    <th><i class="icon_calendar"></i> Titulo</th>
                    <th><i class="icon_cog"></i> Ações</th>
                </tr>
                @foreach($tors as $tor)
                    <tr>
                        <td>{{$tor->numTor}}</td>
                        <td>{{$tor->tipo}}</td>
                        <td>{{$tor->titulo}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-success" href="#"><i class="icon_pencil"></i></a>
                                <a class="btn btn-danger" onclick="return confirm('Deseja realmente deletar o cadastro de ?')" href=""><i class="icon_trash_alt"></i></a>
                                <a class="btn btn-primary" href="{{route('print-pdf', $tor->numTor)}}" title="Visualizar PDF" target="_blank"><i class="icon_document"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    @endif
@stop