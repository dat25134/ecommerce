<!-- Footer -->
<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <div class="w-8 h-8">
                        <!-- Fake logo white version using SVG -->
                        <svg viewBox="0 0 48 48" fill="none" class="w-full h-full object-contain">
                            <ellipse cx="24" cy="24" rx="22" ry="16" fill="#fff" fill-opacity="0.15"/>
                            <ellipse cx="24" cy="24" rx="18" ry="12" fill="#fff" fill-opacity="0.3"/>
                            <rect x="10" y="20" width="28" height="8" rx="4" fill="#fff" fill-opacity="0.5"/>
                            <ellipse cx="24" cy="24" rx="22" ry="16" stroke="#fff" stroke-width="2"/>
                            <text x="24" y="29" text-anchor="middle" font-size="8" fill="#fff" font-family="Arial" font-weight="bold" opacity="0.8">BÁNH MÌ</text>
                        </svg>
                    </div>
                    <span class="text-xl font-bold">Bánh Mì Sài Gòn</span>
                </div>
                <p class="text-gray-400">
                    Bánh mì ngon nhất Sài Gòn với hương vị truyền thống được gìn giữ qua nhiều thế hệ.
                </p>
            </div>

            <div>
                <h4 class="font-bold text-lg mb-4">Thực Đơn</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Bánh Mì Thịt Nướng</a></li>
                    <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Bánh Mì Pate</a></li>
                    <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Bánh Mì Chả Cá</a></li>
                    <li><a href="{{ route('products') }}" class="hover:text-white transition-colors">Bánh Mì Xíu Mại</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-lg mb-4">Liên Kết</h4>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#about" class="hover:text-white transition-colors">Về Chúng Tôi</a></li>
                    <li><a href="#contact" class="hover:text-white transition-colors">Liên Hệ</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Chính Sách</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Điều Khoản</a></li>
                </ul>
            </div>

            <div>
                <h4 class="font-bold text-lg mb-4">Liên Hệ</h4>
                <div class="space-y-2 text-gray-400">
                    <p>📍 123 Đường Nguyễn Văn Cừ, Q1, HCM</p>
                    <p>📞 0123.456.789</p>
                    <p>⏰ 6:00 - 22:00 hàng ngày</p>
                </div>
            </div>
        </div>

        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2024 Bánh Mì Sài Gòn. Tất cả quyền được bảo lưu.</p>
        </div>
    </div>
</footer>
