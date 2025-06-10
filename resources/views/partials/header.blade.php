<header class="bg-white shadow-sm sticky top-0 z-40">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-12 h-12 relative">
                    <img src="{{ asset('images/logo.png') }}" alt="Bánh Mì Sài Gòn Logo" class="w-full h-full object-contain">
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-800">
                        <a href="{{ route('home') }}">Bánh Mì Sài Gòn</a>
                    </h1>
                    <p class="text-sm text-gray-600">Ngon - Rẻ - Sạch</p>
                </div>
            </div>

            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-orange-500 font-medium transition-colors {{ request()->routeIs('home') ? 'text-orange-500' : '' }}">Trang Chủ</a>
                <a href="{{ route('products.index') }}" class="text-gray-700 hover:text-orange-500 font-medium transition-colors {{ request()->routeIs('products.*') ? 'text-orange-500' : '' }}">Thực Đơn</a>
                <a href="{{ route('about') }}" class="text-gray-700 hover:text-orange-500 font-medium transition-colors {{ request()->routeIs('about') ? 'text-orange-500' : '' }}">Về Chúng Tôi</a>
                <a href="{{ route('contact') }}" class="text-gray-700 hover:text-orange-500 font-medium transition-colors {{ request()->routeIs('contact') ? 'text-orange-500' : '' }}">Liên Hệ</a>
            </nav>

            <div class="flex items-center space-x-2">
                <div class="hidden md:flex items-center space-x-1 text-sm text-gray-600">
                    <i data-lucide="phone" class="w-4 h-4"></i>
                    <span>0123.456.789</span>
                </div>
                <a href="{{ route('order') }}" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-md transition-colors">
                    <i data-lucide="shopping-cart" class="w-4 h-4 inline mr-2"></i>
                    Đặt Hàng
                </a>
            </div>
        </div>
    </div>
</header>
