<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tsikot Tracker</title>
    <style>
        @import 'https://fonts.googleapis.com/css?family=Montserrat:300, 400,700&display=swap';

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}

html {
    background-color: #c8d9ed;
    font-size: 10px;
    font-family: 'Montserrat', sans-serif;
    scroll-behavior: smooth;
}

a {
    text-decoration: none;
}

.container {
    min-height: 100vh;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
}

img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

p {
    color: black;
    font-size: 1.4rem;
    margin-top: 5px;
    line-height: 2.5rem;
    font-weight: 300;
    letter-spacing: 0.05rem;
}

.section-title {
    font-size: 4rem;
    font-weight: 300;
    color: black;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 0.2rem;
    text-align: center;
}

.section-title span {
    color: crimson;
}

.cta {
    display: inline-block;
    padding: 10px 30px;
    color: white;
    background-color: transparent;
    border: 2px solid crimson;
    font-size: 2rem;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    margin-top: 30px;
    transition: 0.3s ease;
    transition-property: background-color, color;
}

.cta:hover {
    color: white;
    background-color: crimson;
}

.brand h1 {
    font-size: 3rem;
    text-transform: uppercase;
    color: white;
}

.brand h1 span {
    color: crimson;
}

/* Header section */
#header {
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100vw;
    height: auto;
}

#header .header {
    min-height: 8vh;
    background-color: rgba(31, 30, 30, 0.24);
    transition: 0.3s ease background-color;
}

#header .nav-bar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    height: 100%;
    max-width: 1300px;
    padding: 0 10px;
}

#header .nav-list ul {
    list-style: none;
    background-color: rgb(31, 30, 30);
    left: 100%;
    top: 0;
    position: initial;
    display: block;
    height: auto;
    width: fit-content;
    background-color: transparent;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    z-index: 1;
    overflow-x: hidden;
    transition: 0.5s ease left;
}

#header .nav-list ul.active {
    left: 0%;
}

#header .nav-list ul a {
    font-size: 2.5rem;
    font-weight: 500;
    letter-spacing: 0.2rem;
    text-decoration: none;
    color: white;
    text-transform: uppercase;
    padding: 20px;
    display: block;
}

#header .nav-list ul a::after {
    content: attr(data-after);
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0);
    color: rgba(240, 248, 255, 0.021);
    font-size: 13rem;
    letter-spacing: 50px;
    z-index: -1;
    transition: 0.3s ease letter-spacing;
}

#header .nav-list ul li:hover a::after {
    transform: translate(-50%, -50%) scale(1);
    letter-spacing: initial;
}

#header .nav-list ul li:hover a {
    color: crimson;
}

/* End Header section */
/* Hero Section */
#hero {
    background-image: url(./img/hero-bg.jpg);
    background-size: cover;
    background-position: top center;
    position: relative;
    z-index: 1;
}

#hero::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: black;
    opacity: 0.7;
    z-index: -1;
}

#hero .hero {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 50px;
    justify-content: flex-start;
}

#hero h1 {
    display: block;
    width: fit-content;
    font-size: 3rem;
    position: relative;
    color: transparent;
    animation: text_reveal 0.5s ease forwards;
    animation-delay: 1s;
}

#hero h1:nth-child(1) {
    animation-delay: 1s;
}

#hero h1:nth-child(2) {
    animation-delay: 2s;
}

#hero h1:nth-child(3) {
    animation: text_reveal_name 0.5s ease forwards;
    animation-delay: 3s;
}

#hero h1 span {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 0;
    background-color: crimson;
    animation: text_reveal_box 1s ease;
    animation-delay: 0.5s;
}

#hero h1:nth-child(1) span {
    animation-delay: 0.5s;
}

#hero h1:nth-child(2) span {
    animation-delay: 1.5s;
}

#hero h1:nth-child(3) span {
    animation-delay: 2.5s;
}

/* End Hero Section */
/* Services Section */
#services .services {
    flex-direction: column;
    text-align: center;
    max-width: 1500px;
    margin: 0 auto;
    padding: 100px 0;
}

#services .service-top {
    max-width: 600px;
    margin: 0 auto;
}

#services .service-bottom {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 50px;
}

#services .service-item {
    flex-basis: 80%;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-direction: column;
    padding: 30px;
    border-radius: 10px;
    min-height: 280px;
    background-size: cover;
    margin: 10px 5%;
    position: relative;
    z-index: 1;
    overflow: hidden;
}

#services .service-item::after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
    opacity: 0.9;
    z-index: -1;
}

