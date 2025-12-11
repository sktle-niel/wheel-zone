<?php
// Admin branches management page.
session_start();
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
        body { background: #ffffff; min-height: 100vh; color: #0f172a; }
        .sidebar { min-height: 100vh; position: sticky; top: 0; }
        .main-content { min-height: 100vh; overflow-y: auto; }
        .panel {
            background: #fff;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
        }
        .muted { color: #6b7280; }
        .btn-outline-secondary, .btn-outline-danger {
            border-color: #e5e7eb;
            color: #111827;
            padding: 0.4rem 0.7rem;
            line-height: 1.1;
        }
        .btn-outline-danger { color: #b91c1c; }
        .btn-compact { padding: 0.45rem 0.8rem; line-height: 1.1; }
        .card-grid .item {
            border: 1px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px;
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
                <div class="panel p-3 mb-3">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <span class="text-success fs-4"><i class="bi bi-geo-alt"></i></span>
                        <div>
                            <h1 class="h5 mb-0">Add Branch</h1>
                            <small class="muted">Enter branch details shown on the public branches page.</small>
                        </div>
                    </div>
                    <form method="POST" action="#" enctype="multipart/form-data">
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
                            <div class="col-md-6">
                                <label class="form-label" for="branchOrder">Order</label>
                                <input type="number" class="form-control" id="branchOrder" name="order" min="1" value="1">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="branchImage">Branch Image (optional)</label>
                                <input type="file" class="form-control" id="branchImage" name="image" accept="image/*">
                            </div>
                            <div class="col-12 col-lg-3 d-grid mt-2">
                                <button type="submit" class="btn btn-success btn-compact">
                                    <i class="bi bi-upload me-2"></i>Add Branch
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php
                // Placeholder data; replace with DB/storage results.
                $branches = [
                    [
                        'name' => 'Sicsican Branch',
                        'address' => 'QPW8+5JF, Puerto Princesa South Road, Puerto Princesa City, Palawan',
                        'maps' => 'https://www.google.com/maps/place/Two+Wheels+Zone/@9.7714938,118.7093693,14z/data=!4m10!1m2!2m1!1sTwo+Wheels+Zone+sicsican!3m6!1s0x33b562e0f9f3c525:0x6871ef1f501af47!8m2!3d9.7954403!4d118.7165457!15sChhUd28gV2hlZWxzIFpvbmUgc2ljc2ljYW6SARBhdXRvX3BhcnRzX3N0b3Jl4AEA!16s%2Fg%2F11xrw4l_sq?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D',
                        'facebook' => 'https://web.facebook.com/TwoWheelsZone',
                        'hours' => 'Mon-Sat: 7:00AM-9:00PM',
                        'services' => 'Full motorcycle repair, parts, accessories',
                        'order' => 1,
                    ],
                    [
                        'name' => 'Malvar Road Branch',
                        'address' => '329 Malvar Road, Puerto Princesa City, 5300 Palawan',
                        'maps' => 'https://www.google.com/maps/place/Two+Wheels+Zone/@9.7474692,118.7408171,17z/data=!3m1!4b1!4m6!3m5!1s0x33b563eb61d65407:0xeb029b393a73ae04!8m2!3d9.7474639!4d118.743392!16s%2Fg%2F11qh58crq0?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D',
                        'facebook' => 'https://web.facebook.com/TwoWheelsZone',
                        'hours' => 'Mon-Sat: 7:00AM-9:00PM',
                        'services' => 'Motorcycle maintenance, customization',
                        'order' => 2,
                    ],
                    [
                        'name' => 'Elnido Branch',
                        'address' => 'Sitio Nasigdan Brgy. Villa Libertad Elnido, PUERTO PRINCESA, 5300 Palawan',
                        'maps' => 'https://www.google.com/maps/place/Two+Wheels+Zone+Elnido+Branch/@11.1849735,119.4026727,17z/data=!3m1!4b1!4m6!3m5!1s0x33b655b59689923b:0xbd05adb45cb27eb5!8m2!3d11.1849682!4d119.4052476!16s%2Fg%2F11trrczjpl?entry=ttu&g_ep=EgoyMDI1MTIwMi4wIKXMDSoASAFQAw%3D%3D',
                        'facebook' => 'https://web.facebook.com/TwoWheelsZone',
                        'hours' => 'Mon-Sat: 7:00AM-9:00PM',
                        'services' => 'Emergency repairs, tire services',
                        'order' => 3,
                    ],
                    [
                        'name' => 'Roxas Branch',
                        'address' => 'Roxas, Palawan',
                        'maps' => '#',
                        'facebook' => 'https://web.facebook.com/TwoWheelsZone',
                        'hours' => 'Mon-Sat: 7:00AM-9:00PM',
                        'services' => 'Motorcycle repair, parts, accessories',
                        'order' => 4,
                    ],
                    [
                        'name' => 'Taytay Branch',
                        'address' => 'Taytay, Palawan',
                        'maps' => '#',
                        'facebook' => 'https://web.facebook.com/TwoWheelsZone',
                        'hours' => 'Mon-Sat: 7:00AM-9:00PM',
                        'services' => 'Motorcycle repair, parts, accessories',
                        'order' => 5,
                    ],
                ];
                ?>
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
                                        <div class="muted small mb-2">Order: <?php echo (int) $branch['order']; ?></div>
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

