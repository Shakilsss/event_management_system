<!-- for web -->
<?php
    if(isset($_GET['logout'])){
        session_unset();
        header('location: login.php');
    //     echo "<script>
    //  const Toast = Swal.mixin({
    //             toast: true,
    //             position: 'top-end',
    //             showConfirmButton: false,
    //             timer: 1500,
    //             timerProgressBar: true,
    //             didOpen: (toast) => {
    //                 toast.onmouseenter = Swal.stopTimer;
    //                 toast.onmouseleave = Swal.resumeTimer;
    //             }
    //             });
    //             Toast.fire({
    //             icon: 'success',
    //             title: 'Logged out successfully'
    //             }).then(function() {
    //                     window.location.href = 'login.php';
    //                 });
    //     </script>";
    }
?>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse position-fixed" style="height: 100%; background: linear-gradient(to bottom, #127e74, #127e74);">
    <h4>Admin Dashboard</h4>    
<div class="sidebar-sticky pt-3">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="text_color_nav_link nav-link active" href="#list-item-1" onclick="showItem('list-item-1')">
                Dashboard
            </a>
            <hr>
        </li>
        <li class="nav-item">
            <a class="text_color_nav_link nav-link" href="#list-item-2" onclick="showItem('list-item-2')">
                Manage Event
            </a>
            <hr>
        </li>
        <li class="text_color_nav_link nav-item">
            <a class="text_color_nav_link nav-link" href="#list-item-3" onclick="showItem('list-item-3')">
                Manage User
            </a>
            <hr>
        </li>
        <li class="nav-item">
            <a class="text_color_nav_link nav-link" href="#list-item-4" onclick="showItem('list-item-4')">
                Event Reports
            </a>
            <hr>
        </li>
    </ul>
</div>                
<div class="fixed-bottom" style="width: 220px;text-align: center;">
    <div class="dropdown">
        <img  src="../front_end/assets/e_logo.png" class="rounded-circle dropdown-toggle" id="profileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" alt="Profile Image" style="height: 30px; width: 30px;">
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
            <a class="nav-link active" href="#list-item-1" onclick="showItem('list-item-1')">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#list-item-2" onclick="showItem('list-item-2')">Manage Event</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#list-item-3" onclick="showItem('list-item-3')">Mange user</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#list-item-4" onclick="showItem('list-item-4')">Event Reports</a>
        </li>
        </ul>
    </div>
</nav>