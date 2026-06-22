@extends('backend.layouts.blank')
@section('content')
    <div class="container pt-5">
        <div class="d-flex justify-content-center mt-5">
			<div class="card install-card position-relative">
                <!-- Content -->
				<div class="card-body install-card-body h-100 w-100 z-3 position-relative">
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
            <h1 class="fs-21 fw-700 text-uppercase mt-2" style="color: #3d3d3d;">{{ translate('Congratulations') }}</h1>
            <p class="fs-12 fw-500" style="color:  #666; line-height: 18px;">{{ translate('You have successfully completed the updating process. Please Login to continue') }}</p>
					</div>

          <div class="mt-5 pt-5 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="120" height="100" viewBox="0 0 120 100">
              <defs>
                <clipPath id="clip-path">
                  <rect id="Rectangle_19205" data-name="Rectangle 19205" width="120" height="100" transform="translate(1390 447)" fill="#e6e6e6"/>
                </clipPath>
              </defs>
              <g id="Group_22719" data-name="Group 22719" transform="translate(-1390 -447)">
                <g id="Mask_Group_38" data-name="Mask Group 38" clip-path="url(#clip-path)">
                  <path id="Union_32" data-name="Union 32" d="M-12311.914,122.727l46.966-67.072-.037-.053,1.144-1.533.111-.154v.009l.006-.009,13.876,19.82,26.911-38.434V0h2V35.376l47.154,67.35-1.638,1.146-46.543-66.47-46.546,66.47-1.641-1.146,19.078-27.246-12.657-18.079-46.546,66.473ZM-12220.936,18V16h24V2h-23.993l0-2h26V18Z" transform="translate(13685.699 447)" fill="#e6e6e6"/>
                </g>
                <g id="Group_22718" data-name="Group 22718" transform="translate(-267.573)">
                  <path id="Union_33" data-name="Union 33" d="M-12311,0h14a1,1,0,0,1,1,1,1,1,0,0,1-1,1h-14a1,1,0,0,1-1-1A1,1,0,0,1-12311,0Z" transform="translate(-6986.012 -8158.898) rotate(-135)" fill="#34a853"/>
                  <rect id="Rectangle_19208" data-name="Rectangle 19208" width="2" height="36" rx="1" transform="translate(1719.887 547) rotate(-135)" fill="#34a853"/>
                </g>
              </g>
            </svg>
          </div>

					<div class="mb-4 pb-4 absolute-bottom-left right-0 d-flex justify-content-center">
						<a href="{{ env('APP_URL') }}" class="btn btn-primary text-uppercase mr-3" style="border-radius: 1.5rem !important;">{{ translate('Go to Home') }}</a>
						<a href="{{ env('APP_URL') }}/admin" class="btn btn-success text-uppercase" style="border-radius: 1.5rem !important;">{{ translate('Login to Admin panel') }}</a>
					</div>
				</div>

        <!-- Common file -->
        @include('update.common')
                
			</div>
		</div>
	</div>
@endsection
