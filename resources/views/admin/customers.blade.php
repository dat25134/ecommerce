@extends('layouts.admin')

@section('title', 'Quản Lý Khách Hàng')

@section('content')
<div class="space-y-6" x-data="customerManagement()">
    <h1 class="text-2xl font-bold text-gray-900">Quản Lý Khách Hàng</h1>

    <!-- Filter and Add Customer -->
    <div class="flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded-xl shadow-sm">
        <div class="relative w-full md:w-auto">
            <input type="text" 
                   x-model="searchTerm"
                   placeholder="Tìm kiếm khách hàng..." 
                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
            >
            <i data-lucide="search" class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
        </div>

        <button @click="addCustomer()" class="mt-4 md:mt-0 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition-colors">
            <i data-lucide="plus" class="w-5 h-5 inline mr-2"></i>
            Thêm Khách Hàng Mới
        </button>
    </div>

    <!-- Customers Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-lg font-bold text-gray-900">Danh Sách Khách Hàng</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mã KH</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên Khách Hàng</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Số Điện Thoại</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tổng Đơn Hàng</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Hành Động</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Example Customer Row -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">KH001</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Nguyễn Văn A</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">nguyenvana@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">0901234567</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">15</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" @click.prevent="editCustomer('Nguyễn Văn A')" class="text-blue-600 hover:text-blue-900 mr-4">Sửa</a>
                            <a href="#" @click.prevent="deleteCustomer('Nguyễn Văn A')" class="text-red-600 hover:text-red-900">Xóa</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">KH002</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Trần Thị B</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">tranthib@example.com</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">0907654321</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">8</td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" @click.prevent="editCustomer('Trần Thị B')" class="text-blue-600 hover:text-blue-900 mr-4">Sửa</a>
                            <a href="#" @click.prevent="deleteCustomer('Trần Thị B')" class="text-red-600 hover:text-red-900">Xóa</a>
                        </td>
                    </tr>
                    <!-- More customer rows can be added here -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function customerManagement() {
        return {
            searchTerm: '',

            addCustomer() {
                alert('Chức năng thêm khách hàng mới');
                // Logic to open a form for adding a new customer
            },

            editCustomer(customerName) {
                alert(`Chức năng chỉnh sửa khách hàng: ${customerName}`);
                // Logic to open a form for editing the customer
            },

            deleteCustomer(customerName) {
                if (confirm(`Bạn có chắc chắn muốn xóa khách hàng ${customerName} không?`)) {
                    alert(`Đã xóa khách hàng: ${customerName}`);
                    // Logic to delete the customer from the backend
                }
            }
        }
    }
</script>
@endpush 