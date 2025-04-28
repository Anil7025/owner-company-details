@extends('frontend.layouts.master')

@section('title', 'Mart Sutta Home Page')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{url('/clients')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="shop-grid-right">Company</a> <span>{{$datalist->company_name}}</span>
        </div>
    </div>
</div>
<div class="page-content mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12">

                <div class="card p-4 shadow-sm">
                    <div class="text-center mb-4">
                        <!-- Company Logo -->
                        @if (!empty($datalist->company_logo))
                            <img src="{{ asset('uploads/image/'.$datalist->company_logo) }}" alt="Company Logo" class="img-fluid mb-3" style="max-height: 120px;">
                        @else
                        <img src="{{ asset('uploads/logo.png') }}" alt="Company Logo" class="img-fluid mb-3" style="max-height: 120px;">
                        @endif
                        <h2 class="fw-bold">{{$datalist->company_name}}</h2>
                        <hr class="bottomBorder"/>
                        <p class="text-muted">{{ date('d F Y', strtotime($datalist->created_at)) }}</p>
                    </div>

                    <div class="row align-items-center mb-4 ownerComDetails">
                        <div class="col-md-2 text-center">
                            <!-- Owner Image -->
                            @if (!empty($datalist->owner_image))
                                <img src="{{ asset('uploads/men.png') }}" class="rounded-circle img-fluid owerImageDetails" alt="Placeholder">
                            @else
                                <img src="{{ asset('uploads/men.png') }}" class="rounded-circle img-fluid owerImageDetails" alt="Placeholder">
                            @endif
                        </div>
                        <div class="col-md-5">
                            <div class="shadowCon">
                                <h5 class="mb-1">Contact Persion Details: </h5>
                                <p class="mb-0">Contact Name: {{$datalist->owner_name ?? 'N/A'}}</p>
                                <p class="mb-0">Role: {{$datalist->designation ?? 'N/A'}}</p>
                                <p class="mb-0">Business Category: {{$datalist->business_cat ?? 'N/A'}}</p>
                                <p class="mb-0">Contact Email: {{$datalist->owner_email ?? 'N/A'}}</p>
                                <p class="mb-0">Contact Phone: {{$datalist->owner_phone ?? 'N/A'}}</p>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="shadowCon">
                                <h5 class="mb-1">Business Details: </h5>
                                <p class="mb-0">Business Name: {{$datalist->company_name ?? 'N/A'}}</p>
                                <p class="mb-0">Business GST: {{$datalist->company_gst ?? 'N/A'}}</p>
                                <p class="mb-0">Website Link: {{$datalist->company_website ?? 'N/A'}}</p>
                                <p class="mb-0">Business Address: {{$datalist->company_address ?? 'N/A'}}</p>
                                @if($datalist->status==1)
                                <p class="mb-0">Status: Publish</p>
                                @else
                                <p class="mb-0">Status: Not Publish</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <!-- Company Main Image -->
                        @if (!empty($datalist->company_image))
                            <img src="{{ asset('uploads/image/'.$datalist->company_image) }}" alt="Company Main Image" class="img-fluid w-100 rounded ownercompanyImg">
                        @else
                        <img src="{{ asset('uploads/company-img.jpg') }}" alt="Company Main Image" class="img-fluid w-100 rounded ownercompanyImg">
                        @endif
                    </div>

                    <div class="mb-4">
                        <!-- Description -->
                        <h4>Description :</h4>
                        @if (!empty($datalist->description))
                        <p>{!! $datalist->description !!}</p>
                        @else
                        <div class="mt-3">
                       <h5>Where does it come from?</h5> 
<p></p> Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
<p>
The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.
</p>
</div>
                        @endif
                    </div>

                    <div class="mb-4">
                        <!-- YouTube Video -->
                        @php
                            function getYoutubeEmbedUrl($url) {
                                if (preg_match('/youtu\.be\/([^\?]*)/', $url, $matches)) {
                                    return 'https://www.youtube.com/embed/' . $matches[1];
                                } elseif (preg_match('/youtube\.com.*(\?v=|\/embed\/)([^&]*)/', $url, $matches)) {
                                    return 'https://www.youtube.com/embed/' . $matches[2];
                                }
                                return $url; // fallback if not matched
                            }
                    
                            $videoUrl = !empty($datalist->company_video_url) 
                                ? getYoutubeEmbedUrl($datalist->company_video_url) 
                                : 'https://www.youtube.com/embed/D0UnqGm_miA';
                        @endphp
                    
                        <div class="ratio ratio-16x9">
                            <iframe src="{{ $videoUrl }}" title="YouTube video" allowfullscreen></iframe>
                        </div>
                    </div>
                    

                    <div class="text-center">
                        <!-- Social Links -->
                        <h5>Follow Us</h5>
                        <div class="d-flex justify-content-center gap-4 mobile-social-icon mt-3">
                            @if(!empty($datalist->facebook_link))
                                <a href="{{ $datalist->facebook_link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <img src="{{ asset('frontend/images/theme/icons/icon-facebook-white.svg') }}" alt="">
                                </a>
                            @else
                            <a href="#" target="_blank" class="btn btn-outline-primary btn-sm">
                                <img src="{{ asset('frontend/images/theme/icons/icon-facebook-white.svg') }}" alt="">
                            </a>
                            @endif
                            @if(!empty($datalist->twitter_link))
                                <a href="{{ $datalist->twitter_link }}" target="_blank" class="btn btn-outline-info btn-sm">
                                    <img src="{{ asset('frontend/images/theme/icons/icon-twitter-white.svg') }}" alt="">
                                </a>
                            @else
                            <a href="#" target="_blank" class="btn btn-outline-primary btn-sm">
                                <img src="{{ asset('frontend/images/theme/icons/icon-twitter-white.svg') }}" alt="">
                            </a>
                            @endif
                            @if(!empty($datalist->linkedin_link))
                                <a href="{{ $datalist->linkedin_link }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                    <img src="{{ asset('frontend/images/theme/icons/linkedin.png') }}" alt="">
                                </a>
                            @else
                            <a href="#" target="_blank" class="btn btn-outline-primary btn-sm">
                                <img src="{{ asset('frontend/images/theme/icons/linkedin.png') }}" alt="">
                            </a>
                            @endif
                            @if(!empty($datalist->instagram_link))
                                <a href="{{ $datalist->instagram_link }}" target="_blank" class="btn btn-outline-danger btn-sm">
                                    <img src="{{ asset('frontend/images/theme/icons/icon-instagram-white.svg') }}" alt="">
                                </a>
                            @else
                            <a href="#" target="_blank" class="btn btn-outline-primary btn-sm">
                                <img src="{{ asset('frontend/images/theme/icons/icon-instagram-white.svg') }}" alt="">
                            </a>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>

@endsection
