@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Nuevo Producto</h3>
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

                    <form action="{{ route('blogs.store') }}" method="POST">
                        @csrf
                         <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="sku" name="sku" class="form-control" />
        <label class="form-label" for="form6Example1" >SKU</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="producto" name="producto" class="form-control" />
        <label class="form-label" for="form6Example2" id="articulo" name="articulo">Articulo</label>
      </div>
    </div>
  </div>

   <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" id="descripcion" name="descripcion"/>
        <label class="form-label" for="form6Example1" id="sku" name="sku">Descripcion</label>
      </div>
    </div>
    <div class="col">
        <div class="form-group">
             <select class="form-control" id="estado" name="estado">
              <option value="Nuevo">Nuevo</option>
              <option value="Usado">Usado</option>
            </select>
            <label class="form-label" for="form6Example2" id="articulo" name="articulo">Estado</label>
          </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col">
        <div class="form-group">
{{--             <label for="client_id">Categoria</label>
 --}}            <select class="form-control selectpicker" name="idcategoria" id="idcategoria" data-live-search="true">
                @foreach ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{$categoria->descripcion}}</option>
                @endforeach
            </select>
        </div>
        <label class="form-label" for="form6Example1" id="categoria" name="categoria">Categoria</label>
    </div>
    <div class="col">
      <div class="form-group">
             <select class="form-control selectpicker" name="idsubcategoria" id="idsubcategoria" data-live-search="true">
                @foreach ($subcategorias as $subcategoria)
                <option value="{{$subcategoria->id}}">{{$subcategoria->descripcion}}</option>
                @endforeach
            </select>
            <label class="form-label" for="form6Example2" id="subcat" name="subcat">Sub-categoria</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" id="cantidad" name="cantidad"/>
        <label class="form-label" for="form6Example1" id="cantidad" name="cantidad">Cantidad</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example2" class="form-control" id="fecha" name="fecha"/>
        <label class="form-label" for="form6Example2" id="fecha" name="fecha">Fecha</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="number" id="costodolares" name="costodolares" onchange="findCosto()" class="form-control" />
        <label class="form-label" for="form6Example1">Costo en Dolares</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="number" id="traidalps" name="traidalps" onchange="findCosto()" class="form-control" />
        <label class="form-label" for="form6Example2">Traida en Lps.</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
        <div class="form-outline">
          <input type="number" id="costo_total" onchange="findCosto(); /* findTotal(); */" name="costo_total" class="form-control" />
          <label class="form-label" for="form6Example1">Costo Total en Lps.</label>
        </div>
      </div>
        <div class="col">
        <div class="form-outline">
          <input type="text"   class="form-control" id="link" name="link" hidden/>
          <label class="form-label" for="form6Example2" hidden>Link Proveedor</label>
        </div>
      </div>
    </div>


  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="number" id="venta" name="venta"  onchange="findTotal()" class="form-control" />
        <label class="form-label" for="form6Example1">Venta</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text"   class="form-control" id="link" name="link"/>
        <label class="form-label" for="form6Example2">Link Proveedor</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="number" id="desc5" name="desc5" onchange="findCosto()" class="form-control" />
        <label class="form-label" for="form6Example1">5% OFF</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="number" id="desc10" name="desc10" onchange="findCosto()" class="form-control" />
        <label class="form-label" for="form6Example2">10% OFF</label>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="number" id="desc15" name="desc15" onchange="findCosto()" class="form-control" />
        <label class="form-label" for="form6Example1">15% OFF</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="number" id="desc20" name="desc20" onchange="findCosto()" class="form-control" />
        <label class="form-label" for="form6Example2">20% OFF</label>
      </div>
    </div>
  </div>

  <!-- Submit button -->

  <button type="submit" class="btn btn-primary btn-block mb-4">Nuevo Producto</button>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

@section('page_js')

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

function findCosto(){
        var costodls = (parseFloat(document.getElementById("costodolares").value) * 25);
        var traida = parseFloat(document.getElementById("traidalps").value);
        var estado = document.getElementById("estado").value;




        document.getElementById("costo_total").value = parseFloat(costodls + traida);
        document.getElementById("venta").value = parseFloat(costodls + traida);
        var venta = parseFloat(document.getElementById("venta").value);

        document.getElementById("desc5").value = parseFloat((venta *-0.05) + venta);
        document.getElementById("desc10").value = parseFloat((venta *-0.1) + venta);
        document.getElementById("desc15").value = parseFloat((venta *-0.15)+ venta);
        document.getElementById("desc20").value = parseFloat((venta *-0.2) + venta);

       /*  document.getElementById("desc10").value = num1 + 2;
        document.getElementById("desc15").value = num1 + 3;
        document.getElementById("desc20").value = num1 + 4; */
}

    function findTotal(){
        var num1 = parseFloat(document.getElementById("venta").value);
      /*   var num2 = parseInt(document.getElementById("desc5").value);
        var num3 = parseInt(document.getElementById("desc10").value);
        var num4 = parseInt(document.getElementById("desc15").value); */
        document.getElementById("desc5").value = parseFloat((num1 *-0.05) + num1);
        document.getElementById("desc10").value = parseFloat((num1 *-0.1) + num1);
        document.getElementById("desc15").value = parseFloat((num1 *-0.15)+ num1);
        document.getElementById("desc20").value = parseFloat((num1 *-0.2) + num1);
        /* document.getElementById("desc5").value = num1 + 1;
         document.getElementById("desc10").value = num1 + 2;
        document.getElementById("desc15").value = num1 + 3;
        document.getElementById("desc20").value = num1 + 4; */
    }



</script>


@stop





