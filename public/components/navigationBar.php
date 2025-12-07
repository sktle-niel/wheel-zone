
<nav id="navbar" class="navbar navbar-expand-md navbar-light sticky-top" style="background-color: rgba(255, 255, 255, 0.1); backdrop-filter: blur(3px); transition: all 0.3s ease; border-bottom: none;">
    <div class="container-fluid">
        <a class="navbar-brand" href="./home.php"><img src="../assets/branding/lucent.png" alt="Moto Brand Logo" height="90"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 m-3" style="outline: none !important; border: none !important;" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-label="Close"></button>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" style="font-size: large; color: #ffffff !important;" href="./aboutUs.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size: large; color: #ffffff !important;" href="#franchise-us">Franchise Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size: large; color: #ffffff !important;" href="#contact-us">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" style="font-size: large; color: #ffffff !important;" href="#located-branch">Located Branch</a>
                </li>
            </ul>
        </div>
    </div>
    <style>
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        @media (max-width: 767px) {
            .navbar-toggler {
                animation: pulse 2s infinite;
                outline: none !important;
                transition: transform 0.3s ease;
            }
            .navbar-toggler.open {
                transform: rotate(90deg);
            }
            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='%2341CE34' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
                transition: transform 0.3s ease;
            }
            .navbar-toggler.open .navbar-toggler-icon {
                transform: rotate(180deg);
            }
            .navbar-collapse {
                position: fixed;
                top: 0;
                right: 0;
                width: 68%;
                height: 100vh;
                background-color: rgba(0, 0, 0, 1);
                transform: translateX(100%);
                transition: transform 0.3s ease;
                z-index: 1050;
            }
            .navbar-collapse.show {
                transform: translateX(0);
            }
            .navbar-nav {
                flex-direction: column;
                padding-top: 50px;
            }
            .nav-item {
                margin: 10px 0;
                margin-left: 15px;
            }
            .nav-link {
                border-bottom: 1px solid #41CE34 !important;
                padding-bottom: 5px;
            }
        }
        @media (max-width: 390px) {
            .navbar-brand img {
                height: 50px !important;
            }
            .nav-link {
                font-size: small !important;
            }
            .navbar-collapse {
                width: 85%;
            }
            .nav-item {
                margin-left: 10px;
            }
        }
        @media (max-width: 360px) {
            .navbar-brand img {
                height: 45px !important;
            }
            .nav-link {
                font-size: x-small !important;
            }
            .navbar-collapse {
                width: 90%;
            }
        }
        @media (min-width: 768px) {
            .btn-close {
                display: none !important;
            }
            .container-fluid {
                display: flex;
                justify-content: center !important;
                align-items: center !important;
            }
            .navbar-brand {
                margin-right: 2rem;
            }
            .navbar-collapse {
                flex: none;
            }
            .nav-link {
                position: relative;
                transition: all 0.3s ease;
            }
            .nav-link::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 0;
                height: 4px;
                background-color: #41CE34;
                transition: width 0.3s ease;
            }
            .nav-link:hover::after {
                width: 100%;
            }
        }
    </style>
    <script>
        let lastScrollTop = 0;
        const navbar = document.getElementById('navbar');
        const toggler = document.querySelector('.navbar-toggler');

        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                // Scrolling down
                navbar.style.top = '-100px'; // Hide navbar
            } else {
                // Scrolling up
                navbar.style.top = '0'; // Show navbar
            }

            if (scrollTop > 0) {
                navbar.style.backgroundColor = 'rgba(0, 0, 0, 0.5)'; // Slight black glassy
            } else {
                navbar.style.backgroundColor = 'rgba(255, 255, 255, 0.1)'; // Original glassy
            }

            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For Mobile or negative scrolling
        });

        // Toggle animation for hamburger
        toggler.addEventListener('click', function() {
            this.classList.toggle('open');
        });
    </script>
</nav>


