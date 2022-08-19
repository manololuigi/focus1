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
                                    <th style="color:#fff;">Fecha_venta</th>
                                    <th style="color:#fff;">Forma_Pago</th>
                                    <th style="color:#fff;">Total</th>
                                    <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                            @foreach ($envios as $envio)
                            <tr>
                                <td style="display: none;">{{ $envio->id }}</td>
                                <td>{{ $envio->nombre }}</td>
                                <td>{{ $envio->telefono }}</td>
                                <td>{{ $envio->ciudad }}</td>
                                <td>{{ $envio->dir_1 }}</td>
                                <td>{{ $envio->dir_2 }}</td>
                                <td>{{ $envio->email }}</td>
                                <td>{{ $envio->ct_alterno }}</td>
                                <td>{{ $envio->observaciones }}</td>
                                <td>{{ $envio->fecha_venta }}</td>
                                <td>{{ $envio->forma_pago }}</td>
                                <td>{{ $envio->total }}</td>
                                <td>
                                    <form action="{{ route('envios.destroy',$envio->id) }}" class="formulario-eliminar" method="POST">
                                        @can('editar-blog')
                                        <a class="btn btn-info" href="{{ route('envios.edit',$envio->id) }}">Editar</a>
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
                            {!! $envios->links() !!}
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


@if (session('eliminar') == 'ok')
<script>
    Swal.fire(
    'Registro Eliminado!',
    'El registro ha sido eliminado exitosamente.',
        'success'
      )
</script>
@endif

{{-- @if (session('elimina') == 'ok')
<script>
    Swal.fire(
    'Error!',
    'El producto no ha sido eliminado porque actualmente está un registro de la tabla DetalleVenta.',
        'error'
      )
</script>
@endif --}}


<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '¿Confirma la eliminación del registro?',
   text: "¡Los cambios no se podran revertir!",
   icon: 'warning',
   showCancelButton: true,
  confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Si, eliminar!',
   cancelButtonText: 'Cancelar!'
 }).then((result) => {
   if (result.value) {

    this.submit();
    //  Swal.fire(
    //    'Deleted!',
    //    'Your file has been deleted.',
    //    'success'
    //  )
   }
 })

    });

//     Swal.fire({
//   title: 'Are you sure?',
//   text: "You won't be able to revert this!",
//   icon: 'warning',
//   showCancelButton: true,
//   confirmButtonColor: '#3085d6',
//   cancelButtonColor: '#d33',
//   confirmButtonText: 'Yes, delete it!'
// }).then((result) => {
//   if (result.isConfirmed) {
//     Swal.fire(
//       'Deleted!',
//       'Your file has been deleted.',
//       'success'
//     )
//   }
// })
</script>


@stop

