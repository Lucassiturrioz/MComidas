<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include("partials.head")

    <body>
    @include("partials.header")
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="section-title position-relative mb-5">Los ultimos productos agregados</h1>
                </div>
                <div class="col-lg-8 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
            </div>
        </div>
    <div class="row">
        <div class="col-12">
            <div class="owl-carousel service-carousel">
                @foreach($servicios as $servicio)
                    <div class="service-item">
                        <div class="service-img mx-auto">
                            <img class="rounded-circle w-100 h-100 bg-light p-3" src="img/{{$servicio['img']}}" style="object-fit: cover;" alt="">
                        </div>
                        <div class="position-relative text-center bg-light rounded p-4 pb-5">
                            <h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">{{$servicio['title']}}</h5>
                            <p>{{$servicio['description']}}</p>
                            <a href="" class="border-bottom border-secondary text-decoration-none text-secondary">Learn More</a>
                        </div>
                    </div>
                @endforeach
            </div>
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
