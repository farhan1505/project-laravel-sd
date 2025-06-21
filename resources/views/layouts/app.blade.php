<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
    <title>SD Al-Fatah 2</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

    @include('components.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.footer')

    <script>
        const navbar = document.getElementById('navbar');
        const title = document.getElementById('nav-title');
        const links = document.querySelectorAll('#nav-links a');
        const mobileMenu = document.getElementById('mobile-menu');
        const toggleButton = document.getElementById('menu-toggle');

        let mobileMenuOpen = false;

        function applySolidNavbar() {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-white', 'shadow');
            title.classList.remove('text-white');
            title.classList.add('text-emerald-700');
            links.forEach(link => {
                link.classList.remove('text-white');
                link.classList.add('text-gray-800');
            });
            toggleButton.classList.remove('text-white');
            toggleButton.classList.add('text-gray-800');
        }

        function applyTransparentNavbar() {
            navbar.classList.remove('bg-white', 'shadow');
            navbar.classList.add('bg-transparent');
            title.classList.remove('text-emerald-700');
            title.classList.add('text-white');
            links.forEach(link => {
                link.classList.remove('text-gray-800');
                link.classList.add('text-white');
            });
            toggleButton.classList.remove('text-gray-800');
            toggleButton.classList.add('text-white');
        }

        function updateNavbar() {
            if (window.scrollY > 50 || mobileMenuOpen) {
                applySolidNavbar();
            } else {
                applyTransparentNavbar();
            }
        }

        // Scroll behavior
        window.addEventListener('scroll', updateNavbar);
        window.addEventListener('load', updateNavbar);

        toggleButton.addEventListener('click', () => {
            mobileMenuOpen = !mobileMenuOpen;

            if (mobileMenuOpen) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.add(
                    'bg-white', 'text-gray-800', 'shadow-md', 'rounded-lg',
                    'absolute', 'right-4', 'top-16', 'w-48', 'p-4', 'z-50'
                );
            } else {
                mobileMenu.classList.add('hidden');
                mobileMenu.classList.remove(
                    'bg-white', 'text-gray-800', 'shadow-md', 'rounded-lg',
                    'absolute', 'right-4', 'top-16', 'w-48', 'p-4', 'z-50'
                );
            }

            updateNavbar();
        });


        // Optional: jika klik di luar menu, tutup
        document.addEventListener('click', (e) => {
            if (mobileMenuOpen && !navbar.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
                mobileMenuOpen = false;
                updateNavbar();
            }
        });
    </script>


</body>

</html>