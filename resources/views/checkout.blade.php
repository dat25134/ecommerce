@extends('layouts.app')

@section('title', 'Thanh Toán - Bánh Mì Sài Gòn')
@section('description', 'Thanh toán đơn hàng bánh mì Sài Gòn với nhiều phương thức thanh toán tiện lợi: VNPay, MoMo, COD')
@section('og_title', 'Thanh Toán - Bánh Mì Sài Gòn')
@section('og_description', 'Thanh toán đơn hàng bánh mì Sài Gòn với nhiều phương thức thanh toán tiện lợi')

@push('styles')
<style>
    .map-container {
        height: 300px;
        border-radius: 0.75rem;
        overflow: hidden;
    }
    .payment-method-logo {
        height: 36px;
        object-fit: contain;
    }
    .checkout-section {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 4px 24px 0 rgba(0,0,0,0.07);
        padding: 2rem 1.5rem;
        margin-bottom: 1.5rem;
        border: 1px solid #f3f4f6;
    }
    .checkout-section-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #e11d48;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .checkout-section-title i {
        color: #e11d48;
    }
    .order-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: #f9fafb;
        border-radius: 0.75rem;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px 0 rgba(0,0,0,0.03);
    }
    .order-item-img {
        width: 56px;
        height: 56px;
        border-radius: 0.5rem;
        object-fit: cover;
        border: 2px solid #f3f4f6;
        background: #fff;
    }
    .order-item-info span {
        font-weight: 600;
        color: #111827;
    }
    .order-item-info p {
        font-size: 0.95rem;
        color: #6b7280;
    }
    .order-item-qty {
        font-weight: 500;
        color: #e11d48;
        font-size: 1.1rem;
    }
    .order-summary-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }
    .order-summary-row.total {
        font-weight: 700;
        font-size: 1.2rem;
        color: #e11d48;
        margin-top: 0.5rem;
    }
    .delivery-method-label {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem 1rem;
        border-radius: 0.75rem;
        border: 2px solid #f3f4f6;
        background: #f9fafb;
        margin-bottom: 0.75rem;
        cursor: pointer;
        transition: border 0.2s, background 0.2s;
    }
    .delivery-method-label:hover, .delivery-method-label input:checked ~ div {
        border-color: #e11d48;
        background: #fff0f3;
    }
    .payment-method-label {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding: 1.25rem 1rem;
        border-radius: 0.75rem;
        border: 2px solid #f3f4f6;
        background: #f9fafb;
        margin-bottom: 0.75rem;
        cursor: pointer;
        transition: border 0.2s, background 0.2s;
    }
    .payment-method-label:hover, .payment-method-label input:checked ~ img, .payment-method-label input:checked ~ div {
        border-color: #e11d48;
        background: #fff0f3;
    }
    .checkout-main {
        padding-top: 2.5rem;
        padding-bottom: 2.5rem;
    }
    @media (max-width: 768px) {
        .checkout-main {
            padding-top: 1rem;
            padding-bottom: 1rem;
        }
        .checkout-section {
            padding: 1.25rem 0.75rem;
        }
    }
</style>
@endpush

