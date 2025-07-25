<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - Global Trade Experts</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-section {
            background: linear-gradient(90deg, rgba(37,99,235,1) 0%, rgba(29,78,216,1) 100%);
            color: white;
            padding: 4rem 1rem;
            text-align: center;
        }
        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }
        .hero-section p {
            font-size: 1.125rem;
            max-width: 600px;
            margin: 1rem auto 0;
            opacity: 0.9;
        }
        .category-title {
            font-size: 1.875rem;
            font-weight: 700;
            color: #1f2937;
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 0.5rem;
            display: inline-block;
        }
        .product-card {
            background-color: white;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -2px rgb(0 0 0 / 0.1);
        }
        .product-card a {
            text-decoration: none;
            color: inherit;
            display: block;
            padding: 1.5rem;
        }
        .product-card h3 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
        }
        .product-card p {
            color: #4b5563;
            margin-top: 0.5rem;
            font-size: 0.9rem;
        }
    </style>
</head>
<body class="antialiased bg-gray-50">
    <div class="min-h-screen">
        <header class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
                <h1 class="text-xl font-bold text-blue-600">{{ config('app.name', 'Laravel') }}</h1>
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

        <section class="hero-section">
            <h1>Your Global Partner in Quality Exports</h1>
            <p>Providing the finest selection of fresh produce and authentic products directly from the source to your doorstep.</p>
        </section>

        <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            @if ($products->isEmpty())
                <div class="text-center py-12">
                    <p class="text-xl text-gray-500">No products are available at the moment. Please check back later.</p>
                </div>
            @else
                @foreach ($products as $category => $items)
                    <section class="mb-16">
                        <h2 class="category-title mb-8">{{ $category }}</h2>
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                            @foreach ($items as $product)
                                <div class="product-card">
                                    <a href="{{ route('product.show', $product) }}">
                                        <h3>{{ $product->name }}</h3>
                                        <p>{{ $product->description }}</p>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </section>
                @endforeach
            @endif
        </main>
    </div>
</body>
</html>