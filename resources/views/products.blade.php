@extends('layouts.app')

@section('title', 'Thực Đơn Bánh Mì - Bánh Mì Sài Gòn')
@section('description', 'Khám phá thực đơn đa dạng với hơn 20 loại bánh mì ngon, từ truyền thống đến hiện đại. Giá từ 15.000đ - 50.000đ với nhiều topping hấp dẫn.')

@section('content')
<div class="min-h-screen bg-white" x-data="productListApp()">
    <!-- Header -->
    @include('partials.header')

    <!-- Breadcrumb -->
    <div class="bg-gray-50 py-4">
        <div class="container mx-auto px-4">
            <nav class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-orange-500 transition-colors">Trang chủ</a>
                <i data-lucide="chevron-right" class="w-4 h-4 text-gray-400"></i>
                <span class="text-gray-800 font-medium">Thực đơn</span>
            </nav>
        </div>
    </div>

    <!-- Page Header -->
    <section class="bg-gradient-to-br from-orange-50 to-red-50 py-12">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold text-gray-800 mb-4">
                Thực Đơn 
                <span class="text-orange-500">Bánh Mì</span>
            </h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Khám phá hương vị đa dạng với hơn 20 loại bánh mì được chế biến thủ công từ nguyên liệu tươi ngon
            </p>
            <div class="flex items-center justify-center mt-6 space-x-4">
                <div class="flex items-center space-x-1">
                    @for($i = 1; $i <= 5; $i++)
                        <i data-lucide="star" class="w-5 h-5 fill-yellow-400 text-yellow-400"></i>
                    @endfor
                    <span class="text-gray-600 ml-2">4.9/5 từ 2,847 đánh giá</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Filters & Products -->
    <section class="py-12">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <i data-lucide="filter" class="w-5 h-5 mr-2 text-orange-500"></i>
                            Bộ Lọc
                        </h3>

                        <!-- Category Filter -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">Loại Bánh Mì</h4>
                            <div class="space-y-2">
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" x-model="filters.categories" value="all" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                    <span class="ml-2 text-gray-600">Tất cả</span>
                                    <span class="ml-auto text-sm text-gray-400" x-text="getTotalCount()"></span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" x-model="filters.categories" value="truyen-thong" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                    <span class="ml-2 text-gray-600">Truyền thống</span>
                                    <span class="ml-auto text-sm text-gray-400">8</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" x-model="filters.categories" value="dac-biet" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                    <span class="ml-2 text-gray-600">Đặc biệt</span>
                                    <span class="ml-auto text-sm text-gray-400">6</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" x-model="filters.categories" value="chay" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                    <span class="ml-2 text-gray-600">Chay</span>
                                    <span class="ml-auto text-sm text-gray-400">4</span>
                                </label>
                                <label class="flex items-center cursor-pointer">
                                    <input type="checkbox" x-model="filters.categories" value="nuong" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                    <span class="ml-2 text-gray-600">Nướng</span>
                                    <span class="ml-auto text-sm text-gray-400">5</span>
                                </label>
                            </div>
                        </div>

                        <!-- Price Filter -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">Khoảng Giá</h4>
                            <div class="space-y-3">
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Từ: <span x-text="formatPrice(filters.priceRange[0])"></span></label>
                                    <input type="range" x-model="filters.priceRange[0]" min="15000" max="50000" step="5000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-600 mb-1">Đến: <span x-text="formatPrice(filters.priceRange[1])"></span></label>
                                    <input type="range" x-model="filters.priceRange[1]" min="15000" max="50000" step="5000" class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer slider">
                                </div>
                                <div class="flex justify-between text-xs text-gray-500">
                                    <span>15.000đ</span>
                                    <span>50.000đ</span>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Price Filters -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-gray-700 mb-3">Lọc Nhanh</h4>
                            <div class="flex flex-wrap gap-2">
                                <button @click="setQuickPrice(15000, 20000)" class="px-3 py-1 text-sm border border-gray-300 rounded-full hover:border-orange-500 hover:text-orange-500 transition-colors" :class="{'border-orange-500 text-orange-500 bg-orange-50': filters.priceRange[0] == 15000 && filters.priceRange[1] == 20000}">
                                    15k-20k
                                </button>
                                <button @click="setQuickPrice(20000, 30000)" class="px-3 py-1 text-sm border border-gray-300 rounded-full hover:border-orange-500 hover:text-orange-500 transition-colors" :class="{'border-orange-500 text-orange-500 bg-orange-50': filters.priceRange[0] == 20000 && filters.priceRange[1] == 30000}">
                                    20k-30k
                                </button>
                                <button @click="setQuickPrice(30000, 50000)" class="px-3 py-1 text-sm border border-gray-300 rounded-full hover:border-orange-500 hover:text-orange-500 transition-colors" :class="{'border-orange-500 text-orange-500 bg-orange-50': filters.priceRange[0] == 30000 && filters.priceRange[1] == 50000}">
                                    30k-50k
                                </button>
                            </div>
                        </div>

                        <!-- Reset Filters -->
                        <button @click="resetFilters()" class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-md transition-colors">
                            <i data-lucide="refresh-cw" class="w-4 h-4 inline mr-2"></i>
                            Đặt lại bộ lọc
                        </button>
                    </div>
                </div>

                <!-- Products Grid -->
                <div class="lg:w-3/4">
                    <!-- Sort & View Options -->
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
                        <div class="flex items-center space-x-4">
                            <span class="text-gray-600">
                                Hiển thị <span class="font-semibold" x-text="filteredProducts.length"></span> sản phẩm
                            </span>
                        </div>
                        
                        <div class="flex items-center space-x-4">
                            <select x-model="sortBy" class="border border-gray-300 rounded-md px-3 py-2 text-sm focus:ring-orange-500 focus:border-orange-500">
                                <option value="name">Sắp xếp theo tên</option>
                                <option value="price-low">Giá thấp đến cao</option>
                                <option value="price-high">Giá cao đến thấp</option>
                                <option value="popular">Phổ biến nhất</option>
                            </select>
                            
                            <div class="flex border border-gray-300 rounded-md">
                                <button @click="viewMode = 'grid'" class="p-2 hover:bg-gray-50 transition-colors" :class="{'bg-orange-50 text-orange-500': viewMode === 'grid'}">
                                    <i data-lucide="grid-3x3" class="w-4 h-4"></i>
                                </button>
                                <button @click="viewMode = 'list'" class="p-2 hover:bg-gray-50 transition-colors border-l border-gray-300" :class="{'bg-orange-50 text-orange-500': viewMode === 'list'}">
                                    <i data-lucide="list" class="w-4 h-4"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Products Grid/List -->
                    <div x-show="viewMode === 'grid'" class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">
                        <template x-for="product in filteredProducts" :key="product.id">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 group overflow-hidden">
                                <!-- Product Image -->
                                <div class="relative overflow-hidden">
                                    <img :src="product.image" :alt="product.name" class="w-full h-48 object-cover group-hover:scale-110 transition-transform duration-300">
                                    <div class="absolute top-3 left-3">
                                        <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-medium" x-text="product.badge"></span>
                                    </div>
                                    <div class="absolute top-3 right-3" x-show="product.isNew">
                                        <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">Mới</span>
                                    </div>
                                </div>

                                <!-- Product Info -->
                                <div class="p-4">
                                    <h3 class="font-bold text-lg text-gray-800 mb-2" x-text="product.name"></h3>
                                    <p class="text-gray-600 text-sm mb-3 line-clamp-2" x-text="product.description"></p>
                                    
                                    <!-- Base Price -->
                                    <div class="flex items-center justify-between mb-3">
                                        <span class="text-2xl font-bold text-orange-500" x-text="formatPrice(product.price)"></span>
                                        <div class="flex items-center space-x-1">
                                            <template x-for="i in 5">
                                                <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                            </template>
                                            <span class="text-sm text-gray-500 ml-1" x-text="product.rating"></span>
                                        </div>
                                    </div>

                                    <!-- Toppings -->
                                    <div class="mb-4" x-show="product.toppings && product.toppings.length > 0">
                                        <h4 class="text-sm font-semibold text-gray-700 mb-2">Topping kèm:</h4>
                                        <div class="space-y-1">
                                            <template x-for="topping in product.toppings.slice(0, 3)">
                                                <div class="flex justify-between items-center text-sm">
                                                    <span class="text-gray-600" x-text="topping.name"></span>
                                                    <span class="text-orange-500 font-medium" x-text="'+' + formatPrice(topping.price)"></span>
                                                </div>
                                            </template>
                                            <div x-show="product.toppings.length > 3" class="text-xs text-gray-500">
                                                và <span x-text="product.toppings.length - 3"></span> topping khác...
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Action Buttons -->
                                    <div class="flex space-x-2">
                                        <button @click="quickOrder(product)" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition-colors">
                                            <i data-lucide="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                            Đặt ngay
                                        </button>
                                        <button @click="viewProduct(product)" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-md transition-colors">
                                            <i data-lucide="eye" class="w-4 h-4"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- List View -->
                    <div x-show="viewMode === 'list'" class="space-y-4">
                        <template x-for="product in filteredProducts" :key="product.id">
                            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden">
                                <div class="flex flex-col md:flex-row">
                                    <!-- Product Image -->
                                    <div class="md:w-1/3 relative overflow-hidden">
                                        <img :src="product.image" :alt="product.name" class="w-full h-48 md:h-full object-cover">
                                        <div class="absolute top-3 left-3">
                                            <span class="bg-red-500 text-white px-2 py-1 rounded-full text-xs font-medium" x-text="product.badge"></span>
                                        </div>
                                    </div>

                                    <!-- Product Info -->
                                    <div class="md:w-2/3 p-6">
                                        <div class="flex justify-between items-start mb-3">
                                            <div>
                                                <h3 class="font-bold text-xl text-gray-800 mb-2" x-text="product.name"></h3>
                                                <p class="text-gray-600 mb-3" x-text="product.description"></p>
                                            </div>
                                            <span class="text-2xl font-bold text-orange-500" x-text="formatPrice(product.price)"></span>
                                        </div>

                                        <!-- Toppings in List View -->
                                        <div class="mb-4" x-show="product.toppings && product.toppings.length > 0">
                                            <h4 class="text-sm font-semibold text-gray-700 mb-2">Topping có thể thêm:</h4>
                                            <div class="grid grid-cols-2 gap-2">
                                                <template x-for="topping in product.toppings">
                                                    <div class="flex justify-between items-center text-sm bg-gray-50 px-3 py-1 rounded">
                                                        <span class="text-gray-600" x-text="topping.name"></span>
                                                        <span class="text-orange-500 font-medium" x-text="'+' + formatPrice(topping.price)"></span>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>

                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center space-x-1">
                                                <template x-for="i in 5">
                                                    <i data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-400"></i>
                                                </template>
                                                <span class="text-sm text-gray-500 ml-1" x-text="product.rating + ' (' + product.reviews + ' đánh giá)'"></span>
                                            </div>
                                            
                                            <div class="flex space-x-2">
                                                <button @click="viewProduct(product)" class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium py-2 px-4 rounded-md transition-colors">
                                                    Xem chi tiết
                                                </button>
                                                <button @click="quickOrder(product)" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition-colors">
                                                    <i data-lucide="shopping-cart" class="w-4 h-4 inline mr-1"></i>
                                                    Đặt ngay
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>

                    <!-- No Results -->
                    <div x-show="filteredProducts.length === 0" class="text-center py-12">
                        <i data-lucide="search-x" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Không tìm thấy sản phẩm</h3>
                        <p class="text-gray-500 mb-4">Thử điều chỉnh bộ lọc để xem thêm sản phẩm</p>
                        <button @click="resetFilters()" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-2 px-6 rounded-md transition-colors">
                            Đặt lại bộ lọc
                        </button>
                    </div>

                    <!-- Load More Button -->
                    <div class="text-center mt-8" x-show="filteredProducts.length > 0 && filteredProducts.length >= itemsPerPage">
                        <button @click="loadMore()" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold py-3 px-8 rounded-md transition-colors">
                            Xem thêm sản phẩm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('partials.footer')

    <!-- Floating Order Button -->
    <div class="fixed bottom-6 right-6 z-50">
        <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-full shadow-2xl transition-all" @click="showCart = true">
            <i data-lucide="shopping-cart" class="w-5 h-5 inline mr-2"></i>
            Giỏ hàng (<span x-text="cartCount"></span>)
        </button>
    </div>

    <!-- Quick Order Modal -->
    <div x-show="showQuickOrder" x-transition class="fixed inset-0 bg-black/50 z-50 flex items-center justify-center p-4" @click="closeQuickOrder()" x-cloak>
        <div class="bg-white rounded-lg max-w-md w-full p-6" @click.stop>
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">Đặt hàng nhanh</h3>
                <button @click="closeQuickOrder()" class="text-gray-400 hover:text-gray-600">
                    <i data-lucide="x" class="w-6 h-6"></i>
                </button>
            </div>
            
            <div x-show="selectedProduct">
                <div class="flex items-center space-x-4 mb-4">
                    <img :src="selectedProduct?.image" :alt="selectedProduct?.name" class="w-16 h-16 object-cover rounded-lg">
                    <div>
                        <h4 class="font-semibold text-gray-800" x-text="selectedProduct?.name"></h4>
                        <p class="text-orange-500 font-bold" x-text="formatPrice(selectedProduct?.price)"></p>
                    </div>
                </div>

                <!-- Toppings Selection -->
                <div class="mb-4" x-show="selectedProduct?.toppings?.length > 0">
                    <h4 class="font-semibold text-gray-700 mb-2">Chọn topping:</h4>
                    <div class="space-y-2 max-h-32 overflow-y-auto">
                        <template x-for="topping in selectedProduct?.toppings">
                            <label class="flex items-center justify-between cursor-pointer p-2 hover:bg-gray-50 rounded">
                                <div class="flex items-center">
                                    <input type="checkbox" :value="topping.id" x-model="selectedToppings" class="rounded border-gray-300 text-orange-500 focus:ring-orange-500">
                                    <span class="ml-2 text-gray-700" x-text="topping.name"></span>
                                </div>
                                <span class="text-orange-500 font-medium" x-text="'+' + formatPrice(topping.price)"></span>
                            </label>
                        </template>
                    </div>
                </div>

                <!-- Quantity -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Số lượng:</label>
                    <div class="flex items-center space-x-3">
                        <button @click="quantity = Math.max(1, quantity - 1)" class="w-8 h-8 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center">
                            <i data-lucide="minus" class="w-4 h-4"></i>
                        </button>
                        <span class="text-lg font-semibold" x-text="quantity"></span>
                        <button @click="quantity++" class="w-8 h-8 bg-gray-200 hover:bg-gray-300 rounded-full flex items-center justify-center">
                            <i data-lucide="plus" class="w-4 h-4"></i>
                        </button>
                    </div>
                </div>

                <!-- Total Price -->
                <div class="mb-4 p-3 bg-orange-50 rounded-lg">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold text-gray-700">Tổng cộng:</span>
                        <span class="text-xl font-bold text-orange-500" x-text="formatPrice(calculateTotal())"></span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex space-x-3">
                    <button @click="closeQuickOrder()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded-md transition-colors">
                        Hủy
                    </button>
                    <button @click="addToCart()" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-md transition-colors">
                        Thêm vào giỏ
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
function productListApp() {
    return {
        // Data
        products: [
            {
                id: 1,
                name: 'Bánh Mì Thịt Nướng',
                price: 20000,
                image: '{{ asset("images/banh-mi-thit-nuong.jpg") }}',
                description: 'Thịt nướng thơm lừng, rau củ tươi ngon, nước sốt đặc biệt',
                category: 'nuong',
                badge: 'Bán chạy #1',
                rating: 4.9,
                reviews: 1247,
                isNew: false,
                toppings: [
                    { id: 1, name: 'Pate', price: 5000 },
                    { id: 2, name: 'Xá xíu', price: 8000 },
                    { id: 3, name: 'Chả lụa', price: 6000 },
                    { id: 4, name: 'Trứng ốp la', price: 7000 },
                    { id: 5, name: 'Phô mai', price: 10000 }
                ]
            },
            {
                id: 2,
                name: 'Bánh Mì Pate',
                price: 15000,
                image: '{{ asset("images/banh-mi-pate.jpg") }}',
                description: 'Pate đậm đà, truyền thống Việt Nam, hương vị cổ điển',
                category: 'truyen-thong',
                badge: 'Truyền thống',
                rating: 4.8,
                reviews: 892,
                isNew: false,
                toppings: [
                    { id: 6, name: 'Chả lụa', price: 6000 },
                    { id: 7, name: 'Dưa chua', price: 3000 },
                    { id: 8, name: 'Rau răm', price: 2000 },
                    { id: 9, name: 'Ớt tươi', price: 2000 }
                ]
            },
            {
                id: 3,
                name: 'Bánh Mì Chả Cá',
                price: 25000,
                image: '{{ asset("images/banh-mi-cha-ca.jpg") }}',
                description: 'Chả cá Hà Nội, vị ngon khó quên, công thức gia truyền',
                category: 'dac-biet',
                badge: 'Đặc biệt',
                rating: 4.9,
                reviews: 654,
                isNew: true,
                toppings: [
                    { id: 10, name: 'Bún tươi', price: 5000 },
                    { id: 11, name: 'Rau thơm', price: 3000 },
                    { id: 12, name: 'Mắm tôm', price: 2000 },
                    { id: 13, name: 'Đậu phộng rang', price: 4000 }
                ]
            },
            {
                id: 4,
                name: 'Bánh Mì Xíu Mại',
                price: 18000,
                image: '{{ asset("images/banh-mi-xiu-mai.jpg") }}',
                description: 'Xíu mại tự làm, nước sốt đặc biệt, hương vị Hoa',
                category: 'truyen-thong',
                badge: 'Mới',
                rating: 4.7,
                reviews: 423,
                isNew: true,
                toppings: [
                    { id: 14, name: 'Xíu mại thêm', price: 8000 },
                    { id: 15, name: 'Nước sốt cà chua', price: 3000 },
                    { id: 16, name: 'Hành lá', price: 2000 }
                ]
            },
            {
                id: 5,
                name: 'Bánh Mì Gà Nướng',
                price: 22000,
                image: '{{ asset("images/banh-mi-ga-nuong.jpg") }}',
                description: 'Gà nướng tẩm ướp đậm đà, thịt mềm ngọt tự nhiên',
                category: 'nuong',
                badge: 'Hot',
                rating: 4.8,
                reviews: 756,
                isNew: false,
                toppings: [
                    { id: 17, name: 'Gà nướng thêm', price: 10000 },
                    { id: 18, name: 'Mayonnaise', price: 3000 },
                    { id: 19, name: 'Salad', price: 5000 },
                    { id: 20, name: 'Cà chua', price: 3000 }
                ]
            },
            {
                id: 6,
                name: 'Bánh Mì Chay Nấm',
                price: 16000,
                image: '{{ asset("images/banh-mi-chay-nam.jpg") }}',
                description: 'Nấm xào thơm ngon, rau củ tươi, phù hợp người ăn chay',
                category: 'chay',
                badge: 'Healthy',
                rating: 4.6,
                reviews: 234,
                isNew: false,
                toppings: [
                    { id: 21, name: 'Nấm thêm', price: 6000 },
                    { id: 22, name: 'Đậu hũ chiên', price: 5000 },
                    { id: 23, name: 'Rau muống', price: 3000 },
                    { id: 24, name: 'Tương ớt chay', price: 2000 }
                ]
            },
            {
                id: 7,
                name: 'Bánh Mì Bò Nướng Lá Lốt',
                price: 28000,
                image: '{{ asset("images/banh-mi-bo-nuong-la-lot.jpg") }}',
                description: 'Bò nướng lá lốt thơm lừng, hương vị đặc trưng miền Nam',
                category: 'dac-biet',
                badge: 'Premium',
                rating: 4.9,
                reviews: 445,
                isNew: true,
                toppings: [
                    { id: 25, name: 'Bò nướng thêm', price: 12000 },
                    { id: 26, name: 'Lá lốt tươi', price: 4000 },
                    { id: 27, name: 'Nước mắm pha', price: 2000 },
                    { id: 28, name: 'Đậu phộng', price: 4000 }
                ]
            },
            {
                id: 8,
                name: 'Bánh Mì Chả Lụa',
                price: 17000,
                image: '{{ asset("images/banh-mi-cha-lua.jpg") }}',
                description: 'Chả lụa truyền thống, thơm ngon đậm đà hương vị Việt',
                category: 'truyen-thong',
                badge: 'Classic',
                rating: 4.7,
                reviews: 567,
                isNew: false,
                toppings: [
                    { id: 29, name: 'Chả lụa thêm', price: 7000 },
                    { id: 30, name: 'Pate', price: 5000 },
                    { id: 31, name: 'Dưa leo', price: 2000 },
                    { id: 32, name: 'Ngò gai', price: 2000 }
                ]
            }
        ],
        
        // Filters
        filters: {
            categories: ['all'],
            priceRange: [15000, 50000]
        },
        
        // UI State
        viewMode: 'grid',
        sortBy: 'name',
        itemsPerPage: 12,
        showQuickOrder: false,
        selectedProduct: null,
        selectedToppings: [],
        quantity: 1,
        cartCount: 0,
        showCart: false,

        // Computed
        get filteredProducts() {
            let filtered = this.products;
            
            // Filter by category
            if (!this.filters.categories.includes('all')) {
                filtered = filtered.filter(product => 
                    this.filters.categories.includes(product.category)
                );
            }
            
            // Filter by price range
            filtered = filtered.filter(product => 
                product.price >= this.filters.priceRange[0] && 
                product.price <= this.filters.priceRange[1]
            );
            
            // Sort products
            switch (this.sortBy) {
                case 'price-low':
                    filtered.sort((a, b) => a.price - b.price);
                    break;
                case 'price-high':
                    filtered.sort((a, b) => b.price - a.price);
                    break;
                case 'popular':
                    filtered.sort((a, b) => b.reviews - a.reviews);
                    break;
                default:
                    filtered.sort((a, b) => a.name.localeCompare(b.name));
            }
            
            return filtered;
        },

        // Methods
        formatPrice(price) {
            return new Intl.NumberFormat('vi-VN').format(price) + 'đ';
        },
        
        getTotalCount() {
            return this.products.length;
        },
        
        setQuickPrice(min, max) {
            this.filters.priceRange = [min, max];
        },
        
        resetFilters() {
            this.filters = {
                categories: ['all'],
                priceRange: [15000, 50000]
            };
            this.sortBy = 'name';
        },
        
        quickOrder(product) {
            this.selectedProduct = product;
            this.selectedToppings = [];
            this.quantity = 1;
            this.showQuickOrder = true;
            document.body.style.overflow = 'hidden';
        },
        
        closeQuickOrder() {
            this.showQuickOrder = false;
            this.selectedProduct = null;
            document.body.style.overflow = 'auto';
        },
        
        viewProduct(product) {
            // Redirect to product detail page
            window.location.href = `/products/${product.id}`;
        },
        
        calculateTotal() {
            if (!this.selectedProduct) return 0;
            
            let total = this.selectedProduct.price;
            
            // Add topping prices
            this.selectedToppings.forEach(toppingId => {
                const topping = this.selectedProduct.toppings.find(t => t.id == toppingId);
                if (topping) {
                    total += topping.price;
                }
            });
            
            return total * this.quantity;
        },
        
        addToCart() {
            // Add to cart logic here
            this.cartCount++;
            alert(`Đã thêm ${this.selectedProduct.name} vào giỏ hàng!`);
            this.closeQuickOrder();
        },
        
        loadMore() {
            this.itemsPerPage += 12;
        }
    }
}
</script>
@endpush

@push('styles')
<style>
[x-cloak] { display: none !important; }

.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.slider::-webkit-slider-thumb {
    appearance: none;
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background: #f97316;
    cursor: pointer;
    border: 2px solid #ffffff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

.slider::-moz-range-thumb {
    height: 20px;
    width: 20px;
    border-radius: 50%;
    background: #f97316;
    cursor: pointer;
    border: 2px solid #ffffff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
}
</style>
@endpush
