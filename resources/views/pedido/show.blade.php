<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<body>

@include("partials.header")
<!-- Jumbotron Mejorado -->
<div class="jumbotron jumbotron-fluid page-header">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Pedidos del Día</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Pedidos</p>
        </div>
    </div>
</div>

<!-- Alerta de éxito -->
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Contenedor con la tabla de pedidos -->
<div class="container">
    <h3 class="mb-4 text-primary">Pedidos del {{ \Carbon\Carbon::parse($pedido->Fecha)->format('d-m-Y') }}</h3>

    <!-- Tabla mejorada con Bootstrap y DataTables -->
    <table id="pedidosTable" class="table table-striped table-bordered table-hover dt-responsive nowrap">
        <thead class="thead-dark">
        <tr>
            <th>Apodo</th>
            <th>Productos</th>
            <th>Total Gastado</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($clientes as $cliente)
            <tr onclick="window.location.href='/clientes/{{$cliente->ID}}/pedidos/{{$pedido->ID}}';" style="cursor: pointer;">
                <td>{{ $cliente->Apodo }}</td>
                <td>{{ $cliente->Productos }}</td>
                <td>${{ number_format($cliente->TotalGastado, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Total del día -->
<h4 class="text-right text-info mb-4">Total del día: ${{ number_format($pedido->Total_Dia, 2) }}</h4>

@include("partials.footer")

<!-- Librerías de JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

<!-- Inicialización de DataTable -->
<script>
    $(document).ready(function() {
        new DataTable('#pedidosTable', {
            responsive: true,
            paging: true,
            searching: true,
            info: false,
            autoWidth: false
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
