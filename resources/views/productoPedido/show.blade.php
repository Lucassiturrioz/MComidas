<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<body>

@include("partials.header")

<div class="jumbotron jumbotron-fluid page-header">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Productos del Pedido</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Productos</p>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<h3 class="mb-4 text-primary">Pedido del {{$cliente->Apodo}}</h3>

<div class="container">
    <table id="productosTable" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Total</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach($productos_pedidos as $producto)
            <tr>
                <td>{{ $producto->Producto->Nombre }}</td>
                <td>{{ $producto->Cantidad }}</td>
                <td>${{ number_format($producto->Precio_Actual, 2, '.', ',') }}</td>
                <td>${{ number_format($producto->Total_Pedido, 2, '.', ',') }}</td>
                <th>{{$producto->Estado}}</th>
                <td class="text-center">
                    <!-- Icono de editar -->
                    <a href="/productos/{{ $producto->ID }}/editar" title="Modificar Producto">
                        <i class="fa fa-edit" style="font-size: 20px; color: orange;"></i>
                    </a>
                    <!-- Formulario de eliminación -->
                    <form action="{{route('productoPedido.detroy', $producto)}}" method="POST" style="display:inline;" onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: none; border: none; cursor: pointer;" title="Eliminar Producto">
                            <i class="fa fa-trash-alt" style="font-size: 20px; color: red;"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<a href="/clientes/{{$cliente->ID}}/pedido?fecha={{$pedido->Fecha}}" class="btn btn-outline-primary mb-2 mb-sm-0 w-100 w-sm-auto d-flex justify-content-center align-items-center">
    Agregar nuevo pedido
</a>

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
        new DataTable('#productosTable', {
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
