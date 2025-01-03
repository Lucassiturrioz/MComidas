<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
@include('partials.header')

<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Nueva Persona</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Persona</p>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="section-title position-relative text-center mb-5">Rellena los datos</h1>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="contact-form bg-light rounded p-5">
                    <div id="success"></div>
                    <form action="{{ route('clientes.store') }}" method="POST" novalidate="novalidate">
                        @csrf

                        <div class="form-row">
                            <!-- Nombre -->
                            <div class="col-sm-6 control-group mb-4">
                                <input type="text" class="form-control p-4" id="nombre" name="Nombre" placeholder="Nombre" value="{{ old('Nombre') }}" required="required" />
                                @error('Nombre')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Apellido -->
                            <div class="col-sm-6 control-group mb-4">
                                <input type="text" class="form-control p-4" id="apellido" name="Apellido" placeholder="Apellido" value="{{ old('Apellido') }}" required="required" />
                                @error('Apellido')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <!-- Apodo -->
                            <div class="col-sm-6 control-group mb-4">
                                <input type="text" class="form-control p-4" id="apodo" name="Apodo" placeholder="Apodo" value="{{ old('Apodo') }}" />
                                @error('Apodo')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Teléfono -->
                            <div class="col-sm-6 control-group mb-4">
                                <input type="tel" class="form-control p-4" id="telefono" name="Numero" placeholder="Número de Teléfono" value="{{ old('Numero') }}" required="required" />
                                @error('Numero')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <input type="hidden" name="Estado" value="Activo" />

                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit">Crear Persona</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
</body>
</html>
