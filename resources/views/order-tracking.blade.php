@extends('layouts.app')

@section('title', 'Theo Dõi Đơn Hàng - Bánh Mì Sài Gòn')
@section('description', 'Theo dõi trạng thái đơn hàng bánh mì của bạn và liên hệ hotline hỗ trợ 24/7 nếu cần.')

@push('styles')
<style>
    .timeline-step {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
    }
    .timeline-dot {
        width: 2.25rem;
        height: 2.25rem;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        font-weight: 700;
        background: #f3f4f6;
        color: #e11d48;
        border: 3px solid #f3f4f6;
        transition: background 0.2s, border 0.2s;
    }
    .timeline-dot.active {
        background: #e11d48;
        color: #fff;
        border-color: #e11d48;
        box-shadow: 0 2px 8px 0 rgba(225,29,72,0.12);
    }
    .timeline-dot.done {
        background: #fff0f3;
        color: #e11d48;
        border-color: #e11d48;
    }
    .timeline-label {
        font-weight: 600;
        font-size: 1.1rem;
        color: #111827;
    }
    .timeline-bar {
        flex: 1;
        height: 4px;
        background: #f3f4f6;
        margin: 0 0.5rem;
        border-radius: 2px;
        position: relative;
    }
    .timeline-bar.active {
        background: linear-gradient(90deg, #e11d48 60%, #f3f4f6 100%);
    }
    .timeline-bar.done {
        background: #e11d48;
    }
    .order-info-row {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        margin-bottom: 0.5rem;
    }
    .order-info-label {
        color: #6b7280;
        font-size: 1rem;
        min-width: 120px;
    }
    .order-info-value {
        font-weight: 600;
        color: #111827;
        font-size: 1rem;
    }
    .order-product-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: #f9fafb;
        border-radius: 0.75rem;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px 0 rgba(0,0,0,0.03);
    }
    .order-product-img {
        width: 56px;
        height: 56px;
        border-radius: 0.5rem;
        object-fit: cover;
        border: 2px solid #f3f4f6;
        background: #fff;
    }
    .order-product-info span {
        font-weight: 600;
        color: #111827;
    }
    .order-product-info p {
        font-size: 0.95rem;
        color: #6b7280;
    }
    .order-product-qty {
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
    .order-status-alert {
        background: #fff0f3;
        border-left: 5px solid #e11d48;
        color: #e11d48;
        padding: 1rem 1.5rem;
        border-radius: 0.75rem;
        font-weight: 500;
        margin-bottom: 2.5rem;
        display: flex;
        align-items: center;
        gap: 0.75rem;
        font-size: 1.1rem;
    }
    .section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #e11d48;
        margin-bottom: 1rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .order-card-section {
        margin-bottom: 2.5rem;
    }
    .order-tracking-grid {
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 2.5rem;
    }
    @media (max-width: 1024px) {
        .order-tracking-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
    }
    @media (max-width: 640px) {
        .timeline-step { flex-direction: column; align-items: flex-start; gap: 0.5rem; }
        .timeline-bar { width: 100%; height: 4px; margin: 0.5rem 0; }
        .order-info-row { flex-direction: column; gap: 0.25rem; }
        .order-card-section { margin-bottom: 1.5rem; }
        .order-tracking-grid { gap: 1rem; }
    }
</style>
@endpush

@section('content')
<main class="bg-gray-50 min-h-screen checkout-main">
    @include('partials.header')
    <div class="container mx-auto px-2 md:px-4 py-4 md:py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-12 mt-6 mb-10">
            <div class="order-status-alert mb-8">
                <i data-lucide="info" class="w-5 h-5"></i>
                Đơn hàng của bạn đang được <b>Shipper nhận hàng</b>. Dự kiến giao trước 10:30.
            </div>
            <div class="order-tracking-grid">
                <!-- Cột trái: Timeline -->
                <div>
                    <div class="section-title"><i data-lucide="activity" class="w-5 h-5"></i>Tiến trình đơn hàng</div>
                    <div class="flex flex-col gap-0 mb-2">
                        <div class="timeline-step">
                            <div class="timeline-dot done"><i data-lucide="chef-hat" class="w-5 h-5"></i></div>
                            <div class="timeline-label">Đang chuẩn bị</div>
                            <div class="timeline-bar done"></div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-dot active"><i data-lucide="bike" class="w-5 h-5"></i></div>
                            <div class="timeline-label">Shipper nhận hàng</div>
                            <div class="timeline-bar"></div>
                        </div>
                        <div class="timeline-step">
                            <div class="timeline-dot"><i data-lucide="check-circle" class="w-5 h-5"></i></div>
                            <div class="timeline-label">Đã giao</div>
                        </div>
                    </div>
                </div>
                <!-- Cột phải: Thông tin đơn hàng, sản phẩm, tổng kết, hotline -->
                <div>
                    <div class="order-card-section">
                        <div class="section-title"><i data-lucide="file-text" class="w-5 h-5"></i>Thông tin đơn hàng</div>
                        <div class="mb-2">
                            <div class="order-info-row">
                                <div><span class="order-info-label">Mã đơn hàng:</span> <span class="order-info-value">#BM123456</span></div>
                                <div><span class="order-info-label">Ngày đặt:</span> <span class="order-info-value">12/06/2024 09:15</span></div>
                            </div>
                            <div class="order-info-row">
                                <div><span class="order-info-label">Trạng thái:</span> <span class="order-info-value text-red-500">Shipper nhận hàng</span></div>
                                <div><span class="order-info-label">Tổng tiền:</span> <span class="order-info-value">115.000đ</span></div>
                            </div>
                            <div class="order-info-row">
                                <div><span class="order-info-label">Khách hàng:</span> <span class="order-info-value">Nguyễn Văn A</span></div>
                            </div>
                            <div class="order-info-row">
                                <div><span class="order-info-label">Địa chỉ giao:</span> <span class="order-info-value">123 Đường Nguyễn Văn Cừ, Q1, TP.HCM</span></div>
                            </div>
                            <div class="order-info-row">
                                <div><span class="order-info-label">Thanh toán:</span> <span class="order-info-value">VNPay</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="order-card-section">
                        <div class="section-title"><i data-lucide="list" class="w-5 h-5"></i>Sản phẩm đã đặt</div>
                        <div class="order-product-item">
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?auto=format&fit=crop&w=400&q=80" alt="Bánh Mì Thịt Nướng Online" class="order-product-img">
                            <div class="order-product-info">
                                <span>Bánh Mì Thịt Nướng</span>
                                <p>Size: Lớn</p>
                            </div>
                            <div class="ml-auto order-product-qty">2 x 35.000đ</div>
                        </div>
                        <div class="order-product-item">
                            <img src="https://loremflickr.com/400/300/banhmi" alt="Bánh Mì Xíu Mại" class="order-product-img">
                            <div class="order-product-info">
                                <span>Bánh Mì Xíu Mại</span>
                                <p>Size: Vừa</p>
                            </div>
                            <div class="ml-auto order-product-qty">1 x 30.000đ</div>
                        </div>
                    </div>
                    <div class="order-card-section">
                        <div class="section-title"><i data-lucide="dollar-sign" class="w-5 h-5"></i>Tổng kết đơn hàng</div>
                        <div class="border-t pt-4 mt-2">
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
                    <div class="order-card-section">
                        <div class="flex items-center gap-4 bg-red-50 border border-red-200 rounded-lg p-5 justify-center">
                            <i data-lucide="phone" class="w-7 h-7 text-red-500"></i>
                            <div>
                                <div class="font-semibold text-red-600 text-lg">Hotline hỗ trợ 24/7</div>
                                <a href="tel:0123456789" class="text-gray-900 text-xl font-bold hover:underline">0123 456 789</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</main>
@endsection 