#services .service-bottom .icon {
    height: 70px;
    width: 70px;
    margin-bottom: 20px;
}

#services .service-item h2 {
    font-size: 2rem;
    color: white;
    margin-bottom: 10px;
    text-transform: uppercase;
}

#services .service-item p {
    color: white;
    text-align: left;
}

/* End Services Section */
/* Projects section */
#projects .projects {
    flex-direction: column;
    max-width: 1200px;
    margin: 0 auto;
    padding: 100px 0;
}

#projects .projects-header h1 {
    margin-bottom: 50px;
}

#projects .all-projects {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
}

#projects .project-item {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 80%;
    margin: 20px auto;
    overflow: hidden;
    border-radius: 10px;
}

#projects .project-info {
    padding: 30px;
    flex-basis: 50%;
    height: 100%;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-direction: column;
    background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
    color: white;
}

#projects .project-info h1 {
    font-size: 4rem;
    font-weight: 500;
}

#projects .project-info h2 {
    font-size: 1.8rem;
    font-weight: 500;
    margin-top: 10px;
}

#projects .project-info p {
    color: white;
}

#projects .project-img {
    flex-basis: 50%;
    height: 300px;
    overflow: hidden;
    position: relative;
}

#projects .project-img:after {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
    opacity: 0.7;
}

#projects .project-img img {
    transition: 0.3s ease transform;
}

#projects .project-item:hover .project-img img {
    transform: scale(1.1);
}

/* End Projects section */
/* About Section */
#about .about {
    flex-direction: column-reverse;
    text-align: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 100px 20px;
}

#about .col-left {
    width: 250px;
    height: 360px;
}

#about .col-right {
    width: 100%;
}

#about .col-right h2 {
    font-size: 1.8rem;
    font-weight: 500;
    letter-spacing: 0.2rem;
    margin-bottom: 10px;
}

#about .col-right p {
    margin-bottom: 20px;
}

#about .col-right .cta {
    color: black;
    margin-bottom: 50px;
    padding: 10px 20px;
    font-size: 2rem;
}

#about .col-left .about-img {
    height: 100%;
    width: 100%;
    position: relative;
    border: 10px solid white;
}

#about .col-left .about-img::after {
    content: '';
    position: absolute;
    left: -33px;
    top: 19px;
    height: 98%;
    width: 98%;
    border: 7px solid crimson;
    z-index: -1;
}

/* End About Section */
/* contact Section */
#contact .contact {
    flex-direction: column;
    max-width: 1200px;
    margin: 0 auto;
    width: 90%;
}

#contact .contact-items {
    /* max-width: 400px; */
    width: 100%;
}

#contact .contact-item {
    width: 80%;
    padding: 20px;
    text-align: center;
    border-radius: 10px;
    padding: 30px;
    margin: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    box-shadow: 0px 0px 18px 0 #0000002c;
    transition: 0.3s ease box-shadow;
}

#contact .contact-item:hover {
    box-shadow: 0px 0px 5px 0 #0000002c;
}

#contact .icon {
    width: 70px;
    margin: 0 auto;
    margin-bottom: 10px;
}

#contact .contact-info h1 {
    font-size: 2.5rem;
    font-weight: 500;
    margin-bottom: 5px;
}

#contact .contact-info h2 {
    font-size: 1.3rem;
    line-height: 2rem;
    font-weight: 500;
    overflow: hidden;
    text-overflow: ellipsis;
}

/*End contact Section */
/* Footer */
#footer {
    background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
}

#footer .footer {
    min-height: 200px;
    flex-direction: column;
    padding-top: 50px;
    padding-bottom: 10px;
}

#footer h2 {
    color: white;
    font-weight: 500;
    font-size: 1.8rem;
    letter-spacing: 0.1rem;
    margin-top: 10px;
    margin-bottom: 10px;
}

#footer .social-icon {
    display: flex;
    margin-bottom: 30px;
}

#footer .social-item {
    height: 50px;
    width: 50px;
    margin: 0 5px;
}

#footer .social-item img {
    filter: grayscale(1);
    transition: 0.3s ease filter;
}

#footer .social-item:hover img {
    filter: grayscale(0);
}

#footer p {
    color: white;
    font-size: 1.3rem;
}

/* End Footer */
/* Keyframes */
@keyframes hamburger_puls {
    0% {
        opacity: 1;
        transform: scale(1);
    }

    100% {
        opacity: 0;
        transform: scale(1.4);
    }
}

@keyframes text_reveal_box {
    50% {
        width: 100%;
        left: 0;
    }

    100% {
        width: 0;
        left: 100%;
    }
}

