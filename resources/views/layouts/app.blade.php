<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Meta Tags -->
    <title>@yield('title', 'Bánh Mì Sài Gòn - Bánh Mì Ngon Nhất Sài Gòn')</title>
    <meta name="description" content="@yield('description', 'Bánh mì Sài Gòn truyền thống với hương vị đậm đà, được làm thủ công từ nguyên liệu tươi ngon nhất. 20 năm kinh nghiệm phục vụ khách hàng.')">
    <meta name="keywords" content="bánh mì sài gòn, bánh mì ngon, bánh mì thịt nướng, bánh mì pate, đặt bánh mì online">
    <meta name="author" content="Bánh Mì Sài Gòn">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="@yield('og_title', 'Bánh Mì Sài Gòn - Bánh Mì Ngon Nhất Sài Gòn')">
    <meta property="og:description" content="@yield('og_description', 'Bánh mì Sài Gòn truyền thống với hương vị đậm đà, được làm thủ công từ nguyên liệu tươi ngon nhất.')">
    <meta property="og:image" content="@yield('og_image', asset('images/banh-mi-og-image.jpg'))">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="vi_VN">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Bánh Mì Sài Gòn - Bánh Mì Ngon Nhất Sài Gòn')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Bánh mì Sài Gòn truyền thống với hương vị đậm đà')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/banh-mi-og-image.jpg'))">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    
    <!-- Structured Data -->
    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Restaurant",
        "name": "Bánh Mì Sài Gòn",
        "description": "Bánh mì Sài Gòn truyền thống với hương vị đậm đà, được làm thủ công từ nguyên liệu tươi ngon nhất",
        "url": "{{ url('/') }}",
        "telephone": "0123456789",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "123 Đường Nguyễn Văn Cừ",
            "addressLocality": "Quận 1",
            "addressRegion": "TP.HCM",
            "addressCountry": "VN"
        },
        "geo": {
            "@type": "GeoCoordinates",
            "latitude": "10.7769",
            "longitude": "106.7009"
        },
        "openingHours": "Mo-Su 06:00-22:00",
        "priceRange": "15000-25000 VND",
        "servesCuisine": "Vietnamese",
        "aggregateRating": {
            "@type": "AggregateRating",
            "ratingValue": "4.9",
            "reviewCount": "2847"
        },
        "hasMenu": {
            "@type": "Menu",
            "hasMenuSection": [
                {
                    "@type": "MenuSection",
                    "name": "Bánh Mì",
                    "hasMenuItem": [
                        {
                            "@type": "MenuItem",
                            "name": "Bánh Mì Thịt Nướng",
                            "description": "Thịt nướng thơm lừng, rau củ tươi ngon",
                            "offers": {
                                "@type": "Offer",
                                "price": "20000",
                                "priceCurrency": "VND"
                            }
                        },
                        {
                            "@type": "MenuItem",
                            "name": "Bánh Mì Pate",
                            "description": "Pate đậm đà, truyền thống Việt Nam",
                            "offers": {
                                "@type": "Offer",
                                "price": "15000",
                                "priceCurrency": "VND"
                            }
                        }
                    ]
                }
            ]
        }
    }
    </script>
    
    @stack('styles')
</head>
<body class="font-sans antialiased">
    @yield('content')
    
    @stack('scripts')
    
    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
