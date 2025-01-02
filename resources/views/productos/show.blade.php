<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
@include('partials.header')

<!-- Header del Producto -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">{{ $producto->Nombre }}</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="{{ route('productos.index') }}">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Producto</p>
        </div>
    </div>
</div>

<!-- Detalle del Producto -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <!-- Imagen del Producto -->
            <div class="col-lg-6 mb-4">
                <div class="position-relative bg-primary rounded-circle mx-auto" style="width: 300px; height: 300px;">
                    <img class="rounded-circle w-100 h-100" src="{{ url('img/' . $producto->imagen) }}" style="object-fit: cover;">
                </div>
            </div>

            <!-- Información del Producto -->
            <div class="col-lg-6">
                <h2 class="font-weight-bold">{{ $producto->Nombre }}</h2>
                <h4 class="text-primary mb-3">${{ number_format($producto->Precio, 2) }}</h4>
                <p>{{ $producto->Descripcion }}</p>

                <table class="table mt-4">
                    <thead>
                    <tr>
                        <th scope="col">Atributo</th>
                        <th scope="col">Detalle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Categoría</td>
                        <td>{{ $producto->categoria->Nombre }}</td>
                    </tr>
                    </tbody>
                </table>

                <!-- Botones de acción -->
                <div class="mt-4">
                    <a href="{{ route('productos.edit', $producto) }}" class="btn btn-warning">Editar</a>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#estadoModal">
                        {{ $producto->Estado == 'ALTA' ? 'Dar de Baja' : 'Dar de Alta' }}
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-labelledby="estadoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="estadoModalLabel">
                                    {{ $producto->Estado == 'ALTA' ? 'Confirmar Baja' : 'Confirmar Alta' }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if ($producto->Estado == 'ALTA')
                                    ¿Estás seguro de que deseas dar de baja el producto <strong>{{ $producto->Nombre }}</strong>? Esta acción no se puede deshacer.
                                @else
                                    ¿Estás seguro de que deseas dar de alta el producto <strong>{{ $producto->Nombre }}</strong>?
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <form
                                    action="{{ $producto->Estado == 'ALTA' ? route('productos.destroy', $producto) : route('productos.activate', $producto) }}"
                                    method="POST">
                                    @csrf
                                    @if ($producto->Estado == 'ALTA')
                                        @method('DELETE')
                                    @else
                                        @method('PUT')
                                    @endif
                                    <button type="submit" class="btn btn-danger">
                                        {{ $producto->Estado == 'ALTA' ? 'Dar de Baja' : 'Dar de Alta' }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@include('partials.footer')

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
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
