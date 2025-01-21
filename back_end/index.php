<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            overflow: hidden;
            background: linear-gradient(to right,rgb(9, 119, 156),rgb(10, 122, 191)); /* Gradient background for body */
        }
        h1,h4{
                        text-shadow: 5px 1px 1px black,7px 1px 10px white;
            color: aliceblue;
            font-weight: bold;
        }
        h4{
            font-size: 20px;
        }

        .scrollspy-example {
            overflow: hidden;
            scrollbar-width: none; /* For Firefox */
        }

        .scrollspy-example::-webkit-scrollbar {
            display: none; /* For Chrome, Safari, and Opera */
        }

        @media (max-width: 768px) {
            .scrollspy-example {
                height: 100vh;
                overflow-y: auto;
            }
        }

        .content-item {
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient background for content items */
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            display: none;
        }

        /* Define some animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }

        @keyframes zoomIn {
            from { transform: scale(0); }
            to { transform: scale(1); }
        }

        .fade-in {
            animation: fadeIn 1s ease-in-out;
        }

        .slide-in {
            animation: slideIn 1s ease-in-out;
        }
        .text_color_nav_link{
            color:white;
        }

        /* .zoom-in {
            animation: zoomIn 1s ease-in-out;
        } */
    </style>
</head>
<body data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
    <div class="container-fluid">
        <div class="row" style="height: 100vh;">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse position-fixed" style="height: 100%; background: linear-gradient(to bottom, #127e74, #127e74);">
                <h4>Admin Dashboard</h4>
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="text_color_nav_link nav-link active" href="#list-item-1" onclick="showItem('list-item-1')">
                               Item 1
                            </a>
                         <hr>
                        </li>
                        <li class="nav-item">
                            <a class="text_color_nav_link nav-link" href="#list-item-2" onclick="showItem('list-item-2')">
                                Item 2
                            </a>
                            <hr>
                        </li>
                        <li class="text_color_nav_link nav-item">
                            <a class="text_color_nav_link nav-link" href="#list-item-3" onclick="showItem('list-item-3')">
                                Item 3
                            </a>
                            <hr>
                        </li>
                        <li class="nav-item">
                            <a class="text_color_nav_link nav-link" href="#list-item-4" onclick="showItem('list-item-4')">
                                Item 4
                            </a>
                            <hr>
                        </li>
                    </ul>
                </div>                
                <div class="fixed-bottom" style="width: 220px;text-align: center;">
                    <a href="#" class="btn btn-sm btn-primary">Logout</a>
                    <a href="#" class="btn btn-sm btn-primary">Logout</a>
                    <a href="#" class="btn btn-sm btn-primary">Logout</a>
                </div>

            </nav>
            <nav class="navbar navbar-expand-lg navbar-light bg-light w-100 d-md-none fixed-top">
            <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav w-100">
                <li class="nav-item">
                    <a class="nav-link active" href="#list-item-1" onclick="showItem('list-item-1')">Item 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#list-item-2" onclick="showItem('list-item-2')">Item 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#list-item-3" onclick="showItem('list-item-3')">Item 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#list-item-4" onclick="showItem('list-item-4')">Item 4</a>
                </li>
                </ul>
            </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4" id="list-item-1">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="text-center">Welcome to Our Event Management System</h1>
            </div>
            <style>
                @media (max-width: 768px) {
                    #list-item-1 {
                        margin-top: 43px;
                    }
                }
            </style>

            <div class="content-item">
                <h4>Lorem if</h4>
            </div>
            <div class="row">
                <?php for ($i = 1; $i <= 8; $i++): ?>
                <div class="col-md-3 mb-4">
                    <div class="card" style="background: linear-gradient(to right,rgb(78, 180, 136),rgb(4, 187, 178));">
                    <!-- <img src="https://via.placeholder.com/150" class="card-img-top" alt="Event Image"> -->
                    <div class="card-body">
                        <h5 class="card-title">Event <?php echo $i; ?></h5>
                        <p class="card-text">Description for event <?php echo $i; ?>.</p>
                        <a href="#" class="btn btn-sm btn-primary">View Details</a>
                    </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
            <div id="list-item-2" class="content-item">
                <h4>Item 2</h4>
                <p>Event management is the application of project management to the creation and development of large-scale events such as festivals, conferences, ceremonies, weddings, formal parties, concerts, or conventions. It involves studying the brand, identifying its target audience, devising the event concept, and coordinating the technical aspects before actually launching the event.
                The process of planning and coordinating the event is usually referred to as event planning and which can include budgeting, scheduling, site selection, acquiring necessary permits, coordinating transportation and parking, arranging for speakers or entertainers, arranging decor, event security, catering, coordinating with third-party vendors, and emergency plans.

                Each event is different in its nature so the process of planning & execution of each event differs on the type of event. Event managers are the people who plan and execute events. They are involved in the planning, execution, brand building, marketing, and communication strategy of events. It is a multi-dimensional profession.

                The event manager is an expert in the creative, technical, and logistical elements that help an event succeed. This includes event design, audio-visual production, scriptwriting, logistics, budgeting, negotiation, and, of course, client service. It is a multi-faceted profession.

                The role of an event manager can be quite diverse and can include a wide range of responsibilities. Some of the key responsibilities include:

                1. **Event Planning**: This involves understanding the objectives of the event, creating a detailed plan, and ensuring that all aspects of the event are covered. This includes everything from the venue, catering, entertainment, and logistics.

                2. **Budget Management**: Managing the budget is a crucial part of event management. This involves ensuring that all expenses are accounted for and that the event stays within budget.

                3. **Vendor Coordination**: Event managers often work with a variety of vendors, including caterers, decorators, and entertainment providers. Coordinating with these vendors to ensure that everything runs smoothly is a key part of the job.

                4. **Marketing and Promotion**: Promoting the event to ensure that it is well-attended is another important aspect of event management. This can involve everything from social media marketing to traditional advertising.

                5. **On-site Management**: On the day of the event, the event manager is responsible for ensuring that everything runs smoothly. This can involve coordinating with staff, managing any issues that arise, and ensuring that the event goes off without a hitch.

                6. **Post-event Evaluation**: After the event, it is important to evaluate its success. This can involve gathering feedback from attendees, reviewing the budget, and identifying any areas for improvement.

                Event management is a dynamic and exciting field that requires a combination of creativity, organization, and attention to detail. It is a profession that can be both challenging and rewarding, offering the opportunity to create memorable experiences for attendees.

                In conclusion, event management is a complex and multifaceted profession that involves a wide range of responsibilities. From planning and budgeting to vendor coordination and on-site management, event managers play a crucial role in ensuring the success of an event. With the right skills and experience, a career in event management can be both fulfilling and rewarding.</p>
            </div>
            <div id="list-item-3" class="content-item">
                <h4>Item 3</h4>
                <p>Event management is the application of project management to the creation and development of large-scale events such as festivals, conferences, ceremonies, weddings, formal parties, concerts, or conventions. It involves studying the brand, identifying its target audience, devising the event concept, and coordinating the technical aspects before actually launching the event.
                The process of planning and coordinating the event is usually referred to as event planning and which can include budgeting, scheduling, site selection, acquiring necessary permits, coordinating transportation and parking, arranging for speakers or entertainers, arranging decor, event security, catering, coordinating with third-party vendors, and emergency plans.

                Each event is different in its nature so the process of planning & execution of each event differs on the type of event. Event managers are the people who plan and execute events. They are involved in the planning, execution, brand building, marketing, and communication strategy of events. It is a multi-dimensional profession.

                The event manager is an expert in the creative, technical, and logistical elements that help an event succeed. This includes event design, audio-visual production, scriptwriting, logistics, budgeting, negotiation, and, of course, client service. It is a multi-faceted profession.

                The role of an event manager can be quite diverse and can include a wide range of responsibilities. Some of the key responsibilities include:

                1. **Event Planning**: This involves understanding the objectives of the event, creating a detailed plan, and ensuring that all aspects of the event are covered. This includes everything from the venue, catering, entertainment, and logistics.

                2. **Budget Management**: Managing the budget is a crucial part of event management. This involves ensuring that all expenses are accounted for and that the event stays within budget.

                3. **Vendor Coordination**: Event managers often work with a variety of vendors, including caterers, decorators, and entertainment providers. Coordinating with these vendors to ensure that everything runs smoothly is a key part of the job.

                4. **Marketing and Promotion**: Promoting the event to ensure that it is well-attended is another important aspect of event management. This can involve everything from social media marketing to traditional advertising.

                5. **On-site Management**: On the day of the event, the event manager is responsible for ensuring that everything runs smoothly. This can involve coordinating with staff, managing any issues that arise, and ensuring that the event goes off without a hitch.

                6. **Post-event Evaluation**: After the event, it is important to evaluate its success. This can involve gathering feedback from attendees, reviewing the budget, and identifying any areas for improvement.

                Event management is a dynamic and exciting field that requires a combination of creativity, organization, and attention to detail. It is a profession that can be both challenging and rewarding, offering the opportunity to create memorable experiences for attendees.

                In conclusion, event management is a complex and multifaceted profession that involves a wide range of responsibilities. From planning and budgeting to vendor coordination and on-site management, event managers play a crucial role in ensuring the success of an event. With the right skills and experience, a career in event management can be both fulfilling and rewarding.</p>
            </div>
            <div id="list-item-4" class="content-item">
                <h4>Item 4</h4>
                <p>Event management is the application of project management to the creation and development of large-scale events such as festivals, conferences, ceremonies, weddings, formal parties, concerts, or conventions. It involves studying the brand, identifying its target audience, devising the event concept, and coordinating the technical aspects before actually launching the event.
                The process of planning and coordinating the event is usually referred to as event planning and which can include budgeting, scheduling, site selection, acquiring necessary permits, coordinating transportation and parking, arranging for speakers or entertainers, arranging decor, event security, catering, coordinating with third-party vendors, and emergency plans.

                Each event is different in its nature so the process of planning & execution of each event differs on the type of event. Event managers are the people who plan and execute events. They are involved in the planning, execution, brand building, marketing, and communication strategy of events. It is a multi-dimensional profession.

                The event manager is an expert in the creative, technical, and logistical elements that help an event succeed. This includes event design, audio-visual production, scriptwriting, logistics, budgeting, negotiation, and, of course, client service. It is a multi-faceted profession.

                The role of an event manager can be quite diverse and can include a wide range of responsibilities. Some of the key responsibilities include:

                1. **Event Planning**: This involves understanding the objectives of the event, creating a detailed plan, and ensuring that all aspects of the event are covered. This includes

                2. **Budget Management**: Managing the budget is a crucial part of event management. This involves ensuring that all expenses are accounted for and that the event stays within budget.

                3. **Vendor Coordination**: Event managers often work with a variety of vendors, including caterers, decorators, and entertainment providers. Coordinating with these vendors to ensure that everything runs smoothly is a key part of the job.

                4. **Marketing and Promotion**: Promoting the event to ensure that it is well-attended is another important aspect of event management. This can involve everything from social media marketing to traditional advertising.

                5. **On-site Management**: On the day of the event, the event manager is responsible for ensuring that everything runs smoothly. This can involve coordinating with staff, managing any issues that arise, and ensuring that the event goes off without a hitch.

                6. **Post-event Evaluation**: After the event, it is important to evaluate its success. This can involve gathering feedback from attendees, reviewing the budget, and identifying any areas for improvement.

                Event management is a dynamic and exciting field that requires a combination of creativity, organization, and attention to detail. It is a profession that can be both challenging and rewarding, offering the opportunity to create memorable experiences for attendees.

                In conclusion, event management is a complex and multifaceted profession that involves a wide range of responsibilities. From planning and budgeting to vendor coordination and on-site management, event managers play a crucial role in ensuring the success of an event. With the right skills and experience, a career in event management can be both fulfilling and rewarding.</p>
            </div>
            </main>
        </div>
    </div>

    <script>
        function showItem(itemId) {
            const animations = ['fade-in', 'slide-in', 'zoom-in'];
            const randomAnimation = animations[Math.floor(Math.random() * animations.length)];

            document.querySelectorAll('.content-item').forEach(item => {
                item.style.display = 'none';
                item.classList.remove('fade-in', 'slide-in', 'zoom-in');
            });

            const item = document.getElementById(itemId);
            item.style.display = 'block';
            item.classList.add(randomAnimation);
        }

        // Show the first item on load
        document.addEventListener('DOMContentLoaded', function() {
            showItem('list-item-1');
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        //    document.documentElement.style.scrollBehavior = 'smooth';
           if (window.innerWidth <= 768) {
                document.querySelectorAll('a').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href').substring(1);
                        const targetElement = document.getElementById(targetId);
                        if (targetElement) {
                            window.scrollTo({
                                top: targetElement.offsetTop - 80,
                                behavior: 'smooth'
                            });
                        }
                    });
                });
            }
    </script>


</body>
</html>