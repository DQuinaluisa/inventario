@extends('layouts.app')

@section('content')



<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h2 class="text-center">
                Inventario
            </h2>
        </div>
        <div class="col-md-6" style="padding-right: 15%" >
            <form action="{{ route('home') }}" method="GET">
                <div class="input-group">

                    <input  type="text" class="form-control" name="buscar" autofocus  placeholder="Ingrese el Codigo">
                    <div class="input-group-append">
                    <button class="btn btn-outline-success" type="submit" value="Buscar">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                    </div>
                    <a style="margin-left: 2%" class="btn btn-outline-dark"  href="{{ route('home') }}" >
                        <i class="fa-solid fa-rotate-left"></i>
                    </a>
                    </div>

            </form>

        </div>

    </div>
</div>
<br>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('inventary.createProduct') }}" class="btn btn-primary">Crear Producto
                <i class="fa-solid fa-plus"></i></a>
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

            @if (session('success2'))
            <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success2') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif

            @if (session('success3'))
            <div id="alert" class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('success3') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif


            @if (session('error'))
            <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('error') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
            @if (session('error2'))
            <div id="alert" class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('error2') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @endif
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
                    <th class="text-center" style="color: white" scope="col">NOMBRE PRODUCTO</th>
                    <th class="text-center" style="color: white" scope="col">PRECIO PRODUCTO</th>
                    <th class="text-center" style="color: white" scope="col">CANTIDAD</th>
                    <th class="text-center " style="color: white" scope="col" colspan = 3>ACCIONES</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product )
                        <tr>
                            <th  class="text-center" scope="row">{{ $product->product_code }}</th>
                            <th  class="text-center" scope="row">{{ $product->product_lote }}</th>
                            <td class="text-center">{{ $product->product_name }}</td>
                            <td class="text-center"> ${{ $product->product_price }} c/u</td>
                            <td class="text-center">{{ $product->product_stock }} un.</td>
                            <td class="text-center">
                                <form action="{{ route('home.destroy',$product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button  title=" Eliminar"  class="btn btn-danger">
                                   Eliminar <i class="fa-solid fa-trash"></i>
                                </button>
                                </form>

                            </td>
                            <td>
                                <a title=" Editar" href="{{ route('inventary.editProduct', $product->id) }}" class="btn btn-warning">
                                  Editar  <i class="fa-solid fa-pen-to-square"></i></a>
                            </td>

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
</div>
@endsection
