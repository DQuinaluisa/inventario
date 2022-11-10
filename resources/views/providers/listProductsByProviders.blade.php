@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Productos por Categoria</h2>
            </div>
            <div class="col-md-6">
                <form action="{{ route('providers.listProductsByProviders') }}" method="GET">
                    <div class="input-group">

                        <input  type="text" class="form-control" name="name" autofocus  placeholder="Ingrese el Nombre de la Categoria">
                        <div class="input-group-append">
                        <button class="btn btn-outline-success" type="submit" >
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        </div>

                     </div>
                </form>

            </div>
         </div>
        </div>
    </div>


<br>
<br>

    <div class="container">
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
                                    <th class="text-center" style="color: white" scope="col">PROVEEDOR</th>
                                    <th class="text-center" style="color: white" scope="col">CODIGO</th>
                                    <th class="text-center " style="color: white" scope="col">PRODUCTO</th>
                                    <th class="text-center " style="color: white" scope="col">STOCK</th>
                                    <th class="text-center " style="color: white" scope="col">PRECIO</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($providers as $provider )
                                        <tr>
                                            <th></th>
                                            <th class="text-center">{{ $provider->provider_name }}</th>
                                            <th class="text-center">{{ $provider->product_code }}</th>
                                            <th class="text-center">{{ $provider->product_name }}</th>
                                            <th class="text-center">{{ $provider->product_stock }} un.</th>
                                            <th class="text-center">{{ $provider->product_price }} c/u.</th>
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
