<?php
// Simple admin sidebar navigation. Include this inside a Bootstrap grid layout.
?>
<style>
    /* Light/glass treatment for the sidebar container and links */
    .twz-sidebar {
        background: rgba(255, 255, 255, 0.82);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-right: 1px solid rgba(0, 0, 0, 0.05);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }
    .twz-sidebar .nav-link {
        color: #1f2937;
        border-radius: 10px;
        transition: background-color 0.2s, color 0.2s;
    }
    .twz-sidebar .nav-link:hover {
        background: rgba(0, 0, 0, 0.04);
    }
    .twz-sidebar .nav-link.active {
        background: #111827;
        color: #fff;
    }
</style>
<div class="twz-sidebar d-flex flex-column flex-shrink-0 p-3 text-dark h-100">
    <a href="dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 text-dark text-decoration-none">
        <span class="fs-5 fw-bold">Admin Dashboard</span>
    </a>
    <hr class="text-secondary">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="dashboard.php" class="nav-link active" aria-current="page">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="carousel.php" class="nav-link">
                <i class="bi bi-images me-2"></i> Carousel
            </a>
        </li>
        <li>
            <a href="featured-products.php" class="nav-link">
                <i class="bi bi-star me-2"></i> Featured Products
            </a>
        </li>
        <li>
            <a href="branches.php" class="nav-link">
                <i class="bi bi-geo-alt me-2"></i> Branches
            </a>
        </li>
    </ul>
    <hr class="text-secondary">
    <div>
        <a href="../auth/login.php" class="d-flex align-items-center text-dark text-decoration-none">
            <i class="bi bi-box-arrow-right me-2"></i>
            <strong>Logout</strong>
        </a>
    </div>
</div>

