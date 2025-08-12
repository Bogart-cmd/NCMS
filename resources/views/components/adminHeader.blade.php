{{-- Modern Admin Header --}}
<header class="fixed top-0 left-0 right-0 bg-white/95 backdrop-blur-md border-b border-gray-200/60 shadow-sm z-50 transition-all duration-300">
    <div class="flex items-center justify-between px-3 py-2 lg:px-6 lg:py-3">
        <!-- Logo and Title Section -->
        <div class="flex items-center gap-2 lg:gap-3">
            <div class="w-10 h-10 lg:w-14 lg:h-14 flex-shrink-0">
                <img src="/images/nolitc.png" alt="NOLITC Logo" class="w-full h-full object-contain">
            </div>
            <div class="hidden sm:block">
                <h1 class="text-base lg:text-lg xl:text-xl font-black text-[#168753] leading-tight">
                    NEGROS OCCIDENTAL LANGUAGE<br>
                    <span class="text-sm lg:text-base xl:text-lg">AND INFORMATION TECHNOLOGY CENTER</span>
                </h1>
            </div>
            <div class="sm:hidden">
                <h1 class="text-xs font-black text-[#168753] leading-tight">
                    NOLITC
                </h1>
            </div>
        </div>

        <!-- Right Section: User Info & Mobile Menu Toggle -->
        <div class="flex items-center gap-3">
            <!-- User Profile (hidden on mobile) -->
            <div class="hidden md:flex items-center gap-2 px-2 py-1.5 bg-gray-50 rounded-lg">
                <div class="w-7 h-7 bg-[#168753] rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold text-xs">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                </div>
                <div class="text-xs">
                    <p class="font-medium text-gray-900">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-gray-500 capitalize">{{ auth()->user()->usertype ?? 'admin' }}</p>
                </div>
            </div>

            <!-- Mobile Menu Toggle -->
            <button id="admin-mobile-menu-toggle" class="lg:hidden p-1.5 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors">
                <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Menu Overlay -->
<div id="admin-mobile-menu" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden">
    <div class="fixed top-0 right-0 h-full w-80 bg-white shadow-2xl transform translate-x-full transition-transform duration-300">
        <div class="flex items-center justify-between p-4 border-b">
            <h3 class="text-lg font-semibold text-gray-900">Menu</h3>
            <button id="admin-mobile-menu-close" class="p-2 rounded-lg hover:bg-gray-100">
                <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
        <div class="p-4">
            <!-- Mobile User Info -->
            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg mb-4">
                <div class="w-12 h-12 bg-[#168753] rounded-full flex items-center justify-center">
                    <span class="text-white font-semibold text-lg">{{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}</span>
                </div>
                <div>
                    <p class="font-medium text-gray-900">{{ auth()->user()->name ?? 'Admin' }}</p>
                    <p class="text-gray-500 capitalize">{{ auth()->user()->usertype ?? 'admin' }}</p>
                </div>
            </div>
            
            <!-- Mobile Navigation will be populated by JavaScript -->
            <div id="admin-mobile-nav"></div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuToggle = document.getElementById('admin-mobile-menu-toggle');
    const mobileMenu = document.getElementById('admin-mobile-menu');
    const mobileMenuClose = document.getElementById('admin-mobile-menu-close');
    const mobileMenuOverlay = document.getElementById('admin-mobile-menu');
    const mobileNav = document.getElementById('admin-mobile-nav');

    // Clone sidebar navigation for mobile
    const sidebarNav = document.querySelector('.admin-sidebar ul');
    if (sidebarNav && mobileNav) {
        mobileNav.innerHTML = sidebarNav.outerHTML;
        // Add mobile-specific styling
        mobileNav.querySelectorAll('li').forEach(li => {
            li.className = 'mb-2';
            const link = li.querySelector('a, button');
            if (link) {
                link.className = 'block w-full p-3 text-left rounded-lg hover:bg-gray-100 transition-colors';
            }
        });
    }

    function openMobileMenu() {
        mobileMenu.classList.remove('hidden');
        setTimeout(() => {
            mobileMenu.querySelector('.transform').classList.remove('translate-x-full');
        }, 10);
        document.body.style.overflow = 'hidden';
    }

    function closeMobileMenu() {
        mobileMenu.querySelector('.transform').classList.add('translate-x-full');
        setTimeout(() => {
            mobileMenu.classList.add('hidden');
        }, 300);
        document.body.style.overflow = '';
    }

    mobileMenuToggle?.addEventListener('click', openMobileMenu);
    mobileMenuClose?.addEventListener('click', closeMobileMenu);
    mobileMenuOverlay?.addEventListener('click', (e) => {
        if (e.target === mobileMenuOverlay) closeMobileMenu();
    });

    // Close menu on window resize if switching to desktop
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 1024) {
            closeMobileMenu();
        }
    });
});
</script>
