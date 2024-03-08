<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Tsikot Tracker</title>
</head>

<body>
    <!-- Header -->
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a href="#hero">
                        <h1><span>Tsikot</span> Tracker</h1>
                    </a>
                </div>
                <div class="nav-list">
                    <ul>
                        <li><a href="#hero" data-after="Home">Tsikot Tracker</a></li>
                        <li><a href="#services" data-after="Service">About Us</a></li>
                        <li><a href="#about" data-after="Service">Download</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header -->
    <!-- Hero Section -->
    <section id="hero" style="background-image: url({{ asset('images/hero-bg.jpg') }});">
        <div class="hero container">

            <div>
                <h1>Tsikot Tracker, <span></span></h1>
                <h1>Your Automotive Service <span></span></h1>
                <h1>Management System <span></span></h1>
                <a href="#projects" type="button" class="cta">Request Data</a>
            </div>
        </div>
    </section>
    <!-- End Hero Section -->
    <!-- Service Section -->
    <section id="services">
        <div class="services container">
            <div class="service-top">
                <h1 class="section-title">Wha<span>t</span> is Ts<span>i</span>kot<span>
                        T</span>rack<span>e</span>r<span>?</span></h1>
                <p>Tsikot Tracker isn't just a tool for car service businesses; it's a bridge connecting customers with
                    seamless data access. In addition to empowering businesses with streamlined operations, Tsikot
                    Tracker offers customers the ability to request their data from the company effortlessly. Whether
                    it's retrieving service history or accessing vehicle details, our secure website and Android app
                    ensure customers can conveniently access their information, fostering transparency and trust between
                    businesses and their clientele. With Tsikot Tracker, it's not just about managing operations; it's
                    about empowering both businesses and customers alike for a smoother, more connected automotive
                    service experience.</p>
            </div>
            <div class="service-bottom">
                <div class="service-item">
                    <div class="icon"><img src="{{ asset('images/data-analytics.png') }}" /></div>
                    <h2>Analytics</h2>
                    <p>Detailed performance insights for strategic planning.
                    </p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="{{ asset('images/request.png') }}" /></div>
                    <h2>Data Request</h2>
                    <p>Seamlessly access and manage service history.</p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="{{ asset('images/data.png') }}" /></div>
                    <h2>Record Input</h2>
                    <p>Simplified management of business records</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Section -->
    <!-- Projects Section -->
    <section id="projects">
        <div class="projects container">
            <div class="projects-header">
                <h1 class="section-title">Request Your <span>Data</span></h1>
            </div>
            <div id="request-form">
                <form>
                    <div>
                        <label for="companyName" class="form-label">Company/Business Name</label>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
                    <div>
                        <label for="contactName" class="form-label">Contact Name</label>
                        <input type="text" class="form-control" id="contactName" name="contactName" required>
                    </div>
                    <div>
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <p style="font-size: medium;">Please upload a valid ID for person confirmation</label>

                    <div style="margin-bottom: 15px;">
                        <input type="file" id="myFile" name="filename">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit Request</button>
                </form>
            </div>
        </div>
    </section>
    <!-- End Projects Section -->

    <!-- About Section -->
    <section id="about">
        <div class="container-about">
            <div class="col-left">
                <div class="img-wrapper">
                    <img src="{{ asset('images/Hand-Holding-Phon.png') }}" style="width: 500px; height: 500px;" alt="img">
                </div>
            </div>
            <div class="col-right">
                <h1 class="section-title">Download <span>Now</span></h1>
                <h2>Tsikot Tracker</h2>
                <p>The all-in-one automotive service management system for car businesses. Simplify data entry,
                    eliminate paperwork, and gain valuable insights with our user-friendly platform accessible via
                    Android app. Join us in driving efficiency and environmental responsibility forward. Download Tsikot
                    Tracker now and elevate your service management game.</p>
                <a href="https://play.google.com/store/apps/details?id=com.roblox.client&hl=en&gl=US"
                    class="cta">Download App</a>
            </div>
        </div>
    </section>

    <!-- End About Section -->
    <!-- Footer -->
    <section id="footer">
        <div class="footer container">
            <div class="brand">
                <h1><span>T</span>s<span>i</span>kot <span>T</span>rack<span>e</span>r</h1>
            </div>
            <section id="contact">
                <div class="contact container-contact">
                    <div>
                        <h1 class="section-title" style="color: white;">Contact <span>info</span></h1>
                    </div>
                    <div class="contact-items">
                        <div class="contact-item">
                            <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/phone.png" /></div>
                            <div class="contact-info">
                                <h1>Phone</h1>
                                <h2>+63 927 073 4452</h2>
                                <h2>+63 968 654 2127</h2>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/new-post.png" /></div>
                            <div class="contact-info">
                                <h1>Email</h1>
                                <h2>tsikottracker@gmail.com</h2>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" />
                            </div>
                            <div class="contact-info">
                                <h1>Address</h1>
                                <h2>Lucao De Venecia, Dagupan City</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <h2>Lost in paperwork? Tsikot Tracker finds your way.</h2>
            <div class="social-icon">
                <div class="social-item">
                    <a href="https://www.facebook.com/ban75474"><img
                            src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
                </div>
                <div class="social-item">
                    <a href="https://www.instagram.com/finnmeowmeows/"><img
                            src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
                </div>
                <div class="social-item">
                    <a href="https://twitter.com/Johnlennonnn69"><img
                            src="https://img.icons8.com/bubbles/100/000000/x.png" /></a>
                </div>
            </div>
            <p>Copyright © 2024 Tsikot Tracker. All rights reserved</p>
        </div>
    </section>
    <!-- End Footer -->
    <script>
        const hamburger = document.querySelector('.header .nav-bar .nav-list.hamburger');
        const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
        const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ulli a');
        const header = document.querySelector('.header.container');

        document.addEventListener('scroll', () => {
            var scroll_position = window.scrollY;
            if (scroll_position > 250) {
                header.style.backgroundColor = '#29323c';
            } else {
                header.style.backgroundColor = 'transparent';
            }
        });

    </script>
</body>

</html>