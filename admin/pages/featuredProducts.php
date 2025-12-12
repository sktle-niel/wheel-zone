<?php
// Admin featured products management page.
session_start();
require_once '../../connection/connection.php';

$status = $_GET['status'] ?? '';
$modal = null;

if ($status === 'success') {
    $modal = [
        'title' => 'Success',
        'body' => 'Featured product added successfully.',
        'type' => 'success',
    ];
} elseif ($status === 'update_success') {
    $modal = [
        'title' => 'Success',
        'body' => 'Featured product updated successfully.',
        'type' => 'success',
    ];
} elseif ($status === 'invalid') {
    $modal = [
        'title' => 'Error',
        'body' => 'Invalid input data. Please check your entries.',
        'type' => 'danger',
    ];
} elseif ($status === 'delete_success') {
    $modal = [
        'title' => 'Success',
        'body' => 'Featured product deleted successfully.',
        'type' => 'success',
    ];
} elseif (in_array($status, ['delete_invalid', 'delete_not_found', 'delete_db_error'], true)) {
    $modal = [
        'title' => 'Error',
        'body' => 'Delete failed. Please try again.',
        'type' => 'danger',
    ];
} elseif (in_array($status, ['upload_error', 'type_error', 'size_error', 'path_error', 'db_prepare_error', 'db_error', 'update_error'], true)) {
    $modal = [
        'title' => 'Error',
        'body' => 'Failed to process featured product. Please try again.',
        'type' => 'danger',
    ];
}

$featuredProducts = [];

$sql = 'SELECT id, name, image_path
        FROM featured_products
        ORDER BY id DESC';

