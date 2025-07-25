<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-g">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .product-card { border: 1px solid #e2e8f0; border-radius: 0.5rem; padding: 1.5rem; text-align: center; }
        .product-card a { text-decoration: none; color: inherit; }
        .product-card h3 { font-size: 1.25rem; font-weight: 600; margin-top: 1rem; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h1 class="text-lg font-semibold">{{ config('app.name', 'Laravel') }}</h1>
                <div>
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </header>

        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            @foreach ($products as $category => $items)
                <section class="mb-12">
                    <h2 class="text-2xl font-bold border-b pb-2 mb-6">{{ $category }}</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @foreach ($items as $product)
                            <div class="product-card bg-white">
                                <a href="{{ route('product.show', $product) }}">
                                    <h3>{{ $product->name }}</h3>
                                    <p class="text-gray-600 mt-2">{{ $product->description }}</p>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </section>
            @endforeach
        </main>
    </div>
</body>
</html>