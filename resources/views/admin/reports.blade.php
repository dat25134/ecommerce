@extends('layouts.admin')

@section('title', 'Báo Cáo & Thống Kê')

@section('content')
<div class="space-y-6" x-data="reportManagement()">
    <h1 class="text-2xl font-bold text-gray-900">Báo Cáo & Thống Kê</h1>

    <!-- Report Filters and Actions -->
    <div class="bg-white p-4 rounded-xl shadow-sm">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div>
                <label for="report_type" class="block text-sm font-medium text-gray-700">Loại Báo Cáo</label>
                <select id="report_type" x-model="reportType" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
                    <option value="daily_sales">Doanh Thu Hàng Ngày</option>
                    <option value="monthly_sales">Doanh Thu Hàng Tháng</option>
                    <option value="product_sales">Doanh Thu Sản Phẩm</option>
                    <option value="customer_report">Báo Cáo Khách Hàng</option>
                </select>
            </div>
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700">Ngày Bắt Đầu</label>
                <input type="date" id="start_date" x-model="startDate" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700">Ngày Kết Thúc</label>
                <input type="date" id="end_date" x-model="endDate" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500 sm:text-sm">
            </div>
        </div>
        <div class="mt-6 flex justify-end space-x-3">
            <button @click="generateReport()" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-4 py-2 rounded-md shadow-sm transition-colors">
                <i data-lucide="bar-chart-2" class="w-5 h-5 inline mr-2"></i>
                Tạo Báo Cáo
            </button>
            <button @click="exportReport()" class="border border-orange-500 text-orange-500 hover:bg-orange-500 hover:text-white font-semibold px-4 py-2 rounded-md transition-colors">
                <i data-lucide="download" class="w-5 h-5 inline mr-2"></i>
                Xuất Báo Cáo
            </button>
        </div>
    </div>

    <!-- Report Display Area -->
    <div class="bg-white rounded-xl shadow-sm p-6 min-h-[400px] flex items-center justify-center text-gray-500">
        <p x-show="!reportGenerated">Chọn loại báo cáo và khoảng thời gian để tạo báo cáo.</p>
        <div x-show="reportGenerated" class="w-full h-full">
            <!-- Report content will be displayed here -->
            <h3 class="text-lg font-bold text-gray-900 mb-4" x-text="reportTitle"></h3>
            <p class="text-sm text-gray-600">Nội dung báo cáo sẽ xuất hiện ở đây dựa trên các bộ lọc đã chọn.</p>
            <!-- Placeholder for charts or detailed tables -->
            <div class="mt-4 p-4 bg-gray-50 border rounded-lg">
                <p class="text-gray-700">Đây là khu vực hiển thị dữ liệu báo cáo (ví dụ: biểu đồ, bảng dữ liệu).</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function reportManagement() {
        return {
            reportType: 'daily_sales',
            startDate: '',
            endDate: '',
            reportGenerated: false,
            reportTitle: '',

            init() {
                // Set default dates if needed, e.g., today for endDate and 7 days ago for startDate
                const today = new Date().toISOString().slice(0, 10);
                this.endDate = today;
                const sevenDaysAgo = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000).toISOString().slice(0, 10);
                this.startDate = sevenDaysAgo;
            },

            generateReport() {
                this.reportTitle = `Báo Cáo ${this.getReportTypeName(this.reportType)} từ ${this.startDate} đến ${this.endDate}`;
                alert(`Tạo báo cáo loại: ${this.getReportTypeName(this.reportType)} từ ${this.startDate} đến ${this.endDate}`);
                this.reportGenerated = true;
                // Logic to fetch report data from backend based on filters
            },

            exportReport() {
                alert('Xuất báo cáo!');
                // Logic to export report data (e.g., as PDF, Excel)
            },

            getReportTypeName(type) {
                switch (type) {
                    case 'daily_sales': return 'Doanh Thu Hàng Ngày';
                    case 'monthly_sales': return 'Doanh Thu Hàng Tháng';
                    case 'product_sales': return 'Doanh Thu Sản Phẩm';
                    case 'customer_report': return 'Khách Hàng';
                    default: return '';
                }
            }
        }
    }
</script>
@endpush 