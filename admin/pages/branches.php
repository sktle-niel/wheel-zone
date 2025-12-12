<?php
// Admin branches management page.
session_start();

$status = $_GET['status'] ?? '';
$modal = null;

if ($status === 'success') {
    $modal = [
        'title' => 'Success',
        'body' => 'Branch added successfully.',
        'type' => 'success',
    ];
} elseif ($status === 'update_success') {
    $modal = [
        'title' => 'Success',
        'body' => 'Branch updated successfully.',
        'type' => 'success',
    ];
} elseif ($status === 'delete_success') {
    $modal = [
        'title' => 'Success',
        'body' => 'Branch deleted successfully.',
        'type' => 'success',
    ];
} elseif ($status === 'invalid') {
    $modal = [
        'title' => 'Error',
        'body' => 'Invalid input data. Please check your entries.',
        'type' => 'danger',
    ];
} elseif (in_array($status, ['delete_invalid', 'delete_not_found', 'delete_db_error'], true)) {
    $modal = [
        'title' => 'Error',
        'body' => 'Delete failed. Please try again.',
        'type' => 'danger',
    ];
} elseif (in_array($status, ['upload_error', 'type_error', 'size_error', 'path_error', 'save_error', 'db_prepare_error', 'db_error', 'update_error'], true)) {
    $modal = [
        'title' => 'Error',
        'body' => 'Failed to process branch. Please try again.',
        'type' => 'danger',
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Branches - Two Wheels Zone Admin</title>
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
        .section-header small {
            color: #94a3b8;
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
        .btn-edit-branch {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            border-color: #d97706;
            color: #fff;
            box-shadow: 0 8px 18px rgba(217, 119, 6, 0.25);
        }
        .btn-edit-branch:hover {
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
            border-color: #b45309;
            color: #fff;
            box-shadow: 0 10px 22px rgba(180, 83, 9, 0.3);
        }
        .btn-delete-branch {
            background: linear-gradient(135deg, #9333ea 0%, #7c3aed 100%);
            border-color: #7c3aed;
            color: #fff;
            box-shadow: 0 8px 18px rgba(124, 58, 237, 0.25);
        }
        .btn-delete-branch:hover {
            background: linear-gradient(135deg, #7c3aed 0%, #6d28d9 100%);
            border-color: #6d28d9;
            color: #fff;
            box-shadow: 0 10px 22px rgba(109, 40, 217, 0.3);
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
                <?php
                // Fetch branches from database
                $branches = [];
                require_once '../../connection/connection.php';

                $sql = 'SELECT id, name, address, maps, facebook, hours, services, created_at, updated_at
                        FROM branches
                        ORDER BY id DESC';

                try {
                    $result = $conn->query($sql);
                    if ($result) {
                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                            $branches[] = [
                                'id' => (int) $row['id'],
                                'name' => $row['name'],
                                'address' => $row['address'],
                                'maps' => $row['maps'],
                                'facebook' => $row['facebook'],
                                'hours' => $row['hours'],
                                'services' => $row['services'],
                                'created_at' => $row['created_at'],
                                'updated_at' => $row['updated_at'],
                            ];
                        }
                    }
                } catch (PDOException $e) {
                    error_log('Query failed: ' . $e->getMessage());
                }
                ?>
                <div class="hero mb-4 d-flex align-items-start justify-content-between gap-3 flex-wrap">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="fs-4"><i class="bi bi-geo-alt"></i></span>
                            <h1 class="h5 mb-0 text-white">Branches Manager</h1>
                        </div>
                        <p class="mb-0">Manage your branch locations.</p>
                    </div>
                    <div class="d-flex align-items-center gap-2 flex-wrap">
                        <span class="stat-chip"><i class="bi bi-geo-alt-fill"></i><?php echo count($branches); ?> branches</span>
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
                        <span class="text-success fs-4"><i class="bi bi-geo-alt"></i></span>
                        <div>
                            <h1 class="h5 mb-0">Add Branch</h1>
                            <small class="muted">Enter branch details shown on the public branches page.</small>
                        </div>
                    </div>
                    <form method="POST" action="../../backend/create/createBranch.php" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label" for="branchName">Branch Name</label>
                                <input type="text" class="form-control" id="branchName" name="name" placeholder="e.g. Sicsican Branch" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="branchHours">Hours</label>
                                <input type="text" class="form-control" id="branchHours" name="hours" placeholder="Mon-Sat: 7:00AM-9:00PM">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="branchAddress">Address</label>
                                <input type="text" class="form-control" id="branchAddress" name="address" placeholder="Full address" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="branchMaps">Google Maps Link</label>
                                <input type="url" class="form-control" id="branchMaps" name="maps" placeholder="https://maps.google.com/..." >
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="branchFacebook">Facebook Link</label>
                                <input type="url" class="form-control" id="branchFacebook" name="facebook" placeholder="https://facebook.com/...">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="branchServices">Services</label>
                                <textarea class="form-control" id="branchServices" name="services" rows="2" placeholder="Full motorcycle repair, parts, accessories"></textarea>
                            </div>

                            <div class="col-12 col-lg-3 d-grid mt-2">
                                <button type="submit" class="btn btn-upload-banner btn-compact">
                                    <i class="bi bi-upload me-2"></i>Add Branch
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="panel p-3">
                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-primary fs-5"><i class="bi bi-list-ul"></i></span>
                            <h2 class="h6 mb-0">Current Branches</h2>
                        </div>
                        <span class="badge text-bg-dark px-3 py-2"><?php echo count($branches); ?></span>
                    </div>
                    <?php if (empty($branches)): ?>
                        <div class="text-center text-muted py-4">No branches yet.</div>
                    <?php else: ?>
                        <div class="row g-3 card-grid">
                            <?php foreach ($branches as $branch): ?>
                                <div class="col-sm-6 col-lg-4">
                                    <div class="item h-100 d-flex flex-column">
                                        <div class="fw-semibold mb-1"><?php echo htmlspecialchars($branch['name']); ?></div>
                                        <div class="small mb-2"><?php echo htmlspecialchars($branch['address']); ?></div>
                                        <?php if (!empty($branch['maps'])): ?>
                                            <div class="small mb-1">
                                                <i class="bi bi-map me-1"></i>
                                                <a href="<?php echo htmlspecialchars($branch['maps']); ?>" class="text-decoration-none" target="_blank">Google Maps</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($branch['facebook'])): ?>
                                            <div class="small mb-1">
                                                <i class="bi bi-facebook me-1"></i>
                                                <a href="<?php echo htmlspecialchars($branch['facebook']); ?>" class="text-decoration-none" target="_blank">Facebook</a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if (!empty($branch['hours'])): ?>
                                            <div class="small mb-1"><i class="bi bi-clock me-1"></i><?php echo htmlspecialchars($branch['hours']); ?></div>
                                        <?php endif; ?>
                                        <?php if (!empty($branch['services'])): ?>
                                            <div class="small muted mb-2"><?php echo htmlspecialchars($branch['services']); ?></div>
                                        <?php endif; ?>
                                        <div class="mt-auto d-flex gap-2">
                                            <button type="button" class="btn btn-edit-branch btn-sm w-100" onclick="editBranch(<?php echo $branch['id']; ?>, '<?php echo addslashes($branch['name']); ?>', '<?php echo addslashes($branch['address']); ?>', '<?php echo addslashes($branch['maps']); ?>', '<?php echo addslashes($branch['facebook']); ?>', '<?php echo addslashes($branch['hours']); ?>', '<?php echo addslashes($branch['services']); ?>')">Edit</button>
                                            <button type="button" class="btn btn-outline-danger btn-sm w-100 btn-delete-branch" data-id="<?php echo $branch['id']; ?>" data-name="<?php echo htmlspecialchars($branch['name']); ?>" data-bs-toggle="modal" data-bs-target="#deleteBranchModal">Delete</button>
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
    <!-- Edit Branch Modal -->
    <div class="modal fade" id="editBranchModal" tabindex="-1" aria-labelledby="editBranchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editBranchModalLabel">Edit Branch</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="../../backend/update/updateBranch.php" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" id="editBranchId" name="id">
                        <div class="row g-2">
                            <div class="col-md-6">
                                <label class="form-label" for="editBranchName">Branch Name</label>
                                <input type="text" class="form-control" id="editBranchName" name="name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="editBranchHours">Hours</label>
                                <input type="text" class="form-control" id="editBranchHours" name="hours">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="editBranchAddress">Address</label>
                                <input type="text" class="form-control" id="editBranchAddress" name="address" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="editBranchMaps">Google Maps Link</label>
                                <input type="url" class="form-control" id="editBranchMaps" name="maps">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="editBranchFacebook">Facebook Link</label>
                                <input type="url" class="form-control" id="editBranchFacebook" name="facebook">
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="editBranchServices">Services</label>
                                <textarea class="form-control" id="editBranchServices" name="services" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-edit-branch">Update Branch</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Branch Modal -->
    <div class="modal fade" id="deleteBranchModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border: none; overflow: hidden;">
                <div class="modal-header bg-gradient-danger text-white">
                    <h5 class="modal-title mb-0">Delete Branch</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-0">Are you sure you want to delete this branch?</p>
                    <small class="text-muted" id="deleteBranchName"></small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form method="POST" action="../../backend/delete/deleteBranch.php" id="deleteBranchForm" class="m-0">
                        <input type="hidden" name="id" id="deleteBranchId" value="">
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

        function editBranch(id, name, address, maps, facebook, hours, services) {
            document.getElementById('editBranchId').value = id;
            document.getElementById('editBranchName').value = name;
            document.getElementById('editBranchAddress').value = address;
            document.getElementById('editBranchMaps').value = maps;
            document.getElementById('editBranchFacebook').value = facebook;
            document.getElementById('editBranchHours').value = hours;
            document.getElementById('editBranchServices').value = services;

            const modal = new bootstrap.Modal(document.getElementById('editBranchModal'));
            modal.show();
        }

        // Handle delete button clicks
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete-branch');
            const deleteIdInput = document.getElementById('deleteBranchId');
            const deleteName = document.getElementById('deleteBranchName');

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

