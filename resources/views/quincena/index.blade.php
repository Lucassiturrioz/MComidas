<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<body>

@include("partials.header")

<div class="jumbotron jumbotron-fluid page-header">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Quincenas</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Quincenas</p>
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
                <th>Fecha Comienzo</th>
                <th>Fecha Finalización</th>
                <th>Total Ganado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($quincenas as $quincena)
                <tr onclick="window.location.href='/quincenas/{{$quincena->ID}}';" style="cursor: pointer;">
                    <td>{{ $quincena->Fecha_Comienzo }}</td>
                    <td>{{ $quincena->Fecha_Finalizacion }}</td>
                    <td>${{ number_format($quincena->Total_Ganado, 2, '.', ',') }}</td>
                    <td class="text-center">
                        <a href="/quincenas/{{ $quincena->ID }}" title="Ver Quincena">
                            <i class="fa fa-eye" style="font-size: 20px; color: blue;"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>




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
