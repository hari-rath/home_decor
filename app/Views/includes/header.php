<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Deep Home Decor | Company Profile</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet"
    />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
/>

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap"
        rel="stylesheet"
    />
  
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- INTERNAL CSS -->
    <style>
        :root {
            --pdf-navy: #002147;
            --pdf-gold: #c5a059;
            --pdf-light: #f4f4f4;
        }

        body {
            font-family: "Poppins", sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        /* NAVBAR */
        .navbar {
            background-color: #6e5117ff;
            padding: 15px 0;
        }
        .navbar-brand,
        .nav-link {
            color: #ffffff !important;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }
        .nav-link:hover {
            color: var(--pdf-gold) !important;
        }
        .navbar-brand span {
            color: var(--pdf-gold);
        }

        /* HERO CAROUSEL */
        .carousel-item img {
            height: 70vh;
            object-fit: cover;
            filter: brightness(70%);
        }
        .carousel-caption h1 {
            font-family: "Playfair Display", serif;
            font-size: 3.5rem;
            color: white;
        }

        /* GENERIC SECTION TITLE */
        .section-title {
            color: var(--pdf-navy);
            font-weight: 700;
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
        }
        .section-title::after {
            content: "";
            width: 50%;
            height: 3px;
            background: var(--pdf-gold);
            position: absolute;
            bottom: -10px;
            left: 25%;
        }

        /* “OUR COLLECTIONS” heading bar */
        .collections-heading {
            color: var(--pdf-navy);
            font-weight: 800;
        }
        .collections-bar {
            width: 60px;
            height: 3px;
            background: var(--pdf-gold);
            margin: 10px auto 0;
        }

        /* COLLECTIONS GRID (cards with watermark) */
        .gallery-container {
            background: #ffffff;
            padding: 15px;
            border-radius: 4px;
            position: relative;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        .gallery-container:hover {
            transform: translateY(-5px);
        }
        .gallery-img-frame {
            position: relative;
            border: 8px solid #ffffff;
            outline: 1px solid #eee;
            overflow: hidden;
            height: 200px;
        }
        .gallery-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: relative;
            z-index: 2;
        }
        .gallery-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-20deg);
            font-size: 2.5rem;
            font-weight: 900;
            color: rgba(0, 0, 0, 0.02);
            z-index: 1;
            text-transform: uppercase;
            white-space: nowrap;
        }
        .gallery-label {
            background: var(--pdf-navy);
            color: #ffffff;
            padding: 4px 15px;
            font-size: 0.75rem;
            font-weight: bold;
            display: inline-block;
            margin-top: -20px;
            position: relative;
            z-index: 5;
        }
        .gallery-title {
            color: var(--pdf-navy);
            font-weight: 700;
        }
        .gallery-link-btn {
            color: var(--pdf-gold);
            font-size: 0.8rem;
            font-weight: bold;
            border: none;
        }

        /* LARGE FEATURE CARDS (bedding / flooring style) */
        .pdf-card-img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            object-position: center;
            display: block;
            position: relative;
            z-index: 2;
        }
        .pdf-card-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 4px;
            position: relative;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            margin-bottom: 40px;
        }
        .pdf-card-frame {
            position: relative;
            border: 10px solid #ffffff;
            outline: 1px solid #ddd;
            box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .pdf-card-watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-25deg);
            font-size: 4rem;
            font-weight: 900;
            color: rgba(0, 0, 0, 0.03);
            white-space: nowrap;
            z-index: 1;
            text-transform: uppercase;
        }
        .pdf-card-tag {
            background: var(--pdf-navy);
            color: #ffffff;
            padding: 6px 20px;
            display: inline-block;
            font-weight: bold;
            margin-top: -25px;
            position: relative;
            z-index: 5;
            font-size: 0.9rem;
        }
        .pdf-card-title {
            color: var(--pdf-navy);
            font-weight: 800;
            font-size: 1.6rem;
        }
        .pdf-card-subtitle {
            color: var(--pdf-gold);
            font-weight: bold;
            margin-bottom: 10px;
        }
        .pdf-card-text {
            font-size: 0.9rem;
        }
        .pdf-card-btn {
            background-color: var(--pdf-navy);
            color: #ffffff;
            border: 2px solid var(--pdf-navy);
            padding: 8px 25px;
            font-weight: bold;
            text-transform: uppercase;
            transition: 0.3s;
            cursor: pointer;
            font-size: 0.85rem;
        }
        .pdf-card-btn:hover {
            background-color: transparent;
            color: var(--pdf-navy);
        }

        /* WALLPAPER PAGE (same as PDF design) */
        .wallpaper-section {
            background-color: #f9f1e6;
        }
        .wallpaper-page {
            /* background: #f9f1e6; */
            /* border: 1px solid #e2d4c4; */
            padding: 20px 18px 25px;
            position: relative;
        }
        .wallpaper-page-number {
            font-size: 14px;
            color: #8d7b63;
        }
        .wallpaper-header {
            text-align: left;
        }
        .wallpaper-title-box {
            display: inline-block;
            background: #3b2618;
            color: #ffffff;
            padding: 8px 16px;
            border-radius: 6px;
        }
        .wallpaper-title-box h2 {
            font-size: 24px;
            font-weight: 600;
        }
        .wallpaper-subtitle {
            font-size: 14px;
            color: #333333;
            max-width: 600px;
        }
        .wallpaper-banner {
            background: linear-gradient(
                to bottom,
                rgba(255, 255, 255, 0.7),
                rgba(249, 241, 230, 0.9)
            );
            border-radius: 8px;
            padding: 14px 0;
            text-align: center;
        }
        .wallpaper-banner-text {
            font-size: 26px;
            letter-spacing: 4px;
            font-weight: 700;
            color: #f5f5f5;
            text-shadow: 0 0 6px rgba(0, 0, 0, 0.4);
        }
        .wallpaper-card {
            background: #fdf7ef;
            border-radius: 16px;
            padding: 4px;
            box-shadow: 0 0 0 1px rgba(189, 168, 144, 0.4);
            overflow: hidden;
        }
        .wallpaper-card img {
            width: 100%;
            height: 210px;
            object-fit: cover;
            border-radius: 14px;
        }

        /* FOOTER */
        footer {
            background: var(--pdf-navy);
            color: #ffffff;
            padding: 60px 0 20px;
        }
        .map-container {
            border: 5px solid #ffffff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
        }
        .footer-heading {
            color: var(--pdf-gold);
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .carousel-caption h1 {
                font-size: 2rem;
            }
            .pdf-card-img {
                height: 250px;
            }
            .pdf-card-container {
                padding: 15px;
            }
            .wallpaper-banner-text {
                font-size: 20px;
                letter-spacing: 3px;
            }
            .wallpaper-card img {
                height: 190px;
            }
        }
        .wallpaper-section {
            /* Set the border and padding */
    border: 3px solid #9b840b;
    margin: 8px;
    padding: 60px 20px; /* Added padding so content doesn't touch the borders */
    
    /* Watermark Effect: The gradient goes on top of the URL */
    /* rgba(249, 241, 230, 0.85) matches your #f9f1e6 color but with 85% opacity */
    background: linear-gradient(
        rgba(249, 241, 230, 0.85), 
        rgba(249, 241, 230, 0.85)
    ), 
    url(https://m.media-amazon.com/images/I/61LgBvCNNvL.jpg);
    
    background-position: center;
    background-size: cover; /* Ensures the image fills the section */
    background-repeat: no-repeat;
        }
        section#bedding {
        /* Set the border and padding */
    border: 3px solid #9b840b;
    margin: 8px;
    padding: 60px 20px; /* Added padding so content doesn't touch the borders */
    
    /* Watermark Effect: The gradient goes on top of the URL */
    /* rgba(249, 241, 230, 0.85) matches your #f9f1e6 color but with 85% opacity */
    background: linear-gradient(
        rgba(249, 241, 230, 0.85), 
        rgba(249, 241, 230, 0.85)
    ), 
    url(https://m.media-amazon.com/images/I/61LgBvCNNvL.jpg);
    
    background-position: center;
    background-size: cover; /* Ensures the image fills the section */
    background-repeat: no-repeat;
        }
        section#collections {
        /* Set the border and padding */
    border: 3px solid #9b840b;
    margin: 8px;
    padding: 60px 20px; /* Added padding so content doesn't touch the borders */
    
    /* Watermark Effect: The gradient goes on top of the URL */
    /* rgba(249, 241, 230, 0.85) matches your #f9f1e6 color but with 85% opacity */
    background: linear-gradient(
        rgba(249, 241, 230, 0.85), 
        rgba(249, 241, 230, 0.85)
    ), 
    url(https://m.media-amazon.com/images/I/61LgBvCNNvL.jpg);
    
    background-position: center;
    background-size: cover; /* Ensures the image fills the section */
    background-repeat: no-repeat;
            
        }
        #about {
    /* Set the border and padding */
    border: 3px solid #9b840b;
    margin: 8px;
    padding: 60px 20px; /* Added padding so content doesn't touch the borders */
    
    /* Watermark Effect: The gradient goes on top of the URL */
    /* rgba(249, 241, 230, 0.85) matches your #f9f1e6 color but with 85% opacity */
    background: linear-gradient(
        rgba(249, 241, 230, 0.85), 
        rgba(249, 241, 230, 0.85)
    ), 
    url('<?php echo base_url('assets/images/water_mark_img.jpg') ?>');
    
    background-position: center;
    background-size: cover; /* Ensures the image fills the section */
    background-repeat: no-repeat;
}




