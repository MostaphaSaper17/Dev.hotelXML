<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=2, minimum-scale=1">
    <title>Home</title>
    <!-- bootstrap css -->
    <link href="{{ asset('website/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- font awesome css -->
    <link href="{{ asset('website/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/owl.carousel.min.css') }}" rel="stylesheet">

    <link href="{{ asset('website/support/linearicon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('website/support/themify/themify-icons.css') }}" rel="stylesheet">
    <!-- flex slider js -->
    <link href="{{ asset('website/flex-slider/flexslider.css') }}" rel="stylesheet">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700|Material+Icons|Poppins:400,600,700" rel="stylesheet">
    <!-- custom style css -->
    <link href="{{ asset('website/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/helpers.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/search-result.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('website/css/fotorama.css') }}" rel="stylesheet">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
        />
</head>
<body>

    @include('components.website.navbar')

    @yield('content')

    @include('components.website.footer')

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const contactButton = document.querySelector(".btn-primary");

            contactButton.addEventListener("click", function (e) {
                e.preventDefault();
                const contactSection = document.getElementById("contact");

                // Scroll to the contact section smoothly
                contactSection.scrollIntoView({ behavior: "smooth" });
            });
        });
    </script>

    <!-- jquery -->
    <script src="{{ asset('website/js/jquery.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('website/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('website/js/fontawesome.min.js') }}"></script>

    <link href="{{ asset('website/menu/stellarnav.min.css') }}" rel="stylesheet">

    <script src="{{ asset('website/menu/stellarnav.min.js') }}"></script>
    <script src="{{ asset('website/js/owl.carousel.min.js') }}"></script>
    <!-- gallery js -->
    <script type='text/javascript' src='{{ asset('website/js/jquery.matchHeight.js') }}'></script>
    <script type='text/javascript' src='{{ asset('website/js/fotorama.js') }}'></script>
    <!-- date picker js -->
    <script type='text/javascript' src='{{ asset('website/js/moment.min.js') }}'></script>
    <script src="{{ asset('website/js/daterangepicker.js') }}"></script>
    <script src="{{ asset('website/js/jquery.singlePageNav.min.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="{{ asset('website/flex-slider/jquery.flexslider-min.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('website/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


</body>
</html>
