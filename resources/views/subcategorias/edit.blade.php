@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Subcategoria</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        @if ($errors->any())
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>
                                @foreach ($errors->all() as $error)
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                    <form action="{{ route('subcategorias.update',$subcategoria->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="controls">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Descripcion</label>
                                        <input id="descripcion" type="text" name="descripcion"  class="form-control" placeholder="" required="required" data-error="Ingrese su nombre por favor." value="{{ $subcategoria->descripcion }}">

                                    </div>
                                </div>



                            </div>

                            <div class="form-group">
                                <label for="client_id">Categoria</label>
                                <select class="form-control selectpicker" name="client_id" id="client_id" data-live-search="true">
                                    @foreach ($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                                    @endforeach
                                </select>
                            </div>




                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_pago">Fecha_Venta:</label>
                                        <input type="date" id="fecha_venta" name="fecha_venta" value="{{ date('Y-m-d', strtotime($envio->fecha_venta)) }} ">
                                    </div>
                                </div> --}}
                            </div>


                            <div class="row">

                                        <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