@section('content')
<main class="bg-gray-50 min-h-screen checkout-main">
    @include('partials.header')
    <div class="container mx-auto px-2 md:px-4 py-4 md:py-8">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center justify-between mb-8">
                <h1 class="text-3xl font-bold text-gray-900">Thanh Toán</h1>
                <a href="{{ route('cart') }}" class="text-red-500 hover:text-red-600 flex items-center">
                    <i data-lucide="arrow-left" class="w-5 h-5 mr-2"></i>
                    Quay lại giỏ hàng
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Left Column - Order Summary -->
                <div>
                    <div class="checkout-section">
                        <h2 class="checkout-section-title">
                            <i data-lucide="shopping-cart"></i>
                            Đơn Hàng Của Bạn
                        </h2>
                        <div>
                            <div class="order-item">
                                <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" alt="Bánh Mì Thịt Nướng Online" class="order-item-img">
                                <div class="order-item-info">
                                    <span>Bánh Mì Thịt Nướng</span>
                                    <p>Size: Lớn</p>
                                </div>
                                <div class="ml-auto order-item-qty">2 x 35.000đ</div>
                            </div>
                            <div class="order-item">
                                <img src="https://loremflickr.com/400/300/banhmi" alt="Bánh Mì Xíu Mại" class="order-item-img">
                                <div class="order-item-info">
                                    <span>Bánh Mì Xíu Mại</span>
                                    <p>Size: Vừa</p>
                                </div>
                                <div class="ml-auto order-item-qty">1 x 30.000đ</div>
                            </div>
                        </div>
                        <div class="border-t pt-4 mt-4">
                            <div class="order-summary-row">
                                <span class="text-gray-600">Tạm tính</span>
                                <span class="text-gray-900">100.000đ</span>
                            </div>
                            <div class="order-summary-row">
                                <span class="text-gray-600">Phí vận chuyển</span>
                                <span class="text-gray-900">15.000đ</span>
                            </div>
                            <div class="order-summary-row total">
                                <span>Tổng cộng</span>
                                <span>115.000đ</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Right Column - Delivery & Payment -->
                <div>
                    <div class="checkout-section">
                        <h2 class="checkout-section-title">
                            <i data-lucide="truck"></i>
                            Phương Thức Nhận Hàng
                        </h2>
                        <label class="delivery-method-label">
                            <input type="radio" name="delivery_method" value="pickup" class="h-5 w-5 text-red-500" checked>
                            <div>
                                <span class="font-medium text-gray-900">Tự đến lấy</span>
                                <p class="text-sm text-gray-500">Nhận hàng tại cửa hàng</p>
                            </div>
                        </label>
                        <label class="delivery-method-label">
                            <input type="radio" name="delivery_method" value="delivery" class="h-5 w-5 text-red-500">
                            <div>
                                <span class="font-medium text-gray-900">Giao tận nơi</span>
                                <p class="text-sm text-gray-500">Giao hàng đến địa chỉ của bạn</p>
                            </div>
                        </label>
                    </div>
                    <div class="checkout-section" x-data="{ showAddress: false }" x-show="$refs.deliveryMethod.checked">
                        <h2 class="checkout-section-title">
                            <i data-lucide="map-pin"></i>
                            Địa Chỉ Giao Hàng
                        </h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Tìm địa chỉ</label>
                                <input type="text" id="address-input" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500" placeholder="Nhập địa chỉ của bạn">
                            </div>
                            <div id="map" class="map-container"></div>
                            <div class="space-y-2">
                                <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Số nhà, tên đường">
                                <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Quận/Huyện">
                                <input type="text" class="w-full px-4 py-2 border rounded-lg" placeholder="Tỉnh/Thành phố">
                            </div>
                        </div>
                    </div>
                    <div class="checkout-section">
                        <h2 class="checkout-section-title">
                            <i data-lucide="credit-card"></i>
                            Phương Thức Thanh Toán
                        </h2>
                        <label class="payment-method-label">
                            <input type="radio" name="payment_method" value="vnpay" class="h-5 w-5 text-red-500">
                            <img src="https://stcd02206177151.cloud.edgevnpay.vn/assets/images/logo-icon/logo-primary.svg" alt="VNPay" class="payment-method-logo">
                        </label>
                        <label class="payment-method-label">
                            <input type="radio" name="payment_method" value="momo" class="h-5 w-5 text-red-500">
                            <img src="https://homepage.momocdn.net/fileuploads/svg/momo-file-240411162904.svg" alt="MoMo" class="payment-method-logo">
                        </label>
                        <label class="payment-method-label">
                            <input type="radio" name="payment_method" value="cod" class="h-5 w-5 text-red-500" checked>
                            <div>
                                <span class="font-medium text-gray-900">Thanh toán khi nhận hàng (COD)</span>
                                <p class="text-sm text-gray-500">Thanh toán bằng tiền mặt khi nhận hàng</p>
                            </div>
                        </label>
                    </div>
                    <button class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-4 px-6 rounded-full shadow-lg transition-all flex items-center justify-center space-x-2 text-lg mt-2">
                        <i data-lucide="check-circle" class="w-6 h-6"></i>
                        <span>Đặt Hàng</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</main>
@endsection

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&libraries=places" defer></script>
<script>
    // Initialize Google Maps
    function initMap() {
        const map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 10.762622, lng: 106.660172 }, // Ho Chi Minh City coordinates
            zoom: 15
        });
        const input = document.getElementById('address-input');
        const autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.addListener('place_changed', () => {
            const place = autocomplete.getPlace();
            if (!place.geometry) return;
            map.setCenter(place.geometry.location);
            new google.maps.Marker({
                map,
                position: place.geometry.location
            });
        });
    }
    window.addEventListener('load', initMap);
</script>
@endpush 