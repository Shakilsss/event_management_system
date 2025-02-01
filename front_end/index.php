<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link rel="icon" href="assets/e_logo.png" type="image/x-icon">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            scroll-behavior: smooth;
        }
       
    </style>


</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <a class="navbar-brand" href="#">
        <img src="../images/front_end/e_logo.png" style="height:50px;width:50px;">    Event Management
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#event">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
            </li>
            </ul>
        </div>
    </nav>

    <section id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="max-height: 56.25vh;margin-top: 77px;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../images/front_end/slider_images/slider1.jpg" class="d-block w-100" alt="First slide" style="height: 56.25vh; object-fit: cover;">
                <div class="carousel-caption d-md-block" style="background-color: rgba(0, 0, 0, 0.5);">
                    <h5>First Slide</h5>
                    <p>Description for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../images/front_end/slider_images/slider2.jpg" class="d-block w-100" alt="Second slide" style="height: 56.25vh; object-fit: cover;">
                <div class="carousel-caption  d-md-block" style="background-color: rgba(0, 0, 0, 0.5);">
                    <h5>Second Slide</h5>
                    <p>Description for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../images/front_end/slider_images/slider2.jpg" class="d-block w-100" alt="Third slide" style="height: 56.25vh; object-fit: cover;">
                <div class="carousel-caption  d-md-block" style="background-color: rgba(0, 0, 0, 0.5);">
                    <h5>Third Slide</h5>
                    <p>Description for the third slide.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>

    <section class="py-5" style="background-color: #e9ecef;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Welcome to Our Event Management System</h1>
                <p class="lead">We provide the best solutions for managing your events seamlessly and efficiently.</p>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h2>Our Services</h2>
                    <p class="lead">We offer a wide range of services to make your events unforgettable. From planning to execution, we handle everything with precision and care.</p>
                    <ul>
                        <li>Event Planning</li>
                        <li>Venue Selection</li>
                        <li>Catering Services</li>
                        <li>Entertainment</li>
                        <li>Logistics Management</li>
                    </ul>
                    <a href="#" class="btn btn-primary mt-3">Learn More</a>
                </div>
                <div class="col-md-6">
                    <img src="assets/event_images/e2.jpg" class="img-fluid rounded" alt="Our Services">
                </div>
            </div>
        </div>
    </section>


    <section id="event" class="py-5" >

    <div class="container mt-5">
        <h1 class="text-center">Upcoming Events</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="assets/event_images/e1.jpg" class="card-img-top img-fluid" alt="Event 1" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Event 1</h5>
                        <p class="card-text">Short description of Event 1.</p>
                        <p class="card-text"><small class="text-muted">Location: Location 1</small></p>
                        <p class="card-text"><small class="text-muted">Date: 2023-10-15</small></p>
                        <p class="card-text"><small class="text-muted">Time: 10:00 AM</small></p>
                        <a href="#" class="btn btn-primary">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="assets/event_images/e2.jpg" class="card-img-top img-fluid" alt="Event 2" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Event 2</h5>
                        <p class="card-text">Short description of Event 2.</p>
                        <p class="card-text"><small class="text-muted">Location: Location 2</small></p>
                        <p class="card-text"><small class="text-muted">Time: 12:00 PM</small></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="assets/event_images/e3.jpg" class="card-img-top img-fluid" alt="Event 3" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title">Event 3</h5>
                        <p class="card-text">Short description of Event 3.</p>
                        <p class="card-text"><small class="text-muted">Location: Location 3</small></p>
                        <p class="card-text"><small class="text-muted">Time: 2:00 PM</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>


    <section id="about" class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/event_images/e2.jpg" class="img-fluid rounded" alt="About Us">
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center">
                    <h2>About Us</h2>
                    <p class="lead">We are a dedicated team of professionals committed to providing the best event management solutions. Our mission is to make your events seamless and memorable.</p>
                    <p>With years of experience in the industry, we understand the intricacies of event planning and execution. Our services are tailored to meet your specific needs, ensuring a successful and stress-free event.</p>
                    <a href="#" class="btn btn-primary mt-3">Learn More</a>
                </div>
            </div>
        </div>
    </section>


    <section id="contact" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <h2 class="text-center">Contact Us</h2>
            <div class="row mt-4">
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-6 d-flex flex-column justify-content-center bg-light" style="height: 100%;">
                    <h5>Contact Information</h5>
                    <p>Email: info@eventmanagement.com</p>
                    <p>Phone: +123 456 7890</p>
                    <p>Address: 123 Event Street, City, Country</p>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-light text-center text-lg-start mt-5">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Event Management System</h5>
                    <p>
                        Providing the best solutions for managing your events seamlessly and efficiently.
                    </p>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#" class="text-dark">Home</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark">Events</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark">About</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contact</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#" class="text-dark">Email: info@eventmanagement.com</a>
                        </li>
                        <li>
                            <a href="#" class="text-dark">Phone: +123 456 7890</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2025 Event Management System
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
         document.documentElement.style.scrollBehavior = 'smooth';
        //  #about
    document.querySelectorAll('a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetElement = document.getElementById(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 30,
                    behavior: 'smooth'
                });
            }
        });
    });
    </script>
</body>
</html>