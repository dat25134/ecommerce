@extends('layouts.app')

@section('title', 'Thông Tin Cá Nhân - Bánh Mì Sài Gòn')
@section('description', 'Quản lý thông tin cá nhân, địa chỉ và lịch sử đơn hàng của bạn.')

@push('styles')
<style>
    .profile-grid {
        display: grid;
        grid-template-columns: 1fr 1fr 2fr;
        gap: 2.5rem;
        width: 100%;
    }
    .profile-card {
        background: #fff;
        border-radius: 1rem;
        box-shadow: 0 4px 24px 0 rgba(0,0,0,0.07);
        padding: 2rem 1.5rem;
        margin-bottom: 2rem;
        border: 1px solid #f3f4f6;
        min-width: 0;
    }
    .profile-section-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: #e11d48;
        margin-bottom: 1.25rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .address-item {
        display: flex;
        align-items: center;
        gap: 1rem;
        background: #f9fafb;
        border-radius: 0.75rem;
        padding: 1rem;
        margin-bottom: 1rem;
        box-shadow: 0 2px 8px 0 rgba(0,0,0,0.03);
        justify-content: space-between;
    }
    .address-label {
        font-weight: 600;
        color: #e11d48;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .order-history-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 0.5rem;
    }
    .order-history-table th, .order-history-table td {
        padding: 0.75rem 0.5rem;
        text-align: left;
    }
    .order-history-table th {
        color: #e11d48;
        font-weight: 700;
        border-bottom: 2px solid #f3f4f6;
        background: #fff0f3;
    }
    .order-history-table tr {
        border-bottom: 1px solid #f3f4f6;
    }
    .order-history-table td {
        font-size: 1rem;
        color: #374151;
    }
    .order-status {
        font-weight: 600;
        color: #e11d48;
    }
    .btn-red {
        background: #e11d48;
        color: #fff;
        border-radius: 0.5rem;
        padding: 0.5rem 1.25rem;
        font-weight: 600;
        transition: background 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }
    .btn-red:hover {
        background: #be123c;
    }
    @media (max-width: 1280px) {
        .profile-grid {
            grid-template-columns: 1fr 1fr;
        }
    }
    @media (max-width: 1024px) {
        .profile-grid {
            grid-template-columns: 1fr;
            gap: 1.5rem;
        }
    }
    @media (max-width: 640px) {
        .profile-card { padding: 1.25rem 0.75rem; }
        .profile-section-title { font-size: 1.05rem; }
    }
</style>
@endpush

@section('content')
<main class="bg-gray-50 min-h-screen checkout-main">
    @include('partials.header')
    <div class="container mx-auto px-2 md:px-4 py-4 md:py-8 w-full">
        <div class="profile-grid">
            <!-- Thông tin user -->
            <div>
                <div class="profile-card mb-6">
                    <div class="flex items-center gap-4 mb-4">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Avatar" class="w-16 h-16 rounded-full border-2 border-red-100 object-cover">
                        <div>
                            <div class="text-xl font-bold text-gray-900">Nguyễn Văn A</div>
                            <div class="text-gray-500 text-sm">nguyenvana@email.com</div>
                            <div class="text-gray-500 text-sm">0123 456 789</div>
                        </div>
                    </div>
                    <button class="btn-red mt-2"><i data-lucide="edit-3" class="w-4 h-4"></i>Chỉnh sửa thông tin</button>
                </div>
            </div>
            <!-- Địa chỉ thường dùng -->
            <div>
                <div class="profile-card">
                    <div class="profile-section-title"><i data-lucide="map-pin" class="w-5 h-5"></i>Địa chỉ thường dùng</div>
                    <div class="address-item">
                        <div>
                            <div class="address-label"><i data-lucide="home" class="w-4 h-4"></i>Nhà</div>
                            <div class="text-gray-700 text-sm">123 Đường Nguyễn Văn Cừ, Q1, TP.HCM</div>
                        </div>
                        <div class="flex gap-2">
                            <button class="btn-red"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            <button class="btn-red"><i data-lucide="trash" class="w-4 h-4"></i></button>
                        </div>
                    </div>
                    <div class="address-item">
                        <div>
                            <div class="address-label"><i data-lucide="briefcase" class="w-4 h-4"></i>Công ty</div>
                            <div class="text-gray-700 text-sm">456 Đường Lê Lợi, Q3, TP.HCM</div>
                        </div>
                        <div class="flex gap-2">
                            <button class="btn-red"><i data-lucide="edit" class="w-4 h-4"></i></button>
                            <button class="btn-red"><i data-lucide="trash" class="w-4 h-4"></i></button>
                        </div>
                    </div>
                    <button class="btn-red mt-2"><i data-lucide="plus" class="w-4 h-4"></i>Thêm địa chỉ</button>
                </div>
            </div>
            <!-- Lịch sử đơn hàng -->
            <div style="min-width:0;">
                <div class="profile-card">
                    <div class="profile-section-title"><i data-lucide="clock" class="w-5 h-5"></i>Lịch sử đơn hàng</div>
                    <table class="order-history-table">
                        <thead>
                            <tr>
                                <th>Mã đơn</th>
                                <th>Ngày đặt</th>
                                <th>Trạng thái</th>
                                <th>Tổng tiền</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>#BM123456</td>
                                <td>12/06/2024</td>
                                <td><span class="order-status">Đã giao</span></td>
                                <td>115.000đ</td>
                                <td>
                                    <button class="btn-red"><i data-lucide="refresh-ccw" class="w-4 h-4"></i>Đặt lại</button>
                                </td>
                            </tr>
                            <tr>
                                <td>#BM123457</td>
                                <td>10/06/2024</td>
                                <td><span class="order-status">Đã giao</span></td>
                                <td>85.000đ</td>
                                <td>
                                    <button class="btn-red"><i data-lucide="refresh-ccw" class="w-4 h-4"></i>Đặt lại</button>
                                </td>
                            </tr>
                            <tr>
                                <td>#BM123458</td>
                                <td>08/06/2024</td>
                                <td><span class="order-status">Đã hủy</span></td>
                                <td>0đ</td>
                                <td>
                                    <button class="btn-red" disabled style="opacity:0.5;cursor:not-allowed"><i data-lucide="refresh-ccw" class="w-4 h-4"></i>Đặt lại</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('partials.footer')
</main>
@endsection 