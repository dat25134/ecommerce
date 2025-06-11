<!-- Header -->
<header class="bg-white shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-4">
        <div class="flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <div class="w-12 h-12 relative">
                    <!-- Fake logo using SVG -->
                    <svg viewBox="0 0 48 48" fill="none" class="w-full h-full object-contain">
                        <ellipse cx="24" cy="24" rx="22" ry="16" fill="#F59E42"/>
                        <ellipse cx="24" cy="24" rx="18" ry="12" fill="#FFF3E0"/>
                        <rect x="10" y="20" width="28" height="8" rx="4" fill="#E25822"/>
                        <ellipse cx="24" cy="24" rx="22" ry="16" stroke="#E25822" stroke-width="2"/>
                        <text x="24" y="29" text-anchor="middle" font-size="8" fill="#E25822" font-family="Arial" font-weight="bold">BÁNH MÌ</text>
                    </svg>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Bánh Mì Sài Gòn</h1>
                    <p class="text-sm text-gray-600">Ngon - Rẻ - Sạch</p>
                </div>
            </div>

            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="text-gray-700 hover:text-orange-500 font-medium transition-colors">Trang Chủ</a>
                <a href="{{ route('products') }}" class="text-gray-700 hover:text-orange-500 font-medium transition-colors">Thực Đơn</a>
                <a href="#about" class="text-gray-700 hover:text-orange-500 font-medium transition-colors">Về Chúng Tôi</a>
                <a href="#contact" class="text-gray-700 hover:text-orange-500 font-medium transition-colors">Liên Hệ</a>
            </nav>

            <div class="flex items-center space-x-2">
                <div class="hidden md:flex items-center space-x-1 text-sm text-gray-600">
                    <i data-lucide="phone" class="w-4 h-4"></i>
                    <span>0123.456.789</span>
                </div>
                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-2 rounded-md transition-colors" @click="orderNow()">
                    <i data-lucide="shopping-cart" class="w-4 h-4 inline mr-2"></i>
                    Đặt Hàng
                </button>
            </div>
        </div>
    </div>
</header>

<!-- Weekly Banner -->
<div class="bg-gradient-to-r from-orange-500 to-red-500 text-white py-3 relative overflow-hidden">
    <div class="absolute inset-0 bg-black/10"></div>
    <div class="container mx-auto px-4 relative">
        <div class="flex items-center justify-center space-x-4">
            <span class="bg-yellow-400 text-black font-bold px-3 py-1 rounded-full text-sm">🔥 HOT DEAL TUẦN NÀY</span>
            <span class="text-lg font-semibold">Combo Sáng: Bánh Mì + Cà Phê = 25.000đ</span>
            <button class="border border-white text-white hover:bg-white hover:text-orange-500 font-semibold px-4 py-1 rounded-md transition-colors" @click="orderCombo()">
                Đặt Ngay
            </button>
        </div>
    </div>
</div>
