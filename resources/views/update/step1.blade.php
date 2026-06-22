@extends('backend.layouts.blank')
@section('content')
    <div class="container pt-5">
        <div class="d-flex justify-content-center mt-5">
            <div class="card install-card position-relative">
                <!-- Content -->
                <div class="card-body install-card-body h-100 w-100 z-3 position-relative">
                  <!-- Top content -->
                    <div class="mar-ver pad-btm text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 64 64">
                            <defs>
                                <linearGradient id="iconGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="#FF416C" />
                                    <stop offset="100%" stop-color="#FF4B2B" />
                                </linearGradient>
                            </defs>
                            <rect width="64" height="64" rx="16" fill="url(#iconGrad)" />
                            <path d="M19.2 19.2 L44.8 19.2 L44.8 44.8 L19.2 44.8 Z" fill="none" stroke="#FFFFFF" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M32 19.2 L32 44.8" fill="none" stroke="#FFFFFF" stroke-width="2.88" stroke-linecap="round" />
                            <path d="M19.2 32 L44.8 32" fill="none" stroke="#FFFFFF" stroke-width="2.88" stroke-linecap="round" />
                            <circle cx="32" cy="32" r="5.6" fill="#FFFFFF" />
                        </svg>
                        <h1 class="fs-21 fw-700 text-uppercase mt-2" style="color: #3d3d3d;">System Activation</h1>
                        <p class="fs-12 fw-500" style="color:  #666; line-height: 18px;">
                            Verify and activate your ProdeX platform update.
                        </p>
                    </div>

                    <form method="POST" action="{{ route('update.code') }}">
                        @csrf
                        <input type="hidden" id="purchase_code" name="purchase_code" value="11112222-3333-4444-5555-666677778888">
                        <input type="hidden" id="system_key" name="system_key" value="prodex-key">
                        <div class="text-center my-4">
                            <p class="fs-14 fw-600 text-success">ProdeX Activation is active.</p>
                            <p class="fs-12 text-muted">Click "Update" to proceed.</p>
                        </div>
                        <div class="text-center mt-3 pt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="110" height="90" viewBox="0 0 110 90">
                                <defs>
                                  <clipPath id="clip-path">
                                    <rect id="Rectangle_19104" data-name="Rectangle 19104" width="110" height="90" transform="translate(1517 718)" fill="none" stroke="#707070" stroke-width="1"/>
                                  </clipPath>
                                </defs>
                                <g id="Mask_Group_37" data-name="Mask Group 37" transform="translate(-1517 -718)" clip-path="url(#clip-path)">
                                  <g id="Group_22695" data-name="Group 22695">
                                    <path id="Subtraction_9" data-name="Subtraction 9" d="M-10247,88h-42V86h42a6.007,6.007,0,0,0,6-6V48a6.009,6.009,0,0,0-6-6h-48a6.009,6.009,0,0,0-6,6v6h-2V48a8.01,8.01,0,0,1,8-8h2V22a21.884,21.884,0,0,1,1.728-8.562,21.923,21.923,0,0,1,4.717-6.992,21.861,21.861,0,0,1,6.992-4.714A21.851,21.851,0,0,1-10271,0a21.859,21.859,0,0,1,8.565,1.73,21.862,21.862,0,0,1,6.992,4.714,21.96,21.96,0,0,1,4.717,6.992A21.884,21.884,0,0,1-10249,22V40h2a8.01,8.01,0,0,1,8,8V80A8.01,8.01,0,0,1-10247,88Zm-24-86a19.867,19.867,0,0,0-7.783,1.572,19.911,19.911,0,0,0-6.356,4.285,19.9,19.9,0,0,0-4.287,6.359A19.873,19.873,0,0,0-10291,22V40h40V22a19.889,19.889,0,0,0-1.572-7.784,19.932,19.932,0,0,0-4.287-6.359,19.873,19.873,0,0,0-6.356-4.285A19.883,19.883,0,0,0-10271,2Zm0,72a1,1,0,0,1-1-1V65.916a6.016,6.016,0,0,1-3.563-2.025A6,6,0,0,1-10277,60a6.006,6.006,0,0,1,6-6,6.006,6.006,0,0,1,6,6,5.994,5.994,0,0,1-1.437,3.891,6.011,6.011,0,0,1-3.562,2.025V73A1,1,0,0,1-10271,74Zm0-18a4,4,0,0,0-4,4,4,4,0,0,0,4,4,4.005,4.005,0,0,0,4-4A4.005,4.005,0,0,0-10271,56Z" transform="translate(11865 719)" fill="#e6e6e6"/>
                                    <path id="Union_12" data-name="Union 12" d="M15,87V31.97A16,16,0,0,1,0,16,16,16,0,0,1,27.313,4.686a16,16,0,0,1,0,22.628A15.879,15.879,0,0,1,17,31.97V68h9a1,1,0,1,1,0,2H17v8h9a1,1,0,1,1,0,2H17v7a1,1,0,0,1-2,0ZM6.1,6.1A14,14,0,0,0,15.962,30h.076A14,14,0,0,0,25.9,6.1a14,14,0,0,0-19.8,0Z" transform="translate(1580.712 797.001) rotate(150)" fill="#fe2b25"/>
                                  </g>
                                </g>
                            </svg>
                        </div>
                        <div class="mb-4 pb-4 absolute-bottom-left right-0 d-flex justify-content-center">
                          <a href="{{ url('/') }}" class="back-btn-svg mr-3" title="Go Back" style="box-shadow: 0px 8px 16px rgb(255 88 0 / 16%); border-radius: 50%;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                                  <g id="Group_22706" data-name="Group 22706" transform="translate(-770 -653)">
                                    <g id="Ellipse_26" data-name="Ellipse 26" transform="translate(770 653)" fill="none" stroke="#cccccc" stroke-width="1">
                                      <circle cx="20" cy="20" r="20" stroke="none"/>
                                      <circle class="inner" cx="20" cy="20" r="19.5" fill="none"/>
                                    </g>
                                    <path id="e078aa9915b23dfe83446121b09a6213" class="arrow" d="M98.073,90.719H88.146l4.576-4.576L91.537,85,85,91.537l6.537,6.537,1.144-1.144-4.535-4.576h9.927Z" transform="translate(698.463 581.463)" fill="#cccccc"/>
                                  </g>
                              </svg>
                          </a>
                          <button type="submit" class="btn btn-install text-uppercase">Update</button>
                        </div>
                    </form>
                </div>

                <!-- Common file -->
                @include('update.common')
                
            </div>
        </div>
    </div>
@endsection
