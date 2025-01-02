<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include("partials.head")

<body>
@include("partials.header")

<div class="container py-5">
    <div class="row">
        <div class="col-lg-6">
            <h1 class="section-title position-relative mb-5">Editar Producto</h1>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <!-- Formulario para editar el producto -->
            <form action="{{ route('productos.update',  $producto )}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nombre">Nombre del Producto</label>
                    <input type="text" class="form-control" id="nombre" name="Nombre" value="{{ old('Nombre', $producto->Nombre) }}">
                </div>

                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="Descripcion" rows="4">{{ old('Descripcion', $producto->Descripcion) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen del Producto</label>
                    <input type="file" class="form-control" id="imagen" name="Imagen">
                    <small>Deja en blanco si no deseas cambiar la imagen.</small>
                    <br>
                    <!-- Mostrar imagen actual si existe -->
                    @if($producto->imagen)
                        <img src="{{ asset('img/'.$producto->imagen) }}" alt="Imagen actual" class="img-thumbnail mt-2" style="max-width: 200px;">
                    @endif
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" class="form-control" id="precio" name="Precio" value="{{ old('Precio', $producto->Precio) }}" step="0.01">
                </div>

                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <select class="form-control" id="categoria" name="Categoria">
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->ID }}" {{ old('Categoria') == $categoria->ID ? 'selected' : '' }}>
                                {{ $categoria->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <a href="/productos/{{$producto->ID}}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

@include("partials.footer")

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
