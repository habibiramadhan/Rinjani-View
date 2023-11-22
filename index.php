<?
require_once('../config/helper.php');
$_SESSION['id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">

    <!--=============== Manggil CSS ===============-->
    <link rel="stylesheet" href="Public/css/index.css">

    <title>Rinjani</title>
</head>

<body>
    <!--==================== HEADER ====================-->
    <header class="header" id="header">
        <!-- NAVBAR -->
        <nav class="nav container">
            <a href="" class="nav__logo">
                Rinjani
            </a>

            <div class="nav__menu " id="nav-menu">
                <!-- List Buat Navbar YGY -->
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#home" class="nav__link active-link">Home</a>
                    </li>

                    <li class="nav__item">
                        <a href="#about" class="nav__link">About</a>
                    </li>

                    <li class="nav__item">
                        <a href="#popular" class="nav__link">Popular</a>
                    </li>

                    <li class="nav__item">
                        <a href="#explorer" class="nav__link">Explorer</a>
                    </li>
                </ul>
                <!-- End dari unorder-List -->

                <!-- Tombol tutup -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <!-- Tombol Burger -->
            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-fill"></i>
            </div>
        </nav>
        <!-- End Dari Nav -->

    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
        <!--==================== HOME ====================-->
        <section class="home section" id="home">
            <img src=" Public/img/3.jpg" alt="Home Image" class="home__bg">
            <div class="home__shadow"></div>

            <div class="home__container container grid">
                <div class="hone__data">
                    <h3 class="home__subtitle">

                    </h3>
                    <h1 class="home__title">
                        EXPLORE <br>
                        Rinjani
                        <?php
                        if (isset($_SESSION['id'])) {
                            echo '<a href="dashboard.php">Dashboard</a>';
                        } else {
                            echo '<a href="view/login.php">Login</a>';
                        }
                        ?>
                    </h1>

                    <p class="home__description">
                        Gunung Rinjani adalah gunung berapi yang megah dan menawan,
                        terletak di pulau Lombok, Indonesia, yang menawarkan pemandangan alam
                        yang spektakuler dan petualangan pendakian yang menantang.
                    </p>

                    <a href="" class="button">
                        Daftar Untuk Mendaki <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

                <div class="home__cards grid">
                    <article class="home__card">
                        <img src="Public/img/about-1.jpg" alt="" class="home__card-img">
                        <h3 class="home__card-title">Pendaki</h3>
                        <div class="home__card-shadow"></div>
                    </article>

                    <article class="home__card">
                        <img src="Public/img/2.jpg" alt="" class="home__card-img">
                        <h3 class="home__card-title">Monyet</h3>
                        <div class="home__card-shadow"></div>
                    </article>

                    <article class="home__card">
                        <img src="Public/img/about-2.jpg" alt="" class="home__card-img">
                        <h3 class="home__card-title">Apa aja</h3>
                        <div class="home__card-shadow"></div>
                    </article>

                    <article class="home__card">
                        <img src="Public/img/about-3.jpg" alt="" class="home__card-img">
                        <h3 class="home__card-title">Ini Juga</h3>
                        <div class="home__card-shadow"></div>
                    </article>
                </div>
            </div>
        </section>

        <!--==================== ABOUT ====================-->
        <section class="about section" id="about">
            <div class="about__container grid container">
                <div class="about__data">
                    <h2 class="section__title">
                        Pelajari Selengkapnya <br>
                        Tentang Rinjani
                    </h2>

                    <p class="about__description">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima deserunt doloremque assumenda? Rerum labore molestias omnis deserunt? Autem nam adipisci atque, ducimus eos est. Voluptatum fugit neque iusto laboriosam laborum.

                    </p>

                    <a href="" class="button">
                        Explore Rinjani <i class="ri-arrow-right-line"></i>
                    </a>

                    <div class="about__image">
                        <img src="Public/img/about-7.jpg" alt="about image" class="about__img">
                        <div class="about__shadow"></div>
                    </div>
                </div>
            </div>
        </section>

        <!--==================== POPULAR ====================-->
        <section class="popular section" id="popular">
            <h2 class="section__title">Nikmati Rinjani</h2>

            <div class="popular__container container grid">
                <article class="poppular__card">
                    <div class="popular__image">
                        <img src="Public/img/about-6.jpg" alt="Article" class="popular__img">
                        <div class="popular__shadow"></div>
                    </div>

                    <h2 class="popular__title">

                    </h2>
                    <div class="popular__location">
                        <i class="ri-map-pin-line"></i>
                        <span></span>
                    </div>
                </article>

                <article class="poppular__card">
                    <div class="popular__image">
                        <img src="Public/img/about-6.jpg" alt="Article" class="popular__img">
                        <div class="popular__shadow"></div>
                    </div>

                    <h2 class="popular__title">

                    </h2>
                    <div class="popular__location">
                        <i class="ri-map-pin-line"></i>
                        <span></span>
                    </div>
                </article>

                <article class="poppular__card">
                    <div class="popular__image">
                        <img src="Public/img/about-6.jpg" alt="Article" class="popular__img">
                        <div class="popular__shadow"></div>
                    </div>

                    <h2 class="popular__title">

                    </h2>
                    <div class="popular__location">
                        <i class="ri-map-pin-line"></i>
                        <span></span>
                    </div>
                </article>
            </div>
        </section>

        <!--==================== EXPLORE ====================-->
        <section class="explore section" id="explore">
            <div class="explore__container">
                <div class="explore__image">
                    <img src="Public/img/4.jpg" alt="" class="explore__img">
                    <div class="explore__shadow"></div>
                </div>

                <div class="explore__content container grid">
                    <div class="explore__data">
                        <h2 class="section__title">
                            Explore <br>
                            Surga Pengunungan
                        </h2>

                        <p class="explore__description">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam consectetur debitis quas eaque doloremque in, accusamus sit quae minima totam, ex est a! Aut minima maiores error, velit vitae consequatur.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!--==================== FOOTER ====================-->
    <footer class="footer">
        <div class="footer__container container grid">
            <div class="footer__content grid">
                <div>
                    <a href="" class="footer__logo">Rinjani</a>

                    <p class="footer__description">
                        Mendaki Bersma <br>
                        kami
                    </p>
                </div>

                <div class="footer__data grid">
                    <div>
                        <h3 class="footer__title">About</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="" class="footer__link">About Us</a>
                            </li>
                            <li>
                                <a href="" class="footer__link">Features</a>
                            </li>
                            <li>
                                <a href="" class="footer__link">News & Blog</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Contact</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="" class="footer__link">Call Center</a>
                            </li>
                            <li>
                                <a href="" class="footer__link">Support Center</a>
                            </li>
                            <li>
                                <a href="" class="footer__link">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title">Support</h3>

                        <ul class="footer__links">
                            <li>
                                <a href="" class="footer__link">Privacy Policy</a>
                            </li>
                            <li>
                                <a href="" class="footer__link">Terms & Service</a>
                            </li>
                            <li>
                                <a href="" class="footer__link">Payment</a>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h3 class="footer__title"></h3>

                        <ul class="footer__links">
                            <li>
                                <a href="" class="footer__link"></a>
                            </li>
                            <li>
                                <a href="" class="footer__link"></a>
                            </li>
                            <li>
                                <a href="" class="footer__link"></a>
                            </li>
                            <li>
                                <a href="" class="footer__link"></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="footer__group">
                <div class="footer__social">
                    <a href="" class="footer__social-link">
                        <i class="ri-facebook-line"></i>
                    </a>
                    <a href="" class="footer__social-link">
                        <i class="ri-instagram-line"></i>
                    </a>
                    <a href="" class="footer__social-link">
                        <i class="ri-youtube-line"></i>
                    </a>
                </div>

                <span class="footer__copy">
                    &#169; Copyright Kelompok 4. All Rights Reserved
                </span>
            </div>
        </div>
    </footer>

    <!--========== SCROLL UP ==========-->

    <a href="#" class="scrollup" id="scroll-up">
        <i class="ri-arrow-up-line"></i>
    </a>
    <!--=============== SCROLLREVEAL ===============-->
    <script src=""></script>

    <!--=============== MAIN JS ===============-->
    <script src="public/js/index.js"></script>
</body>

</html>