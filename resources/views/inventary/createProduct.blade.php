@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="text-center"> Nuevo Producto </h1>
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
                        <form style="padding: 5%" action="{{ route('inventary.createProduct') }}" method="POST" >
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Codigo del Producto:</strong>
                                            <input type="product_code" name="product_code"    class="form-control @error('product_code') is-invalid @enderror" required  >
                                            @error('product_code')
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
                                        <strong>Nombre del Producto:</strong>
                                            <input type="product_name" name="product_name"   class="form-control @error('product_name') is-invalid @enderror"  required >
                                            @error('product_name')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el nombre del producto</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Lote del Producto:</strong>
                                            <input type="text" name="product_lote"   class="form-control @error('product_lote') is-invalid @enderror "  required >
                                            @error('product_lote')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el Peso del Producto</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>

                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Categoria:</strong>
                                        {{-- <input type="category_id" name="category_id"  class="form-control"   > --}}
                                        <select type="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror"  required aria-label="Default select example">
                                            <option selected>Elija una Categoria</option>
                                            @foreach ($categories as $category )
                                            <option name="category_id" title="{{ $category->id }}" value="{{ $category->id }}">{{ $category->category_name }}</option>

                                            @endforeach

                                          </select>
                                          @error('category_id')
                                          <span class="invalid-feedback" role="alert">
                                              <strong>Elija una categoria</strong>
                                              {{-- <strong>{{ $message }}</strong> --}}
                                          </span>
                                          @enderror
                                    </div>
                                <br>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Precio del Producto:</strong>
                                            <input type="text" name="product_price"   class="form-control @error('product_price') is-invalid @enderror " required  >
                                            @error('product_price')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese el precio del </strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Cantidad del Producto:</strong>
                                            <input type="text" name="product_stock"   class="form-control @error('product_stock') is-invalid @enderror " required  >
                                            @error('product_stock')
                                            <span class="invalid-feedback" role="alert">
                                                {{-- <strong>Ingrese la cantidad de unidades</strong> --}}
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                <br>
                                </div>



                                 <div class="text-center">
                                    <button type="submit" style="width: 50%" class="btn btn-primary aling-center ml-3">Crear Producto</button>
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
