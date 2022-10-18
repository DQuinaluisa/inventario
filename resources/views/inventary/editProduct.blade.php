@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-center"> Actualizar Producto </h1>
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
                    <form style="padding: 5%" action="{{ route('inventary.editProduct', $product->id) }}" method="POST" >
                        @method('PATCH')
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Codigo del Producto:</strong>
                                        <input type="product_code" value="{{ $product->product_code }}" name="product_code"    class="form-control "   >

                                    </div>
                            <br>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Nombre del Producto:</strong>
                                        <input type="product_name" name="product_name"  value="{{ $product->product_name }}"  class="form-control "   >

                                    </div>
                            <br>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Lote del Producto:</strong>
                                        <input type="text" name="product_lote" value="{{ $product->product_lote }}"  class="form-control " >

                                    </div>
                            <br>
                            </div>

                             <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Categoria:</strong>
                                    {{-- <input type="category_id" name="category_id"  class="form-control"   > --}}
                                    <select type="category_id" name="category_id" class="form-select @error('category_id') is-invalid @enderror"  required   aria-label="Default select example">
                                        <option selected>Elija una Categoria</option>
                                        @foreach ($category as $categories )
                                        <option name="category_id" title="{{ $categories->id }}" value="{{ $categories->id }}">{{ $categories->category_name }}</option>

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
                                        <input type="text" name="product_price"   class="form-control "  value="{{ $product->product_price }}"  >


                                    </div>
                            <br>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <strong>Cantidad del Producto:</strong>
                                        <input type="text" name="product_stock"   class="form-control " value="{{ $product->product_stock }}"   >


                                    </div>
                            <br>
                            </div>



                             <div class="text-center">
                                <button type="submit" style="width: 50%" class="btn btn-warning aling-center ml-3">Actualizar Producto</button>
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
