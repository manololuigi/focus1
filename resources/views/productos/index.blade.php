@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Productos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">


                        @can('crear-blog')
                        <a class="btn btn-warning" href="{{ route('productos.create') }}">Nuevo</a>
                        @endcan

                        <div class="table-responsive">

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display: none;">SKU</th>
                                    <th style="color:#fff;">Producto</th>
                                    <th style="color:#fff;">Descripcion</th>
                                    <th style="color:#fff;">Estado</th>
                                    <th style="color:#fff;">Categoria</th>
                                    <th style="color:#fff;">Subcategoria</th>
                                    <th style="color:#fff;">Cantidad</th>
                                    <th style="color:#fff;">Fecha_Ingreso</th>
                                    <th style="color:#fff;">Costo en Dolares</th>
                                    <th style="color:#fff;">Traida en Lps.</th>
                                    <th style="color:#fff;">Total Costo en Lps.</th>
                                    <th style="color:#fff;">Venta</th>
                                    <th style="color:#fff;">5% OFF</th>
                                    <th style="color:#fff;">10% OFF</th>
                                    <th style="color:#fff;">15% OFF</th>
                                    <th style="color:#fff;">20% OFF</th>
                                    <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                            @foreach ($productos as $producto)
                            <tr>
                                <td style="display: none;">{{ $producto->id }}</td>
                                <td>{{ $producto->sku }}</td>
                                <td>{{ $producto->producto }}</td>
                                <td>{{ $producto->descripcion }}</td>
                                <td>{{ $producto->categoria }}</td>
                                <td>{{ $producto->subcategoria }}</td>
                                <td>{{ $producto->cantidad }}</td>
                                <td>{{ $producto->fecha_ingreso }}</td>
                                <td>{{ $producto->costo_dolares }}</td>
                                <td>{{ $producto->traida_lps }}</td>
                                <td>{{ $producto->totalCosto_lps }}</td>
                                <td>{{ $producto->venta }}</td>
                                <td>{{ $producto->desc5 }}</td>
                                <td>{{ $producto->desc10 }}</td>
                                <td>{{ $producto->desc15 }}</td>
                                <td>{{ $producto->desc20 }}</td>
                                <td>
                                    <form action="{{ route('productos.destroy',$producto->id) }}" class="formulario-eliminar" method="POST">
                                        @can('editar-blog')
                                        <a class="btn btn-info" href="{{ route('productos.edit',$producto->id) }}">Editar</a>
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
                            {!! $productos->links() !!}
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
