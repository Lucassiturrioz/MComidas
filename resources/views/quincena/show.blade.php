<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<body>

@include("partials.header")
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Quincena</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Quincena {{$quincena->Fecha_Comienzo}}</p>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="container">
    <table id="pedidosTable" class="display">
        <thead>
        <tr>
            <th>Apodo</th>
            <th>Total a Pagar</th>
            <th>Estado</th>
            <th>Acciones</th> <!-- Columna para los botones -->
        </tr>
        </thead>
        <tbody>
        @foreach($registroClientes as $registro)
            <tr>
                <td>{{ $registro->Cliente->Apodo }}</td>
                <td>${{ number_format($registro->Total_Quincena, 2, '.', ',') }}</td>
                <td>{{ $registro->Estado }}</td>
                <td>
                    <!-- Botón de Ver -->
                    <a href="/registro-quincena-cliente/{{$registro->ID}}" class="btn btn-info btn-sm">Ver</a>
                    <!-- Botón de Editar -->
                    <a href="/registro-quincena-cliente/{{$registro->ID}}/editar" class="btn btn-warning btn-sm">Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<h4>Total de la quincena: ${{ number_format($quincena->Total_Ganado, 2) }}</h4>

@include("partials.footer")

<a href="#" class="btn btn-secondary px-2 back-to-top"><i class="fa fa-angle-double-up"></i></a>

<!-- Librerías de JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<!-- Inicialización de DataTable -->
<script>
    $(document).ready(function() {
        // Inicialización de DataTable
        new DataTable('#pedidosTable', {
            responsive: true,
        });
    });
</script>

<!-- JavaScript Libraries adicionales -->
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
