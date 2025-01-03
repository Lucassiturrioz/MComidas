<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")

<body>
@include("partials.header")

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="section-title position-relative mb-5">Editar Cliente {{$cliente->Apodo}}</h1>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <!-- Formulario para editar el cliente -->
            <form action="{{ route('clientes.update', $cliente) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="Nombre"
                           value="{{ old('Nombre', $cliente->Nombre) }}">
                </div>

                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" class="form-control" id="apellido" name="Apellido"
                           value="{{ old('Apellido', $cliente->Apellido) }}">
                </div>

                <div class="form-group">
                    <label for="numero">Número de Teléfono</label>
                    <input type="text" class="form-control" id="numero" name="Numero"
                           value="{{ old('Numero', $cliente->Numero) }}">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="/clientes/{{$cliente->ID}}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include("partials.footer")

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
