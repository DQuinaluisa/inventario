@extends('layouts.app')

@section('content')

{{-- <style>
    .pagination{
      float: right;
      margin-top: 10px;
  }
</style>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h2 class="text-center">
                    Inventario
                </h2>
            </div>
            <div class="col-md-6" style="padding-right: 15%" >
                <form action="{{ route('welcome') }}" method="GET">
                    <div class="input-group">

                        <input  type="text" class="form-control" name="buscar" autofocus  placeholder="Ingrese el Codigo">
                        <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit" value="Buscar">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        </div>
                        <a style="margin-left: 2%" class="btn btn-outline-dark"  href="{{ route('welcome') }}" >
                            <i class="fa-solid fa-rotate-left"></i>
                        </a>
                        </div>

                </form>

            </div>

        </div>
    </div>
    <br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <table class="table ">
                    <thead style="background-color: rgb(27, 27, 27);" >
                      <tr>
                        <th class="text-center" style="color: white" scope="col">CODIGO</th>
                        <th class="text-center" style="color: white" scope="col">LOTE</th>
                        <th class="text-center" style="color: white" scope="col">CATEGORIA</th>
                        <th class="text-center" style="color: white" scope="col">NOMBRE PRODUCTO</th>
                        <th class="text-center" style="color: white" scope="col">PRECIO PRODUCTO</th>
                        <th class="text-center" style="color: white" scope="col">CANTIDAD</th>
                        <th class="text-center" style="color: white" scope="col">FECHA INGRESO</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product )
                        <tr>
                            <th class="text-center" scope="row">{{ $product->product_code }}</th>
                            <th class="text-center" scope="row">{{ $product->product_lote }}</th>
                            <th class="text-center" scope="row">{{ $product->category_name }}</th>
                            <td class="text-center" >{{ $product->product_name }}</td>
                            <td class="text-center" >${{ $product->product_price }} c/u.</td>
                            <td class="text-center" >{{ $product->product_stock }} un. </td>
                            <th  class="text-center" scope="row">{{ date('d-m-Y', strtotime($product->created_at)) }}</th>
                          </tr>
                        @endforeach


                    </tbody>
                  </table>
                  <div   class="d-flex justify-content-center">
                    {!! $products->appends(['buscar'=>$buscar]) !!}
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div> --}}

<div class="container">
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6">

            <img src="{{URL::asset('img/foto.jpeg')}}"  style="height: 80%; margin-left: 10%" alt="">


        </div>
        <div class="col-md-3">

        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div  class="col-md-12">
            <div class="card" style="background-color: rgb(80, 165, 59); border-radius:15px" >
                <p style="margin: 3%; font-size:150%; font-weight:600; " class="text-center" >
                    Naturis't es una organización dedicad
                    a la elaboración y comercialización de productos cosméticos. Se ha ubicado desd
                    sus inicios en la ciudad de Quito. Inicialmente se enfocó en atender a clientes de la
                    misma ciudad, pero con el transcurso del tiempo fue ampliando su cobertura :
                    hoy en día sus productos se comercializan a nivel nacional.
                </p>
            </div>
        </div>


    </div>
</div>

<br>

<br>

<div style="padding: 5%" class="container-fluid">

    <div class="row">
        <div class="col-md-6">
            <div style="background-color: rgb(145, 145, 145)" class="card text-center">
              <div style="margin: 3%; font-size:120%; ">
                <h1>Misión</h1>
                <p>
                    Naturis't brinda una opción de vida a nuestra sociedad, ofreciendo a nuestros
                    clientes cremas, shampoos, pomadas, aceites, preocupándose por el nivel de vida
                    social y económico de nuestros colaboradores, trabajando en un ambiente
                    agradable, respetando las normativas y reglamentos y manteniendo un
                    rendimiento económico competitivo.
                </p>
              </div>
            </div>
        </div>
        <div class="col-md-6">
            <div style="background-color: rgb(145, 145, 145)" class="card text-center">
                <div style="margin: 3%; font-size:120%;">
                    <h1>Visión</h1>
                <p>
                    Para el año 2025, seremos líderes en la provisión de nuestros productos,
                    contaremos con infraestructura, maquinaria y tecnología adecuada para la
                    exportación, ayudados por un sistema de gestión de calidad, personal capacitado y
                    a gusto en su trabajo. Enfocados en satisfacer las necesidades del cliente,
                    mejorando y desarrollando nuevos productos que aporten a la sociedad.
                </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
