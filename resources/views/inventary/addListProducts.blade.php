@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <h2>Entrada de Productos</h2>
            </div>
            <div class="col-md-6">
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
                                    <th class="text-center" style="color: white" scope="col">LOTE</th>
                                    <th class="text-center " style="color: white" scope="col">UNIDADES INGRESADAS</th>
                                    <th class="text-center " style="color: white" scope="col">FECHA DE INGRESO</th>


                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $product )
                                        <tr>
                                            <th></th>
                                            <th class="text-center" scope="row">{{ $product->product_code }}</th>
                                            <th class="text-center" scope="row">{{ $product->product_name }}</th>
                                            <th class="text-center" scope="row">{{ $product->product_lote }}</th>
                                            <th class="text-center" scope="row">{{ $product->product_stock }}</th>
                                            <th class="text-center" scope="row">{{ date('d-m-Y', strtotime($product->updated_at)) }}</th>

                                        </tr>
                                    @endforeach


                                </tbody>
                              </table>
                              <div   class="d-flex justify-content-center">

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
