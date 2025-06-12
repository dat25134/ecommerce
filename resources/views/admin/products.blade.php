@extends('layouts.admin')

@section('title', 'Quản Lý Sản Phẩm')

@section('content')
<div class="space-y-6" x-data="productManagement()">
    <h1 class="text-2xl font-bold text-gray-900">Quản Lý Sản Phẩm</h1>

    <!-- Filter and Add Product -->
    <div class="flex flex-col md:flex-row justify-between items-center bg-white p-4 rounded-xl shadow-sm">
        <div class="relative w-full md:w-auto">
            <input type="text" 
                   x-model="searchTerm"
                   placeholder="Tìm kiếm sản phẩm..." 
                   class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-orange-500 focus:border-orange-500 sm:text-sm"
            >
            <i data-lucide="search" class="w-5 h-5 text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
        </div>

        <button @click="addProduct()" class="mt-4 md:mt-0 bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition-colors">
            <i data-lucide="plus" class="w-5 h-5 inline mr-2"></i>
            Thêm Sản Phẩm Mới
        </button>
    </div>

    <!-- Products Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="p-6 border-b">
            <h2 class="text-lg font-bold text-gray-900">Danh Sách Sản Phẩm</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ảnh</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên Sản Phẩm</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Mô Tả</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Giá</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Trạng Thái</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Hành Động</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Example Product Row -->
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img class="h-10 w-10 rounded-full object-cover" src="https://placehold.co/40x40/ffb366/fff?text=SP1" alt="">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Bánh Mì Thịt Nguội Đặc Biệt</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Bánh mì kẹp thịt nguội, pate, chả lụa và rau sống.</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">35.000đ</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Đang bán</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" @click.prevent="editProduct('Bánh Mì Thịt Nguội Đặc Biệt')" class="text-blue-600 hover:text-blue-900 mr-4">Sửa</a>
                            <a href="#" @click.prevent="deleteProduct('Bánh Mì Thịt Nguội Đặc Biệt')" class="text-red-600 hover:text-red-900">Xóa</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img class="h-10 w-10 rounded-full object-cover" src="https://placehold.co/40x40/ffd699/333?text=SP2" alt="">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Bánh Mì Gà Xé</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Bánh mì kẹp gà xé, sốt đặc biệt và dưa chuột.</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">30.000đ</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Đang bán</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" @click.prevent="editProduct('Bánh Mì Gà Xé')" class="text-blue-600 hover:text-blue-900 mr-4">Sửa</a>
                            <a href="#" @click.prevent="deleteProduct('Bánh Mì Gà Xé')" class="text-red-600 hover:text-red-900">Xóa</a>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <img class="h-10 w-10 rounded-full object-cover" src="https://placehold.co/40x40/ffcc99/333?text=SP3" alt="">
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Bánh Mì Chả Cá</td>
                        <td class="px-6 py-4 text-sm text-gray-500">Bánh mì kẹp chả cá chiên giòn, rau thơm và nước sốt.</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">25.000đ</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Hết hàng</span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="#" @click.prevent="editProduct('Bánh Mì Chả Cá')" class="text-blue-600 hover:text-blue-900 mr-4">Sửa</a>
                            <a href="#" @click.prevent="deleteProduct('Bánh Mì Chả Cá')" class="text-red-600 hover:text-red-900">Xóa</a>
                        </td>
                    </tr>
                    <!-- More product rows can be added here -->
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function productManagement() {
        return {
            searchTerm: '',

            addProduct() {
                alert('Chức năng thêm sản phẩm mới');
                // Logic to open a form for adding a new product
            },

            editProduct(productName) {
                alert(`Chức năng chỉnh sửa sản phẩm: ${productName}`);
                // Logic to open a form for editing the product
            },

            deleteProduct(productName) {
                if (confirm(`Bạn có chắc chắn muốn xóa sản phẩm ${productName} không?`)) {
                    alert(`Đã xóa sản phẩm: ${productName}`);
                    // Logic to delete the product from the backend
                }
            }
        }
    }
</script>
@endpush 