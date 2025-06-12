<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/alpinejs" defer></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    @stack('styles')
</head>
<body class="bg-gray-50" x-data="adminApp()">
    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 bg-white shadow-lg max-h-screen w-64" :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}">
        <div class="flex flex-col justify-between h-full">
            <div class="flex-grow">
                <div class="px-4 py-6 text-center border-b">
                    <h1 class="text-xl font-bold leading-none"><span class="text-orange-500">Bánh Mì</span> Admin</h1>
                </div>
                <div class="p-4">
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="flex items-center bg-orange-100 rounded-xl font-bold text-sm text-orange-900 py-3 px-4">
                                <i data-lucide="layout-dashboard" class="w-5 h-5 mr-4"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products') }}" class="flex bg-white hover:bg-orange-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <i data-lucide="package" class="w-5 h-5 mr-4"></i>
                                Sản Phẩm
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orders') }}" class="flex bg-white hover:bg-orange-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <i data-lucide="shopping-cart" class="w-5 h-5 mr-4"></i>
                                Đơn Hàng
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.customers') }}" class="flex bg-white hover:bg-orange-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <i data-lucide="users" class="w-5 h-5 mr-4"></i>
                                Khách Hàng
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.reports') }}" class="flex bg-white hover:bg-orange-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <i data-lucide="bar-chart" class="w-5 h-5 mr-4"></i>
                                Báo Cáo
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings') }}" class="flex bg-white hover:bg-orange-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <i data-lucide="settings" class="w-5 h-5 mr-4"></i>
                                Cài Đặt
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-4 border-t">
                <div class="flex items-center">
                    <img src="https://placehold.co/40x40" alt="Admin" class="w-10 h-10 rounded-full">
                    <div class="ml-3">
                        <p class="text-sm font-bold text-gray-900">Admin</p>
                        <a href="{{ route('logout') }}" class="text-xs text-gray-500 hover:text-orange-500">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-8">
        <!-- Top Navigation -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <button @click="sidebarOpen = !sidebarOpen" class="lg:hidden">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div class="hidden md:flex items-center space-x-4">
                    <div class="relative">
                        <input type="text" 
                               placeholder="Tìm kiếm..." 
                               class="w-64 pl-10 pr-4 py-2 rounded-lg border border-gray-200 focus:border-orange-500 focus:ring-1 focus:ring-orange-500 outline-none transition-colors"
                        >
                        <i data-lucide="search" class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                    </div>
                    <div class="relative">
                        <button class="flex items-center space-x-2 text-gray-700 hover:text-orange-500 px-3 py-2 rounded-lg hover:bg-orange-50 transition-colors">
                            <i data-lucide="calendar" class="w-5 h-5"></i>
                            <span class="text-sm">Hôm nay</span>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="relative flex items-center space-x-2 text-gray-700 hover:text-orange-500 px-3 py-2 rounded-lg hover:bg-orange-50 transition-colors">
                        <i data-lucide="bell" class="w-5 h-5"></i>
                        <span class="bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                    </button>
                    <!-- Dropdown -->
                    <div x-show="open" 
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-lg border py-2 z-50"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95">
                        <div class="px-4 py-2 border-b">
                            <h3 class="text-sm font-semibold text-gray-900">Thông báo</h3>
                        </div>
                        <div class="max-h-96 overflow-y-auto">
                            <a href="#" class="block px-4 py-3 hover:bg-orange-50 transition-colors">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-orange-100">
                                            <i data-lucide="shopping-cart" class="w-4 h-4 text-orange-500"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">Đơn hàng mới #ORD001</p>
                                        <p class="text-xs text-gray-500">2 phút trước</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block px-4 py-3 hover:bg-orange-50 transition-colors">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-red-100">
                                            <i data-lucide="alert-circle" class="w-4 h-4 text-red-500"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">Sản phẩm sắp hết hàng</p>
                                        <p class="text-xs text-gray-500">15 phút trước</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block px-4 py-3 hover:bg-orange-50 transition-colors">
                                <div class="flex items-start space-x-3">
                                    <div class="flex-shrink-0">
                                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-green-100">
                                            <i data-lucide="check-circle" class="w-4 h-4 text-green-500"></i>
                                        </span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900">Đơn hàng #ORD002 đã hoàn thành</p>
                                        <p class="text-xs text-gray-500">1 giờ trước</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="px-4 py-2 border-t">
                            <a href="#" class="text-sm font-medium text-orange-500 hover:text-orange-600">Xem tất cả thông báo</a>
                        </div>
                    </div>
                </div>

                <!-- Help -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 text-gray-700 hover:text-orange-500 px-3 py-2 rounded-lg hover:bg-orange-50 transition-colors">
                        <i data-lucide="help-circle" class="w-5 h-5"></i>
                    </button>
                    <!-- Dropdown -->
                    <div x-show="open" 
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-64 bg-white rounded-lg shadow-lg border py-2 z-50"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95">
                        <div class="px-4 py-2 border-b">
                            <h3 class="text-sm font-semibold text-gray-900">Trợ giúp & Hỗ trợ</h3>
                        </div>
                        <div class="py-2">
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                                <i data-lucide="book-open" class="w-4 h-4 mr-3"></i>
                                Hướng dẫn sử dụng
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                                <i data-lucide="message-circle" class="w-4 h-4 mr-3"></i>
                                Liên hệ hỗ trợ
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                                <i data-lucide="settings" class="w-4 h-4 mr-3"></i>
                                Cài đặt
                            </a>
                        </div>
                    </div>
                </div>

                <!-- User Menu -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-3 text-gray-700 hover:text-orange-500 px-3 py-2 rounded-lg hover:bg-orange-50 transition-colors">
                        <img src="https://placehold.co/40x40" alt="Admin" class="w-8 h-8 rounded-full">
                        <span class="text-sm font-medium">Admin</span>
                        <i data-lucide="chevron-down" class="w-4 h-4"></i>
                    </button>
                    <!-- Dropdown -->
                    <div x-show="open" 
                         @click.away="open = false"
                         class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border py-2 z-50"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95">
                        <div class="px-4 py-2 border-b">
                            <p class="text-sm font-medium text-gray-900">Admin</p>
                            <p class="text-xs text-gray-500">admin@example.com</p>
                        </div>
                        <div class="py-2">
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                                <i data-lucide="user" class="w-4 h-4 mr-3"></i>
                                Hồ sơ
                            </a>
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-orange-50 hover:text-orange-500">
                                <i data-lucide="settings" class="w-4 h-4 mr-3"></i>
                                Cài đặt
                            </a>
                            <a href="{{ route('logout') }}" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                <i data-lucide="log-out" class="w-4 h-4 mr-3"></i>
                                Đăng xuất
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            @yield('content')
        </div>
    </main>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('adminApp', () => ({
                sidebarOpen: true,
                init() {
                    console.log('Initializing Lucide Icons...');
                    lucide.createIcons();
                }
            }))
        })
    </script>
    @stack('scripts')
</body>
</html> 