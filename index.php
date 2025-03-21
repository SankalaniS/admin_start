<?php
// Monthly sales data
$monthlyData = [
    ['month' => 'January', 'sales' => 30, 'target' => 65],
    ['month' => 'February', 'sales' => 45, 'target' => 60],
    ['month' => 'March', 'sales' => 25, 'target' => 85],
    ['month' => 'April', 'sales' => 60, 'target' => 50],
    ['month' => 'May', 'sales' => 85, 'target' => 45],
    ['month' => 'June', 'sales' => 30, 'target' => 55],
    ['month' => 'July', 'sales' => 90, 'target' => 40],
];

$orders = [
    ['id' => 1, 'customer' => 'John Doe', 'product' => 'Laptop', 'amount' => 999.99, 'date' => '2024-03-10'],
    ['id' => 2, 'customer' => 'Jane Smith', 'product' => 'Phone', 'amount' => 699.99, 'date' => '2024-03-09'],
    ['id' => 3, 'customer' => 'Bob Wilson', 'product' => 'Tablet', 'amount' => 499.99, 'date' => '2024-03-08'],
    ['id' => 4, 'customer' => 'Alice Brown', 'product' => 'Monitor', 'amount' => 299.99, 'date' => '2024-03-07'],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .wrapper {
            display: flex;
            min-height: 100vh;
        }
        
        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            transition: all 0.3s;
            z-index: 1000;
        }

        .content-wrapper {
            flex: 1;
            margin-left: 250px;
            min-height: 100vh;
            background: #f4f6f9;
        }

        .brand-link {
            display: flex;
            align-items: center;
            padding: 15px;
            color: #fff;
            text-decoration: none;
            border-bottom: 1px solid #4b545c;
        }

        .brand-link img {
            width: 33px;
            height: 33px;
            margin-right: 10px;
        }

        .user-panel {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid #4b545c;
        }

        .user-panel img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .sidebar-search {
            padding: 15px;
        }

        .sidebar-search input {
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: #fff;
        }

        .nav-sidebar {
            padding: 0;
            list-style: none;
        }

        .nav-item {
            margin: 0;
            padding: 0;
        }

        .nav-link {
            padding: 12px 15px;
            color: #c2c7d0;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .nav-link:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }

        .nav-link.active {
            color: #fff;
            background: #007bff;
        }

        .nav-link i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .nav-header {
            padding: 12px 15px;
            font-size: 12px;
            color: #c2c7d0;
            background: rgba(0, 0, 0, 0.2);
            margin-top: 10px;
        }

        .stat-card {
            transition: transform 0.2s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .map-container {
            height: 400px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }

        .float-end {
            float: right;
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.2);
            color: #fff;
            border-color: transparent;
            box-shadow: none;
        }

        #sidebarToggle {
            margin-right: 15px;
        }

        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            .content-wrapper {
                margin-left: 0;
            }
            .sidebar.active {
                margin-left: 0;
            }
            .content-wrapper.active {
                margin-left: 250px;
            }
        }

        .section {
            scroll-margin-top: 70px;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside class="sidebar">
            <a href="#" class="brand-link">
                <img src="https://adminlte.io/themes/v3/dist/img/AdminLTELogo.png" alt="AdminLTE Logo">
                <span class="brand-text">Etronic Solution</span>
            </a>

            <div class="user-panel">
                <img src="https://adminlte.io/themes/v3/dist/img/user2-160x160.jpg" alt="User Image">
                <div class="info">
                    <span>Amila Shanaka</span>
                </div>
            </div>

            <div class="sidebar-search">
                <input type="text" class="form-control" placeholder="Search...">
            </div>

            <nav class="mt-2">
                <ul class="nav nav-sidebar">
                    <li class="nav-item">
                        <a href="#" class="nav-link active" id="dashboard-link">
                            <i class="bi bi-speedometer2"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#sales-section" class="nav-link">
                            <i class="bi bi-graph-up"></i>
                            <span>Sales</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#sales-graph-section" class="nav-link">
                            <i class="bi bi-bar-chart"></i>
                            <span>Sales Graph</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#location-section" class="nav-link">
                            <i class="bi bi-geo-alt"></i>
                            <span>Location</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#chat-section" class="nav-link">
                            <i class="bi bi-chat-dots"></i>
                            <span>Direct Chat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#todo-section" class="nav-link">
                            <i class="bi bi-check2-square"></i>
                            <span>To Do List</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#calendar-section" class="nav-link">
                            <i class="bi bi-calendar3"></i>
                            <span>Calendar</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <button class="btn btn-dark" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <a class="navbar-brand" href="#">Admin Dashboard</a>
                </div>
            </nav>

            <div class="container-fluid py-4">
                <!-- Stats Cards -->
                <div class="row g-4 mb-4">
                    <div class="col-md-3">
                        <div class="card stat-card bg-primary text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">New Orders</h5>
                                <h2 class="display-4 mb-0">150</h2>
                                <div class="mt-3">
                                    <i class="bi bi-cart-plus fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card bg-success text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">Bounce Rate</h5>
                                <h2 class="display-4 mb-0">53%</h2>
                                <div class="mt-3">
                                    <i class="bi bi-graph-up fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card bg-warning text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">User Registrations</h5>
                                <h2 class="display-4 mb-0">44</h2>
                                <div class="mt-3">
                                    <i class="bi bi-person-plus fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card stat-card bg-danger text-white h-100">
                            <div class="card-body">
                                <h5 class="card-title">Unique Visitors</h5>
                                <h2 class="display-4 mb-0">65</h2>
                                <div class="mt-3">
                                    <i class="bi bi-people fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-lg-8">
                        <div id="sales-section" class="card section">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Sales</h5>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary active">Area</button>
                                    <button type="button" class="btn btn-outline-primary">Donut</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <canvas id="salesChart" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Map -->
                    <div class="col-lg-4">
                        <div id="location-section" class="card h-100 section">
                            <div class="card-header">
                                <h5 class="mb-0">Company Locations</h5>
                            </div>
                            <div class="card-body">
                                <div id="map" class="map-container"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <!-- Chat box -->
                    <div class="col-lg-8">
                        <div id="chat-section" class="card section">
                            <div class="card-header">
                                <h5 class="mb-0">Direct Chat</h5>
                            </div>
                            <div class="chat-container">
                                <?php include 'chatbox.php'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div id="sales-graph-section" class="card h-100 section">
                            <div class="card-header">
                                <h5 class="mb-0">Sales Graph</h5>
                            </div>
                            <div class="card-body">
                                <canvas id="salesChart" height="200"></canvas>
                                <div class="row mt-4">
                                    <div class="col-4 text-center">
                                        <div class="progress" style="height: 100px; width: 100px; margin: auto;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 20%"></div>
                                        </div>
                                        <h6 class="mt-2">Mail-Orders</h6>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="progress" style="height: 100px; width: 100px; margin: auto;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 60%"></div>
                                        </div>
                                        <h6 class="mt-2">Online</h6>
                                    </div>
                                    <div class="col-4 text-center">
                                        <div class="progress" style="height: 100px; width: 100px; margin: auto;">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 30%"></div>
                                        </div>
                                        <h6 class="mt-2">In-Store</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <!-- To Do list -->
                    <div class="col-lg-8">
                        <div id="todo-section" class="card section">
                            <div class="card-header">
                                <h5 class="mb-0">To Do List</h5>
                            </div>
                            <div class="todolist-container">
                                <?php include 'todolist.php'; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div id="calendar-section" class="card h-100 section">
                            <div class="card-header">
                                <h5 class="mb-0">Calendar</h5>
                            </div>
                            <div class="card-body">
                                <div id="calendar">
                                    <?php include 'calender.html'; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhzffYwCyuAgmgIIACQC04VjtiXlw0Bzg&callback=initMap" async defer></script>
    <script>
        // Initialize the area chart
        const ctx = document.getElementById('salesChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: <?php echo json_encode(array_column($monthlyData, 'month')); ?>,
                datasets: [{
                    label: 'Sales',
                    data: <?php echo json_encode(array_column($monthlyData, 'sales')); ?>,
                    fill: true,
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    tension: 0.4
                }, {
                    label: 'Target',
                    data: <?php echo json_encode(array_column($monthlyData, 'target')); ?>,
                    fill: true,
                    backgroundColor: 'rgba(211, 211, 211, 0.5)',
                    borderColor: 'rgba(211, 211, 211, 1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Initialize Google Maps
        function initMap() {
            const map = new google.maps.Map(document.getElementById('map'), {
                center: { lat: 37.7749, lng: -122.4194 }, // San Francisco coordinates
                zoom: 4
            });

            // Add markers for company locations
            const locations = [
                { lat: 37.7749, lng: -122.4194, title: 'San Francisco HQ' },
                { lat: 40.7128, lng: -74.0060, title: 'New York Office' },
                { lat: 32.7767, lng: -96.7970, title: 'Dallas Office' }
            ];

            locations.forEach(location => {
                new google.maps.Marker({
                    position: { lat: location.lat, lng: location.lng },
                    map: map,
                    title: location.title
                });
            });
        }

        // Sidebar toggle functionality
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.content-wrapper').classList.toggle('active');
        });

        // Dashboard link - scroll to top
        document.getElementById('dashboard-link').addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Smooth scroll for all other section links
        document.querySelectorAll('a[href^="#"]:not(#dashboard-link)').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const section = document.querySelector(this.getAttribute('href'));
                if (section) {
                    section.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>