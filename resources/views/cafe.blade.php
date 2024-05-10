@extends('index')

@section('hero')
    <div class="hero container">
        <div class="row" style="height:600px;">
            <div class="col-md-8 my-auto px-5">
                <h3 class="fw-semibold">Experience the Luxurious Taste of</h3>
                <h1 class="fw-bold" style="font-size: 64px">🌟 Red Velvet Latte! 🌟</h1>
                <p class="fw-semibold text-secondary text-justify mt-3">Indulge in our delightful Red Velvet Latte, a unique
                    blend
                    crafted to elevate your coffee experience. Immerse yourself in the rich flavors of creamy cocoa and
                    velvety smoothness, perfectly combined with our finest espresso. Savor the moment. Savor the flavor.
                    Discover Red Velvet Latte today! 🍫☕️</p>
                <button class="btn btn-lg btn-info fw-bold">
                    Buy Now!
                </button>
            </div>
            <div class="col-md-4 my-auto">
                <img class="img-fluid rounded"
                    src="https://kurio-img.kurioapps.com/20/06/28/b8bcbf61-e003-459b-b347-dd8d72f0d4b8.jpg"alt="">
            </div>
        </div>
    </div>
@endsection

@section('list')
<div class="mx-lg-5 mt-lg-5 mb-lg-3">
<div class="rounded bg-info pt-3 pb-3">
<h2 class="text-center fw-bold mt-2">PRODUCTS</h2>
<div class="mt-3 bg-dark mx-auto rounded" style="height: 3px;width: 75px"></div>
    <div class="grid mx-3 mt-4">
                <div class="row row-gap-4">
                    @foreach ($list as $item)
                        <div class="col-3">
                            <div class="card bg-white w-100">
                                <img class="rounded" src="{{ $item['image'] }}">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title fw-bold my-auto" style="font-size: 24px">{{ $item['menu'] }}
                                        </p>
                                        <p class="my-auto rounded bg-info px-2 py-1 fw-semibold" style="font-size: 16px">Rp.
                                            {{ number_format($item['price'], 0, ',', '.') }}
                                        </p>
                                    </div>
                                    <p class=""
                                        style="overflow: hidden;max-width: 400px; display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; margin: 20px auto;">
                                        {{ $item['description'] }}
                                    </p>
                                    <button class="btn btn-primary w-100">Pesan Sekarang</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
