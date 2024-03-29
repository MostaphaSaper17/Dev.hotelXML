<footer id="main-footer">
    <div class="container ">
        <div class="row">
            <div class="col-sm-5">
                <div class="logo">
                    <img src="{{ asset('website/images/logo.png') }}" alt="">
                </div>
                <p>
                    Hotelsxml is a modern system for travel agents that is flexible to book your hotels online easily. The system creates and filters over 500000 hotels with the best prices and availability from a wide range of distributors And bedbanks worldwide.
                </p>

                <p>Follow Us :</p>
                <p>

                    <a style="margin-right: 10px;" href="#">
                        <i class="fa-brands fa-twitter fa-lg"></i>

                    </a>
                    <a style="margin-right: 10px;" href="#">
                        <i class="fa-brands fa-linkedin fa-lg"></i>
                    </a>
                    <a style="margin-right: 10px;" href="#">
                        <i class="fa-brands fa-facebook fa-lg"></i>
                    </a>
                    <a style="margin-right: 10px;" href="#">
                        <i class="fa-brands fa-instagram fa-lg"></i>
                    </a>
                    <a style="margin-right: 10px;" href="#">
                        <i class="fa-brands fa-whatsapp fa-lg"></i>
                    </a>
                </p>
            </div>

            <div class="col-sm-3 offset-sm-1">
                <h4>NEED HELP?</h4>
                <div class="seperate-line"></div>
                <ul class="menu">
                    <li><a href="#!">Blog</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-sm-3 ">
                <h4>LEGAL</h4>
                <div class="seperate-line"></div>
                <ul class="menu">
                    <li><a href="{{ route('terms-conditions') }}">Terms and Conditions</a></li>
                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ route('legal-notice') }}">Legal Notice</a></li>
                </ul>
            </div>

        </div>

    </div>
</footer>

<div class="clearfix"></div>
<div class="container main-footer-sub">
    <div class="st-flex space-between">
        <div class="left ">
            <div class="f14">© 2023 Hotelsxml / All Rights Reserved.</div>
        </div>
        <div class="right " style="display: flex; align-items: center;">
            <img src="{{ asset('website/images/save.png') }}" alt="" class="img-responsive"  style=" height: 40px !important;">
            <img src="{{ asset('website/images/secure.png') }}" alt="" class="img-responsive" style=" height: 40px !important;">
            <img src="{{ asset('website/images/payment.png') }}" alt="" class="img-responsive" >


        </div>
    </div>
</div>
