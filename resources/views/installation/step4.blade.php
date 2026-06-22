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
                        <h1 class="fs-21 fw-700 text-uppercase mt-2" style="color: #3d3d3d;">ProdeX Settings</h1>
                        <p class="fs-12 fw-500" style="color:  #666; line-height: 18px;">Fill this form with basic information & admin login credentials</p>
                    </div>

                    <form method="POST" action="{{ route('system_settings') }}">
                        @csrf
                        <div class="form-group">
                            <label for="admin_name" class="fs-12 fw-500" style="color: #666;">Admin Name</label>
                            <input type="text" class="form-control rounded-2 border" style="height: 36px !important;" id="admin_name" name="admin_name" required>
                        </div>

                        <div class="form-group">
                            <label for="admin_email" class="fs-12 fw-500" style="color: #666;">Admin Email</label>
                            <input type="email" class="form-control rounded-2 border" style="height: 36px !important;" id="admin_email" name="admin_email" required>
                        </div>

                        <div class="form-group">
                            <label for="admin_password" class="fs-12 fw-500" style="color: #666;">Admin Password (At least 6 characters)</label>
                            <input type="password" class="form-control rounded-2 border" style="height: 36px !important;" id="admin_password" name="admin_password" required>
                        </div>

                        <div class="form-group">
                            <label for="admin_name" class="fs-12 fw-500" style="color: #666;">System Currency</label>
                            <select class="form-control rounded-2 border pex-selectpicker" style="height: 36px !important;" data-live-search="true" name="system_default_currency" required>
                                @foreach (\App\Models\Currency::all() as $key => $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4 pb-4 absolute-bottom-left right-0 d-flex justify-content-center">
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
