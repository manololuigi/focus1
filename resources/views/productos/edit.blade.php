@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Info. Venta</h3>
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


                    <form action="{{ route('envios.update',$envio->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="controls">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Nombre *</label>
                                        <input id="nombre" type="text" name="nombre"  class="form-control" placeholder="" required="required" data-error="Ingrese su nombre por favor." value="{{ $envio->nombre }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Telefono *</label>
                                        <input id="telefono" type="text" name="telefono" class="form-control" placeholder="" required="required" data-error="Ingrese su telefono por favor." value="{{ $envio->telefono }}">
                                    </div>
                                </div>
                            </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Email *</label>
                                            <input id="email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." value="{{ $envio->email }}">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="form_email">Ciudad *</label>
                                            <input id="ciudad" type="text" name="ciudad" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." value="{{ $envio->ciudad }}">

                                        </div>
                                    </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Forma Pago</label>
                                        <input id="forma_pago" type="text" name="forma_pago"  class="form-control" placeholder="" required="required" data-error="Ingrese los datos por favor." value="{{ $envio->forma_pago }}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Total</label>
                                        <input id="total" type="number" name="total" class="form-control" placeholder="" required="required" data-error="Ingrese los datos por favor." value="{{ $envio->total }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_name">Direccion 1 *</label>
                                        <input id="dir_1" type="text" name="dir_1" class="form-control" placeholder="" required="required" data-error="Ingrese su nombre por favor." value="{{$envio->dir_1}}">

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Direccion 2 *</label>
                                        <input id="dir_2" type="text" name="dir_2" class="form-control" placeholder="" required="required" data-error="Ingrese su telefono por favor." value="{{$envio->dir_2}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="form_lastname">Contacto Alterno *</label>
                                        <input id="ct_alterno" type="text" name="ct_alterno" id="ct_alterno" class="form-control" placeholder="" required="required" data-error="Ingrese su telefono por favor." value="{{$envio->ct_alterno}}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_pago">Fecha_Venta:</label>
                                        <input id="fecha_venta" type="text" name="fecha_venta" class="form-control" placeholder="" required="required"   value="{{$envio->fecha_venta}}">
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="fecha_pago">Fecha_Venta:</label>
                                        <input type="date" id="fecha_venta" name="fecha_venta" value="{{ date('Y-m-d', strtotime($envio->fecha_venta)) }} ">
                                    </div>
                                </div> --}}
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Observaciones *</label>
                                        <textarea id="observaciones" name="observaciones" class="form-control" placeholder="Write your message here." rows="4" required="required" data-error="">{{$envio->observaciones}}</textarea>
                                        </div>
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
