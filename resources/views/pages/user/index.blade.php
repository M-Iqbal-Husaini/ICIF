@extends('layouts.user.main')
@section('content')

<!-- Start Banner Area -->
<section class="banner-area" style="background-image: url('{{ asset('assets/templates/user/img/banner/banner-ukm.jpg') }}'); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row fullscreen align-items-center justify-content-start">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="banner-content">
                            <h1>UKM <br>Polbeng</h1>
                            <p>UKM (Unit Kegiatan Mahasiswa) Politeknik Negeri Bengkalis adalah wadah kegiatan ekstrakurikuler mahasiswa yang bertujuan untuk mengembangkan minat, bakat, potensi, dan soft skills di luar aktivitas akademik. UKM ini meliputi berbagai bidang seperti seni, olahraga, keagamaan, sosial, teknologi, hingga kewirausahaan.</p>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="banner-img">
                            <img class="img-fluid" src="{{ asset('assets/templates/user/img/s.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Banner Area -->

<!-- Start Product Area -->
<section class="section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h1>UKM Politeknik Negeri Bengkalis</h1>
                    <p>UKM (Unit Kegiatan Mahasiswa) Politeknik Negeri Bengkalis adalah wadah kegiatan ekstrakurikuler mahasiswa yang bertujuan untuk mengembangkan minat, bakat, potensi, dan soft skills di luar aktivitas akademik. UKM ini meliputi berbagai bidang seperti seni, olahraga, keagamaan, sosial, teknologi, hingga kewirausahaan.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Single Product -->
            @forelse ($products as $item)
                <div class="col-lg-3 col-md-6">
                    <div class="single-product">
                        <img class="img-fluid" src="{{ asset('images/' . $item->image) }}" alt="">
                        <div class="product-details">
                            <h6>{{ $item->name }}</h6>
                            <div class="price">
                                @if($item->discount > 0)
                                    <h6>{{ $item->price }} Points</h6>
                                @else
                                    <h6>{{ $item->price }} Points</h6>
                                @endif
                            </div>
                            <div class="prd-bottom">
                                <a class="social-info" href="javascript:void(0);" onclick="confirmPurchase('{{ $item->id }}', '{{ Auth::user()->id }}')">
                                    <span class="ti-bag"></span>
                                    <p class="hover-text">Beli</p>
                                </a>
                                <a href="{{ route('user.detail.product', $item-> id) }}" class="social-info">
                                    <span class="lnr lnr-move"></span>
                                    <p class="hover-text">Detail</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-lg-12 col-md-12">
                    <div class="single-product">
                        <h3 class="text-center">Tidak ada produk</h3>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</section>
<!-- End Product Area -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmPurchase(productId, userId) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan membeli produk ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Beli!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/product/purchase/' + productId + '/' + userId;
            }
        });
    }
</script>

@endsection
