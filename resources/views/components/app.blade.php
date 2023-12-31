<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Băcănia Grădina Crăciun</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="/maintenance/images/icons/favicon.ico"/>

    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<style>
    .header__menu ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .header__menu ul li {
        display: inline-block;
        margin-right: 10px; /* Add some margin between menu items */
    }

    .header__menu ul li a {
        text-decoration: none;
        font-size: 15px; /* Adjust the font size to make it smaller */
        color: #333; /* Change the text color as needed */
    }
</style>



<body>
<!-- Page Preloder -->
<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        <a href="/"><img src="/img/logo-clar.png" alt=""></a>
    </div>
    <div class="humberger__menu__cart">
        <ul>
            <li><a href="/cart"><i class="fa fa-shopping-bag"></i> </a></li>
        </ul>
    </div>
    <div class="humberger__menu__widget">
        @auth
            <div class="header__top__right__auth">
                <a href="{{route('profile.edit')}}"><i class="fa fa-user"></i> Profil</a>
            </div>
            <div class="header__top__right__auth">
                <form action="{{route('logout')}}" method="POST" id="logout-mobile">
                    @csrf
                </form>
                <a style="cursor:pointer;" onclick="document.querySelector('#logout-mobile').submit();"><i class="fa fa-close"></i> Iesire din cont</a>
            </div>
        @else
        <div class="header__top__right__auth">
            <a href="{{route('login')}}"><i class="fa fa-user"></i> Logare</a>
        </div>

            <div class="header__top__right__auth">
                <a href="{{route('register')}}"><i class="fa fa-user"></i> Inregistrare</a>
            </div>
        @endauth
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li><a href="/">Băcănia Grădina Crăciun</a></li>
            <li><a href="/shop">Magazin</a></li>
            <li><a href="/about-us">Despre Noi</a></li>
            <li><a href="/contact">Contact</a></li>
            <li><a href="/cart">Cosul meu</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">

    </div>
</div>
<!-- Humberger End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__left">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="header__top__right">
                        @auth
                            <div class="header__top__right__auth">
                                <a href="{{route('profile.edit')}}"><i class="fa fa-user"></i> Profil  </a>
                            </div>
                            <div class="header__top__right__auth">
                                <form action="{{route('logout')}}" method="POST" id="logout-desktop">
                                    @csrf
                                </form>
                                <a style="cursor:pointer;" onclick="document.querySelector('#logout-desktop').submit();"><i class="fa fa-close"></i>  Iesire din cont</a>
                            </div>
                        @else
                            <div class="header__top__right__auth">
                                <a href="{{route('login')}}"><i class="fa fa-user"></i> Logare</a>
                            </div>

                            <div class="header__top__right__auth">
                                <a href="{{route('register')}}"><i class="fa fa-user"></i> Inregistrare</a>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <div class="header__logo">
                    <a href="/"><img width="300" src="img/logo-clar.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="/">Băcănia Grădina Crăciun</a></li>
                        <li><a href="/shop">Magazin</a></li>
                        <li><a href="/about-us">Despre Noi</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/cart">Cosul Meu</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <ul>
                        <li><a href="/cart"><i style="font-size: 21px;" class="fa fa-shopping-bag"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->


@if(session('error'))
    @php(dd(1))

    @endif



@if (session('success'))
    <div class="toast" style="position: fixed;z-index:10000; bottom: 0; right: 0; width: 100%; max-width: 400px; background-color: #fff;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="20000">
        <div class="toast-header">
            <strong class="me-auto"><i class="bi-gift-fill"></i>Mesaj success</strong>
            <i class="fa fa-check" style="color:green;font-size:20px;" aria-hidden="true"></i>
            <button type="button" class="ml-2 mb-1 close ml-auto" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body" style="background-color: #fff;">
            {{session('success')}}
        </div>
    </div>
@endif

@if (session('error'))
    <div class="toast" style="position: fixed;z-index:10000; bottom: 0; right: 0; width: 100%; max-width: 400px; background-color: #fff;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="20000">
        <div class="toast-header">
            <strong class="me-auto"><i class="bi-gift-fill"></i>Mesaj eroare</strong>
            <i class="fa fa-window-close ml-2" style="color:red;font-size:20px;" aria-hidden="true"></i>
            <button type="button" class="ml-2 mb-1 close ml-auto" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body" style="background-color: #fff;">
            {{session('error')}}
        </div>
    </div>
@endif

@if(session('warning'))
    <div class="toast" style="position: fixed;z-index:10000; bottom: 0; right: 0; width: 100%; max-width: 400px; background-color: #fff;" role="alert" aria-live="assertive" aria-atomic="true" data-delay="20000">
        <div class="toast-header">
            <strong class="me-auto"><i class="bi-gift-fill"></i>Mesaj atentionare</strong>
            <i class="fa fa-exclamation-triangle" style="color:#D1D100;font-size:20px;" aria-hidden="true"></i>
            <button type="button" class="ml-2 mb-1 close ml-auto" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body" style="background-color: #fff;">
            {{session('warning')}}
        </div>
    </div>
@endif

<main>
    {{$slot}}
</main>


<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="/"><img width="200" src="img/logo-clar.png" alt=""></a>
                    </div>
                    <ul>
                        <li>Adresa: Strada Tamași 22, Buftea 070000</li>
                        <li>Telefon: 0758233155</li>
                        <li>Email: agroser.mac@gmail.com</li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Linkuri extra</h6>
                    <ul>
                        <li><a href="/about-us">Despre Noi</a></li>
                        <li><a href="/contact">Contact</a></li>
                        <li><a href="/cart">Cosul meu</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Toate drepturile rezervate | Băcănia Grădina Crăciun</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img width="200" src="img/featured/anpc-sal1-1.png" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.nice-select.min.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<script src="/js/jquery.slicknav.js"></script>
<script src="/js/mixitup.min.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2"></script>


<script>
    $(document).ready(function(){
        var toastEl = document.querySelector('.toast');
        if(toastEl) {
            var toast = new bootstrap.Toast(toastEl, {
                delay: 20000 // set the delay to 10 seconds (10000 milliseconds)
            });
            toast.show();
        }
    });
</script>



</body>

</html>
