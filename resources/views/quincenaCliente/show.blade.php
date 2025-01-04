<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")

<body>
@include("partials.header")

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="section-title position-relative mb-5">Pedidos de Cliente {{$registro->Cliente->Apodo}}</h1>
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
            <!-- Tabla de pedidos agrupados por fecha con DataTable -->
            <table id="pedidosTable" class="table table-bordered table-hover">
                <thead class="thead-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Productos Consumidos</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>
                @foreach($mapPedidos as $fecha => $pedido)
                    <tr>
                        <td>{{ $fecha }}</td>
                        <td>{{ $pedido['productos'] }}</td>
                        <td>${{ number_format($pedido['total'], 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@include("partials.footer")

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        // Inicialización de DataTable con la opción responsive
        new DataTable('#pedidosTable', {
            responsive: true,
            language: {
                search: "Buscar:",
                lengthMenu: "Mostrar _MENU_ registros",
                info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrado de _MAX_ registros)",
                paginate: {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Último"
                }
            }
        });
    });
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>
