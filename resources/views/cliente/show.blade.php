<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')

<body>
@include('partials.header')

<!-- Header del Cliente -->
<div class="jumbotron jumbotron-fluid page-header" style="margin-bottom: 90px;">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">{{ $cliente->nombre }} {{ $cliente->apellido }}</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="/">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Cliente</p>
        </div>
    </div>
</div>

<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="position-relative bg-primary rounded-circle mx-auto" style="width: 300px; height: 300px;">
                    <img class="rounded-circle w-100 h-100" src="{{ url('img/team-1.jpg') }}" style="object-fit: cover;">
                </div>
            </div>

            <!-- Información del Cliente -->
            <div class="col-lg-6">
                <h2 class="font-weight-bold">{{ $cliente->Nombre }} {{ $cliente->Apellido }}</h2>
                <h4 class="text-primary mb-3">{{ $cliente->Apodo }}</h4>

                <table class="table mt-4">
                    <thead>
                    <tr>
                        <th scope="col">Atributo</th>
                        <th scope="col">Detalle</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Teléfono</td>
                        <td>{{ $cliente->Numero }}</td>
                    </tr>
                    <tr>
                        <td>Estado</td>
                        <td>{{ $cliente->Estado }}</td>
                    </tr>
                        <td>Estado de cuenta</td>
                        <td>{{$cliente->Pagos_pendiente}}</td>
                    </tbody>
                </table>


                <!-- Botones de acción -->
                <div class="mt-4 d-flex flex-column flex-sm-row justify-content-start align-items-start">
                    <a href="/clientes/{{$cliente->ID}}/agregar-pedido" class="btn btn-outline-primary my-2 mx-sm-2 w-100 w-sm-auto d-flex justify-content-center align-items-center">
                       Nuevo Pedido
                    </a>
                    <a href="/clientes/{{$cliente->ID}}/editar" class="btn btn-warning my-2 mx-sm-2 w-100 w-sm-auto d-flex justify-content-center align-items-center">
                        Editar
                    </a>
                    <button class="btn btn-danger my-2 mx-sm-2 w-100 w-sm-auto d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#estadoModal">
                        {{ $cliente->Estado == 'Activo' ? 'Desactivar' : 'Activar' }}
                    </button>
                </div>




                <!-- Modal -->
                <div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-labelledby="estadoModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="estadoModalLabel">
                                    {{ $cliente->Estado == 'Activo' ? 'Confirmar Desactivación' : 'Confirmar Activación' }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                @if ($cliente->Estado == 'Activo')
                                    ¿Estás seguro de que deseas desactivar al cliente <strong>{{ $cliente->Nombre }} {{ $cliente->Apellido }}</strong>?.
                                @else
                                    ¿Estás seguro de que deseas activar al cliente <strong>{{ $cliente->Nombre }} {{ $cliente->Apellido }}</strong>?
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <form
                                    action="{{ $cliente->Estado == 'Activo' ? route('cliente.destroy', $cliente) : route('cliente.activate', $cliente) }}"
                                    method="POST">
                                    @csrf
                                    @if ($cliente->Estado == 'Activo')
                                        @method('DELETE')
                                    @else
                                        @method('PUT')
                                    @endif
                                    <button type="submit" class="btn btn-danger">
                                        {{ $cliente->Estado == 'Activo' ? 'Desactivar' : 'Activar' }}
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

@if($cliente->Pagos_pendiente != 'No debe')
    <table id="quincenas-table" class="display">
        <thead>
        <tr>
            <th>Cuenta</th>
            <th>Fecha Comienzo</th>
            <th>Total Quincena</th>
        </tr>
        </thead>
        <tbody>
        @foreach($quincenas as $quincena)
            <tr>
                <td>{{ $quincena->Quincena->ID }}</td> <!-- Aquí asumo que quieres mostrar el ID de la Cuenta -->
                <td>{{ $quincena->Quincena->Fecha_Comienzo }}</td> <!-- Fecha de comienzo de la cuenta -->
                <td>${{ number_format($quincena->Total_Quincena, 2) }}</td> <!-- Total de la quincena formateado -->
            </tr>
        @endforeach
        </tbody>
    </table>
@endif


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
