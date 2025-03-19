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
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
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
                <div class="card">
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
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Company Locations</h5>
                    </div>
                    <div class="card-body">
                        <div id="map" class="map-container"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4" >
            <!-- Chat box -->
            <div class="col-lg-8">
              <div class="card">
                <div class="card-header">
                        <h5 class="mb-0">Direct Chat</h5>
                </div>
                <div class="chat-container">
                  <?php include 'chatbox.php'; ?>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card h-100">
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
              <div class="card">
                <div class="card-header">
                  <h5 class="mb-0">To Do List</h5>
                </div>
                <div class="todolist-container">
                  <?php include 'todolist.php'; ?>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="card h-100">
                <div class="card-header">
                  <h5 class="mb-0">Calendar</h5>
                </div>
                <div class="card-body">
                  <div id="calendar"></div>
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
    </script>
</body>


</html>