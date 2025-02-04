@extends('layouts.navbar')

@section('show-computer')
    <link rel="stylesheet" type="text/css" href="/pruebas/resources/css/comentarios.css">



    <div class="container-sm">

        <div class="row" style="margin-top: 2%">
            <div class="col-xs|sm|md|lg|xl-1-12">
                <div class="card">

                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="margin-top: 5px; margin-left: 5px">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info"
                                type="button" role="tab" aria-controls="info" aria-selected="true">Informacion</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="comments-tab" data-bs-toggle="tab" data-bs-target="#comments"
                                type="button" role="tab" aria-controls="comments" aria-selected="false">Comentarios</button>
                        </li>

                    </ul>


                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="home-tab">

                                <h3 class="card-title">{{ $computer->marca . ' ' . $computer->modelo }}</h3>


                                <table class="table" style="width:70%">


                                    <tr>
                                        <th>Marca</th>
                                        <td>{{ $computer->marca }}</td>
                                    </tr>
                                    <tr>
                                        <th>Modelo</th>
                                        <td>{{ $computer->modelo }}</td>
                                    </tr>
                                    <tr>
                                        <th>Encargado</th>
                                        @if ($computer->encargado)
                                            <td>{{ $computer->encargado }}</td>

                                        @else
                                            <td></td>

                                        @endif


                                    </tr>

                                    <tr>
                                        <th>Oficinas</th>

                                        @if ($computer->oficinas)
                                            <td>
                                                @foreach ($computer->oficinas as $oficina)
                                                    {{ $oficina->nombre }} |
                                                @endforeach
                                            </td>
                                        @else
                                            <td>Null</td>
                                        @endif
                                    </tr>

                                    <tr>
                                        <th>Tipos de Uso</th>
                                        @if ($computer->tipo_usos)
                                            <td>
                                                @foreach ($computer->tipo_usos as $usos)
                                                    {{ $usos->nombre }} |
                                                @endforeach
                                            </td>

                                        @else
                                            <td>Empty</td>

                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Sistema Operativo</th>
                                        <td>{{ $computer->so }}</td>
                                    </tr>

                                    <tr>
                                        <th>Almacenamiento</th>
                                        <td>

                                            {{ $computer->almacenamiento }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>RAM</th>
                                        <td>{{ $computer->ram }}</td>
                                    </tr>
                                    <tr>
                                        <th>Fecha</th>
                                        <td>{{ date('d-m-Y', strtotime($computer->fecha)) }}</td>

                                    </tr>

                                </table>

                            </div>
                            <!---
         Nota: optimizar la vista crando un arreglo que guarde los id de los comentarios que vayan a hacer eliminados y que al momento de salir de la pagina usr el controlador para boorarlos
         o crear una opcion que envie a una vista para elegir y eliminar comentarios
        -->
                            <div class="tab-pane fade" id="comments" role="tabpanel">

                                @foreach ($computer->comentarios as $comentario)
                                    <div class="commentbox">
                                        <div class="col">
                                            {{ $comentario->comentario }}
                                        </div>
                                        <form action="{{ route('destroyComentario', [$computer->id, $comentario->id]) }}"
                                            method="POST">
                                            @csrf
                                           
                                            <button type="submit" class="btn-close"></button>
                                        </form>


                                    </div>

                                @endforeach


                            </div>

                        </div>



                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-primary" href="{{ route('edit', $computer->id) }}"
                                    role="button">Editar</a>
                                <a class="btn btn-secondary" href="{{ route('addcomentario', $computer->id) }}"> Agregar Comentario </a>

                            </div>
                            <form class="col-2" action="{{ route('destroy', $computer->id) }}" method="post">
                                @csrf
                                
                                <button type="submit" onclick="confirm('¿Seguro de eliminar este Computador?')" class="btn btn-danger">Eliminar</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

    <script>
        function eliminarComentario(id) {

        }
    </script>


@endsection
