@extends('frontend.layouts.master')

@section('title', 'Mart Sutta Home Page')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{url('client')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Contact Person List
        </div>
    </div>
</div>
<div class="page-content pt-50">
    <div class="container">
        <div class="archive-header-2 text-center">
            <h1 class="display-2 mb-50">Contact Person List</h1>
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="sidebar-widget-2 widget_search mb-50">
                        <div class="search-form mb-3">
                            <form action="{{ route('frontend.getClientsPage') }}" method="GET">
                                <div class="input-group">
                                    <input 
                                        type="text" 
                                        name="search" 
                                        value="{{ request('search') }}" 
                                        class="form-control" 
                                        placeholder="Search by name, company name, or location...">
                                    <button type="submit" class="btn btn-primary client-search">
                                        <i class="fi-rs-search"></i> Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-50">
            <div class="col-5 col-lg-5 mx-auto">
                
            </div>
            <div class="col-7 col-lg-7 mx-auto">
                <div class="shop-product-fillter">
                    <div class="totall-product text-center">
                        <p>We have <strong class="text-brand">{{count($datalist)}}</strong> Contact Person</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row vendor-grid">
            @if (!empty($datalist) && count($datalist) > 0)
            @foreach($datalist as $row)
            <div class="col-lg-6 col-md-6 col-12 col-sm-6">
                <div class="vendor-wrap style-2 mb-40">
                    <div class="row">
                        <div class="col-lg-4 col-md-5 col-12 col-sm-5 mt-2">
                            <div class="client_image">
                                @if ($row->owner_image != '')
                                <img class="default-img clientcardimg" src="{{ asset('uploads/image/'.$row->owner_image) }}" alt="" />
                                @else
                                <img class="default-img clientcardimg" src="{{ asset('uploads') }}/men.png" alt="" />
                                @endif
                           </div>
                        </div>
                        <div class="col-lg-8 col-md-7 col-12 col-sm-7">
                            <div class="mb-30 mt-10">
                                @if (!empty($row->company_logo) && $row->company_logo != null)
                                <img class="default-img company-logo-imggg" src="{{ asset('uploads/image/'.$row->company_logo) }}" alt="Company Logo" />
                                @else
                                <img class="default-img company-logo-imggg" src="{{ asset('uploads') }}/logo.png" alt="" />
                                @endif
                                <p><strong>Contact Name :</strong> {{$row->owner_name}}</p>
                                <p><strong>Role :</strong> {{$row->designation}}</p>
                                <p><strong>Business Name :</strong> {{$row->company_name}}</p>
                                <p><strong>Business category :</strong> {{$row->business_cat}}</p>
                                <p><strong>Contact Email :</strong> {{$row->owner_email}}</p>
                                <p><strong>Contact No :</strong> {{$row->owner_phone}}</p>
                                <p><strong>Address :</strong> {{$row->company_address}}</p>
                                <div class="client-right-btn">
                                    <a href="{{url('/company/onwer-company-details/'.$row->id)}}" class="btn btn-success">More Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
                <p class="text-center">Not available client here.</p>
            @endif
            <!--end vendor card-->
        </div>
        <div class="pagination-area mt-20 mb-20">
            {{ $datalist->links() }}
        </div>
    </div>
</div>
@endsection
