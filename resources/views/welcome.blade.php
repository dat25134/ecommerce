@extends('layouts.app')

@section('title', 'Bánh Mì Sài Gòn - Bánh Mì Ngon Nhất Sài Gòn')
@section('description', 'Bánh mì Sài Gòn truyền thống với hương vị đậm đà, được làm thủ công từ nguyên liệu tươi ngon nhất. 20 năm kinh nghiệm phục vụ khách hàng.')

@section('content')
<div class="min-h-screen bg-white" x-data="banhMiApp()">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="container mx-auto px-4 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div class="w-12 h-12 relative">
                        <img src="{{ asset('images/logo.png') }}" alt="Bánh Mì Sài Gòn Logo" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-gray-800">Bánh Mì Sài Gòn</h1>
                        <p class="text-sm text-gray-600">Ngon - Rẻ - Sạch</p>
                    </div>
                </div>

                <nav class="hidden md:flex items-center space-x-6">
                    <a href="#home" class="text-gray-700 hover:text-orange-500 font-medium transition-colors">Trang Chủ</a>
                    <a href="#menu" class="text-gray-700 hover:text-orange-500 font-medium transition-colors">Thực Đơn</a>
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

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-orange-50 to-red-50 py-16 overflow-hidden" id="home">
        <!-- Background pattern -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fillRule=\'evenodd\'%3E%3Cg fill=\'%23f97316\' fillOpacity=\'0.1\'%3E%3Ccircle cx=\'30\' cy=\'30\' r=\'4\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>

        <div class="container mx-auto px-4 relative">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <div class="space-y-4">
                        <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">⭐ Bánh Mì Ngon Nhất Sài Gòn</span>
                        <h1 class="text-4xl lg:text-6xl font-bold text-gray-800 leading-tight">
                            Bánh Mì Sài Gòn
                            <span class="text-orange-500"> Truyền Thống</span>
                        </h1>
                        <p class="text-xl text-gray-600 leading-relaxed">
                            Hương vị đậm đà từ những nguyên liệu tươi ngon nhất. Được làm thủ công bởi những bàn tay khéo léo của
                            thợ làm bánh giàu kinh nghiệm.
                        </p>
                    </div>

                    <div class="flex items-center space-x-4">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                            @endfor
                            <span class="text-gray-600 ml-2">4.9/5 (2,847 đánh giá)</span>
                        </div>
                    </div>

                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-8 py-3 text-lg rounded-md shadow-lg hover:shadow-xl transition-all" @click="orderNow()">
                            <i data-lucide="shopping-cart" class="w-5 h-5 inline mr-2"></i>
                            Đặt Hàng Ngay
                        </button>
                        <button class="border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white font-semibold px-8 py-3 text-lg rounded-md transition-colors" @click="viewMenu()">
                            Xem Thực Đơn
                        </button>
                    </div>
                </div>

                <!-- Video Section -->
                <div class="relative">
                    <div class="relative bg-gray-900 rounded-2xl overflow-hidden shadow-2xl">
                        <div class="aspect-video relative">
                            <!-- Video element -->
                            <video 
                                x-ref="heroVideo"
                                class="w-full h-full object-cover"
                                poster="{{ asset('images/video-thumbnail.jpg') }}"
                                @play="isVideoPlaying = true"
                                @pause="isVideoPlaying = false"
                                @ended="isVideoPlaying = false"
                            >
                                <source src="{{ asset('videos/baker-making-banh-mi.mp4') }}" type="video/mp4">
                                <source src="{{ asset('videos/baker-making-banh-mi.webm') }}" type="video/webm">
                                Trình duyệt của bạn không hỗ trợ video.
                            </video>

                            <!-- Video overlay controls -->
                            <div class="absolute inset-0 bg-black/30 flex items-center justify-center group hover:bg-black/20 transition-all">
                                <button 
                                    @click="toggleVideo()"
                                    class="bg-red-500/90 hover:bg-red-600 rounded-full w-20 h-20 group-hover:scale-110 transition-all flex items-center justify-center"
                                >
                                    <i :data-lucide="isVideoPlaying ? 'pause' : 'play'" class="w-8 h-8 text-white" :class="{'ml-1': !isVideoPlaying}"></i>
                                </button>
                            </div>

                            <!-- Video info overlay -->
                            <div class="absolute bottom-4 left-4 right-4 text-white">
                                <p class="font-semibold text-lg mb-1">Quy Trình Làm Bánh Mì Thủ Công</p>
                                <p class="text-sm opacity-90">Xem cách chúng tôi tạo ra những ổ bánh mì tươi ngon mỗi ngày</p>
                            </div>
                        </div>
                    </div>

                    <!-- Trust badges -->
                    <div class="absolute -bottom-6 left-1/2 transform -translate-x-1/2">
                        <div class="bg-white rounded-full px-6 py-3 shadow-lg border">
                            <div class="flex items-center space-x-4 text-sm">
                                <div class="flex items-center space-x-1">
                                    <div class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
                                    <span class="text-gray-600">Tươi mỗi ngày</span>
                                </div>
                                <div class="flex items-center space-x-1">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                                    <span class="text-gray-600">An toàn vệ sinh</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section id="menu" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium mb-4 inline-block">Thực Đơn Đặc Biệt</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Bánh Mì Bán Chạy Nhất</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Những món bánh mì được yêu thích nhất tại cửa hàng chúng tôi
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $products = [
                    [
                        'name' => 'Bánh Mì Thịt Nướng',
                        'price' => '20.000đ',
                        'image' => 'banh-mi-thit-nuong.jpg',
                        'description' => 'Thịt nướng thơm lừng, rau củ tươi ngon',
                        'badge' => 'Bán chạy #1',
                    ],
                    [
                        'name' => 'Bánh Mì Pate',
                        'price' => '15.000đ',
                        'image' => 'banh-mi-pate.jpg',
                        'description' => 'Pate đậm đà, truyền thống Việt Nam',
                        'badge' => 'Truyền thống',
                    ],
                    [
                        'name' => 'Bánh Mì Chả Cá',
                        'price' => '25.000đ',
                        'image' => 'banh-mi-cha-ca.jpg',
                        'description' => 'Chả cá Hà Nội, vị ngon khó quên',
                        'badge' => 'Đặc biệt',
                    ],
                    [
                        'name' => 'Bánh Mì Xíu Mại',
                        'price' => '18.000đ',
                        'image' => 'banh-mi-xiu-mai.jpg',
                        'description' => 'Xíu mại tự làm, nước sốt đặc biệt',
                        'badge' => 'Mới',
                    ],
                ];
                @endphp

                @foreach($products as $index => $product)
                <div class="group hover:shadow-xl transition-all duration-300 border-0 shadow-md hover:-translate-y-2 bg-white rounded-lg overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img 
                            src="{{ asset('images/' . $product['image']) }}" 
                            alt="{{ $product['name'] }}"
                            class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300"
                            loading="lazy"
                        >
                        <div class="absolute top-3 right-3">
                            <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-medium">{{ $product['badge'] }}</span>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                    <div class="p-4">
                        <h3 class="font-bold text-lg text-gray-800 mb-2">{{ $product['name'] }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $product['description'] }}</p>

                        <div class="flex items-center justify-between">
                            <span class="text-2xl font-bold text-orange-500">{{ $product['price'] }}</span>
                            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md group-hover:scale-105 transition-transform" @click="orderProduct('{{ $product['name'] }}')">
                                <i data-lucide="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                Đặt
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-8 py-3 text-lg rounded-md transition-colors" @click="viewAllProducts()">
                    Xem Tất Cả Sản Phẩm
                </button>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium mb-4 inline-block">Hình Ảnh Cửa Hàng</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Không Gian & Quy Trình</h2>
                <p class="text-gray-600 text-lg max-w-2xl mx-auto">
                    Khám phá không gian cửa hàng và quy trình làm bánh mì của chúng tôi
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                @php
                $galleryImages = [
                    ['image' => 'shop-front.jpg', 'title' => 'Mặt tiền cửa hàng'],
                    ['image' => 'baker-working.jpg', 'title' => 'Thợ làm bánh chuyên nghiệp'],
                    ['image' => 'fresh-bread.jpg', 'title' => 'Bánh mì tươi ngon'],
                    ['image' => 'ingredients.jpg', 'title' => 'Nguyên liệu tươi sạch'],
                ];
                @endphp

                @foreach($galleryImages as $index => $item)
                <div class="relative group overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-all cursor-pointer" @click="openLightbox({{ $index }})">
                    <img 
                        src="{{ asset('images/' . $item['image']) }}" 
                        alt="{{ $item['title'] }}"
                        class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300"
                        loading="lazy"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="absolute bottom-4 left-4 text-white">
                            <p class="font-semibold">{{ $item['title'] }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <span class="bg-orange-100 text-orange-800 px-3 py-1 rounded-full text-sm font-medium">Về Chúng Tôi</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">
                        20 Năm Kinh Nghiệm
                        <span class="text-orange-500"> Làm Bánh Mì</span>
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed">
                        Từ một quầy bánh mì nhỏ trên vỉa hè Sài Gòn, chúng tôi đã phát triển thành một trong những tiệm bánh mì
                        được yêu thích nhất. Bí quyết của chúng tôi là luôn giữ được hương vị truyền thống và chất lượng tươi
                        ngon trong từng ổ bánh.
                    </p>

                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center p-4 bg-orange-50 rounded-lg">
                            <div class="text-3xl font-bold text-orange-500 mb-2">20+</div>
                            <div class="text-gray-600">Năm kinh nghiệm</div>
                        </div>
                        <div class="text-center p-4 bg-red-50 rounded-lg">
                            <div class="text-3xl font-bold text-red-500 mb-2">50K+</div>
                            <div class="text-gray-600">Khách hàng hài lòng</div>
                        </div>
                    </div>
                </div>

                <div class="relative">
                    <img 
                        src="{{ asset('images/owner-story.jpg') }}" 
                        alt="Câu chuyện về chúng tôi"
                        class="rounded-2xl shadow-xl w-full"
                        loading="lazy"
                    >
                    <div class="absolute -bottom-4 -right-4 bg-white p-4 rounded-lg shadow-lg">
                        <p class="text-sm text-gray-600">Chủ cửa hàng</p>
                        <p class="font-bold text-gray-800">Anh Minh - 20 năm kinh nghiệm</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-800 mb-4">Liên Hệ Với Chúng Tôi</h2>
                <p class="text-gray-600 text-lg">Hãy đến và thưởng thức bánh mì ngon nhất Sài Gòn</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8 mb-12">
                <div class="text-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="map-pin" class="w-6 h-6 text-orange-500"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Địa Chỉ</h3>
                    <p class="text-gray-600">
                        123 Đường Nguyễn Văn Cừ<br>
                        Quận 1, TP.HCM
                    </p>
                </div>

                <div class="text-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="phone" class="w-6 h-6 text-orange-500"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Điện Thoại</h3>
                    <p class="text-gray-600">
                        0123.456.789<br>
                        0987.654.321
                    </p>
                </div>

                <div class="text-center p-6 bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i data-lucide="clock" class="w-6 h-6 text-orange-500"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Giờ Mở Cửa</h3>
                    <p class="text-gray-600">
                        6:00 - 22:00<br>
                        Tất cả các ngày trong tuần
                    </p>
                </div>
            </div>

            <!-- Map placeholder -->
            <div class="bg-gray-200 h-64 rounded-lg flex items-center justify-center">
                <div class="text-center text-gray-500">
                    <i data-lucide="map-pin" class="w-12 h-12 mx-auto mb-2"></i>
                    <p>Google Maps sẽ được tích hợp tại đây</p>
                    <p class="text-sm">Hiển thị vị trí chính xác của cửa hàng</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-8 h-8">
                            <img src="{{ asset('images/logo-white.png') }}" alt="Logo" class="w-full h-full object-contain">
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
                        <li><a href="#" class="hover:text-white transition-colors">Bánh Mì Thịt Nướng</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Bánh Mì Pate</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Bánh Mì Chả Cá</a></li>
                        <li><a href="#" class="hover:text-white transition-colors">Bánh Mì Xíu Mại</a></li>
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

    <!-- Floating Order Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-full shadow-2xl hover:animate-none transition-all animate-bounce" @click="orderNow()">
            <i data-lucide="shopping-cart" class="w-5 h-5 inline mr-2"></i>
            Đặt Hàng Ngay
        </button>
    </div>

    <!-- Lightbox Modal -->
    <div x-show="showLightbox" x-transition class="fixed inset-0 bg-black/80 z-50 flex items-center justify-center p-4" @click="closeLightbox()" x-cloak>
        <div class="relative max-w-4xl max-h-full" @click.stop>
            <img :src="lightboxImage" :alt="lightboxTitle" class="max-w-full max-h-full object-contain rounded-lg">
            <button @click="closeLightbox()" class="absolute top-4 right-4 text-white bg-black/50 rounded-full p-2 hover:bg-black/70 transition-colors">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
            <div class="absolute bottom-4 left-4 text-white bg-black/50 px-4 py-2 rounded-lg">
                <p class="font-semibold" x-text="lightboxTitle"></p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function banhMiApp() {
    return {
        isVideoPlaying: false,
        showLightbox: false,
        lightboxImage: '',
        lightboxTitle: '',
        
        toggleVideo() {
            const video = this.$refs.heroVideo;
            if (this.isVideoPlaying) {
                video.pause();
            } else {
                video.play();
            }
        },
        
        orderNow() {
            // Redirect to order page or show order modal
            alert('Chuyển đến trang đặt hàng...');
            // window.location.href = '/order';
        },
        
        orderCombo() {
            alert('Đặt combo sáng thành công!');
        },
        
        orderProduct(productName) {
            alert(`Đặt ${productName} thành công!`);
        },
        
        viewMenu() {
            document.getElementById('menu').scrollIntoView({ behavior: 'smooth' });
        },
        
        viewAllProducts() {
            // Redirect to products page
            alert('Chuyển đến trang sản phẩm...');
            // window.location.href = '/products';
        },
        
        openLightbox(index) {
            const images = [
                { image: '{{ asset("images/shop-front.jpg") }}', title: 'Mặt tiền cửa hàng' },
                { image: '{{ asset("images/baker-working.jpg") }}', title: 'Thợ làm bánh chuyên nghiệp' },
                { image: '{{ asset("images/fresh-bread.jpg") }}', title: 'Bánh mì tươi ngon' },
                { image: '{{ asset("images/ingredients.jpg") }}', title: 'Nguyên liệu tươi sạch' }
            ];
            
            this.lightboxImage = images[index].image;
            this.lightboxTitle = images[index].title;
            this.showLightbox = true;
            document.body.style.overflow = 'hidden';
        },
        
        closeLightbox() {
            this.showLightbox = false;
            document.body.style.overflow = 'auto';
        }
    }
}
</script>
@endpush

@push('styles')
<style>
[x-cloak] { display: none !important; }

.animate-bounce {
    animation: bounce 2s infinite;
}

@keyframes bounce {
    0%, 20%, 53%, 80%, 100% {
        transform: translate3d(0,0,0);
    }
    40%, 43% {
        transform: translate3d(0,-8px,0);
    }
    70% {
        transform: translate3d(0,-4px,0);
    }
    90% {
        transform: translate3d(0,-2px,0);
    }
}

.animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
}

@keyframes pulse {
    0%, 100% {
        opacity: 1;
    }
    50% {
        opacity: .5;
    }
}
</style>
@endpush
