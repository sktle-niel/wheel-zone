<?php
// Admin carousel management page: add/delete images for homepage carousel.
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carousel Manager - Two Wheels Zone Admin</title>
    <link rel="shortcut icon" href="../../assets/branding/lucent.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/bootstrap/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #ffffff; min-height: 100vh; color: #0f172a; }
        .sidebar { min-height: 100vh; position: sticky; top: 0; }
        .main-content { min-height: 100vh; overflow-y: auto; }
        .panel {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
        }
        .panel h5 { font-weight: 600; }
        .muted { color: #64748b; }
        .btn-outline-secondary, .btn-outline-danger { border-color: #e2e8f0; }
        .card-grid .item {
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding: 10px;
        }
        .card-grid img { border-radius: 8px; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-12 col-md-3 col-lg-2 sidebar px-0">
                <?php include 'components/sidebar.php'; ?>
            </aside>
            <main class="main-content col-12 col-md-9 col-lg-10 px-4 py-4">
                <div class="panel p-4 mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="text-success fs-4"><i class="bi bi-upload"></i></span>
                        <div>
                            <h1 class="h5 mb-0">Upload New Banner Image</h1>
                            <small class="muted">Add a new image to the homepage carousel.</small>
                        </div>
                    </div>
                    <form method="POST" action="#" enctype="multipart/form-data">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-lg-9">
                                <label class="form-label" for="carouselImage">Select Banner Image</label>
                                <input type="file" class="form-control form-control-lg" id="carouselImage" name="image" accept="image/*" required>
                                <small class="muted d-block mt-2">Supported: JPEG, JPG, PNG. Max size: 5MB.</small>
                            </div>
                            <div class="col-12 col-lg-3 d-grid mt-3 mt-lg-4">
                                <button type="submit" class="btn btn-success btn-lg">
                                    <i class="bi bi-upload me-2"></i>Upload Banner
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                // Placeholder data; replace with DB/storage results.
                $carouselItems = [
                    ['id' => 1, 'title' => 'Workshop', 'image' => '../../assets/carousel/w1.jpg', 'order' => 1],
                    ['id' => 2, 'title' => 'Workshop 1', 'image' => '../../assets/carousel/w2.jpg', 'order' => 2],
                    ['id' => 3, 'title' => 'Workshop 3', 'image' => '../../assets/carousel/w3.jpg', 'order' => 3],
                ];
                ?>
                <div class="panel p-4">
                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-primary fs-5"><i class="bi bi-grid-3x3-gap"></i></span>
                            <h2 class="h6 mb-0">Current Banners</h2>
                        </div>
                        <span class="badge text-bg-dark px-3 py-2"><?php echo count($carouselItems); ?></span>
                    </div>
                    <?php if (empty($carouselItems)): ?>
                        <div class="text-center text-muted py-4">No banners yet.</div>
                    <?php else: ?>
                        <div class="row g-3 card-grid">
                            <?php foreach ($carouselItems as $item): ?>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="item h-100 d-flex flex-column">
                                        <div class="ratio ratio-16x9 mb-2 overflow-hidden" style="background:#f8fafc;">
                                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="w-100 h-100" style="object-fit: cover;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold mb-1"><?php echo htmlspecialchars($item['title'] ?: 'Untitled'); ?></div>
                                            <div class="muted small">Order: <?php echo (int) $item['order']; ?></div>
                                        </div>
                                        <div class="mt-3 d-flex gap-2">
                                            <button type="button" class="btn btn-outline-secondary btn-sm w-100">Edit</button>
                                            <button type="button" class="btn btn-outline-danger btn-sm w-100">Delete</button>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