.footer-section {
    background: var(--pdf-navy);
            color: #ffffff;
  position: relative;
}
.footer-cta {
  border-bottom: 1px solid #373636;
}
.single-cta i {
  color: #ff5e14;
  font-size: 30px;
  float: left;
  margin-top: 8px;
}
.cta-text {
  padding-left: 15px;
  display: flow-root;
}
.cta-text h4 {
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 2px;
}
.cta-text span {
  color: #fff;
  font-size: 15px;
}
.footer-content {
  position: relative;
  z-index: 2;
}
.footer-pattern img {
  position: absolute;
  top: 0;
  left: 0;
  height: 330px;
  background-size: cover;
  background-position: 100% 100%;
}
.footer-logo {
  margin-bottom: 30px;
}
.footer-logo img {
    max-width: 200px;
}
.footer-text p {
  margin-bottom: 14px;
  font-size: 14px;
      color: #7e7e7e;
  line-height: 28px;
}
.footer-social-icon span {
  color: #fff;
  display: block;
  font-size: 20px;
  font-weight: 700;
  font-family: 'Poppins', sans-serif;
  margin-bottom: 20px;
}
.footer-social-icon a {
  color: #fff;
  font-size: 16px;
  margin-right: 15px;
}
.footer-social-icon i {
  height: 40px;
  width: 40px;
  text-align: center;
  line-height: 38px;
  border-radius: 50%;
}
.facebook-bg{
  background: #3B5998;
}
.twitter-bg{
  background: #55ACEE;
}
.google-bg{
  background: #DD4B39;
}
.footer-widget-heading h3 {
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  margin-bottom: 40px;
  position: relative;
}
.footer-widget-heading h3::before {
  content: "";
  position: absolute;
  left: 0;
  bottom: -15px;
  height: 2px;
  width: 50px;
  background: #ff5e14;
}
.footer-widget ul li {
  display: inline-block;
  float: left;
  width: 50%;
  margin-bottom: 12px;
}
.footer-widget ul li a:hover{
  color: #ff5e14;
}
.footer-widget ul li a {
  color: #fff;
  text-transform: capitalize;
}
.subscribe-form {
  position: relative;
  overflow: hidden;
}
.subscribe-form input {
  width: 100%;
  padding: 14px 28px;
  background: #2E2E2E;
  border: 1px solid #2E2E2E;
  color: #fff;
}
.subscribe-form button {
    position: absolute;
    right: 0;
    background: #ff5e14;
    padding: 13px 20px;
    border: 1px solid #ff5e14;
    top: 0;
}
.subscribe-form button i {
  color: #fff;
  font-size: 22px;
  transform: rotate(-6deg);
}
.copyright-area{
  background: #202020;
  padding: 25px 0;
}
.copyright-text p {
  margin: 0;
  font-size: 14px;
  color: #878787;
}
.copyright-text p a{
  color: #ff5e14;
}
.footer-menu li {
  display: inline-block;
  margin-left: 20px;
}
.footer-menu li:hover a{
  color: #ff5e14;
}
.footer-menu li a {
  font-size: 14px;
  color: #878787;
}

