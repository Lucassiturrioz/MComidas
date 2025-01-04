<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" />

<body>
@include("partials.header")

<div class="jumbotron jumbotron-fluid page-header" >
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Clientes</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Clientes</p>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <h1 class="section-title position-relative text-center mb-5">Clientes</h1>
        </div>
    </div>
    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered display nowrap" style="width:100%;">
            <thead class="thead-dark">
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Apodo</th>
                <th>Teléfono</th>
            </tr>
            </thead>
            <tbody>
            @foreach($clientes as $cliente)
                <tr onclick="window.location.href='/clientes/{{$cliente->ID}}';" style="cursor: pointer;">
                    <td>{{$cliente->Nombre}}</td>
                    <td>{{$cliente->Apellido}}</td>
                    <td>{{$cliente->Apodo}}</td>
                    <td>{{$cliente->Numero}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

@include("partials.footer")

<!-- Librerías de JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<!-- Inicialización de DataTable -->
<script>
    $(document).ready(function() {
        // Inicialización de DataTable con opciones mejoradas
        new DataTable('#myTable', {
            responsive: true,
            language: {
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: "Siguiente",
                    previous: "Anterior"
                },
                emptyTable: "No hay datos disponibles en la tabla",
                zeroRecords: "No se encontraron coincidencias"
            },
            columnDefs: [
                { targets: '_all', className: 'align-middle text-center' }
            ]
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