@keyframes text_reveal {
    100% {
        color: white;
    }
}

@keyframes text_reveal_name {
    100% {
        color: crimson;
        font-weight: 500;
    }
}

/* End Keyframes */
/* Media Query For Tablet */
@media only screen and (min-width: 768px) {
    .cta {
        font-size: 2.5rem;
        padding: 20px 60px;
    }

    h1.section-title {
        font-size: 6rem;
    }

    /* Hero */
    #hero h1 {
        font-size: 5.5rem;
    }

    /* End Hero */
    /* Services Section */
    #services .service-bottom .service-item {
        flex-basis: 45%;
        margin: 2.5%;
    }

    /* End Services Section */
    /* Project */
    #projects .project-item {
        flex-direction: row;
    }

    #projects .project-item:nth-child(even) {
        flex-direction: row-reverse;
    }

    #projects .project-item {
        height: 400px;
        margin: 0;
        width: 100%;
        border-radius: 0;
    }

    #projects .all-projects .project-info {
        height: 100%;
    }

    #projects .all-projects .project-img {
        height: 100%;
    }

    /* End Project */
    /* About */
    #about .about {
        flex-direction: row;
    }

    #about .col-left {
        width: 600px;
        height: 400px;
        padding-left: 60px;
    }

    #about .about .col-left .about-img::after {
        left: -45px;
        top: 34px;
        height: 98%;
        width: 98%;
        border: 10px solid crimson;
    }

    #about .col-right {
        text-align: left;
        padding: 30px;
    }

    #about .col-right h1 {
        text-align: left;
    }

    /* End About */
    /* contact */
    #contact .contact {
        flex-direction: column;
        padding: 100px 0;
        align-items: center;
        justify-content: center;
        min-width: 20vh;
    }

    #contact .contact-items {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        margin: 0;
    }

    #contact .contact-item {
        width: 30%;
        margin: 0;
        flex-direction: row;
    }

    #contact .contact-item .icon {
        height: 100px;
        width: 100px;
    }

    #contact .contact-item .icon img {
        object-fit: contain;
    }

    #contact .contact-item .contact-info {
        width: 100%;
        text-align: left;
        padding-left: 20px;
    }

    /* End contact */
}

