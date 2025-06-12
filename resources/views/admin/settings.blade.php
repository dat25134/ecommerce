@extends('layouts.admin')

@section('title', 'Cài Đặt Hệ Thống')

@section('content')
<div class="space-y-6" x-data="settingsManagement()">
    <h1 class="text-2xl font-bold text-gray-900">Cài Đặt Hệ Thống</h1>

    <!-- Tabs for Settings Categories -->
    <div class="bg-white rounded-xl shadow-sm p-4">
        <div class="border-b border-gray-200">
            <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                <button @click="currentTab = 'general'" :class="{'border-orange-500 text-orange-600': currentTab === 'general', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !== 'general'}" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                    Cài Đặt Chung
                </button>
                <button @click="currentTab = 'users'" :class="{'border-orange-500 text-orange-600': currentTab === 'users', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !== 'users'}" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                    Quản Lý Người Dùng
                </button>
                <button @click="currentTab = 'integrations'" :class="{'border-orange-500 text-orange-600': currentTab === 'integrations', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !== 'integrations'}" class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm transition-colors">
                    Tích Hợp
                </button>
            </nav>
        </div>

        <!-- Tab Content -->
        <div class="mt-6">
            <!-- General Settings Tab -->
            <div x-show="currentTab === 'general'" class="space-y-6">
                <h2 class="text-lg font-bold text-gray-900">Thông Tin Cửa Hàng</h2>
                <form @submit.prevent="saveGeneralSettings()" class="space-y-4">
                    <div>
                        <label for="store_name" class="block text-sm font-medium text-gray-700">Tên Cửa Hàng</label>
                        <input type="text" id="store_name" x-model="settings.storeName" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Địa Chỉ</label>
                        <input type="text" id="address" x-model="settings.address" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700">Số Điện Thoại</label>
                        <input type="text" id="phone" x-model="settings.phone" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Liên Hệ</label>
                        <input type="email" id="email" x-model="settings.email" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    </div>
                    <div class="pt-4">
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition-colors">
                            Lưu Cài Đặt Chung
                        </button>
                    </div>
                </form>
            </div>

            <!-- User Management Tab -->
            <div x-show="currentTab === 'users'" class="space-y-6">
                <h2 class="text-lg font-bold text-gray-900">Quản Lý Người Dùng</h2>
                <div class="flex justify-end mb-4">
                    <button @click="addUser()" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition-colors">
                        <i data-lucide="user-plus" class="w-5 h-5 inline mr-2"></i>
                        Thêm Người Dùng Mới
                    </button>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tên</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vai Trò</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Hành Động</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Admin</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">admin@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Quản trị viên</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" @click.prevent="editUser('Admin')" class="text-blue-600 hover:text-blue-900 mr-4">Sửa</a>
                                    <a href="#" @click.prevent="deleteUser('Admin')" class="text-red-600 hover:text-red-900">Xóa</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Nhân viên</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">staff@example.com</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Nhân viên</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="#" @click.prevent="editUser('Nhân viên')" class="text-blue-600 hover:text-blue-900 mr-4">Sửa</a>
                                    <a href="#" @click.prevent="deleteUser('Nhân viên')" class="text-red-600 hover:text-red-900">Xóa</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Integrations Tab -->
            <div x-show="currentTab === 'integrations'" class="space-y-6">
                <h2 class="text-lg font-bold text-gray-900">Tích Hợp Bên Thứ Ba</h2>
                <p class="text-gray-600">Quản lý các tích hợp với dịch vụ bên ngoài như cổng thanh toán, dịch vụ giao hàng.</p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-gray-50 p-4 rounded-md border">
                        <h3 class="font-semibold text-gray-900 mb-2">Cổng Thanh Toán (ví dụ: Momo)</h3>
                        <p class="text-sm text-gray-600 mb-4">Cấu hình API key và secret để xử lý thanh toán trực tuyến.</p>
                        <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition-colors">
                            Cấu Hình Momo
                        </button>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-md border">
                        <h3 class="font-semibold text-gray-900 mb-2">Dịch Vụ Giao Hàng (ví dụ: Grab/ShopeeFood)</h3>
                        <p class="text-sm text-gray-600 mb-4">Kết nối với các dịch vụ giao hàng để tự động tạo đơn.</p>
                        <button class="bg-green-500 hover:bg-green-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition-colors">
                            Cấu Hình Giao Hàng
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function settingsManagement() {
        return {
            currentTab: 'general',
            settings: {
                storeName: 'Bánh Mì Sài Gòn',
                address: '123 Đường Nguyễn Văn Cừ, Quận 1, TP.HCM',
                phone: '0123.456.789',
                email: 'contact@banhmi.com',
            },

            saveGeneralSettings() {
                alert('Lưu cài đặt chung thành công!');
                // Logic to save settings to backend
            },

            addUser() {
                alert('Chức năng thêm người dùng mới');
                // Logic to open a form for adding a new user
            },

            editUser(userName) {
                alert(`Chức năng chỉnh sửa người dùng: ${userName}`);
                // Logic to open a form for editing the user
            },

            deleteUser(userName) {
                if (confirm(`Bạn có chắc chắn muốn xóa người dùng ${userName} không?`)) {
                    alert(`Đã xóa người dùng: ${userName}`);
                    // Logic to delete the user from the backend
                }
            }
        }
    }
</script>
@endpush 