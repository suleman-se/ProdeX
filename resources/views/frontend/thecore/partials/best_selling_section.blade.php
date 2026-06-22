@php
    $best_selling_products = get_best_selling_products(20);
@endphp
@if (get_setting('best_selling') == 1 && count($best_selling_products) > 0)
    <div class="px-0 px-sm-4 w-100 overflow-hidden rounded-75 best-salling-section pt-32px pb-26px mb-4 mb-sm-0" style="background-color: {{ get_setting('best_selling_section_bg_color', '#E7EFEC') }}">
        <!-- Top Section -->
        <div class="d-flex mb-2 mb-md-3 align-items-baseline justify-content-between px-3 px-md-2">
            <!-- Title -->
            <h3 class="fs-16 fw-600 mb-2 mb-sm-0">
                <span class="">{{ translate('Best Selling') }}</span>
            </h3>
            <a type="button" class="arrow-next text-white bg-dark view-more-slide-btn d-flex align-items-center" href="{{route('best-selling')}}">
                <span><i class="las la-angle-right fs-20 fw-600"></i></span>
                <span class="fs-12 mr-2 text">{{translate('View All')}}</span>
            </a>
        </div>
        <div class="pex-carousel arrow-x-0 arrow-inactive-none" data-items="5"
            data-xxl-items="5" data-xl-items="5" data-lg-items="5" data-md-items="3" data-sm-items="1"
            data-xs-items="3" data-arrows="false" data-dots="false" data-autoplay="false" data-infinite="true">
            @foreach ($best_selling_products as $key => $product)
                <div class="px-3">
                    <div class="img h-80px w-80px h-lg-100px w-lg-100px  h-xl-130px w-xl-130px h-xxl-170px w-xxl-170px rounded overflow-hidden mx-auto position-relative image-hover-effect">
                        <a href="{{ route('product', $product->slug) }}" title="{{ $product->getTranslation('name') }}">
                            <img class="lazyload img-fit m-auto has-transition product-main-image"
                            src="{{ static_asset('assets/img/placeholder.jpg') }}"
                            data-src="{{ get_image($product->thumbnail) }}"
                            alt="{{ $product->getTranslation('name') }}"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">

                            <img
                            class="lazyload img-fit m-auto has-transition product-main-image product-hover-image position-absolute"
                            src="{{ get_first_product_image($product->thumbnail, $product->photos) }}"
                            alt="{{ $product->getTranslation('name') }}"
                            title="{{ $product->getTranslation('name') }}"
                            onerror="this.onerror=null;this.src='{{ static_asset('assets/img/placeholder.jpg') }}';">
                        </a>
                    </div>

                    <!-- Name -->
                    <div class="fs-13 mr-sm-1 mt-3 text-center mt-2 px-xs-0 px-sm-4" title="{{ $product->getTranslation('name') }}">
                        <a class="fw-400 text-truncate-2 hov-text-primary text-reset" href="{{ route('product', $product->slug) }}">{{ $product->getTranslation('name') }}</a>
                    </div>

                    <!-- Price -->
                    <div class="fs-14 mr-1 mt-1 text-center">
                        <span class="d-block fw-700">{{ home_discounted_base_price($product) }}</span>
                        @if (home_base_price($product) != home_discounted_base_price($product))
                            <del class="d-block text-secondary fs-12 fw-400">{{ home_base_price($product) }}</del>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endif