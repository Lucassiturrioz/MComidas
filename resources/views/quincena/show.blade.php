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
    <div class="table-responsive">
        <table id="pedidosTable" class="table table-striped table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Apodo</th>
                <th>Total a Pagar</th>
                <th>Estado</th>
                <th>Acciones</th> <!-- Columna para los emoticones -->
            </tr>
            </thead>
            <tbody>
            @foreach($registroClientes as $registro)
                <tr>
                    <td>{{ $registro->Cliente->Apodo }}</td>
                    <td>${{ number_format($registro->Total_Quincena, 2, '.', ',') }}</td>
                    <td>{{ $registro->Estado }}</td>
                    <td class="text-center">
                        <!-- Emoticón de Ver sin bordes -->
                        <a href="/registro-quincena-cliente/{{$registro->ID}}" title="Ver" style="font-size: 24px; text-decoration: none; color: inherit;">
                            👁️
                        </a>
                        <!-- Emoticón de Editar sin bordes -->
                        <a href="/registro-quincena-cliente/{{$registro->ID}}/editar" title="Editar" style="font-size: 24px; text-decoration: none; color: inherit;">
                            ✏️
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<h4 class="text-right text-info mb-4">Total de la quincena  ${{ number_format($quincena->Total_Ganado, 2) }}</h4>


@include("partials.footer")


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
