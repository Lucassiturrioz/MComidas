<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<body>

@include("partials.header")
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Pedidos</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Agregar al pedido</p>
        </div>
    </div>
</div>

    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('pedidos.agregarPedido',['cliente'=> $cliente, 'pedido' => $pedido]) }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h4>Agregar Pedido para {{$cliente->Apodo}}</h4>
                </div>
                <div class="modal-body">
                    <label>Producto:</label>
                    <select name="ID_Producto" class="form-control" id="producto-select" required>
                        <option value="" data-precio="0">Seleccionar Producto</option>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->ID }}" data-precio="{{ $producto->Precio }}">
                                {{ $producto->Nombre }} - ${{ $producto->Precio }}
                            </option>
                        @endforeach
                    </select>

                    <label>Cantidad:</label>
                    <input type="number" name="Cantidad" class="form-control" id="cantidad-input" min="1" required>

                    <label>Total Pedido:</label>
                    <input type="number" name="Total_Pedido" class="form-control" id="total-pedido-input" readonly>
                </div>

                <div class="modal-footer">
                    <p>Fecha: {{$pedido->Fecha}}</p>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const productoSelect = document.getElementById('producto-select');
        const cantidadInput = document.getElementById('cantidad-input');
        const totalPedidoInput = document.getElementById('total-pedido-input');

        const calculateTotal = () => {
            const selectedOption = productoSelect.options[productoSelect.selectedIndex];
            const precio = parseFloat(selectedOption.getAttribute('data-precio')) || 0;
            const cantidad = parseInt(cantidadInput.value) || 0;

            const total = precio * cantidad;
            totalPedidoInput.value = total.toFixed(2);
        };

        productoSelect.addEventListener('change', calculateTotal);
        cantidadInput.addEventListener('input', calculateTotal);
    });
</script>

@include("partials.footer")

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