/* End Media Query For Tablet */
/* Media Query For Desktop */
@media only screen and (min-width: 1200px) {


    #header .nav-list ul {
    }

    #header .nav-list ul li {
        display: inline-block;
    }

    #header .nav-list ul li a {
        font-size: 1.8rem;
    }

    #header .nav-list ul a:after {
        display: none;
    }

    /* End header */
    #services .service-bottom .service-item {
        flex-basis: 22%;
        margin: 1.5%;
    }
}
    </style>
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
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header -->
    <!-- Hero Section -->
    <section id="hero">
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
                <h1 class="section-title">Wha<span>t</span><span> i</span>s Tsikot<span> T</span>rack<span>e</span>r<span>?</span></h1>
                <p>Tsikot Tracker isn't just a tool for car service businesses; it's a bridge connecting customers with seamless data access. In addition to empowering businesses with streamlined operations, Tsikot Tracker offers customers the ability to request their data from the company effortlessly. Whether it's retrieving service history or accessing vehicle details, our secure website and Android app ensure customers can conveniently access their information, fostering transparency and trust between businesses and their clientele. With Tsikot Tracker, it's not just about managing operations; it's about empowering both businesses and customers alike for a smoother, more connected automotive service experience.</p>
            </div>
            <div class="service-bottom">
                <div class="service-item">
                    <div class="icon"><img src="./img/data-analytics.png" /></div>
                    <h2>Analytics</h2>
                    <p>Detailed performance insights for strategic planning.
                    </p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="./img/request.png" /></div>
                    <h2>Data Request</h2>
                    <p>Seamlessly access and manage service history.</p>
                </div>
                <div class="service-item">
                    <div class="icon"><img src="./img/data.png" /></div>
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
                <h1 class="section-title">Recent <span>Projects</span></h1>
            </div>
            <div class="all-projects">
                <div class="project-item">
                    <div class="project-info">
                        <h1>Community Outreach and Education Program</h1>
                        <p>Our Community Outreach Program educates local pet owners through workshops and seminars on responsible pet care, preventive healthcare, and spaying/neutering, promoting informed decision-making for healthier pets and happier communities.</p>
                    </div>
                    <div class="project-img">
                        <img src="./img/img-3.jpg" alt="img">
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-info">
                        <h1>Feral Cat Trap-Neuter-Return (TNR) Program</h1>
                        <p>With our Feral Cat TNR Program, we've successfully managed the feral cat population by implementing a humane approach—trapping, neutering, and returning them to their colonies. This initiative not only controls overpopulation but also promotes a compassionate community response to the welfare of feral cats.</p>
                    </div>
                    <div class="project-img">
                        <img src="./img/img-2.jpg" alt="img">
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-info">
                        <h1>Mobile Veterinary Clinic for Underserved Areas</h1>
                        <p>Our Mobile Veterinary Clinic overcomes geographical barriers to provide essential vaccinations, health check-ups, and preventive care, ensuring optimal health for pets in remote areas.</p>
                    </div>
                    <div class="project-img">
                        <img src="./img/img-4.jpg" alt="img">
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-info">
                        <h1>Pet Microchipping and Identification Drive</h1>
                        <p>Through our Pet Microchipping Drive, we've enhanced pet safety and reunification efforts by organizing events that offer affordable microchipping services. This initiative has contributed to creating a more secure and responsible pet ownership environment in our community.</p>
                    </div>
                    <div class="project-img">
                        <img src="./img/img-5.jpg" alt="img">
                    </div>
                </div>
                <div class="project-item">
                    <div class="project-info">
                        <h1>Veterinary Student Mentorship Program</h1>
                        <p>The Veterinary Student Mentorship Program supports aspiring veterinarians, facilitating a smooth transition to professionals by connecting students with experienced mentors and enriching the field of veterinary medicine.</p>
                    </div>
                    <div class="project-img">
                        <img src="./img/img-6.jpg" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Projects Section -->
    <!-- About Section -->
    <section id="about">
        <div class="about container">
            <div class="col-left">
                <div class="about-img">
                    <img src="./img/img-7.jpg" alt="img">
                </div>
            </div>
            <div class="col-right">
                <h1 class="section-title">About <span>me</span></h1>
                <h2>Veterinarian</h2>
                <p>In the heart of underserved areas, CJ's "Mobile Veterinary Clinic" becomes a beacon of hope, providing essential care and forging deep connections with beloved pets in remote communities. Through the "Feral Cat Trap-Neuter-Return (TNR) Program," CJ transforms the plight of feral cats into a story of compassion, offering them a chance at a better life. In each healing touch and act of kindness, CJ leaves an indelible mark, not just on the animals but on the hearts of those in need, creating a tapestry of warmth and care that defines a truly heartfelt mission.</p>
                <a href="#" class="cta">Download Resume</a>
            </div>
        </div>
    </section>
    <!-- End About Section -->
    <!-- Contact Section -->
    <section id="contact">
        <div class="contact container">
            <div>
                <h1 class="section-title">Contact <span>info</span></h1>
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
                        <h2>soriano.christianjose.m@gmail.com</h2>
                        <h2>hrma.soriano.up@phinmaed.com</h2>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="icon"><img src="https://img.icons8.com/bubbles/100/000000/map-marker.png" /></div>
                    <div class="contact-info">
                        <h1>Address</h1>
                        <h2>Lucao De Venecia, New York City, New Zealand</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Section -->
    <!-- Footer -->
    <section id="footer">
        <div class="footer container">
            <div class="brand">
                <h1><span>C</span>hristian <span>J</span>ose</h1>
            </div>
            <h2>Your Veterinary Solution</h2>
            <div class="social-icon">
                <div class="social-item">
                    <a href="https://www.facebook.com/ban75474"><img src="https://img.icons8.com/bubbles/100/000000/facebook-new.png" /></a>
                </div>
                <div class="social-item">
                    <a href="https://www.instagram.com/finnmeowmeows/"><img src="https://img.icons8.com/bubbles/100/000000/instagram-new.png" /></a>
                </div>
                <div class="social-item">
                    <a href="https://twitter.com/Johnlennonnn69"><img src="https://img.icons8.com/bubbles/100/000000/x.png" /></a>
                </div>
            </div>
            <p>Copyright © 2020 CJ. All rights reserved</p>
        </div>
    </section>
    <!-- End Footer -->
    <script>
        const hamburger = document.querySelector('.header .nav-bar .nav-list.hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ulli a');
const header = document.querySelector('.header.container');
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobile_menu.classList.toggle('active');
});
document.addEventListener('scroll', () => {
    var scroll_position = window.scrollY;
    if (scroll_position > 250) {
        header.style.backgroundColor = '#29323c';
    } else {
        header.style.backgroundColor = 'transparent';
    }
});
menu_item.forEach((item) => {
    item.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        mobile_menu.classList.toggle('active');
    });
});

    </script>
</body>

</html>