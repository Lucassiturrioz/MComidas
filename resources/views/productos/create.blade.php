<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials.head')
<body>
@include('partials.header')
<div class="jumbotron jumbotron-fluid page-header">
    <div class="container text-center py-5">
        <h1 class="text-white display-3 mt-lg-5">Nuevo Producto</h1>
        <div class="d-inline-flex align-items-center text-white">
            <p class="m-0"><a class="text-white" href="">Home</a></p>
            <i class="fa fa-circle px-3"></i>
            <p class="m-0">Product</p>
        </div>
    </div>
</div>
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h1 class="section-title position-relative text-center mb-5">Rellena los datos</h1>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="contact-form bg-light rounded p-5">
                    <div id="success"></div>
                    <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data" novalidate="novalidate">
                        @csrf

                        <div class="form-row">
                            <!-- Nombre del producto -->
                            <div class="col-sm-6 control-group mb-4"> <!-- Aquí agregué el margen bottom (mb-4) -->
                                <input type="text" class="form-control p-4" id="name" name="Nombre" placeholder="Nombre del producto" value="{{ old('nombre') }}" required="required" />
                                @error('Nombre')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Descripción -->
                            <div class="col-sm-6 control-group mb-4"> <!-- Aquí también agregué margen -->
                                <input type="text" class="form-control p-4" id="description" name="Descripcion" placeholder="Descripcion" value="{{ old('descripcion') }}" required="required" />
                                @error('Descripcion')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <!-- Precio -->
                            <div class="col-sm-6 control-group mb-4"> <!-- Y aquí también -->
                                <input type="number" class="form-control p-4" id="price" name="Precio" placeholder="Precio" value="{{ old('precio') }}" required="required" />
                                @error('precio')
                                <p class="help-block text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <!-- Foto -->
                            <div class="col-sm-6 control-group mb-4"> <!-- Añadí margen también aquí -->
                                <input type="file" id="foto" name="foto" accept="image/*" style="display: none;" />
                                <label for="foto" class="form-control p-4 btn-primary btn-block d-flex justify-content-center align-items-center">
                                    Subir imagen
                                </label>
                            </div>
                        </div>
                        <div class="control-group mb-4">
                            <!-- Categoría -->
                            <select class="form-control p-6" id="category" name="Categoria" required="required">
                                <option value="">Selecciona la categoria</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->ID }}" {{ old('categoria') == $categoria->ID ? 'selected' : '' }}>
                                        {{ $categoria->Nombre }}
                                    </option>
                                @endforeach
                            </select>
                            @error('Categoria')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="Tipo" value="Simple" />
                        <input type="hidden" name="Estado" value="Alta" />
                        <div>
                            <button class="btn btn-primary btn-block py-3 px-5" type="submit" id="createProductButton">Crear producto</button>
                        </div>
                    </form>

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
