@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Actualizar Usuario</h2>
            </div>

            </div>
        </div>
    </div>




    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="card">

                    <div class="row " >
                        <form  style="padding: 5%"  action="{{route('users.editUser', $user->id) }}" method="POST" >
                            @method('PATCH')
                        @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <strong>Nombre Completo:</strong>
                                            <input type="name" name="name"  value="{{ $user->name }}"  class="form-control @error('name') is-invalid @enderror" required  >
                                            @error('name')
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
                                        <strong>Email</strong>
                                            <input type="email" name="email" value="{{ $user->email }}"  class="form-control @error('email') is-invalid @enderror"  required >
                                            @error('email')
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

                                        <strong>Password:</strong>

                                        <div class="input-group mb-3">

                                            <input type="password" id="myInput" name="password" value="{{ $user->password }}"  class="form-control @error('password') is-invalid @enderror"  required >
                                            <span class="input-group-text">
                                              <i class="fa fa-eye"  onclick="myFunction()"id="togglePassword"
                                             style="cursor: pointer"></i>
                                             </span>
                                             @error('password')
                                            <span class="invalid-feedback" role="alert">

                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                          </div>

                                            <div class="input-group-addon">


                                        </div>
                                <br>

                                </div>


                            </div>

                              <br>

                            <div class="text-center">
                                <button type="submit" style="width: 50%" class="btn btn-primary aling-center ml-3">Actualizar Usuarios</button>
                             </div>
                        </form>
                    </div>
                    <br>
                    <br>
                </div>
            </div>
            <div class="col-md-2">

            </div>



        </div>
    </div>

@endsection
