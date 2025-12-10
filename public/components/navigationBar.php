
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/navigationBar.css">
<nav id="navbar" class="navbar navbar-expand-md navbar-light sticky-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="./home.php"><img src="../assets/branding/lucent.png" alt="Moto Brand Logo" height="90"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" style="outline: none !important; border: none !important;" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-label="Close"></button>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" style="font-size: 1.1rem; color: #2c3e50 !important;" href="./home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size: 1.1rem; color: #2c3e50 !important;" href="./aboutUs.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size: 1.1rem; color: #2c3e50 !important;" href="./franchiseUs.php">Franchise Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size: 1.1rem; color: #2c3e50 !important;" href="./contactUs.php">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size: 1.1rem; color: #2c3e50 !important;" href="./branches.php">Located Branch</a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        const navbar = document.getElementById('navbar');
        const toggler = document.querySelector('.navbar-toggler');

        // Change background on scroll
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > 0) {
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.9)'; // More opaque on scroll
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
            } else {
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.75)'; // Original glassy
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.05)';
            }
        });

        // Toggle animation for hamburger
        toggler.addEventListener('click', function() {
            this.classList.toggle('open');
        });

        // Prevent body scroll when navbar is open on mobile
        const collapseElement = document.getElementById('navbarSupportedContent');
        let scrollPosition = 0;
        let navbarPlaceholder = null;
        collapseElement.addEventListener('show.bs.collapse', function () {
            scrollPosition = window.pageYOffset;
            document.documentElement.style.overflow = 'hidden';
            document.documentElement.style.position = 'fixed';
            document.documentElement.style.top = `-${scrollPosition}px`;
            document.documentElement.style.width = '100%';
            // Prevent touch scrolling on the body when navbar is open
            document.body.addEventListener('touchmove', preventBodyScroll, { passive: false });
            // Make navbar fixed when collapse is open on mobile
            if (window.innerWidth <= 767) {
                navbar.classList.remove('sticky-top');
                navbar.style.position = 'fixed';
                navbar.style.top = '0';
                navbar.style.left = '0';
                navbar.style.width = '100%';
                navbar.style.zIndex = '1051';
                // Create a placeholder to prevent content shift
                navbarPlaceholder = document.createElement('div');
                navbarPlaceholder.style.height = navbar.offsetHeight + 'px';
                navbar.parentNode.insertBefore(navbarPlaceholder, navbar);
            }
        });
        collapseElement.addEventListener('hide.bs.collapse', function () {
            document.documentElement.style.overflow = 'auto';
            document.documentElement.style.position = '';
            document.documentElement.style.top = '';
            document.documentElement.style.width = '';
            window.scrollTo(0, scrollPosition);
            // Remove the touchmove listener
            document.body.removeEventListener('touchmove', preventBodyScroll, { passive: false });
            // Reset navbar position
            navbar.classList.add('sticky-top');
            navbar.style.position = '';
            navbar.style.top = '';
            navbar.style.left = '';
            navbar.style.width = '';
            navbar.style.zIndex = '';
            // Remove placeholder
            if (navbarPlaceholder) {
                navbarPlaceholder.remove();
                navbarPlaceholder = null;
            }
        });

        function preventBodyScroll(e) {
            e.preventDefault();
        }
    </script>
</nav>


