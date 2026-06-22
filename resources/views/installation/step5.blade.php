@extends('backend.layouts.blank')
@section('content')
    <div class="container pt-5">
        <div class="d-flex justify-content-center mt-5">
            <div class="card install-card position-relative">
                <!-- Content -->
                <div class="card-body install-card-body h-100 w-100 z-3 position-relative">
                    <!-- Top content -->
                    <div class="text-center mb-4">
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
                        <h1 class="fs-21 fw-700 text-uppercase mt-2" style="color: #3d3d3d;">Congratulations!!!</h1>
                        <p class="fs-12 fw-500" style="color:  #666; line-height: 18px;">You have successfully completed the installation process. Please Login to continue.</p>
                    </div>
                    <div>
                        <div class="d-flex align-items-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <g id="Group_22706" data-name="Group 22706" transform="translate(-704 -571)">
                                      <g id="Rectangle_19036" data-name="Rectangle 19036" transform="translate(704 571)" fill="#fff" stroke="#e6e6e6" stroke-width="1">
                                        <rect width="16" height="16" rx="8" stroke="none"/>
                                        <rect x="0.5" y="0.5" width="15" height="15" rx="7.5" fill="none"/>
                                      </g>
                                      <g id="Group_22693" data-name="Group 22693" transform="translate(0 -12)">
                                        <g id="Group_22698" data-name="Group 22698">
                                          <rect id="Rectangle_19044" data-name="Rectangle 19044" width="1.5" height="5" rx="0.75" transform="translate(715.475 589.939) rotate(45)" fill="#666"/>
                                          <rect id="Rectangle_19111" data-name="Rectangle 19111" width="1.5" height="5" rx="0.75" transform="translate(716.536 591) rotate(135)" fill="#666"/>
                                          <rect id="Rectangle_19051" data-name="Rectangle 19051" width="8" height="1.5" rx="0.75" transform="translate(708 590.25)" fill="#666"/>
                                        </g>
                                      </g>
                                    </g>
                                </svg>
                            </div>
                            <h3 class="ml-2 mb-0 fs-12 fw-700" style="color: #666; line-height: 18px;">
                                Configure the following setting to run the system properly.
                            </h3>
                        </div>
                        <ul class="fs-12 fw-500 mt-2" style="color:  #666; line-height: 18px;">
                            <li class="py-1">SMTP Setting</li>
                            <li class="py-1">Payment Method Configuration</li>
                            <li class="py-1">Social Media Login Configuration</li>
                            <li class="py-1">Facebook Chat Configuration</li>
                        </ul>
                    </div>

                    <div>
                        <div class="d-flex align-items-center">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                    <g id="Group_22706" data-name="Group 22706" transform="translate(-704 -571)">
                                      <g id="Rectangle_19036" data-name="Rectangle 19036" transform="translate(704 571)" fill="#fff" stroke="#e6e6e6" stroke-width="1">
                                        <rect width="16" height="16" rx="8" stroke="none"/>
                                        <rect x="0.5" y="0.5" width="15" height="15" rx="7.5" fill="none"/>
                                      </g>
                                      <g id="Group_22693" data-name="Group 22693" transform="translate(0 -12)">
                                        <g id="Group_22698" data-name="Group 22698">
                                          <rect id="Rectangle_19044" data-name="Rectangle 19044" width="1.5" height="5" rx="0.75" transform="translate(715.475 589.939) rotate(45)" fill="#666"/>
                                          <rect id="Rectangle_19111" data-name="Rectangle 19111" width="1.5" height="5" rx="0.75" transform="translate(716.536 591) rotate(135)" fill="#666"/>
                                          <rect id="Rectangle_19051" data-name="Rectangle 19051" width="8" height="1.5" rx="0.75" transform="translate(708 590.25)" fill="#666"/>
                                        </g>
                                      </g>
                                    </g>
                                </svg>
                            </div>
                            <h3 class="ml-2 mb-0 fs-12 fw-700" style="color: #666; line-height: 18px;">
                                Demo account added for test purpose.
                            </h3>
                        </div>
                        <ul class="list-group rounded-2 mt-2">
                            <li class="list-group-item fs-12 fw-600 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                                <span>User Type</span>
                                <span>Email</span>
                                <span>Password</span>
                            </li>
                            <li class="list-group-item fs-12 fw-500 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                                <span>Customer</span>
                                <span>customer@example.com</span>
                                <span>123456</span>
                            </li>
                            <li class="list-group-item fs-12 fw-500 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                                <span>Seller</span>
                                <span>seller@example.com</span>
                                <span>123456</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mb-4 pb-4 absolute-bottom-left right-0 d-flex justify-content-center">
                        <a href="{{ env('APP_URL') }}" class="btn btn-primary text-uppercase mr-3" style="border-radius: 1.5rem !important;">Go to Frontend Website</a>
                        <a href="{{ env('APP_URL') }}/admin" class="btn text-uppercase btn-success" style="border-radius: 1.5rem !important;">Login to Admin panel</a>
                    </div>
                </div>

                <!-- Common file -->
                @include('installation.common')
    
            </div>
        </div>
    </div>
@endsection
