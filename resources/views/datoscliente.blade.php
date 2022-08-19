<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style>
    body {
    font-family: 'Lato', sans-serif;
}

h1 {
    margin-bottom: 40px;
}

label {
    color: #333;
}

.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 80%;
    margin-left: 3px;
    }
.btn-cancel {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 100%;
    margin-left: 3px;
}
.help-block.with-errors {
    color: #ff5050;
    margin-top: 5px;

}

.card{
	margin-left: 10px;
	margin-right: 10px;
}

</style>



<div class="container">
    <div class=" text-center mt-5 ">

        <h1 >Información del Cliente</h1>


    </div>


<div class="row ">
  <div class="col-lg-7 mx-auto">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light">

        <div class = "container">

            @foreach ($ventas as $venta)
            <form id="contact-form" action="{{ route('envio.store') }}" method="POST" role="form">
                @csrf


            <div class="controls">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Nombre *</label>
                            <input id="nombre" type="text" name="nombre"  class="form-control" placeholder="" required="required" data-error="Ingrese su nombre por favor." value="{{ $venta->nombre }}">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Telefono *</label>
                            <input id="telefono" type="text" name="telefono" class="form-control" placeholder="" required="required" data-error="Ingrese su telefono por favor." value="{{ $venta->telefono }}">
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_email">Email *</label>
                                <input id="email" type="email" name="email" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." value="{{ $venta->email }}">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_email">Ciudad *</label>
                                <input id="ciudad" type="text" name="ciudad" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." value="{{ $venta->ciudad }}">

                            </div>
                        </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">Identidad</label>
                                    <input id="identidad" type="text" name="identidad" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." value="{{ $venta->identidad }}">

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="form_email">RTN</label>
                                    <input id="rtn" type="text" name="rtn" class="form-control" placeholder="Please enter your email *" required="required" data-error="Valid email is required." value="{{ $venta->rtn }}">

                                </div>
                            </div>

                        @for ($i=1; $i <= 4; $i++)
                                <div class="col-md-6">
                                    <label for="formrtn">Producto {{ $i }}</label>
                                    <input type="text" name="products[{{ $i }}][value]" class="form-control"
                                      value="{{ $venta->products[$i]['value'] ?? '' }}">
                                </div>
                        @endfor

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">Direccion 1 *</label>
                            <input id="dir_1" type="text" name="dir_1" class="form-control" placeholder="" required="required" data-error="Ingrese su direccion por favor." value="{{$venta->dir_1}}">

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Direccion 2 *</label>
                            <input id="dir_2" type="text" name="dir_2" class="form-control" placeholder="" required="required" data-error="Ingrese su direccion 2 por favor." value="{{$venta->dir_2}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_lastname">Contacto Alterno *</label>
                            <input id="ct_alterno" type="text" name="ct_alterno" id="ct_alterno" class="form-control" placeholder="" required="required" data-error="Ingrese su contacto alterno por favor." value="{{$venta->ct_alterno}}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Observaciones *</label>
                            <textarea id="observaciones" name="observaciones" class="form-control" placeholder="" rows="4" required="required" data-error="">{{$venta->observaciones}}</textarea>
                            </div>

                        </div>


                    <div class="col-md-12">

                        <input type="submit" class="btn btn-success btn-send  pt-2 btn-block
                            " value="ENVIAR DATOS" >
                        <a href="/inicio" class="btn btn-primary btn-cancel pt-2 btn-block">Cancelar</a>
                </div>

                </div>


        </div>
         </form>
            @endforeach


    </div>
        </div>


</div>
    <!-- /.8 -->

</div>
<!-- /.row-->

</div>
</div>

