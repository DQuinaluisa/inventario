@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h2>Salida de Productos</h2>
            </div>
            <div class="col-md-6">
                <form action="{{ route('sales.listSales') }}" method="GET">
                    <div class="input-group">

                        <input  type="date" class="form-control" name="buscar" autofocus  placeholder="Ingrese el Codigo">
                        <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit" value="Buscar">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        </div>
                        {{-- <a style="margin-left: 2%" class="btn btn-outline-dark"  href="{{ route('welcome') }}" >
                            <i class="fa-solid fa-rotate-left"></i>
                        </a> --}}
                        </div>

                </form>
                <br>
                @if (session('success'))
                <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
            </div>

         </div>
        </div>
    </div>



    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">
                            <table class="table ">
                                <thead style="background-color: rgb(27, 27, 27);" >
                                  <tr>
                                    <th class="text-center" style="color: white" scope="col">#</th>
                                    <th class="text-center" style="color: white" scope="col">CODIGO</th>
                                    <th class="text-center" style="color: white" scope="col">PRODUCTO</th>
                                    <th class="text-center" style="color: white" scope="col">UNIDADES VENDIDAS</th>
                                    {{-- <th class="text-center " style="color: white" scope="col">UNIDADES EN STOCK</th> --}}
                                    <th class="text-center " style="color: white" scope="col">FECHA DE SALIDA</th>


                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sales as $product )
                                        <tr>
                                            <th  class="text-center" scope="row"></th>
                                            <th  class="text-center" scope="row">{{ $product->product_code }}</th>
                                            <th  class="text-center" scope="row">{{ $product->product_name }}</th>
                                            <th  class="text-center" scope="row">{{ $product->products_sales }}</th>
                                            {{-- <th  class="text-center" scope="row">{{ $product->product_stock }}</th> --}}
                                            {{-- <th  class="text-center" scope="row">{{ date('d-m-Y', strtotime($product->departure_date)) }}</th> --}}
                                            <th  class="text-center" scope="row">{{ $product->departure_date }}</th>
                                        </tr>
                                    @endforeach


                                </tbody>
                              </table>
                              <div   class="d-flex justify-content-center">
                                {!! $sales->links() !!}
                            </div>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>



        </div>
    </div>

@endsection
