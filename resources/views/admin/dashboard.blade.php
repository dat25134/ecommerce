@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Sales -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Doanh Thu Hôm Nay</p>
                    <p class="text-2xl font-bold text-gray-900">2.500.000đ</p>
                </div>
                <div class="bg-orange-100 p-3 rounded-full">
                    <i data-lucide="dollar-sign" class="w-6 h-6 text-orange-500"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-500 text-sm font-medium">+12%</span>
                <span class="text-gray-500 text-sm">so với hôm qua</span>
            </div>
        </div>

        <!-- Total Orders -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Đơn Hàng Hôm Nay</p>
                    <p class="text-2xl font-bold text-gray-900">24</p>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i data-lucide="shopping-bag" class="w-6 h-6 text-blue-500"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-500 text-sm font-medium">+8%</span>
                <span class="text-gray-500 text-sm">so với hôm qua</span>
            </div>
        </div>

        <!-- Total Products -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Sản Phẩm</p>
                    <p class="text-2xl font-bold text-gray-900">45</p>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i data-lucide="package" class="w-6 h-6 text-green-500"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-500 text-sm font-medium">+3</span>
                <span class="text-gray-500 text-sm">sản phẩm mới</span>
            </div>
        </div>

        <!-- Total Customers -->
        <div class="bg-white rounded-xl shadow-sm p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm font-medium text-gray-600">Khách Hàng</p>
                    <p class="text-2xl font-bold text-gray-900">156</p>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <i data-lucide="users" class="w-6 h-6 text-purple-500"></i>
                </div>
            </div>
            <div class="mt-4">
                <span class="text-green-500 text-sm font-medium">+5%</span>
                <span class="text-gray-500 text-sm">tháng này</span>
            </div>
        </div>
    </div>

    <!-- Recent Orders -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b">
            <h2 class="text-lg font-bold text-gray-900">Đơn Hàng Gần Đây</h2>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-sm font-medium text-gray-500">
                            <th class="pb-4">Mã Đơn</th>
                            <th class="pb-4">Khách Hàng</th>
                            <th class="pb-4">Sản Phẩm</th>
                            <th class="pb-4">Tổng Tiền</th>
                            <th class="pb-4">Trạng Thái</th>
                            <th class="pb-4">Thời Gian</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm">
                        <tr class="border-t">
                            <td class="py-4">#ORD001</td>
                            <td>Nguyễn Văn A</td>
                            <td>Bánh Mì Thịt Nguội</td>
                            <td>35.000đ</td>
                            <td>
                                <span class="px-2 py-1 text-xs font-medium text-green-700 bg-green-100 rounded-full">
                                    Hoàn Thành
                                </span>
                            </td>
                            <td>10:30</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4">#ORD002</td>
                            <td>Trần Thị B</td>
                            <td>Bánh Mì Pate</td>
                            <td>25.000đ</td>
                            <td>
                                <span class="px-2 py-1 text-xs font-medium text-yellow-700 bg-yellow-100 rounded-full">
                                    Đang Xử Lý
                                </span>
                            </td>
                            <td>10:25</td>
                        </tr>
                        <tr class="border-t">
                            <td class="py-4">#ORD003</td>
                            <td>Lê Văn C</td>
                            <td>Bánh Mì Xíu Mại</td>
                            <td>30.000đ</td>
                            <td>
                                <span class="px-2 py-1 text-xs font-medium text-blue-700 bg-blue-100 rounded-full">
                                    Đang Giao
                                </span>
                            </td>
                            <td>10:20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('admin.orders') }}" class="text-sm font-medium text-orange-500 hover:text-orange-600">
                    Xem tất cả đơn hàng
                </a>
            </div>
        </div>
    </div>

    <!-- Popular Products -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="p-6 border-b">
            <h2 class="text-lg font-bold text-gray-900">Sản Phẩm Bán Chạy</h2>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="flex items-center space-x-4">
                    <img src="https://placehold.co/80x80" alt="Bánh Mì Thịt Nguội" class="w-20 h-20 rounded-lg object-cover">
                    <div>
                        <h3 class="font-medium text-gray-900">Bánh Mì Thịt Nguội</h3>
                        <p class="text-sm text-gray-500">Đã bán: 45</p>
                        <p class="text-sm font-medium text-orange-500">35.000đ</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="https://placehold.co/80x80" alt="Bánh Mì Pate" class="w-20 h-20 rounded-lg object-cover">
                    <div>
                        <h3 class="font-medium text-gray-900">Bánh Mì Pate</h3>
                        <p class="text-sm text-gray-500">Đã bán: 38</p>
                        <p class="text-sm font-medium text-orange-500">25.000đ</p>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <img src="https://placehold.co/80x80" alt="Bánh Mì Xíu Mại" class="w-20 h-20 rounded-lg object-cover">
                    <div>
                        <h3 class="font-medium text-gray-900">Bánh Mì Xíu Mại</h3>
                        <p class="text-sm text-gray-500">Đã bán: 32</p>
                        <p class="text-sm font-medium text-orange-500">30.000đ</p>
                    </div>
                </div>
            </div>
            <div class="mt-6 text-center">
                <a href="{{ route('admin.products') }}" class="text-sm font-medium text-orange-500 hover:text-orange-600">
                    Xem tất cả sản phẩm
                </a>
            </div>
        </div>
    </div>
</div>
@endsection 