try {
    $result = $conn->query($sql);
    if ($result) {
        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $featuredProducts[] = [
                'id' => (int) $row['id'],
                'name' => $row['name'],
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
    <title>Featured Products - Two Wheels Zone Admin</title>
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
        .btn-upload-product {
            background: linear-gradient(135deg, #10b981 0%, #0ea5e9 100%);
            border: none;
            color: #fff;
            box-shadow: 0 10px 24px rgba(14, 165, 233, 0.25);
        }
        .btn-upload-product:hover {
            background: linear-gradient(135deg, #0ea5e9 0%, #0284c7 100%);
            color: #fff;
            box-shadow: 0 12px 26px rgba(2, 132, 199, 0.3);
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
                            <span class="fs-4"><i class="bi bi-box-seam"></i></span>
                            <h1 class="h5 mb-0 text-white">Featured Products Manager</h1>
                        </div>
                        <p class="mb-0">Upload, reorder, and manage homepage featured products.</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="stat-chip"><i class="bi bi-collection"></i><?php echo count($featuredProducts); ?> products</span>
                        <span class="stat-chip"><i class="bi bi-cloud-upload"></i>5MB max</span>
                        <span class="stat-chip"><i class="bi bi-aspect-ratio"></i>1:1 recommended</span>
                    </div>
                </div>

                <?php if ($modal): ?>
                    <div class="alert alert-<?php echo htmlspecialchars($modal['type']); ?> alert-dismissible fade show mb-4" role="alert">
                        <strong><?php echo htmlspecialchars($modal['title']); ?>:</strong> <?php echo htmlspecialchars($modal['body']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="panel p-4 mb-4">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="text-success fs-4"><i class="bi bi-box-seam"></i></span>
                        <div>
                            <h1 class="h5 mb-0">Add Featured Product</h1>
                            <small class="muted">Upload an image and set product details.</small>
                        </div>
                    </div>
                    <form method="POST" action="../../backend/create/createFeaturedProducts.php" enctype="multipart/form-data">
                        <div class="row g-3 align-items-center">
                            <div class="col-12 col-lg-6">
                                <label class="form-label" for="fpName">Product Name</label>
                                <input type="text" class="form-control form-control-lg" id="fpName" name="name" placeholder="Product name" required>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label" for="fpImage">Product Image</label>
                                <input type="file" class="form-control form-control-lg" id="fpImage" name="image" accept="image/*" required>
                                <small class="muted d-block mt-2">Supported: JPEG, JPG, PNG. Max size: 5MB.</small>
                            </div>
                            <div class="col-12 col-lg-6 d-grid mt-3 mt-lg-4">
                                <button type="submit" class="btn btn-upload-product btn-lg">
                                    <i class="bi bi-upload me-2"></i>Add Product
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
                                <h2 class="h6 mb-0">Current Featured Products</h2>
                                <small>Sorted by ID</small>
                            </div>
                        </div>
                        <span class="badge text-bg-dark px-3 py-2"><?php echo count($featuredProducts); ?></span>
                    </div>
                    <?php if (empty($featuredProducts)): ?>
                        <div class="text-center text-muted py-4">No featured products yet.</div>
                    <?php else: ?>
                        <div class="row g-3 card-grid">
                            <?php foreach ($featuredProducts as $product): ?>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="item h-100 d-flex flex-column">
                                        <div class="ratio ratio-1x1 mb-2 thumb-wrap" style="background:#f8fafc;">
                                            <img src="<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="w-100 h-100" style="object-fit: cover;">
                                        </div>
                                        <div class="flex-grow-1">
                                            <div class="fw-semibold mb-1"><?php echo htmlspecialchars($product['name'] ?: 'Untitled'); ?></div>
                                            <div class="muted small">ID: <?php echo (int) $product['id']; ?></div>
                                        </div>
                                        <div class="mt-3 d-flex gap-2">
                                            <button type="button"
                                                    class="btn btn-outline-secondary btn-sm w-100 btn-edit-featured"
                                                    data-id="<?php echo (int) $product['id']; ?>"
                                                    data-name="<?php echo htmlspecialchars($product['name']); ?>"
                                                    data-image="<?php echo htmlspecialchars($product['image']); ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editFeaturedModal">
                                                Edit
                                            </button>
                                            <button type="button"
                                                    class="btn btn-outline-danger btn-sm w-100 btn-delete-featured"
                                                    data-id="<?php echo (int) $product['id']; ?>"
                                                    data-name="<?php echo htmlspecialchars($product['name']); ?>"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#deleteFeaturedModal">
                                                Delete
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

    <!-- Edit Featured Product Modal -->
    <div class="modal fade" id="editFeaturedModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content" style="border: none; overflow: hidden;">
                <div class="modal-header bg-gradient-success text-white">
                    <h5 class="modal-title mb-0">
                        <i class="bi bi-pencil-square me-2"></i>Edit Featured Product
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="../../backend/update/updateFeaturedProducts.php">
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <div class="ratio ratio-1x1 mb-2 thumb-wrap mx-auto" style="max-width: 150px; background:#f8fafc;">
                                        <img id="editFpImage" src="" alt="Product Image" class="w-100 h-100" style="object-fit: cover;">
                                    </div>
                                    <small class="text-muted">Current Image</small>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" for="editFpName">
                                        <i class="bi bi-tag me-1"></i>Product Name
                                    </label>
                                    <input type="text" class="form-control form-control-lg" id="editFpName" name="name" placeholder="Enter product name" required>
                                    <div class="form-text">Only the product name can be edited.</div>
                                </div>
                                <input type="hidden" id="editFpId" name="id" value="">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle me-1"></i>Cancel
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-circle me-1"></i>Update Product
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Featured Product Modal -->
    <div class="modal fade" id="deleteFeaturedModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: none; overflow: hidden;">
                <div class="modal-header bg-gradient-danger text-white">
                    <h5 class="modal-title mb-0">Delete Featured Product</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete this featured product?</p>
                    <small class="text-muted" id="deleteFeaturedName"></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="../../backend/delete/deleteFeaturedProducts.php" id="deleteFeaturedForm" class="m-0">
                        <input type="hidden" name="id" id="deleteFeaturedId" value="">
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
                // Create and show alert
                const alertHtml = `
                    <div class="alert alert-${modal['type']} alert-dismissible fade show position-fixed" style="top: 10px; left: 50%; transform: translateX(-50%); z-index: 1050; min-width: 300px;" role="alert">
                        <strong><?php echo htmlspecialchars($modal['title']); ?>:</strong> <?php echo htmlspecialchars($modal['body']); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                document.body.insertAdjacentHTML('beforeend', alertHtml);

                // Auto-hide after 3 seconds
                setTimeout(function() {
                    const alert = document.querySelector('.alert');
                    if (alert) {
                        const bsAlert = new bootstrap.Alert(alert);
                        bsAlert.close();
                    }
                }, 3000);
            });
        <?php endif; ?>

        // Handle edit button clicks
        document.addEventListener('DOMContentLoaded', function() {
            const editButtons = document.querySelectorAll('.btn-edit-featured');

            editButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const image = this.getAttribute('data-image');

                    // Populate modal fields
                    document.getElementById('editFpId').value = id;
                    document.getElementById('editFpName').value = name;
                    document.getElementById('editFpImage').src = image;
                });
            });
        });

        // Handle delete button clicks
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete-featured');
            const deleteIdInput = document.getElementById('deleteFeaturedId');
            const deleteName = document.getElementById('deleteFeaturedName');

            if (deleteButtons.length && deleteIdInput && deleteName) {
                deleteButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const id = btn.dataset.id;
                        const name = btn.dataset.name;
                        console.log('Delete button clicked:', { id, name });
                        deleteIdInput.value = id || '';
                        if (deleteName) {
                            deleteName.textContent = name ? `"${name}"` : '';
                        }
                        console.log('Form input value:', deleteIdInput.value);
                    });
                });
            }
        });
    </script>
</body>
</html>

