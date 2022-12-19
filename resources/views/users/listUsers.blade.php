@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Lista de Usuarios</h2>
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
<br>
<br>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">

        </div>
        <div class="col-md-8">
            <table class="table ">
                <thead style="background-color: rgb(27, 27, 27);" >
                  <tr>
                    <th class="text-center" style="color: white" scope="col">#</th>
                    <th class="text-center" style="color: white" scope="col">NOMBRE</th>
                    <th class="text-center" style="color: white" scope="col">EMAIL</th>
                    {{-- <th class="text-center" style="color: white" scope="col">PASSWORD</th> --}}
                    <th class="text-center " style="color: white" scope="col" colspan="2">ACCIONES</th>



                  </tr>
                </thead>
                <tbody>
                    @foreach ($user as $data )
                        <tr>
                            <th></th>
                            <th class="text-center ">{{ $data->name }}</th>
                            <th class="text-center ">{{ $data->email }}</th>
                            <th class="text-center ">
                                <form action="{{ route('users.listUsers.destroy',$data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button  title=" Eliminar"  class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i> Eliminar
                                    </button>
                                    </form>

                            </th>

                            <th class="text-center ">
                                <a href="{{ route('users.editUser', $data->id) }}" class="btn btn-warning" >  <i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            </th>
                        </tr>
                    @endforeach


                </tbody>
              </table>
              <div   class="d-flex justify-content-center">
                {!! $user->links() !!}
            </div>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>

@endsection
