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
            border-radius: 12px;
        }
        .panel h5 { font-weight: 600; }
        .muted { color: #64748b; }
        .table > :not(caption) > * > * { background-color: transparent; }
        .btn-outline-secondary, .btn-outline-danger { border-color: #e2e8f0; }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <aside class="col-12 col-md-3 col-lg-2 sidebar px-0">
                <?php include 'components/sidebar.php'; ?>
            </aside>
            <main class="main-content col-12 col-md-9 col-lg-10 px-4 py-4">
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div>
                        <h1 class="h4 mb-0">Carousel Manager</h1>
                        <small class="text-muted">Add or delete carousel images shown on the homepage.</small>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-lg-4">
                        <div class="panel p-3">
                            <h5 class="mb-3">Add Image</h5>
                            <form method="POST" action="#" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label" for="carouselTitle">Title (optional)</label>
                                    <input type="text" class="form-control" id="carouselTitle" name="title" placeholder="Workshop highlight">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="carouselImage">Upload image</label>
                                    <input type="file" class="form-control" id="carouselImage" name="image" accept="image/*" required>
                                    <small class="text-muted">Recommended 1920x600 JPG/PNG.</small>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="carouselOrder">Order</label>
                                    <input type="number" class="form-control" id="carouselOrder" name="order" min="1" value="1" required>
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-dark">Add Image</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel p-3">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Existing Images</h5>
                                <small class="text-muted">Click delete to remove a slide.</small>
                            </div>
                            <?php
                            // Placeholder data; replace with DB/storage results.
                            $carouselItems = [
                                ['id' => 1, 'title' => 'Workshop', 'image' => '../../assets/carousel/w1.jpg', 'order' => 1],
                                ['id' => 2, 'title' => 'Workshop 1', 'image' => '../../assets/carousel/w2.jpg', 'order' => 2],
                                ['id' => 3, 'title' => 'Workshop 3', 'image' => '../../assets/carousel/w3.jpg', 'order' => 3],
                            ];
                            ?>
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width: 140px;">Preview</th>
                                            <th>Title</th>
                                            <th style="width: 80px;">Order</th>
                                            <th class="text-end" style="width: 120px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($carouselItems)): ?>
                                            <tr>
                                                <td colspan="4" class="text-center text-muted py-4">No images yet.</td>
                                            </tr>
                                        <?php else: ?>
                                            <?php foreach ($carouselItems as $item): ?>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" class="img-fluid rounded" style="height: 70px; object-fit: cover;">
                                                    </td>
                                                    <td><?php echo htmlspecialchars($item['title'] ?: 'Untitled'); ?></td>
                                                    <td><?php echo (int) $item['order']; ?></td>
                                                    <td class="text-end">
                                                        <div class="btn-group btn-group-sm" role="group">
                                                            <button type="button" class="btn btn-outline-secondary">Edit</button>
                                                            <button type="button" class="btn btn-outline-danger">Delete</button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

