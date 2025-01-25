<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h2>User Login</h2>
                    </div>
                    <div class="card-body">
                        <form id="loginForm" method="POST">
                            <div class="form-group">
                                <label for="username">User Email</label>
                                <input type="email" class="form-control" id="user_email" name="user_email"  required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </form>
                        <div id="message" class="mt-3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            user_email = document.getElementById('user_email').value;
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(user_email)) {
                document.getElementById('message').innerHTML = '<div class="alert alert-danger">Invalid email format</div>';
                return;
            }
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'login_check.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function(e) {
                if (xhr.readyState === 4 && xhr.status === 200) {
                if (xhr.responseText == 'true') {
                const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 1500,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: 'success',
                title: 'Login successfully'
                }).then(function() {
                        window.location.reload();
                    });
                } else {
                    const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                    });
                    Toast.fire({
                        icon: 'error',
                        title: 'Invalid email or password'
                    });
                }
                }
            };
            var formData = new FormData(this);
            var encodedData = new URLSearchParams(formData).toString();
            xhr.send(encodedData);
            
            });
        });
    </script>
</body>
</html>