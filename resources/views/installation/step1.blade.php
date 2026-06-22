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
                        <h1 class="fs-21 fw-700 text-uppercase mt-2" style="color: #3d3d3d;">CHECKING FILE PERMISSIONS</h1>
                        <p class="fs-12 fw-500" style="color:  #666; line-height: 18px;">
                            We ran diagnosis on your server. Review the items that have a <span style="color: #fe2b25">red</span> mark on it. <br> If everything is green, you are good to go to the next step.
                        </p>
                    </div>

                    <ul class="list-group rounded-2">
                        <li class="list-group-item fs-12 fw-600 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                            Php version 8.2

                            @php
                                $phpVersion = number_format((float)phpversion(), 2, '.', '');
                            @endphp
                            @if ($phpVersion >= 8.2)
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                    <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                    <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#fe2b25"/>
                                </svg>
                            @endif
                        </li>
                        <li class="list-group-item fs-12 fw-600 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                            Curl Enabled

                            @if ($permission['curl_enabled'])
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                    <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                    <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#fe2b25"/>
                                </svg>
                            @endif
                        </li>
                        <li class="list-group-item fs-12 fw-600 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                            .env File Permission

                            @if ($permission['db_file_write_perm'])
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                    <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                    <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#fe2b25"/>
                                </svg>
                            @endif
                        </li>
                        <li class="list-group-item fs-12 fw-600 d-flex align-items-center justify-content-between" style="line-height: 18px; color: #666; gap: 7px;">
                            RouteServiceProvider.php File Permission

                            @if ($permission['routes_file_write_perm'])
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                    <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#00ac47"/>
                                </svg>
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="13.435" height="13.435" viewBox="0 0 13.435 13.435">
                                    <path id="Union_2" data-name="Union 2" d="M-4076.25,7a.75.75,0,0,1-.75-.75V.75a.75.75,0,0,1,.75-.75.75.75,0,0,1,.75.75V5.5h9.75a.75.75,0,0,1,.75.75.75.75,0,0,1-.75.75Z" transform="translate(2882.875 -2874.389) rotate(-45)" fill="#fe2b25"/>
                                </svg>
                            @endif
                        </li>
                    </ul>
                    
                    <div class="d-flex mt-3">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                <g id="Group_22706" data-name="Group 22706" transform="translate(-704 -571)">
                                  <g id="Rectangle_19036" data-name="Rectangle 19036" transform="translate(704 571)" fill="#fff" stroke="#ea4335" stroke-width="1">
                                    <rect width="16" height="16" rx="8" stroke="none"/>
                                    <rect x="0.5" y="0.5" width="15" height="15" rx="7.5" fill="none"/>
                                  </g>
                                  <g id="Group_22693" data-name="Group 22693" transform="translate(0 -12)">
                                    <g id="Group_22698" data-name="Group 22698">
                                      <rect id="Rectangle_19044" data-name="Rectangle 19044" width="1.5" height="5" rx="0.75" transform="translate(715.475 589.939) rotate(45)" fill="#ea4335"/>
                                      <rect id="Rectangle_19111" data-name="Rectangle 19111" width="1.5" height="5" rx="0.75" transform="translate(716.536 591) rotate(135)" fill="#ea4335"/>
                                      <rect id="Rectangle_19051" data-name="Rectangle 19051" width="8" height="1.5" rx="0.75" transform="translate(708 590.25)" fill="#ea4335"/>
                                    </g>
                                  </g>
                                </g>
                            </svg>
                        </div>
                        <p class="ml-2 mb-0 fs-12 fw-500 text-justify text-gray-dark" style="color: #666; line-height: 18px;">
                            Note: Database connection is configured locally to prevent numeric value conversion issues (integers to strings). No server-wide extension changes are needed.
                        </p>
                    </div>

                    <p class="mb-4 pb-4 absolute-bottom-left right-0 d-flex justify-content-center">
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
                        @if ($permission['curl_enabled'] == 1 && $permission['db_file_write_perm'] == 1 && $permission['routes_file_write_perm'] == 1 && $phpVersion >= 7.20)
                            <a href = "{{ route('step2') }}" class="btn btn-install text-uppercase">Go To Next Step</a>
                        @endif
                    </p>
                </div>

                <!-- Common file -->
                @include('installation.common')

            </div>
        </div>
    </div>
@endsection
