<?php
// Admin carousel management page: add/delete images for homepage carousel.
session_start();
require_once '../../connection/connection.php';

$status = $_GET['status'] ?? '';
$modal = null;

if ($status === 'success') {
    $modal = [
        'title' => 'Success',
        'body' => 'Banner added successfully.',
        'type' => 'success',
    ];
} elseif ($status === 'delete_success') {
    $modal = [
        'title' => 'Success',
        'body' => 'Banner deleted successfully.',
        'type' => 'success',
    ];
} elseif (in_array($status, ['delete_invalid', 'delete_not_found', 'delete_db_error'], true)) {
    $modal = [
        'title' => 'Error',
        'body' => 'Delete failed. Please try again.',
        'type' => 'danger',
    ];
}

$carouselItems = [];

$sql = 'SELECT id, title, image_path
        FROM carousel_items
        ORDER BY id DESC';

try {
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $carouselItems[] = [
                'id' => (int) $row['id'],
                'title' => $row['title'],
                // Prepend ../../ so admin view resolves correctly
                'image' => '../../' . ltrim($row['image_path'], '/'),
            ];
        }
    }
} catch (PDOException $e) {
    error_log('Query failed: ' . $e->getMessage());
}
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
        body { background: #f8fafc; min-height: 100vh; color: #0f172a; }
        .sidebar { min-height: 100vh; position: sticky; top: 0; }
        .main-content { min-height: 100vh; overflow-y: auto; }
        .panel {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.06);
        }
        .panel h5 { font-weight: 600; }
        .muted { color: #64748b; }
        .btn-outline-secondary, .btn-outline-danger { border-color: #e2e8f0; }
        .hero {
            background: linear-gradient(135deg, #0ea5e9 0%, #6366f1 100%);
            color: #fff;
            border-radius: 14px;
            padding: 22px 24px;
            box-shadow: 0 12px 30px rgba(99, 102, 241, 0.2);
        }
        .stat-chip {
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            border-radius: 999px;
            padding: 6px 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        .card-grid .item {
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 10px;
            transition: transform 0.12s ease, box-shadow 0.12s ease;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.05);
        }
        .card-grid .item:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
        }
        .card-grid img { border-radius: 10px; }
        .order-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #fff;
            border-radius: 999px;
            padding: 4px 10px;
            font-size: 12px;
            font-weight: 600;
        }
        .thumb-wrap {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            background: #f8fafc;
        }
        .thumb-wrap img {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 10px;
            mix-blend-mode: normal;
            opacity: 1;
        }
        .section-header small {
            color: #94a3b8;
        }
        .btn-delete-carousel {
            background: linear-gradient(135deg, #9333ea 0%, #7c3aed 100%);
            border-color: #7c3aed;
            color: #fff;
            box-shadow: 0 8px 18px rgba(124, 58, 237, 0.25);
        }
        .btn-delete-carousel:hover {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            border-color: #6d28d9;
            color: #fff;
            box-shadow: 0 10px 22px rgba(109, 40, 217, 0.3);
        }
        .btn-upload-banner {
            background: linear-gradient(135deg, #10b981 0%, #0ea5e9 100%);
            border: none;
            color: #fff;
            box-shadow: 0 10px 24px rgba(14, 165, 233, 0.25);
        }
        .btn-upload-banner:hover {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            color: #fff;
            box-shadow: 0 12px 26px rgba(2, 132, 199, 0.3);
        }
        .bg-gradient-success {
            background: linear-gradient(135deg, #10b981 0%, #22c55e 100%) !important;
        }
        .bg-gradient-danger {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
        }
        .btn-modal-delete {
            background: linear-gradient(135deg, #9333ea 0%, #7c3aed 100%);
            border-color: #7c3aed;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-12 col-md-3 col-lg-2 sidebar px-0">
                <?php include 'components/sidebar.php'; ?>
            </aside>
            <main class="main-content col-12 col-md-9 col-lg-10 px-4 py-4">
                <div class="hero mb-4 d-flex align-items-start justify-content-between gap-3 flex-wrap">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="fs-4"><i class="bi bi-images"></i></span>
                            <h1 class="h5 mb-0 text-white">Carousel Manager</h1>
                        </div>
                        <p class="mb-0">Upload and manage homepage banners.</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="stat-chip"><i class="bi bi-collection"></i><?php echo count($carouselItems); ?> banners</span>
                        <span class="stat-chip"><i class="bi bi-cloud-upload"></i>5MB max</span>
                        <span class="stat-chip"><i class="bi bi-aspect-ratio"></i>16:9 recommended</span>
                    </div>
                </div>

                <div class="panel p-4 mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="text-success fs-4"><i class="bi bi-upload"></i></span>
                        <div>
                            <h1 class="h5 mb-0">Upload New Banner Image</h1>
                            <small class="muted">Add a new image to the homepage carousel.</small>
                        </div>
                    </div>
                    <form method="POST" action="../../backend/create/createCarousel.php" enctype="multipart/form-data">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-lg-6">
                                <label class="form-label" for="carouselTitle">Banner Title</label>
                                <input type="text" class="form-control form-control-lg" id="carouselTitle" name="title" placeholder="e.g. Workshop" required>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label" for="carouselImage">Select Banner Image</label>
                                <input type="file" class="form-control form-control-lg" id="carouselImage" name="image" accept="image/*" required>
                                <small class="muted d-block mt-2">Supported: JPEG, JPG, PNG. Max size: 5MB.</small>
                            </div>
                            <div class="col-12 col-lg-6 d-grid mt-3 mt-lg-4">
                                <button type="submit" class="btn btn-upload-banner btn-lg">
                                    <i class="bi bi-upload me-2"></i>Upload Banner
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="panel p-4">
                    <div class="d-flex align-items-center justify-content-between mb-2 flex-wrap gap-2 section-header">
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-primary fs-5"><i class="bi bi-grid-3x3-gap"></i></span>
                            <div>
                                <h2 class="h6 mb-0">Current Banners</h2>
                                <small>Sorted by newest first</small>
                            </div>
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
                                        <div class="ratio ratio-16x9 mb-2 thumb-wrap" style="background:#f8fafc;">
                                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="w-100 h-100" style="object-fit: cover;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold mb-1"><?php echo htmlspecialchars($item['title'] ?: 'Untitled'); ?></div>
                                            <div class="muted small">ID: <?php echo (int) $item['id']; ?></div>
                                        </div>
                                        <div class="mt-3">
                                            <button type="button"
                                                    class="btn btn-danger btn-sm w-100 d-flex align-items-center justify-content-center gap-2 btn-delete-carousel"
                                                    data-id="<?php echo (int) $item['id']; ?>"
                                                    data-title="<?php echo htmlspecialchars($item['title'] ?: 'Untitled'); ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteCarouselModal">
                                                <i class="bi bi-trash"></i><span>Delete</span>
                                            </button>
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
    <div class="modal fade" id="deleteCarouselModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: none; overflow: hidden;">
                <div class="modal-header bg-gradient-danger text-white">
                    <h5 class="modal-title mb-0">Delete Banner</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete this banner?</p>
                    <small class="text-muted" id="deleteCarouselTitle"></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="../../backend/delete/deleteCarousel.php" id="deleteCarouselForm" class="m-0">
                        <input type="hidden" name="id" id="deleteCarouselId" value="">
        <button type="submit" class="btn btn-modal-delete">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php if ($modal): ?>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Modal data:', <?php echo json_encode($modal); ?>);
                // Create and show alert
                const alertHtml = `
                    <div class="alert alert-${modal['type']} alert-dismissible fade show position-fixed" style="bottom: 10px; left: 50%; transform: translateX(-50%); z-index: 1050; min-width: 300px;" role="alert">
                        <strong><?php echo htmlspecialchars($modal['title']); ?>:</strong> <?php echo htmlspecialchars($modal['body']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                console.log('Alert HTML:', alertHtml);
                document.body.insertAdjacentHTML('beforeend', alertHtml);
                console.log('Alert appended to body');

                // Auto-hide after 3 seconds
                setTimeout(function() {
                    const alert = document.querySelector('.alert');
                    if (alert) {
                        console.log('Closing alert');
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    }
                }, 3000);
            });
        <?php endif; ?>

        // Handle delete button clicks
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete-carousel');
            const deleteIdInput = document.getElementById('deleteCarouselId');
            const deleteTitle = document.getElementById('deleteCarouselTitle');

            if (deleteButtons.length && deleteIdInput && deleteTitle) {
                deleteButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const id = btn.dataset.id;
                        const title = btn.dataset.title;
                        console.log('Delete button clicked:', { id, title });
                        deleteIdInput.value = id || '';
                        if (deleteTitle) {
                            deleteTitle.textContent = title ? `"${title}"` : '';
                        }
                        console.log('Form input value:', deleteIdInput.value);
                    });
                });
            }
        });
    </script>
</body>
</html>
