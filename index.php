<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap 5 Mobile Menu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <style>
    .mobile-nav {
      transform: translateX(-100%);
      transition: transform 0.3s ease-in-out;
      z-index: 1050;
    }
    .mobile-nav.active {
      transform: translateX(0);
    }
    #overlay {
      display: none;
      z-index: 1040;
    }
    #overlay.active {
      display: block;
    }
    .desktop-nav .nav-link {
      font-weight: 500;
    }
  </style>
</head>
<body class="bg-light">
  <!-- Main Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
      <button id="menu-toggle" class="btn btn-outline-primary d-lg-none">
        <i class="fas fa-bars"></i>
      </button>
      <a class="navbar-brand fw-bold" href="#">My Website</a>
      <div class="collapse navbar-collapse desktop-nav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Mobile Navigation -->
  <div id="mobile-nav" class="mobile-nav position-fixed top-0 start-0 h-100 bg-white shadow-lg p-4 w-75">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h5 class="fw-bold">My Website</h5>
      <button id="close-nav" class="btn btn-outline-secondary">
        <i class="fas fa-times"></i>
      </button>
    </div>
    <ul class="nav flex-column">
      <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
      <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
    </ul>
  </div>

  <!-- Overlay -->
  <div id="overlay" class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50"></div>

  <!-- Main Content -->
  <main class="container text-center py-5">
    <h1 class="display-4 fw-bold">Welcome to My Website</h1>
    <p class="lead text-muted">Your gateway to excellence and innovation.</p>
    <a href="#" class="btn btn-primary">Learn More</a>
  </main>

  <script>
    const menuToggle = document.getElementById('menu-toggle');
    const closeNav = document.getElementById('close-nav');
    const mobileNav = document.getElementById('mobile-nav');
    const overlay = document.getElementById('overlay');

    menuToggle.addEventListener('click', () => {
      mobileNav.classList.add('active');
      overlay.classList.add('active');
    });

    closeNav.addEventListener('click', () => {
      mobileNav.classList.remove('active');
      overlay.classList.remove('active');
    });

    overlay.addEventListener('click', () => {
      mobileNav.classList.remove('active');
      overlay.classList.remove('active');
    });
  </script>
</body>
</html>
