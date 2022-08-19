@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Envios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                        @can('crear-blog')
                        <a class="btn btn-warning" href="{{ route('envios.create') }}">Nuevo</a>
                        @endcan

                        <div class="table-responsive">

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Tel.</th>
                                    <th style="color:#fff;">Ciudad</th>
                                    <th style="color:#fff;">Direccion 1</th>
                                    <th style="color:#fff;">Direccion 2</th>
                                    <th style="color:#fff;">Email</th>
                                    <th style="color:#fff;">Ct_Alterno</th>
                                    <th style="color:#fff;">Observaciones</th>
                                    <th style="color:#fff;">Identidad</th>
                                    <th style="color:#fff;">RTN</th>
                                    <th style="color:#fff;">Total</th>
                                    <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td style="display: none;">{{ $client->id }}</td>
                                <td>{{ $client->nombre }}</td>
                                <td>{{ $client->telefono }}</td>
                                <td>{{ $client->ciudad }}</td>
                                <td>{{ $client->dir_1 }}</td>
                                <td>{{ $client->dir_2 }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->ct_alterno }}</td>
                                <td>{{ $client->observaciones }}</td>
                                <td>{{ $client->identidad }}</td>
                                <td>{{ $client->rtn }}</td>
                                <td>{{ $client->total }}</td>
                                <td>
                                    <form action="{{ route('clients.destroy',$client->id) }}" class="formulario-eliminar" method="POST">
                                        @can('editar-blog')
                                        <a class="btn btn-info" href="{{ route('clients.edit',$client->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-blog')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $clients->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page_js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


@stop
