@extends('layouts.admin')

@section('title', 'Quản Lý Đơn Hàng')

@section('content')
<div class="space-y-6" x-data="orderManagement()">
    <h1 class="text-2xl font-bold text-gray-900">Quản Lý Đơn Hàng</h1>

    <!-- Filters and Actions -->
    <div class="flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded-xl shadow-sm">
        <div class="flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-4 w-full md:w-auto">
            <!-- Date Filter -->
            <div class="relative">
                <select x-model="selectedDate" class="block w-full md:w-auto px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    <option value="all">Tất cả ngày</option>
                    <option value="today">Hôm nay</option>
                    <option value="yesterday">Hôm qua</option>
                    <option value="last_7_days">7 ngày qua</option>
                </select>
            </div>
            <!-- Status Filter -->
            <div class="relative">
                <select x-model="selectedStatus" class="block w-full md:w-auto px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    <option value="all">Tất cả trạng thái</option>
                    <option value="pending">Chờ xác nhận</option>
                    <option value="preparing">Đang chuẩn bị</option>
                    <option value="delivering">Đang giao</option>
                    <option value="completed">Hoàn thành</option>
                    <option value="cancelled">Đã hủy</option>
                </select>
            </div>
        </div>

        <div class="flex space-x-3 mt-4 md:mt-0">
            <button @click="printPreparationSlip()" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition-colors">
                <i data-lucide="printer" class="w-5 h-5 inline mr-2"></i>
                In phiếu chuẩn bị
            </button>
            <button @click="startDelivery()" class="bg-red-500 hover:bg-red-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition-colors">
                <i data-lucide="truck" class="w-5 h-5 inline mr-2"></i>
                Bắt đầu giao
            </button>
        </div>
    </div>

    <!-- Orders Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-lg font-bold text-gray-900">Danh Sách Đơn Hàng</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã Đơn</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Khách Hàng</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Sản Phẩm</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng Tiền</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng Thái</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Thời Gian</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Hành Động</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Example Order Row -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Nguyễn Văn A</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Bánh Mì Thịt Nguội (x1), Nước Ngọt (x1)</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">45.000đ</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Chờ xác nhận</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-05-21 10:30</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-orange-600 hover:text-orange-900 mr-4">Xem</a>
                            <button @click="markAsPreparing('#ORD001')" class="text-blue-600 hover:text-blue-900">Chuẩn bị</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD002</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Trần Thị B</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Bánh Mì Pate (x2)</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">30.000đ</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Đang chuẩn bị</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-05-21 10:25</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-orange-600 hover:text-orange-900 mr-4">Xem</a>
                            <button @click="markAsDelivering('#ORD002')" class="text-green-600 hover:text-green-900">Giao hàng</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#ORD003</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Lê Văn C</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Bánh Mì Xíu Mại (x1)</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">30.000đ</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Hoàn thành</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2024-05-21 10:20</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" class="text-orange-600 hover:text-orange-900">Xem</a>
                        </td>
                    </tr>
                    <!-- More rows can be added here -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function orderManagement() {
        return {
            selectedDate: 'all',
            selectedStatus: 'all',

            printPreparationSlip() {
                alert('In phiếu chuẩn bị cho các đơn hàng được chọn!');
                // Logic to filter and print selected orders
            },

            startDelivery() {
                alert('Bắt đầu giao hàng cho các đơn hàng được chọn!');
                // Logic to filter and update status of selected orders to 'Delivering'
            },

            markAsPreparing(orderId) {
                alert(`Đơn hàng ${orderId} đã được đánh dấu là 'Đang chuẩn bị'.`);
                // Logic to update order status in backend
            },

            markAsDelivering(orderId) {
                alert(`Đơn hàng ${orderId} đã được đánh dấu là 'Đang giao'.`);
                // Logic to update order status in backend
            }
        }
    }
</script>
@endpush 