@media (max-width: 767px) {
 /* Expanded navbar */
  /* .navbar-collapse .nav-link {
        height: 71 !important;   
    }
    .navbar-collapse.show .navbar-nav .nav-link {
        height: auto !important;   
    }
     */
    .navlogo,
    .navlogimg {
        width: 70px;
        height: 71px !important;
        margin-right: 0;
    }

   
}
.navbar-brand, .nav-link{
        font-size: 18px;
}
/* Top Bar */
.top-bar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #081d55; /* blue */
    color: #fff;
    font-size: 14px;
    z-index: 9999;

    display: flex;
    align-items: center;
    justify-content: space-between;

    padding: 15px 30px;
}

/* Left section */
.top-bar-left {
    display: flex;
    align-items: center;
    gap: 15px;
}

.top-bar-left a {
    color: #fff;
    text-decoration: none;
}

.top-bar-left a:hover {
    text-decoration: underline;
}

/* Divider */
.divider {
    width: 1px;
    height: 18px;
    background: rgba(255,255,255,0.5);
}

/* Button */
.btn-contact {
    background-color: #e63946;
    color: #fff;
    padding: 8px 16px;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: background 0.3s ease;
}

.btn-contact:hover {
    background-color: #c92d3a;
}

/* Push page content down */
body {
    padding-top: 50px;
}

