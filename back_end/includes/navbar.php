<!-- for web -->
<?php
    if(isset($_GET['logout'])){
        session_unset();
        header('location: login.php');
    }
?>
<style>
    .actives{
        color:#28a745!important; /* Attractive tomato color on hover */
        transition: color 0.3s ease-in-out, text-decoration 0.3s ease-in-out; /* Smooth transition effect */
        border:1px solid white;
        border-right: 14px solid #28a745;
        /* border-radius:10px; */
        background: white;


    }

    .text_color_nav_link:hover{
        color: #28a745!important; /* Attractive tomato color on hover */
        transition: color 0.3s ease-in-out, text-decoration 0.3s ease-in-out; /* Smooth transition effect */
        border:1px solid white;
        border-left: 14px solid #28a745;
        /* border-radius:10px; */
        background: white;
    }

    
</style>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse position-fixed" style="height: 100%; background: #28a745;">
    <h4 style="text-align: center;
    margin-top: 20px;
    border: 1px solid white;
    padding: 10px;
    border-radius: 6px;
    color:white">Admin Dashboard</h4>    
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a id="nav-dashboard" class="text_color_nav_link nav-link" href="#list-item-1" onclick="showItem('list-item-1'); setActive('nav-dashboard')">
                    Dashboard
                </a>
                <hr>
            </li>
            <li class="nav-item">
                <a id="nav-manage-event" class="text_color_nav_link nav-link" href="#list-item-2" onclick="showItem('list-item-2'); setActive('nav-manage-event')">
                    Manage Event
                </a>
                <hr>
            </li>
            <li class="nav-item">
                <a id="nav-manage-user" class="text_color_nav_link nav-link" href="#list-item-3" onclick="showItem('list-item-3'); setActive('nav-manage-user')">
                    Manage User
                </a>
                <hr>
            </li>
            <li class="nav-item">
                <a id="nav-event-reports" class="text_color_nav_link nav-link" href="#list-item-4" onclick="showItem('list-item-4'); setActive('nav-event-reports')">
                    Event Reports
                </a>
                <hr>
            </li>
        </ul>
    </div>                
    <div class="fixed-bottom" style="width: 220px;text-align: center;">
        <div class="dropdown">
            <img src="../front_end/assets/e_logo.png" class="rounded-circle dropdown-toggle" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="Profile Image" style="height: 30px; width: 30px;">
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profileDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="<?php echo $_SERVER['PHP_SELF']; ?>?logout">Logout</a>
            </div>
        </div>
    </div>
</nav>

<!-- for mobile -->
<nav class="navbar navbar-expand-lg navbar-light bg-light w-100 d-md-none fixed-top">
    <button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav w-100">
            <li class="nav-item">
                <a id="nav-mobile-dashboard" class="nav-link actives"  href="#list-item-1" onclick="showItem('list-item-1'); setActive('nav-mobile-dashboard')">Dashboard</a>
            </li>
            <li class="nav-item">
                <a id="nav-mobile-manage-event" class="nav-link" href="#list-item-2" onclick="showItem('list-item-2'); setActive('nav-mobile-manage-event')">Manage Event</a>
            </li>
            <li class="nav-item">
                <a id="nav-mobile-manage-user" class="nav-link" href="#list-item-3" onclick="showItem('list-item-3'); setActive('nav-mobile-manage-user')">Manage User</a>
            </li>
            <li class="nav-item">
                <a id="nav-mobile-event-reports" class="nav-link" href="#list-item-4" onclick="showItem('list-item-4'); setActive('nav-mobile-event-reports')">Event Reports</a>
            </li>
        </ul>
    </div>
</nav>

<script>
    // Function to set active class on the clicked nav link
    function setActive(id) {
        // Remove active class from all nav links
        var elements = document.querySelectorAll('.nav-link');
        elements.forEach(function(element) {
            element.classList.remove('actives');
        });

        // Add active class to the clicked nav link
        var activeElement = document.getElementById(id);
        activeElement.classList.add('actives');

        // Store the active element id in local storage
        localStorage.setItem('activeNavLink', id);
    }

    // Function to set the active class on page load based on local storage or URL
    document.addEventListener('DOMContentLoaded', function() {
        var activeNavLink = localStorage.getItem('activeNavLink');
        var urlPath = window.location.pathname.split('/').pop();
        
        if (activeNavLink) {
            setActive(activeNavLink);
        } else {
            var urlElement = document.querySelector(`.nav-link[href="#${urlPath}"]`);
            if (urlElement) {
                setActive(urlElement.id);
            }
        }
    });
</script>