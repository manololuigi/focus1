@extends('layouts.app')

@section('content')
<section class="section">
  <div class="section-header">
      <h3 class="page__heading">Usuarios</h3>
  </div>
      <div class="section-body">
          <div class="row">
              <div class="col-lg-12">
                  <div class="card">
                      <div class="card-body">
                          <a class="btn btn-warning" href="{{ route('usuarios.create') }}">Nuevo</a>

                            <table class="table table-striped mt-2">
                              <thead style="background-color:#6777ef">
                                  <th style="display: none;">ID</th>
                                  <th style="color:#fff;">Nombre</th>
                                  <th style="color:#fff;">E-mail</th>
                                  <th style="color:#fff;">Rol</th>
                                  <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                                @foreach ($usuarios as $usuario)
                                  <tr>
                                    <td style="display: none;">{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>
                                      @if(!empty($usuario->getRoleNames()))
                                        @foreach($usuario->getRoleNames() as $rolNombre)
                                          <h5><span class="badge badge-dark">{{ $rolNombre }}</span></h5>
                                        @endforeach
                                      @endif
                                    </td>

                                    <td>
                                      <a class="btn btn-info" href="{{ route('usuarios.edit',$usuario->id) }}">Editar</a>

                                      {!! Form::open(['method' => 'DELETE','route' => ['usuarios.destroy', $usuario->id],'style'=>'display:inline']) !!}
                                          {!! Form::submit('Borrar', ['class' => 'btn btn-danger formulario-eliminar']) !!}
                                      {!! Form::close() !!}
                                    </td>
                                  </tr>
                                @endforeach
                              </tbody>
                            </table>
                            <!-- Centramos la paginacion a la derecha -->
                          <div class="pagination justify-content-end">
                            {!! $usuarios->links() !!}
                          </div>

                      </div>
                  </div>
              </div>
          </div>
      </div>
    </section>
@endsection

@section('page_js')

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
    'El producto no ha sido eliminado porque actualmente est?? un registro de la tabla DetalleVenta.',
        'error'
      )
</script>
@endif --}}


<script>
    $('.formulario-eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
            title: '??Confirma la eliminaci??n del registro?',
   text: "??Los cambios no se podran revertir!",
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
