<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<body>

@include("partials.header")

<!-- Encabezado Hero -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px; background-color: #007bff; color: white;">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Pedidos</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white text-decoration-none" href="/">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Seleccion pedidos para <strong>{{$cliente->Apodo}}</strong></p>
        </div>
    </div>
</div>

<!-- Mensaje de Error -->
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show mx-4" role="alert">
        <strong>Error:</strong> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container my-5">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <h3 class="card-title text-center mb-4">Selecciona la fecha del pedido</h3>
            <form action="{{ route('pedidos.porFecha', ['cliente' => $cliente]) }}" method="GET" class="form-pedido d-flex flex-column flex-md-row align-items-center justify-content-between gap-3">
                <!-- Sección de fecha -->
                <div class="d-flex flex-column flex-md-row align-items-center">
                    <label for="fecha" class="form-label mb-0">Fecha:</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" required>
                </div>
                <br>
                <!-- Botón de ver pedido -->
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary px-4 py-2 d-flex align-items-center">
                        <i class="fa fa-calendar-check me-2"></i> Ver Pedido
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include("partials.footer")

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
