@extends('backend.layouts.blank')
@section('content')
    <div class="container pt-5">
        <div class="d-flex justify-content-center mt-5">
            <div class="card install-card position-relative position-relative">
                <!-- Content -->
                <div class="card-body h-100 w-100 z-3">
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
                        <h1 class="fs-21 fw-700 text-uppercase mt-2" style="color: #3d3d3d;">Database setup</h1>
                        <p class="fs-12 fw-500" style="color:  #666; line-height: 18px;">Fill this form with valid database credentials</p>
                    </div>

                    @if (isset($error))
                    <div class="row" style="margin-top: 20px;">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                            <strong>Invalid Database Credentials!! </strong>Please check your database credentials carefully
                            </div>
                        </div>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('install.db') }}">
                        @csrf
                        <div class="form-group">
                            <label for="db_host" class="fs-12 fw-500" style="color: #666;">Database Host</label>
                            <input type="text" class="form-control rounded-2 border" style="height: 36px !important;" id="db_host" name = "DB_HOST" required autocomplete="off">
                            <input type="hidden" name = "types[]" value="DB_HOST">
                        </div>
                        <div class="form-group">
                            <label for="db_name" class="fs-12 fw-500" style="color: #666;">Database Name</label>
                            <input type="text" class="form-control rounded-2 border" style="height: 36px !important;" id="db_name" name = "DB_DATABASE" required autocomplete="off">
                            <input type="hidden" name = "types[]" value="DB_DATABASE">
                        </div>
                        <div class="form-group">
                            <label for="db_user" class="fs-12 fw-500" style="color: #666;">Database Username</label>
                            <input type="text" class="form-control rounded-2 border" style="height: 36px !important;" id="db_user" name = "DB_USERNAME" required autocomplete="off">
                            <input type="hidden" name = "types[]" value="DB_USERNAME">
                        </div>
                        <div class="form-group">
                            <label for="db_pass" class="fs-12 fw-500" style="color: #666;">Database Password</label>
                            <input type="password" class="form-control rounded-2 border" style="height: 36px !important;" id="db_pass" name = "DB_PASSWORD" autocomplete="off">
                            <input type="hidden" name = "types[]" value="DB_PASSWORD">
                        </div>
                        <div class="mb-4 pb-4 absolute-bottom-left right-0 d-flex justify-content-center">
                            @php
                                $route = route('step1')
                            @endphp
                            <a href="{{ $route }}" class="back-btn-svg mr-3" title="Go Back" style="box-shadow: 0px 8px 16px rgb(255 88 0 / 16%); border-radius: 50%;">
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
                            <button type="submit" class="btn btn-install text-uppercase">Continue</button>
                        </div>
                    </form>
                </div>
                
                <!-- Common file -->
                @include('installation.common')
                
            </div>
        </div>
    </div>
@endsection
