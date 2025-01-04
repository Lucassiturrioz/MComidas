<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
@include('partials.header')
<div class="jumbotron jumbotron-fluid page-header">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Productos</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Productos</p>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="section-title position-relative text-center mb-5">Productos actuales</h1>
            </div>
        </div>
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-lg-3 col-md-6 mb-4 pb-2">
                    <div class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                        <!-- Precio del producto -->
                        <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                            <h4 class="font-weight-bold text-white mb-0">${{$producto->Precio}}</h4>
                        </div>

                        <!-- Imagen del producto -->
                        <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3" style="width: 150px; height: 150px;">
                            <img class="rounded-circle w-100 h-100" src="{{url('img/product-1.jpg')}}" style="object-fit: cover;">
                        </div>
                        <!-- Nombre del producto con truncamiento y tooltip -->
                        <h5 class="font-weight-bold mb-4 text-truncate" style="max-width: 150px;" title="{{$producto->Nombre}} - {{$producto->categoria->Nombre}}">
                            {{$producto->Nombre}} - {{$producto->categoria->Nombre}}
                        </h5>
                        <!-- Botón de acción -->
                        <a href="/productos/{{$producto->ID}}" class="btn btn-sm btn-secondary">Visualizar</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row justify-content-center mt-5">
            <a href="/productos/crear" class="btn btn-primary btn-lg">
                <i class="fa fa-plus mr-2"></i> Crear Nuevo Producto
            </a>
        </div>
    </div>
</div>
@include('partials.footer')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
