@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Salida de Productos</h2>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>

    <div  style="padding-top: 5%" class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="row">
                        <form style="padding: 5%" action="{{ route('sales.createSales', $sales->id) }}" method="POST" >
                            @csrf
                            <div class="row">




                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Producto:</strong>
                                            <input type="text" name="product_id"  value="{{ $sales->product_name }}" disabled class="form-control  "   >

                                        </div>
                                <br>
                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Cantidad:</strong>
                                            <input type="number" name="products_sales"  value="{{ $sales->product_stock }}"   class="form-control @error('products_sales') is-invalid @enderror" required  >
                                            @error('products_sales')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el codigo del producto</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Fecha de Salida:</strong>
                                            <input type="date" name="departure_date"    class="form-control @error('departure_date') is-invalid @enderror" required  >
                                            @error('departure_date')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el codigo del producto</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>





                                 <div class="text-center">
                                    <button type="submit" style="width: 50%" class="btn btn-primary aling-center ml-3">Despachar Producto</button>
                                 </div>



                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">

            </div>
        </div>
    </div>


@endsection