/* Responsive */
@media (max-width: 768px) {
    .top-bar {
        flex-direction: column;
        gap: 10px;
        padding: 10px;
        text-align: center;
    }

    body {
        padding-top: 90px;
    }
}

.call_tag{
    color:white;
    text-decoration:none;
}

.contact_tag{
    color:black;
    text-decoration:none;
}
.call_tag:hover{
    text-decoration:underline;
}

.whatsapp-button {
    position: fixed;
    bottom: 100px;
    right: 20px;
    width: 60px;
    height: 60px;
    background-color: #25D366;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    z-index: 1000;
}
.whatsapp-button i {
    font-size: 32px;
    color: white;
}

.navbar {
    /* background: linear-gradient(
        180deg,
        #fff4b0 0%,
        #f5d76e 20%,
        #d4af37 45%,
        #b8962e 70%,
        #8c6b1f 100%
    ); */

     /* background: linear-gradient(
        180deg,
        #fff4b0 0%,
        #f5d76e 20%,
        #d4af37 45%,
        #b8962e 70%,
        #8c6b1f 100%
    ); */

     /* background: linear-gradient(
        to bottom,
        #8c6b1f 0%,    
        #b8962e 12%,
        #d4af37 28%,
        #f7e27c 50%,   
        #d4af37 72%,
        #b8962e 88%,
        #8c6b1f 100%   
    ) !important;

    box-shadow: inset 0 1px 0 rgba(255,255,255,0.35),
                inset 0 -1px 0 rgba(0,0,0,0.35); */
   /* background: linear-gradient(
        to bottom,
        rgba(247, 224, 126, 0.55),
        rgba(212, 175, 55, 0.45),
        rgba(247, 224, 126, 0.55)
    ) !important; */

    backdrop-filter: blur(6px);
    -webkit-backdrop-filter: blur(6px);

    border-bottom: 1px solid rgba(180, 140, 30, 0.35);

     /* background:linear-gradient(
        to right,
        rgba(249, 241, 230, 0.85),
        rgba(249, 241, 230, 0.85)
    ),
    url('<?php echo base_url('assets/images/water_mark_img.jpg') ?>'); */
     background:linear-gradient(to right, rgb(0 0 0), rgb(242 161 60));
    
    background-position: center;
    background-size: cover; /* Ensures the image fills the section */
    background-repeat: no-repeat;
}

.navbar .nav-link,
.navbar .navbar-brand {
    color: #fff !important;
    font-weight: 600;
}

.navbar .nav-link:hover {
    color: #eeff03ff !important;
}
.carousel-caption{
    background-color: #98772382;
}
.modal{
        z-index: 99999;
    }
    ul.navbar-nav.ms-auto .nav-link {
        border-right: 1px solid #dddddd87;
        padding: 0px 18px;
    }
ul.navbar-nav.ms-auto li:first-child {
    border-left: 1px solid #dddddd87;
}
    </style>
</head>
<body>
 
    <div class="top-bar">
        <div class="top-bar-left">
            <span class="email">
                ✉ Email: <a href="mailto:deephomedecor1@gmail.com">deephomedecor1@gmail.com</a>
            </span>

            <span class="divider"></span>

            <span class="phone">
                📞 <a href="tel:+91 7894348111">+91 7894348111</a>
                <!-- <a href="https://wa.me/918091925535" target="_blank">💬 +91 8091925535</a> -->
            </span>
        </div>

        <div class="top-bar-right">
            <a href="<?= site_url('contact') ?>" class="btn-contact">
                Get In Touch With Us
            </a>
        </div>
    </div>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand navlogo" href="<?php echo base_url('/'); ?>">
               <img class="navlogimg" style="height:70px;width: 120px;" src="<?php echo base_url('assets/images/deep_logo.png'); ?>">
            </a>
           
            <button
                class="navbar-toggler bg-light" 
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
          

            <div class="collapse navbar-collapse" id="navbarNav">
               
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('/'); ?>">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#collections"> Categories</a></li>
                    <!-- <li class="nav-item"><a class="nav-link" href="#bedding">Bedding</a></li> -->
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url('all_gallaries'); ?>">Photo Gallaries</a></li>
                 
                </ul>
            </div>
        </div>
    </nav>
