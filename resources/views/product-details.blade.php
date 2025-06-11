@extends('layouts.app')

@section('title', 'Bánh Mì Thịt Nướng - Bánh Mì Sài Gòn')
@section('description', 'Bánh mì thịt nướng thơm lừng, rau củ tươi ngon, nước sốt đặc biệt. Giá chỉ 20.000đ với nhiều topping hấp dẫn.')

@section('content')
<div class="min-h-screen bg-white" x-data="productDetailApp()">
    <!-- Header -->
    @include('partials.header')

    <!-- Breadcrumb -->
    <div class="bg-gray-50 py-4">
        <div class="container mx-auto px-4">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-orange-500 transition-colors">Trang chủ</a>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <a href="{{ route('products') }}" class="text-gray-500 hover:text-orange-500 transition-colors">Thực đơn</a>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <span class="text-gray-800 font-medium">Bánh Mì Thịt Nướng</span>
            </nav>
        </div>
    </div>

    <!-- Product Detail -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12">
                <!-- Product Images -->
                <div class="space-y-4">
                    <!-- Main Image -->
                    <div class="relative bg-orange-50 rounded-2xl overflow-hidden aspect-square">
                        <img 
                            src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=600&q=80"
                            alt="Bánh Mì Thịt Nướng"
                            class="w-full h-full object-cover p-0"
                        >
                        <div class="absolute top-4 left-4">
                            <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm font-medium">Bán chạy #1</span>
                        </div>
                        <div class="absolute top-4 right-4">
                            <button class="bg-white/80 hover:bg-white text-gray-800 p-2 rounded-full shadow-lg transition-colors">
                                <i data-lucide="heart" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Thumbnail Images -->
                    <div class="grid grid-cols-4 gap-4">
                        @php
                        $productImages = [
                            "https://images.pexels.com/photos/461382/pexels-photo-461382.jpeg?auto=compress&w=400&q=80", // Bánh mì thịt nướng
                            "https://images.pexels.com/photos/461382/pexels-photo-461382.jpeg?auto=compress&w=400&q=80", // Bánh mì Việt Nam
                            "https://images.pexels.com/photos/461382/pexels-photo-461382.jpeg?auto=compress&w=400&q=80", // Bánh mì kẹp thịt
                            "https://images.pexels.com/photos/461382/pexels-photo-461382.jpeg?auto=compress&w=400&q=80"  // Bánh mì và rau củ
                        ];
                        @endphp
                        @foreach($productImages as $img)
                        <div class="relative bg-orange-50 rounded-lg overflow-hidden aspect-square cursor-pointer hover:ring-2 hover:ring-orange-500 transition-all">
                            <img 
                                src="{{ $img }}"
                                alt="Bánh mì thịt nướng"
                                class="w-full h-full object-cover"
                            >
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Product Info -->
                <div class="space-y-6">
                    <div class="space-y-4">
                        <h1 class="text-3xl lg:text-4xl font-bold text-gray-800">Bánh Mì Thịt Nướng</h1>
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                                @endfor
                                <span class="text-gray-600 ml-2">4.9/5 (1,247 đánh giá)</span>
                            </div>
                            <span class="text-gray-400">|</span>
                            <span class="text-gray-600">Đã bán: 5,000+</span>
                        </div>
                        <div class="text-3xl font-bold text-orange-500">20.000đ</div>
                    </div>

                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Mô tả sản phẩm</h3>
                        <p class="text-gray-600 leading-relaxed">
                            Bánh mì thịt nướng với hương vị đậm đà từ thịt heo được ướp gia vị đặc biệt, nướng than hoa thơm lừng. 
                            Kết hợp với rau củ tươi ngon, nước sốt đặc biệt và bánh mì giòn rụm, tạo nên một món ăn hoàn hảo cho bữa sáng.
                        </p>
                    </div>

                    <!-- Toppings -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Topping có thể thêm</h3>
                        <div class="grid grid-cols-2 gap-4">
                            @php
                            $toppings = [
                                ['name' => 'Pate', 'price' => 5000],
                                ['name' => 'Xá xíu', 'price' => 8000],
                                ['name' => 'Chả lụa', 'price' => 6000],
                                ['name' => 'Trứng ốp la', 'price' => 7000],
                                ['name' => 'Phô mai', 'price' => 10000],
                                ['name' => 'Rau thơm', 'price' => 2000],
                            ];
                            @endphp

                            @foreach($toppings as $topping)
                            <label class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:border-orange-500 cursor-pointer transition-colors">
                                <div class="flex items-center">
                                    <input type="checkbox" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                    <span class="ml-2 text-gray-700">{{ $topping['name'] }}</span>
                                </div>
                                <span class="text-orange-500 font-medium">+{{ number_format($topping['price']) }}đ</span>
                            </label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Quantity -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="font-semibold text-gray-800 mb-4">Số lượng</h3>
                        <div class="flex items-center space-x-4">
                            <button class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors">
                                <i data-lucide="minus" class="w-5 h-5"></i>
                            </button>
                            <span class="text-xl font-semibold">1</span>
                            <button class="w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center transition-colors">
                                <i data-lucide="plus" class="w-5 h-5"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold px-8 py-4 rounded-lg transition-colors flex items-center justify-center">
                                <i data-lucide="shopping-cart" class="w-5 h-5 mr-2"></i>
                                Thêm vào giỏ hàng
                            </button>
                            <button class="flex-1 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-8 py-4 rounded-lg transition-colors flex items-center justify-center">
                                <i data-lucide="credit-card" class="w-5 h-5 mr-2"></i>
                                Mua ngay
                            </button>
                        </div>
                    </div>

                    <!-- Additional Info -->
                    <div class="border-t border-gray-200 pt-6">
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div class="flex items-center space-x-2">
                                <i data-lucide="truck" class="w-5 h-5 text-gray-400"></i>
                                <span class="text-gray-600">Miễn phí vận chuyển cho đơn từ 100.000đ</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i data-lucide="clock" class="w-5 h-5 text-gray-400"></i>
                                <span class="text-gray-600">Giao hàng trong 30 phút</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i data-lucide="shield" class="w-5 h-5 text-gray-400"></i>
                                <span class="text-gray-600">Đảm bảo vệ sinh an toàn thực phẩm</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <i data-lucide="refresh-cw" class="w-5 h-5 text-gray-400"></i>
                                <span class="text-gray-600">Đổi trả trong 24h</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Reviews Section -->
    <section class="py-12 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Đánh giá từ khách hàng</h2>
                <div class="flex items-center justify-center space-x-4">
                    <div class="text-4xl font-bold text-orange-500">4.9</div>
                    <div class="text-left">
                        <div class="flex items-center space-x-1">
                            @for($i = 1; $i <= 5; $i++)
                                <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                            @endfor
                        </div>
                        <div class="text-gray-600">1,247 đánh giá</div>
                    </div>
                </div>
            </div>

            <!-- Review Stats -->
            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="font-semibold text-gray-800 mb-4">Thống kê đánh giá</h3>
                    <div class="space-y-3">
                        @php
                        $ratings = [
                            ['stars' => 5, 'count' => 1000, 'percent' => 80],
                            ['stars' => 4, 'count' => 200, 'percent' => 16],
                            ['stars' => 3, 'count' => 30, 'percent' => 2.4],
                            ['stars' => 2, 'count' => 10, 'percent' => 0.8],
                            ['stars' => 1, 'count' => 7, 'percent' => 0.6],
                        ];
                        @endphp

                        @foreach($ratings as $rating)
                        <div class="flex items-center">
                            <div class="w-20 text-sm text-gray-600">{{ $rating['stars'] }} sao</div>
                            <div class="flex-1 h-2 bg-gray-200 rounded-full mx-4">
                                <div class="h-full bg-orange-500 rounded-full" style="width: {{ $rating['percent'] }}%"></div>
                            </div>
                            <div class="w-16 text-sm text-gray-600">{{ $rating['count'] }}</div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="font-semibold text-gray-800 mb-4">Đánh giá nổi bật</h3>
                    <div class="space-y-4">
                        @php
                        $highlights = [
                            'Hương vị' => 4.9,
                            'Chất lượng' => 4.8,
                            'Giá cả' => 4.7,
                            'Phục vụ' => 4.9,
                        ];
                        @endphp

                        @foreach($highlights as $aspect => $rating)
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">{{ $aspect }}</span>
                            <div class="flex items-center">
                                <div class="flex items-center space-x-1">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i data-lucide="star" class="w-4 h-4 {{ $i <= $rating ? 'fill-yellow-400 text-yellow-400' : 'text-gray-300' }}"></i>
                                    @endfor
                                </div>
                                <span class="ml-2 text-gray-600">{{ $rating }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Review List -->
            <div class="space-y-6">
                @php
                $reviews = [
                    [
                        'name' => 'Nguyễn Văn A',
                        'rating' => 5,
                        'date' => '2024-03-15',
                        'content' => 'Bánh mì thịt nướng rất ngon, thịt mềm và thơm, rau củ tươi ngon. Nước sốt đặc biệt làm tăng thêm hương vị. Sẽ quay lại ủng hộ!',
                        'images' => [
                            'https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=200&q=80',
                            'https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=200&q=80'
                        ]
                    ],
                    [
                        'name' => 'Trần Thị B',
                        'rating' => 4,
                        'date' => '2024-03-14',
                        'content' => 'Bánh mì ngon, giá cả phải chăng. Thịt nướng đậm đà, bánh mì giòn. Chỉ hơi ít rau một chút.',
                        'images' => []
                    ],
                    [
                        'name' => 'Lê Văn C',
                        'rating' => 5,
                        'date' => '2024-03-13',
                        'content' => 'Một trong những tiệm bánh mì ngon nhất Sài Gòn. Thịt nướng thơm lừng, nước sốt đặc biệt. Nhân viên phục vụ nhiệt tình.',
                        'images' => [
                            'https://images.unsplash.com/photo-1464306076886-debca5e8a6b0?auto=format&fit=crop&w=200&q=80'
                        ]
                    ],
                ];
                @endphp

                @foreach($reviews as $review)
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <div class="flex items-start justify-between mb-4">
                        <div>
                            <div class="font-semibold text-gray-800">{{ $review['name'] }}</div>
                            <div class="flex items-center space-x-1 mt-1">
                                @for($i = 1; $i <= 5; $i++)
                                    <i data-lucide="star" class="w-4 h-4 {{ $i <= $review['rating'] ? 'fill-yellow-400 text-yellow-400' : 'text-gray-300' }}"></i>
                                @endfor
                            </div>
                        </div>
                        <div class="text-sm text-gray-500">{{ $review['date'] }}</div>
                    </div>
                    <p class="text-gray-600 mb-4">{{ $review['content'] }}</p>
                    @if(count($review['images']) > 0)
                    <div class="flex space-x-2">
                        @foreach($review['images'] as $image)
                        <img src="{{ $image }}" alt="Review image" class="w-20 h-20 object-cover rounded-lg">
                        @endforeach
                    </div>
                    @endif
                </div>
                @endforeach
            </div>

            <!-- Load More Reviews -->
            <div class="text-center mt-8">
                <button class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-8 py-3 rounded-lg transition-colors">
                    Xem thêm đánh giá
                </button>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-gray-800 mb-8">Sản phẩm liên quan</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                @php
                $relatedProducts = [
                    [
                        'name' => 'Bánh Mì Pate',
                        'price' => '15.000đ',
                        'image' => 'https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=400&q=80',
                        'description' => 'Pate đậm đà, truyền thống Việt Nam',
                        'badge' => 'Truyền thống',
                    ],
                    [
                        'name' => 'Bánh Mì Chả Cá',
                        'price' => '25.000đ',
                        'image' => 'https://images.unsplash.com/photo-1502741338009-cac2772e18bc?auto=format&fit=crop&w=400&q=80',
                        'description' => 'Chả cá Hà Nội, vị ngon khó quên',
                        'badge' => 'Đặc biệt',
                    ],
                    [
                        'name' => 'Bánh Mì Xíu Mại',
                        'price' => '18.000đ',
                        'image' => 'https://images.unsplash.com/photo-1464306076886-debca5e8a6b0?auto=format&fit=crop&w=400&q=80',
                        'description' => 'Xíu mại tự làm, nước sốt đặc biệt',
                        'badge' => 'Mới',
                    ],
                    [
                        'name' => 'Bánh Mì Gà Nướng',
                        'price' => '22.000đ',
                        'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80',
                        'description' => 'Gà nướng tẩm ướp đậm đà',
                        'badge' => 'Hot',
                    ],
                ];
                @endphp

                @foreach($relatedProducts as $product)
                <div class="group hover:shadow-xl transition-all duration-300 border-0 shadow-md hover:-translate-y-2 bg-white rounded-lg overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img 
                            src="{{ $product['image'] }}" 
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
                            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md group-hover:scale-105 transition-transform">
                                <i data-lucide="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                Đặt
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Floating Order Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-full shadow-2xl hover:animate-none transition-all animate-bounce">
            <i data-lucide="shopping-cart" class="w-5 h-5 inline mr-2"></i>
            Đặt Hàng Ngay
        </button>
    </div>
</div>
@endsection

@push('scripts')
<script>
function productDetailApp() {
    return {
        // Add any necessary JavaScript functionality here
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
</style>
@endpush 