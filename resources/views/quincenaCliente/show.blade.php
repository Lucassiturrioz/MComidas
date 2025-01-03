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
            <!-- Tabla de pedidos agrupados por fecha -->
            <table class="table">
                <thead>
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
                        <td>{{ $pedido['total'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include("partials.footer")

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
