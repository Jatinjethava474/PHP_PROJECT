<?php
session_start();
// session is always before require file path
if (isset($_GET['sing_up']) && !$_SESSION["user"]["email"]) {
    include_once('./sing_up.php');
} else if (isset($_GET['login']) && !$_SESSION["user"]["email"]) {
    include_once('./login.php');
} else if (isset($_GET['path'])) {
    // ...your code...
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MusicBeat</title>
    <link href="music.css" rel="stylesheet">

    <link href="./bootstrap.min.css" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css"
        integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Owl Carousel CSS -->
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />


    <!-- aos animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

</head>

<body>
    <header class="bg-light shadow static-header w-100 top-0">
        <div class="container-fluid">
            <div class="container mx-auto">
                <div class="header font-bold">
                    <div class="d-flex align-items-center justify-content-between position-relative">

                        <!-- Logo -->
                        <div class="logo">
                            <div class="logo-img fs-2 text-center">
                                <i class="fa-solid fa-drum"></i>
                                <h4>MusicBeat</h4>
                            </div>
                        </div>

                        <!-- Desktop Navigation -->
                        <div class="nav d-none d-lg-block">
                            <ul class="menu d-flex fw-bold">
                                <li><a href="#Home">Home</a></li>
                                <li><a href="#Services">Service</a></li>
                                <li><a href="#WhyChooseUs">About</a></li>
                                <li><a href="#Portfolio">Gallery</a></li>
                                <li><a href="#plan">plan</a></li>
                                <li><a href="#team">Artists</a></li>
                                <li><a href="#Blogs">Playlists</a></li>
                                <li><a href="#Contact">Contact</a></li>
                            </ul>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex align-items-center">
                            <!-- Mobile Menu Button -->
                            <div class="d-block d-lg-none" id="menu-btn">
                                <i class="fa-solid fa-bars"></i>
                            </div>

                            <!-- CTA: Book Ticket -->
                            <?php
                            if (isset($_SESSION["user"]["email"])) { ?>
                                <div class="btn">
                                    <a href="request.php?logout=true"><button class="text-white rounded-4">log
                                            out</button></a>
                                </div>
                            <?php } else { ?>
                                <div class="btn">
                                    <a href="./login.php"><button class="text-white rounded-4">login</button></a>
                                </div>

                                <div class="btn">
                                    <a href="./sign_up.php"><button class="text-white rounded-4">sign up</button></a>
                                </div>
                            <?php } ?>

                            <!-- Dark Mode Button -->
                            <div class="darkmode-btn">
                                <a href="index.php">
                                    <button class="rounded-pill" style="background-color: rgb(224, 224, 224);">
                                        <i class="fa-solid fa-cloud-sun" style="color: #000000;"></i>
                                    </button>
                                </a>
                            </div>
                            <div style=" position: absolute; right:-5%;"><a href="./user/dashboard.php"
                                    class="text-dark"><i class="fa-solid fa-user fa-2x"></i></a>
                            </div>
                        </div>

                        <!-- Mobile Menu -->
                        <div id="mobile-menu" class="position-absolute bg-light w-50 top-90 d-none">
                            <ul class="menu fw-bold">
                                <li class="pb-2 m-2"><a href="#Home">Home</a></li>
                                <li class="pb-2 m-2"><a href="#Services">Service</a></li>
                                <li class="pb-2 m-2"><a href="#WhyChooseUs">About</a></li>
                                <li class="pb-2 m-2"><a href="#Portfolio">Gallery</a></li>
                                <li class="pb-2 m-2"><a href="#plan">plan</a></li>
                                <li class="pb-2 m-2"><a href="#team">Artists</a></li>
                                <li class="pb-2 m-2"><a href="#Contact">Contact</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Floating Music Button -->
    <div class="fixed-btn position-fixed p-3 rounded-circle overflow-hidden bg-primary shadow"
        style="z-index: 1030; bottom: 20px; right: 20px; cursor: pointer;"
        onclick="window.scrollTo({ top: 0, behavior: 'smooth' })">

        <div class="d-flex justify-content-center align-items-center">
            <i class="fa-solid fa-arrow-up fa-2x" style="color: #ffffff; font-size: 1.2rem;"></i>
        </div>
    </div>

    <div id="Home" class="hero content">
        <div id="particles-js"></div>
        <div class="container-fluid">
            <div class="container mx-auto">
                <div class="row d-flex py-200">

                    <!-- Left Image for Album/Concert -->
                    <div class="col-md-6 d-none d-md-block w-50 bg-image"></div>

                    <!-- Right Content -->
                    <div class="col-12 col-md-6 text-center text-md-start text">

                        <!-- Heading -->
                        <h1 data-aos="fade-up" data-aos-duration="1000" class="text-white fs-1 mb-4">

                            <span class="text-white">Stream Your Favorite Music <br>Book Live Events</span>
                        </h1>

                        <!-- Subheading -->
                        <p data-aos="fade-up" data-aos-duration="1300" class="text-white fs-6 fw-semibold mb-4">
                            Discover trending tracks, exclusive playlists, and upcoming concerts. <br>
                            Stream seamlessly and book your spot at live events in just a click.
                        </p>

                        <!-- Social Media -->
                        <div data-aos="fade-up" data-aos-duration="1600" class="social-icon mb-4">
                            <a href="https://open.spotify.com/playlist/4fX6ngMPs1K4dTFqY8BdCt"><i
                                    class="m-2 fa-brands fa-spotify fs-2" style="color: #1DB954;"></i></a>
                            <a href="https://soundcloud.com/royalty-free-beats"><i
                                    class="m-2 fa-brands fa-soundcloud fs-2" style="color: #FF5500;"></i></a>
                            <a href="https://www.youtube.com/@MusicBeat."><i class="m-2 fa-brands fa-youtube fs-2"
                                    style="color: #FF0000;"></i></a>
                            <a href="https://www.instagram.com/mus_icbeat/"><i class="m-2 fa-brands fa-instagram fs-2"
                                    style="color: #f44b84ff;"></i></a>
                        </div>

                        <!-- Buttons -->
                        <div data-aos="fade-up" data-aos-duration="1500" class="get-btn">
                            <!-- <div class="btn p-0 position-relative z-3">
                                <a href="https://freefy.app/discover#google_vignette"><button class="text-white p-2 px-4 border-0 rounded-pill">
                                        <i class="fa-solid fa-play me-2"></i> Start Listening
                                    </button></a>
                            </div> -->
                            <div class="btn">
                                <a href="./book.php"><button class="text-white p-2 px-4 border-0 rounded-pill">
                                        <i class="fa-solid fa-ticket me-2"></i> Book Event
                                    </button></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Services" class="services">
        <div class="container-fluid">
            <div class="container mx-auto overflow-hidden">
                <div class="title-text text-center">
                    <h1 class="fs-2">What We Offer</h1>
                    <p class="fs-6">Your music, your events, all in one place</p>
                </div>
                <div class="row gx-4 p-4">

                    <!-- Music Streaming -->
                    <div data-aos="fade-up" data-aos-duration="800" class="col-12 col-md-6 col-lg-4">
                        <div class="p-3 shadow p-3 mb-5 bg-body rounded bg-light zoom-card">
                            <div class="icon mx-auto text-center">
                                <i class="fa-solid fa-music fs-1"></i>
                            </div>
                            <div class="text text-center">
                                <h1 class="fs-4">Unlimited Music Streaming</h1>
                                <p class="fs-6">Stream your favorite tracks, albums, and playlists anytime, anywhere.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Live Event Booking -->
                    <div data-aos="fade-up" data-aos-duration="1200" class="col-12 col-md-6 col-lg-4">
                        <div class="p-3 shadow p-3 mb-5 bg-body rounded bg-light zoom-card">
                            <div class="icon mx-auto text-center">
                                <i class="fa-solid fa-ticket fs-1"></i>
                            </div>
                            <div class="text text-center">
                                <h1 class="fs-4">Live Event Booking</h1>
                                <p class="fs-6">Book tickets for concerts, gigs, and festivals with ease.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Artist Profiles -->
                    <div data-aos="fade-up" data-aos-duration="1600" class="col-12 col-md-6 col-lg-4">
                        <div class="p-3 shadow p-3 mb-5 bg-body rounded bg-light zoom-card">
                            <div class="icon mx-auto text-center">
                                <i class="fa-solid fa-user fs-1"></i>
                            </div>
                            <div class="text text-center">
                                <h1 class="fs-4">Artist Profiles</h1>
                                <p class="fs-6">Discover and follow your favorite artists, DJs, and bands.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Playlist Creation -->
                    <div data-aos="fade-up" data-aos-duration="800" class="col-12 col-md-6 col-lg-4">
                        <div class="p-3 shadow p-3 mb-5 bg-body rounded bg-light zoom-card">
                            <div class="icon mx-auto text-center">
                                <i class="fa-solid fa-list fs-1"></i>
                            </div>
                            <div class="text text-center">
                                <h1 class="fs-4">Custom Playlists</h1>
                                <p class="fs-6">Create, share, and enjoy playlists for every mood and event.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Event Management -->
                    <div data-aos="fade-up" data-aos-duration="1200" class="col-12 col-md-6 col-lg-4">
                        <div class="p-3 shadow p-3 mb-5 bg-body rounded bg-light zoom-card">
                            <div class="icon mx-auto text-center">
                                <i class="fa-solid fa-calendar-days fs-1"></i>
                            </div>
                            <div class="text text-center">
                                <h1 class="fs-4">Event Management</h1>
                                <p class="fs-6">Organize and promote music events with our easy-to-use tools.</p>
                            </div>
                        </div>
                    </div>

                    <!-- High-Quality Audio -->
                    <div data-aos="fade-up" data-aos-duration="1600" class="col-12 col-md-6 col-lg-4">
                        <div class="p-3 shadow p-3 mb-5 bg-body rounded bg-light zoom-card">
                            <div class="icon mx-auto text-center">
                                <i class="fa-solid fa-headphones fs-1"></i>
                            </div>
                            <div class="text text-center">
                                <h1 class="fs-4">High-Quality Audio</h1>
                                <p class="fs-6">Enjoy crystal-clear sound for an immersive listening experience.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="abc" id="WhyChooseUs">
        <div class="container-fluid">
            <div class="container mx-auto">
                <div data-aos="fade-up" data-aos-duration="1500" class="title-text text-center">
                    <h1 class="fs-2">Why Choose Us</h1>
                    <p class="fs-6">Your ultimate music and events destination</p>
                </div>
                <div class="container">
                    <div class="row justify-content-center">

                        <!-- Left Column -->
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div data-aos="fade-up" data-aos-duration="800" class="d-flex mb-4 justify-content-end">
                                <div class="text text-end">
                                    <h2 class="fs-3">Diverse Music Library</h2>
                                    <p class="fs-6">Access thousands of tracks, albums, and<br> playlists across every
                                        genre.
                                    </p>
                                </div>
                                <div class="icon ms-2">
                                    <i class="fa-solid fa-music fs-1"></i>
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1200" class="d-flex mb-4 justify-content-end">
                                <div class="text text-end">
                                    <h2 class="fs-3">Top Artists</h2>
                                    <p class="fs-6">Follow your favorite artists and<br> discover rising stars.
                                    </p>
                                </div>
                                <div class="icon ms-3">
                                    <i class="fa-solid fa-user fs-1"></i>
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1600" class="d-flex mb-4 justify-content-end">
                                <div class="text text-end">
                                    <h2 class="fs-3">Curated Playlists</h2>
                                    <p class="fs-6">Enjoy playlists tailored to<br> your mood and events.
                                    </p>
                                </div>
                                <div class="icon ms-2">
                                    <i class="fa-solid fa-list fs-1"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Center Image Column -->
                        <div data-aos="fade-up" data-aos-duration="1500" class="col-12 col-md-6 col-lg-4 mb-4 p-5">
                            <div class="img zoom-card">
                                <img src="./image/music_why_choose2.png" alt="Music and Events"
                                    style="width: 100%; height: 350px;">
                            </div>
                        </div>

                        <!-- Right Column -->
                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                            <div data-aos="fade-up" data-aos-duration="800" class="d-flex mb-4">
                                <div class="icon me-2">
                                    <i class="fa-solid fa-ticket fs-1"></i>
                                </div>
                                <div class="text text-start">
                                    <h2 class="fs-3">Easy Ticket Booking</h2>
                                    <p class="fs-6">Book tickets for concerts, festivals,<br> and live shows in minutes.
                                    </p>
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1200" class="d-flex mb-4">
                                <div class="icon me-2">
                                    <i class="fa-solid fa-calendar-days fs-1"></i>
                                </div>
                                <div class="text text-start">
                                    <h2 class="fs-3">Event Scheduling</h2>
                                    <p class="fs-6">Stay updated with event calendars<br> and set reminders.
                                    </p>
                                </div>
                            </div>
                            <div data-aos="fade-up" data-aos-duration="1600" class="d-flex mb-4">
                                <div class="icon me-2">
                                    <i class="fa-solid fa-headphones fs-1"></i>
                                </div>
                                <div class="text text-start">
                                    <h2 class="fs-3">24/7 Support</h2>
                                    <p class="fs-6">Our team is here to help you<br> anytime, anywhere.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Portfolio" class="portfolio">
        <div class="container-fluid">
            <div class="container mx-auto">

                <!-- Section Title -->
                <div data-aos="fade-up" data-aos-duration="1500" class="title-text text-center mb-4">
                    <h1 class="fs-2">Music & Events</h1>
                    <p class="fs-6">Explore our top performances, concerts, and exclusive tracks</p>
                </div>

                <!-- Filter Buttons -->
                <div data-aos="fade-up" data-aos-duration="1500"
                    class="button-group mb-4 d-flex flex-wrap justify-content-center gap-2 ">
                    <button onclick="filterProjects('all')"
                        class="btn fs-5 text-white p-2 px-4 border-0 rounded-pill">All</button>
                    <button onclick="filterProjects('concerts')"
                        class="btn fs-5 text-white p-2 px-4 border-0 rounded-pill">Live Concerts</button>
                    <button onclick="filterProjects('albums')"
                        class="btn fs-5 text-white p-2 px-4 border-0 rounded-pill">Albums</button>
                    <button onclick="filterProjects('singles')"
                        class="btn fs-5 text-white p-2 px-4 border-0 rounded-pill">Singles</button>
                    <button onclick="filterProjects('events')"
                        class="btn fs-5 text-white p-2 px-4 border-0 rounded-pill">Event Highlights</button>
                </div>

                <!-- Gallery -->
                <div data-aos="fade-up" data-aos-duration="1500" class="gallery-section">
                    <div class="row gx-4">
                        <div class="col-12 col-md-6 col-lg-4 mb-4 gallery overflow-hidden" data-category="concerts">
                            <div class="overflow-hidden d-flex align-items-center justify-content-center"
                                style="height:250px;">
                                <img class="rounded-3 gallery-img" src="./image/music_home.avif" alt="Live Concert"
                                    style="height:100%; width:100%; object-fit:cover;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-4 gallery overflow-hidden" data-category="albums">
                            <div class="overflow-hidden d-flex align-items-center justify-content-center"
                                style="height:250px;">
                                <img class="rounded-3 gallery-img" src="./image/album.jpg" alt="Album Cover"
                                    style="height:100%; width:100%; object-fit:cover;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-4 gallery overflow-hidden" data-category="singles">
                            <div class="overflow-hidden d-flex align-items-center justify-content-center"
                                style="height:250px;">
                                <img class="rounded-3 gallery-img" src="./image/single_track.jpg" alt="Single Track"
                                    style="height:100%; width:100%; object-fit:cover;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-4 gallery overflow-hidden" data-category="events">
                            <div class="overflow-hidden d-flex align-items-center justify-content-center"
                                style="height:250px;">
                                <img class="rounded-3 gallery-img" src="./image/highlights.jpg" alt="Event Highlight"
                                    style="height:100%; width:100%; object-fit:cover;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-4 gallery overflow-hidden" data-category="concerts">
                            <div class="overflow-hidden d-flex align-items-center justify-content-center"
                                style="height:250px;">
                                <img class="rounded-3 gallery-img" src="./image/music_festival.jpg" alt="Music Festival"
                                    style="height:100%; width:100%; object-fit:cover;">
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-4 gallery overflow-hidden" data-category="albums">
                            <div class="overflow-hidden d-flex align-items-center justify-content-center"
                                style="height:250px;">
                                <img class="rounded-3 gallery-img" src="./image/artwork.jpg" alt="Album Artwork"
                                    style="height:100%; width:100%; object-fit:cover;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="pricing-plan fade-up">
        <div class="container-fluid">
            <div class="container mx-auto">
                <div class="title-text text-center">
                    <h1 class="fs-2">Our Plans</h1>
                    <p class="fs-6">Choose the perfect plan for streaming music & booking events</p>
                </div>
                <div class="row gx-4 fade-up">

                    <!-- Starter Plan -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="p-3 shadow bg-body rounded text-center bg-light">
                            <div class="price">
                                <h3>Starter</h3>
                                <div class="d-flex justify-content-center align-items-baseline">
                                    <span class="fs-4">&#8377;</span>
                                    <h1 class="mb-0">756</h1>
                                    <span class="fs-6">/month</span>
                                </div>
                                <div class="price-list fs-6 mb-4">
                                    <p><i class="fa-regular fa-circle-check"></i> Unlimited Music Streaming</p>
                                    <p><i class="fa-regular fa-circle-check"></i> 5 Event Bookings per Month</p>
                                    <p><i class="fa-regular fa-circle-check"></i> HD Audio Quality</p>
                                    <p><i class="fa-regular fa-circle-check"></i> Access to Free Events</p>
                                    <p><i class="fa-regular fa-circle-check"></i> Email Support</p>
                                </div>
                                <div class="btn">
                                    <button class="text-white p-2 px-4 border-0 rounded-pill bg-primary">Get
                                        Started</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pro Plan -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="p-3 shadow bg-body rounded text-center bg-light">
                            <div class="price">
                                <h3>Pro</h3>
                                <div class="d-flex justify-content-center align-items-baseline">
                                    <span class="fs-4">&#8377;</span>
                                    <h1 class="mb-0">1596</h1>
                                    <span class="fs-6">/month</span>
                                </div>
                                <div class="price-list fs-6 mb-4">
                                    <p><i class="fa-regular fa-circle-check"></i> Unlimited Music Streaming</p>
                                    <p><i class="fa-regular fa-circle-check"></i> 15 Event Bookings per Month</p>
                                    <p><i class="fa-regular fa-circle-check"></i> Ultra HD Audio Quality</p>
                                    <p><i class="fa-regular fa-circle-check"></i> Priority Event Access</p>
                                    <p><i class="fa-regular fa-circle-check"></i> Download for Offline Listening</p>
                                    <p><i class="fa-regular fa-circle-check"></i> 24/7 Live Chat Support</p>
                                </div>
                                <div class="btn">
                                    <button class="text-white p-2 px-4 border-0 rounded-pill bg-primary">Upgrade
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Premium VIP Plan -->
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="p-3 shadow bg-body rounded text-center bg-light">
                            <div class="price">
                                <h3>Premium VIP</h3>
                                <div class="d-flex justify-content-center align-items-baseline">
                                    <span class="fs-4">&#8377;</span>
                                    <h1 class="mb-0">2430</h1>
                                    <span class="fs-6">/month</span>
                                </div>
                                <div class="price-list fs-6 mb-4">
                                    <p><i class="fa-regular fa-circle-check"></i> Unlimited Music & Event Access</p>
                                    <p><i class="fa-regular fa-circle-check"></i> Unlimited Event Bookings</p>
                                    <p><i class="fa-regular fa-circle-check"></i> VIP Backstage Passes</p>
                                    <p><i class="fa-regular fa-circle-check"></i> Meet & Greet with Artists</p>
                                    <p><i class="fa-regular fa-circle-check"></i> Early Bird Ticket Discounts</p>
                                    <p><i class="fa-regular fa-circle-check"></i> 24/7 Premium Support</p>
                                </div>
                                <div class="btn">
                                    <button class="text-white p-2 px-4 border-0 rounded-pill bg-primary">Join
                                        VIP</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="Testimonials" class="testimonials">
        <div class="container-fluid">
            <div class="container mx-auto">
                <!-- Section Title -->
                <div data-aos="fade-up" data-aos-duration="1500" class="title-text text-center mb-4">
                    <h1 class="fs-2">What Our Listeners & Artists Say</h1>
                    <p class="fs-6">Real experiences from music lovers, performers, and event organizers</p>
                </div>

                <!-- Slider -->
                <div data-aos="fade-up" data-aos-duration="1500" class="slider">
                    <div class="slider-container">
                        <div class="owl-carousel owl-theme">

                            <!-- Testimonial 1 -->
                            <div class="item shadow m-4 p-4 rounded">
                                <div class="d-flex">
                                    <div class="circle">
                                        <div class="img">
                                            <img src="./image/review1.jpg" alt="DJ Alex" />
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h4>DJ Alex Groove</h4>
                                        <p>Electronic Artist</p>
                                        <div class="star">
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                        </div>
                                    </div>
                                </div>
                                <i class="fs-5">" The streaming quality is amazing, and booking gigs here has never been
                                    easier! "</i>
                            </div>

                            <!-- Testimonial 2 -->
                            <div class="item shadow m-4 p-4 rounded">
                                <div class="d-flex">
                                    <div class="circle">
                                        <div class="img h-100 mb-5">
                                            <img width="100%" src="./image/review2.jpg" alt="Sarah Lee">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h4>Sarah Lee</h4>
                                        <p>Event Organizer</p>
                                        <div class="star">
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <i class="fs-5">" I booked my last concert through this platform — smooth process and a
                                    great crowd! "</i>
                            </div>

                            <!-- Testimonial 3 -->
                            <div class="item shadow m-4 p-4 rounded">
                                <div class="d-flex">
                                    <div class="circle">
                                        <div class="img h-100">
                                            <img width="100%" src="./image/review3.jpg" alt="Liam Carter">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h4>Liam Carter</h4>
                                        <p>Music Lover</p>
                                        <div class="star">
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <i class="fs-5">" I’ve discovered so many new artists here — love the live streaming
                                    events! "</i>
                            </div>

                            <!-- Testimonial 4 -->
                            <div class="item shadow m-4 p-4 rounded">
                                <div class="d-flex">
                                    <div class="circle">
                                        <div class="img">
                                            <img width="100%" src="./image/review4.avif" alt="Maya Thompson">
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h4>Maya Thompson</h4>
                                        <p>Festival Manager</p>
                                        <div class="star">
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                            <i class="fa-solid fa-star" style="color: #FFD43B;"></i>
                                        </div>
                                    </div>
                                </div>
                                <i class="fs-5">" Our festival tickets sold out in days after listing here — incredible
                                    exposure! "</i>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rate-section hero2">
        <div class="container-fluid">
            <div class="container mx-auto">
                <div data-aos="fade-up" data-aos-duration="1500" class="row d-md-flex justify-content-center">

                    <!-- Total Streams -->
                    <div class="col rate p-4 text-center">
                        <div class="icon">
                            <i class="fas fa-music text-white fs-3"></i>

                            <h3 class="rating">1.2M</h3>
                            <h3>Total Streams</h3>
                            <p class="text-white">Songs & podcasts played worldwide</p>
                        </div>
                    </div>

                    <!-- Events Booked -->
                    <div class="col rate p-4 text-center">
                        <div class="icon">
                            <i class="fa-solid fa-calendar-check fs-3 text-white"></i>
                            <h3 class="rating">847</h3>
                            <h3>Events Booked</h3>
                            <p class="text-white">Concerts, gigs & private shows</p>
                        </div>
                    </div>

                    <!-- Active Artists -->
                    <div class="col rate p-4 text-center">
                        <div class="icon">
                            <i class="fa-solid fa-guitar text-white fs-3"></i>
                            <h3 class="rating">312</h3>
                            <h3>Active Artists</h3>
                            <p class="text-white">Musicians streaming & performing</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="partner-section py-5">
        <div class="container-fluid">
            <div class="container mx-auto">
                <!-- Section Title -->
                <div data-aos="fade-up" data-aos-duration="1500" class="text-center mb-4">
                    <h2 class="fw-bold">Our Music Partners</h2>
                    <p class="text-muted">Proudly collaborating with the best in music & events</p>
                </div>

                <div data-aos="zoom-in" data-aos-duration="1500" class="row text-center align-items-center">
                    <div class="col">
                        <img class="w-100" src="./image/spotify.webp" alt="Spotify">
                    </div>
                    <div class="col">
                        <img class="w-50" src="./image/Apple-Music.png" alt="Apple Music">
                    </div>
                    <div class="col">
                        <img class="w-100" src="./image/SoundCloud-Logo.png" alt="SoundCloud">
                    </div>
                    <div class="col">
                        <img class="w-100" src="./image/Ticketmaster-Logo.png" alt="Ticketmaster">
                    </div>
                    <div class="col">
                        <img class="w-100" src="./image/LYV_BIG-a5b10c4f.png" alt="Live Nation">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="team" class="team py-5">
        <div class="container">
            <!-- Section Title -->
            <div class="title-text text-center mb-5">
                <h1 class="fs-2">Meet Our Crew</h1>
                <p class="fs-6">The people behind your favorite music & unforgettable events</p>
            </div>

            <!-- Team Members -->
            <div class="row g-4">
                <!-- DJ / Headliner -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="memb text-center p-3">
                        <div class="overflow-hidden rounded-3">
                            <img class="img-fluid" src="./image/team1.jpeg" alt="DJ SonicWave">
                        </div>
                        <h3 class="mt-3">DJ SonicWave</h3>
                        <i>Resident DJ & Music Curator</i>
                        <div class="d-flex justify-content-center social-icon gap-2 mt-3">
                            <a href="https://x.com/residentmusic" class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://www.facebook.com/people/Resident-DJ/61560415123677/"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="https://in.linkedin.com/in/rahul-ayare-42a5a3ba"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/mixministermusic/"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Event Manager -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="memb text-center p-3">
                        <div class="overflow-hidden rounded-3">
                            <img class="img-fluid" src="./image/team2.jpeg" alt="Maya Groove">
                        </div>
                        <h3 class="mt-3">Maya Groove</h3>
                        <i>Event & Booking Manager</i>
                        <div class="d-flex justify-content-center social-icon gap-2 mt-3">
                            <a href="https://x.com/bookingmanager" class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                            <a href="#" class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="https://www.linkedin.com/company/ladymgmt-events"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/lifeofeventmanagers/"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Music Producer -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="memb text-center p-3">
                        <div class="overflow-hidden rounded-3">
                            <img class="img-fluid" src="./image/team3.jpeg" alt="Alex Beats">
                        </div>
                        <h3 class="mt-3">Alex Beats</h3>
                        <i>Producer & Sound Engineer</i>
                        <div class="d-flex justify-content-center social-icon gap-2 mt-3">
                            <a href="https://x.com/musicproducer01" class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://www.facebook.com/groups/172163046151844/"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="https://in.linkedin.com/in/callmefezz"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/silexproduction/"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Stage Manager -->
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="memb text-center p-3">
                        <div class="overflow-hidden rounded-3">
                            <img class="img-fluid" src="./image/team4.jpeg" alt="Lara Lights">
                        </div>
                        <h3 class="mt-3">Lara Lights</h3>
                        <i>Stage & Lighting Director</i>
                        <div class="d-flex justify-content-center social-icon gap-2 mt-3">
                            <a href="https://x.com/stagelights" class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-x-twitter"></i></a>
                            <a href="https://www.facebook.com/groups/lightingtrainer/posts/2334467733422318/"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-facebook"></i></a>
                            <a href="https://uk.linkedin.com/in/katehoare"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-linkedin"></i></a>
                            <a href="https://www.instagram.com/yisak_lighting_director/"
                                class="icon-1 rounded-circle border border-2 p-2"><i
                                    class="fa-brands fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="faq">
        <div class="container-fluid">
            <div class="container mx-auto">
                <!-- Section Title -->
                <div data-aos="fade-up" data-aos-duration="1500" class="title-text text-center mb-4">
                    <h1 class="fs-2">FAQ's</h1>
                    <p class="fs-6">Your questions about streaming, booking, and events—answered!</p>
                </div>

                <div class="accordion" id="accordionPanelsStayOpenExample">

                    <!-- Q1 -->
                    <div class="accordion-item mb-4" style="border-radius: 10px; overflow: hidden;">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button text-primary bg-light" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                <i class="me-2 fa-solid fa-circle-arrow-right" style="color: #0764de;"></i>
                                How can I stream music on this platform?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                            <div class="accordion-body">
                                To stream music, simply sign up for a free or premium account on our platform. Once
                                logged in, browse our curated playlists, trending tracks, or search for your favorite
                                artists. Click the play button to start streaming instantly—no downloads required. With
                                a premium plan, you can also enjoy ad-free listening, unlimited skips, and offline
                                playback so you can take your music anywhere.
                            </div>
                        </div>
                    </div>

                    <!-- Q2 -->
                    <div class="accordion-item mb-4" style="border-radius: 10px; overflow: hidden;">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed bg-light text-primary" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                aria-controls="collapseTwo">
                                <i class="me-2 fa-solid fa-circle-arrow-right" style="color: #0764de;"></i>
                                How do I book tickets for an event or concert?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo">
                            <div class="accordion-body">
                                To book tickets, visit our Events section, select the concert or show you’re interested
                                in, choose your preferred seat category, and click Book Now. You can then log in or sign
                                up, complete the secure online payment, and instantly receive your e-ticket by email.
                                You can also view your tickets anytime in your My Bookings dashboard.
                            </div>
                        </div>
                    </div>

                    <!-- Q3 -->
                    <div class="accordion-item mb-4" style="border-radius: 10px; overflow: hidden;">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed bg-light text-primary" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                aria-controls="collapseThree">
                                <i class="me-2 fa-solid fa-circle-arrow-right" style="color: #0764de;"></i>
                                Can I host my own event or upload music here?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree">
                            <div class="accordion-body">
                                Absolutely! Our platform allows artists, bands, DJs, and event organizers to host their
                                own events and share their music with the community. Simply create an artist or
                                organizer account, fill in your event or music details, and submit it for review. Once
                                approved by our team, your event will be visible to thousands of music lovers, and your
                                tracks will be available for streaming worldwide.
                            </div>
                        </div>
                    </div>

                    <!-- Q4 -->
                    <div class="accordion-item mb-4" style="border-radius: 10px; overflow: hidden;">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed bg-light text-primary" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                <i class="me-2 fa-solid fa-circle-arrow-right" style="color: #0764de;"></i>
                                Do you offer refunds for event cancellations?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour">
                            <div class="accordion-body">
                                Yes, we offer refunds for eligible event cancellations.
                                If an event is canceled by the organizer, you will receive a full refund within 5–7
                                business days via your original payment method.
                                If the event is rescheduled, your ticket will remain valid for the new date. However,
                                you may request a refund if you are unable to attend the rescheduled event.
                                Please note that service fees may be non-refundable in certain cases as per our Refund
                                Policy.
                            </div>
                        </div>
                    </div>

                </div> <!-- /accordion -->
            </div>
        </div>
    </div>

    <div class="contact-1 hero2">
        <div class="container-fluid">
            <div class="container mx-auto">
                <div class="row text text-center text-white">
                    <div class="col">
                        <h2 class="mb-4">Let’s Talk Music & Events</h2>
                        <p class="mb-4">
                            Whether you want to stream your favorite tracks, book tickets for live concerts, or host
                            your own event,
                            we’ve got you covered. Share your vision with us and our team will<br> get back to you in no
                            time.
                        </p>
                        <div class="btn">
                            <a href="./book.php"><button class="text-white p-2 px-4 border-0 rounded-pill">
                                    Get Started
                                </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="Blogs" class="blog">
        <div class="container-fluid">
            <div class="container mx-auto">
                <!-- Section Title -->
                <div data-aos="fade-up" data-aos-duration="1500" class="title-text text-center mb-4">
                    <h1 class="fs-2">Latest from Our Blog</h1>
                    <p class="fs-6">News, tips, and stories from the music & events world</p>
                </div>

                <div data-aos="fade-up" data-aos-duration="1500" class="blog-card row g-4">
                    <!-- Blog 1 -->
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="card w-100" style="display:flex;flex-direction:column;height:100%;">
                            <div class="overflow-hidden" style="height:250px;">
                                <img src="./image/blog1.jpg" class="card-img-top"
                                    style="width:100%;height:100%;object-fit:cover;" alt="New Album Release">
                            </div>
                            <div class="card-body" style="flex-grow:1;">
                                <p class="text-muted">Music Release</p>
                                <h4 class="card-title fs-4 mb-3">Top 5 Albums You Can't Miss This Month</h4>
                                <h5 class="text">By Alex Rivera</h5>
                                <p class="text">Aug 10, 2025</p>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 2 -->
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="card w-100" style="display:flex;flex-direction:column;height:100%;">
                            <div class="overflow-hidden" style="height:250px;">
                                <img src="./image/highlight.jpg" class="card-img-top"
                                    style="width:100%;height:100%;object-fit:cover;" alt="Live Concert Highlights">
                            </div>
                            <div class="card-body" style="flex-grow:1;">
                                <p class="text-muted">Event Highlights</p>
                                <h4 class="card-title fs-4 mb-3">Inside the Magic of the Summer Music Festival</h4>
                                <h5 class="text">By Sarah Lee</h5>
                                <p class="text">Aug 5, 2025</p>
                            </div>
                        </div>
                    </div>

                    <!-- Blog 3 -->
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="card w-100" style="display:flex;flex-direction:column;height:100%;">
                            <div class="overflow-hidden" style="height:250px;">
                                <img src="./image/artist.png" class="card-img-top"
                                    style="width:100%;height:100%;object-fit:cover;" alt="Artist Interview">
                            </div>
                            <div class="card-body" style="flex-grow:1;">
                                <p class="text-muted">Artist Spotlight</p>
                                <h4 class="card-title fs-4 mb-3">An Exclusive Interview with DJ Nova</h4>
                                <h5 class="text">By Mark Thompson</h5>
                                <p class="text">July 28, 2025</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div id="Contact" class="contact">
        <div class="container-fluid">
            <div class="container mx-auto">
                <!-- Title -->
                <div class="title-text text-center mb-4">
                    <h1 class="fs-2">Get in Touch</h1>
                    <p class="fs-6">We’d love to hear from you — whether it’s about your favorite track or your next big
                        event</p>
                </div>

                <div data-aos="fade-right" data-aos-duration="1500"
                    class="row d-flex flex-md-row flex-column justify-content-between">
                    <!-- Contact Info -->
                    <div class="col-12 text text-dark">
                        <div class="address mb-4">
                            <h5 class="text-dark">Studio & Office :</h5>
                            <p class="m-0 text-dark">BeatHub Music Studio</p>
                            <p class="m-0 text-dark">123 Harmony Street, Los Angeles, CA</p>
                        </div>
                        <div class="phone mb-4">
                            <h5 class="text-dark">Booking & Support :</h5>
                            <p class="m-0 text-dark">+91 81600 82638</p>
                            <p class="m-0 text-dark">+91 95377 76810</p>
                        </div>
                        <div class="email mb-4">
                            <h5 class="text-dark">Email Us :</h5>
                            <p class="m-0 text-dark">MusicBeat hub@beathub.com</p>
                            <p class="m-0 text-dark">musicmanage@beathub.com</p>
                        </div>
                    </div>

                    <!-- Contact Form -->
                    <form method="post" action="request.php" class="col-12" data-aos="fade-left"
                        data-aos-duration="1500">
                        <div class="row g-3">
                            <!-- Name -->
                            <div class="col-md-6">
                                <input type="text" class="color form-control p-3 bg-light text-dark border-0"
                                    name="name" placeholder="Your Name*" required>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <input type="email" class="color form-control p-3 bg-light border-0" name="email"
                                    placeholder="Your Email*" required>
                            </div>
                            <!-- Subject -->
                            <div class="col-12">
                                <input type="text" class="color form-control p-3 bg-light border-0" name="subject"
                                    placeholder="Subject (e.g., Event Booking, Music Query)">
                            </div>
                            <!-- Message -->
                            <div class="col-12">
                                <textarea class="color form-control p-3 bg-light border-0" rows="6" name="message"
                                    placeholder="Tell us about your event or query*" required></textarea>
                            </div>
                            <!-- Button -->
                            <div class="col-12">
                                <div class="btn p-0">
                                    <input type="submit" name="contact"
                                        class="btn btn-primary  text-white p-2 px-4 border-0 rounded-pill"></input>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <div class="footer hero3">
            <div class="container-fluid">
                <div class="container mx-auto">
                    <div class="row">
                        <!-- Brand & About -->
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="logo-img mb-4 zoom-card">
                                <img src="images/music-logo.png" width="100%" alt="MusicBeat Hub Logo">
                            </div>
                            <p class="text-white">
                                MusicBeat Hub is your all-in-one platform to stream unlimited music and book tickets
                                for live concerts, festivals, and exclusive music events near you.
                            </p>
                            <h5 class="link text-decoration-none mb-3">Follow us</h5>
                            <div class="social-icon">
                                <a href="https://x.com/MubeatOfficial"><i class="me-2 fa-brands fa-x-twitter"
                                        style="color: #ffffff;"></i></a>
                                <a href="https://www.facebook.com/MusicianBeats/about/"><i
                                        class="m-2 fa-brands fa-facebook" style="color: #ffffff;"></i></a>
                                <a href="https://www.instagram.com/mus_icbeat/"><i class="m-2 fa-brands fa-instagram"
                                        style="color: #ffffff;"></i></a>
                                <a href="https://www.youtube.com/@MusicBeat."><i class="m-2 fa-brands fa-youtube"
                                        style="color: #ffffff;"></i></a>
                            </div>
                        </div>

                        <!-- Music Services -->
                        <div class="col-12 col-md-6 col-lg-3 footer-text">
                            <h4 class="title-text mb-3">Music Services</h4>
                            <p>Unlimited Music Streaming</p>
                            <p>Exclusive Artist Releases</p>
                            <p>Curated Playlists</p>
                            <p>Podcast Streaming</p>
                            <p>Offline Listening</p>
                            <p>High-Quality Audio</p>
                        </div>

                        <!-- Event Services -->
                        <div class="col-12 col-md-6 col-lg-3 footer-text">
                            <h4 class="title-text mb-3">Event Booking</h4>
                            <p>Upcoming Concerts</p>
                            <p>Live Music Festivals</p>
                            <p>Virtual Performances</p>
                            <p>Meet & Greet Sessions</p>
                            <p>VIP Passes</p>
                            <p>Event Calendar</p>
                            <p>Ticket Pricing</p>
                            <p>FAQs</p>
                            <p>Terms & Conditions</p>
                            <p>Privacy Policy</p>
                        </div>

                        <!-- Contact & Newsletter -->
                        <div class="col-12 col-md-6 col-lg-3 last-col">
                            <h4 class="title-text mb-3">Contact Us</h4>
                            <p><i class="fa-solid fa-location-dot" style="color: #ffffff;"></i> 101 Music Avenue, NY
                                10001, USA</p>
                            <p><i class="fa-solid fa-phone-volume" style="color: #ffffff;"></i> +1 (555) 234-5678</p>
                            <p><i class="fa-solid fa-envelope" style="color: #ffffff;"></i> support@MusicBeat hub.com
                            </p>
                            <h4 class="title-text mb-3">Newsletter</h4>
                            <p>Get the latest music releases and event updates straight to your inbox.</p>
                            <div class="input position-relative">
                                <form method="post" action="request.php">
                                    <div class="d-flex bg-light rounded-pill align-items-center">
                                        <input type="number" name="number"
                                            class="form-control rounded-pill shadow-none ms-2 dark-placeholder"
                                            placeholder="enter Number">
                                        <button class="btn rounded-circle p-2" name="subscribe">
                                            <i class="fa-brands fa-telegram" style="color: #0764de;"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Footer Bottom -->
                    <p class="text-white mt-4 text-center">
                        MusicBeat Hub © 2025 - Bringing Music & Events Closer to You
                    </p>
                </div>
            </div>
        </div>
    </footer>


</body>



<!-- Load particles.js (CDN) -->
<!-- <script src="https://cdn.jsdelivr.net/gh/VincentGarreau/particles.js/particles.min.js"></script> -->

<!-- jQuery (required) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- bootstrap bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<script src="./music.js"></script>

<!-- aos animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</html>