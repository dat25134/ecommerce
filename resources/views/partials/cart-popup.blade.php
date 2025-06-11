<!-- Floating Order Button -->
<div class="fixed bottom-6 right-6 z-50">
    <button class="bg-red-500 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-full shadow-2xl hover:animate-none transition-all animate-bounce" @click="showCart = true">
        <i data-lucide="shopping-cart" class="w-5 h-5 inline mr-2"></i>
        Giỏ hàng (<span x-text="cartCount"></span>)
    </button>
</div>

<!-- Cart Modal -->
<div x-show="showCart" x-transition class="fixed inset-0 bg-black/50 z-50" @click="showCart = false" x-cloak>
    <div class="absolute right-0 top-0 h-full w-full max-w-md bg-white shadow-xl" @click.stop>
        <!-- Cart Header -->
        <div class="flex items-center justify-between p-6 border-b">
            <h3 class="text-xl font-bold text-gray-800">Giỏ hàng của bạn</h3>
            <button @click="showCart = false" class="text-gray-400 hover:text-gray-600">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>
        </div>

        <!-- Cart Items -->
        <div class="p-6 overflow-y-auto" style="max-height: calc(100vh - 300px);">
            <div class="space-y-4">
                <!-- Sample Cart Item -->
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 bg-orange-50 rounded-lg flex items-center justify-center">
                        <!-- Fake Bánh Mì SVG -->
                        <svg viewBox="0 0 80 40" width="64" height="32" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 object-contain">
                            <ellipse cx="40" cy="20" rx="37" ry="16" fill="#FCD34D"/>
                            <ellipse cx="40" cy="20" rx="34" ry="14" fill="#FBBF24"/>
                            <ellipse cx="40" cy="20" rx="28" ry="10" fill="#FDE68A"/>
                            <path d="M15 20 Q40 5 65 20" stroke="#F59E42" stroke-width="2" fill="none"/>
                            <path d="M18 26 Q40 13 62 26" stroke="#F59E42" stroke-width="1.5" fill="none"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-800">Bánh Mì Thịt Nướng</h4>
                        <p class="text-sm text-gray-600">Thêm: Pate, Xá xíu</p>
                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center space-x-2">
                                <button class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i data-lucide="minus" class="w-4 h-4"></i>
                                </button>
                                <span class="text-gray-800">1</span>
                                <button class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i data-lucide="plus" class="w-4 h-4"></i>
                                </button>
                            </div>
                            <span class="font-semibold text-orange-500">20.000đ</span>
                        </div>
                    </div>
                    <button class="text-gray-400 hover:text-red-500">
                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                    </button>
                </div>

                <!-- Another Sample Cart Item -->
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 bg-orange-50 rounded-lg flex items-center justify-center">
                        <!-- Fake Bánh Mì SVG -->
                        <svg viewBox="0 0 80 40" width="64" height="32" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 object-contain">
                            <ellipse cx="40" cy="20" rx="37" ry="16" fill="#FCD34D"/>
                            <ellipse cx="40" cy="20" rx="34" ry="14" fill="#FBBF24"/>
                            <ellipse cx="40" cy="20" rx="28" ry="10" fill="#FDE68A"/>
                            <path d="M15 20 Q40 5 65 20" stroke="#F59E42" stroke-width="2" fill="none"/>
                            <path d="M18 26 Q40 13 62 26" stroke="#F59E42" stroke-width="1.5" fill="none"/>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-800">Bánh Mì Pate</h4>
                        <p class="text-sm text-gray-600">Thêm: Chả lụa</p>
                        <div class="flex items-center justify-between mt-2">
                            <div class="flex items-center space-x-2">
                                <button class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i data-lucide="minus" class="w-4 h-4"></i>
                                </button>
                                <span class="text-gray-800">2</span>
                                <button class="w-6 h-6 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i data-lucide="plus" class="w-4 h-4"></i>
                                </button>
                            </div>
                            <span class="font-semibold text-orange-500">30.000đ</span>
                        </div>
                    </div>
                    <button class="text-gray-400 hover:text-red-500">
                        <i data-lucide="trash-2" class="w-5 h-5"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="border-t p-6">
            <div class="space-y-3 mb-6">
                <div class="flex justify-between text-gray-600">
                    <span>Tạm tính:</span>
                    <span>50.000đ</span>
                </div>
                <div class="flex justify-between text-gray-600">
                    <span>Phí vận chuyển:</span>
                    <span>15.000đ</span>
                </div>
                <div class="flex justify-between text-lg font-bold text-gray-800">
                    <span>Tổng cộng:</span>
                    <span class="text-orange-500">65.000đ</span>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="space-y-3">
                <button class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 rounded-lg transition-colors">
                    Thanh toán
                </button>
                <button class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 font-semibold py-3 rounded-lg transition-colors" @click="showCart = false">
                    Tiếp tục mua hàng
                </button>
            </div>
        </div>
    </div>
</div> 