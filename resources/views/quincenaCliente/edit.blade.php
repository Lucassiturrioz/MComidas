<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")

<body>
@include("partials.header")

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="section-title position-relative mb-5">Estado de Pago - Cliente {{$registro->cliente->Apodo}}</h1>
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
            <!-- Formulario para seleccionar el estado de pago -->
            <form action="{{ route('registroQuincenaCliente.update', $registro) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="estado_pago">Estado de Pago</label>
                    <select class="form-control" id="estado_pago" name="Estado">
                        <option value="No Pago" {{ old('Estado', $registro->Estado) == 'No Pago' ? 'selected' : '' }}>No Pago</option>
                        <option value="Pago Parcial" {{ old('Estado', $registro->Estado) == 'Pago Parcial' ? 'selected' : '' }}>Pago Parcial</option>
                        <option value="Pago Completo" {{ old('Estado', $registro->Estado) == 'Pago Completo' ? 'selected' : '' }}>Pago Completo</option>
                    </select>
                </div>


                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="/quincenas/{{$registro->ID_Cuenta}}" class="btn btn-secondary">Cancelar</a>
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
