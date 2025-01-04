<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<body>

@include("partials.header")
<!-- Jumbotron Mejorado para ser Responsivo -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Pedidos</h1>
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

<!-- Contenedor con tabla -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <table id="pedidosTable" class="table table-striped table-bordered dt-responsive nowrap">
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Día</th>
                    <th>Mes</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($pedidos as $pedido)
                    <tr onclick="window.location.href='/pedidos/{{$pedido->ID}}';" style="cursor: pointer;">
                        <td>{{ $pedido->Fecha }}</td>
                        <td>{{ $pedido->Dia}}</td>
                        <td>{{ $pedido->Mes}}</td>
                        <td>${{ number_format($pedido->Total, 2, '.', ',') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include("partials.footer")

<!-- Botón de desplazamiento superior -->
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
