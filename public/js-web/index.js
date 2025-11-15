
        // Tailwind config
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#10B981',
                        accent: '#F59E0B',
                        dark: '#1F2937',
                        light: '#F9FAFB'
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    }
                }
            }
        }

        // Mobile menu functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            let isMenuOpen = false;

            // Initialize menu state
            mobileMenu.classList.add('hidden');

            // Toggle mobile menu
            mobileMenuButton.addEventListener('click', function(e) {
                e.stopPropagation(); // Prevent event bubbling
                isMenuOpen = !isMenuOpen;

                if (isMenuOpen) {
                    mobileMenu.classList.remove('hidden');
                    // Small delay to ensure the hidden class is removed before adding menu-open
                    setTimeout(() => {
                        mobileMenu.classList.add('menu-open');
                    }, 10);
                    // Change icon to X when menu is open
                    mobileMenuButton.innerHTML = '<i class="fas fa-times text-xl"></i>';
                    mobileMenuButton.classList.add('rotate-90');
                } else {
                    mobileMenu.classList.remove('menu-open');
                    // Wait for transition to complete before hiding
                    setTimeout(() => {
                        if (!mobileMenu.classList.contains('menu-open')) {
                            mobileMenu.classList.add('hidden');
                        }
                    }, 300);
                    // Change icon back to bars when menu is closed
                    mobileMenuButton.innerHTML = '<i class="fas fa-bars text-xl"></i>';
                    mobileMenuButton.classList.remove('rotate-90');
                }
            });

            // Close mobile menu when clicking on a link
            const mobileMenuLinks = mobileMenu.querySelectorAll('a');
            mobileMenuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.remove('menu-open');
                    // Wait for transition to complete before hiding
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                    mobileMenuButton.innerHTML = '<i class="fas fa-bars text-xl"></i>';
                    mobileMenuButton.classList.remove('rotate-90');
                    isMenuOpen = false;
                });
            });

            // Close mobile menu when clicking outside
            document.addEventListener('click', function(event) {
                const isClickInsideMenu = mobileMenu.contains(event.target);
                const isClickOnButton = mobileMenuButton.contains(event.target);

                if (!isClickInsideMenu && !isClickOnButton && isMenuOpen) {
                    mobileMenu.classList.remove('menu-open');
                    // Wait for transition to complete before hiding
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                    mobileMenuButton.innerHTML = '<i class="fas fa-bars text-xl"></i>';
                    mobileMenuButton.classList.remove('rotate-90');
                    isMenuOpen = false;
                }
            });
        });






