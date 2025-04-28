@extends('layouts.myadmin')

@section('title', __('Clients'))

@section('content')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Company Details</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-6">
                            <span>{{ __('Owner Details') }}</span>
                        </div>
                        <div class="col-lg-6">
                            <div class="float-right">
                                <a onClick="onFormPanel()" href="javascript:void(0);"
                                    class="btn blue-btn btn-form text-right"><i class="fa fa-plus"></i>
                                    {{ __('Add New') }}</a>
                                <a onClick="onListPanel()" href="javascript:void(0);"
                                    class="btn warning-btn btn-list text-right dnone"><i class="fa fa-reply"></i>
                                    {{ __('Back to List') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" id="list-panel">
                    <div id="tp_datalist">
                        @include('partials.client_table')
                    </div>
                </div>

                <div id="form-panel" class="card-body dnone">
                    <form class="forms-sample" data-validate="parsley" accept="{{url('/admin/saveClientsData')}}" id="DataEntry_formId" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="RecordId" id="RecordId" value="{{ $client->id ?? '' }}">
                    
                        <!-- Location Selection -->
                        <div class="row mb-3">
                            <div class="col-12">
                                <h5 class="mb-3">Please Select Correct Location <span class="mendetory-field"> ( * ) </span></h5>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="location" id="location1" value="delhi" checked>
                                    <label class="form-check-label" for="location1">Delhi</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="location" id="location2" value="mumbai">
                                    <label class="form-check-label" for="location2">Mumbai</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="location"
                                        id="location3" value="ahmedabad">
                                    <label class="form-check-label" for="location3">Ahmedabad</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="location"
                                        id="location6" value="gandhinagar">
                                    <label class="form-check-label" for="location6">Gandhinagar</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="location" id="location4" value="bangalore">
                                    <label class="form-check-label" for="location4">Bangalore</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" name="location" id="location5" value="other">
                                    <label class="form-check-label" for="location5">Other</label>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Owner Details -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="owner_name" class="form-label">Contact Name <span class="mendetory-field"> ( * ) </span></label>
                                <input id="owner_name" name="owner_name" type="text" class="form-control" value="{{ old('owner_name', $client->owner_name ?? '') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="owner_email" class="form-label">Contact Email <span class="mendetory-field"> ( * ) </span></label>
                                <input id="owner_email" name="owner_email" type="email" class="form-control" value="{{ old('owner_email', $client->owner_email ?? '') }}">
                            </div>
                        </div>
                    
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="designation" class="form-label">Role <span class="mendetory-field"> ( * ) </span></label>
                                <input id="designation" name="designation" type="text" class="form-control" value="{{ old('designation', $client->designation ?? '') }}">

                                <label for="business_cat" class="form-label">Business Category <span class="mendetory-field"> ( * ) </span></label>
                                <input id="business_cat" name="business_cat" type="text" class="form-control" value="{{ old('business_cat', $client->business_cat ?? '') }}">
                    
                                <label for="owner_phone" class="form-label mt-3">Contact Mobile No <span class="mendetory-field"> ( * ) </span></label>
                                <input id="owner_phone" name="owner_phone" type="text" class="form-control" value="{{ old('owner_phone', $client->owner_phone ?? '') }}">
                    
                                <label for="company_website" class="form-label mt-3">Website Link/URL</label>
                                <input id="company_website" name="company_website" type="text" class="form-control" value="{{ old('company_website', $client->company_website ?? '') }}">
                            </div>
                    
                            <div class="col-md-6">
                                <label for="owner_image" class="form-label">Owner Profile/Photo</label>
                                <input type="file" id="myDropify" name="owner_image" class="form-control">
                            </div>
                        </div>
                    
                        <!-- Company Details -->
                        <h6 class="card-title mt-4">Company Details</h6>
                    
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="company_name" class="form-label">Business Name <span class="mendetory-field"> ( * ) </span></label>
                                <input id="company_name" name="company_name" type="text" class="form-control" value="{{ old('company_name', $client->company_name ?? '') }}">

                                <label for="company_gst" class="form-label">Company GST No</label>
                                <input id="company_gst" name="company_gst" type="text" class="form-control" value="{{ old('company_gst', $client->company_gst ?? '') }}">
                    
                                <label for="company_address" class="form-label mt-3">Company Address <span class="mendetory-field"> ( * ) </span></label>
                                <input id="company_address" name="company_address" type="text" class="form-control" value="{{ old('company_address', $client->company_address ?? '') }}">
                    
                                <label for="video" class="form-label mt-3">Video Youtube Link</label>
                                <input id="video" name="video" type="text" class="form-control" value="{{ old('video', $client->video ?? '') }}">
                            </div>
                    
                            <div class="col-md-6">
                                <label for="company_logo" class="form-label">Brand Logo</label>
                                <input type="file" id="myDropify1" name="company_logo" class="form-control">
                            </div>
                        </div>
                    
                        <div class="row mb-3">
                            <div class="col-12">
                                <label for="easyMdeExample" class="form-label">About Us <span class="mendetory-field"> ( * ) </span></label>
                                <textarea class="form-control" name="description" id="easyMdeExample" rows="6">{{ old('description', $client->description ?? '') }}</textarea>
                            </div>
                        </div>

                    
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="facebook" class="form-label">Facebook Link</label>
                                <input id="facebook" name="facebook" type="text" class="form-control" value="{{ old('facebook', $client->facebook ?? '') }}">
                    
                                <label for="youtube" class="form-label mt-3">Youtube Link</label>
                                <input id="youtube" name="youtube" type="text" class="form-control" value="{{ old('youtube', $client->youtube ?? '') }}">
                    
                                <label for="instagram" class="form-label mt-3">Instagram Link</label>
                                <input id="instagram" name="instagram" type="text" class="form-control" value="{{ old('instagram', $client->instagram ?? '') }}">

                                <label class="form-label mt-2">Linkedin Link:</label>
                                <input name="linkedin" type="text" id="linkedin" class="form-control mb-4 mb-md-0" data-inputmask="linkedin link" />
                    
                                <label for="is_publish" class="form-label mt-3">Publish</label>
                                <select id="is_publish" name="status" class="js-example-basic-single form-select" data-width="100%">
                                    <option value="0" {{ (old('status', $client->status ?? '') == '0') ? 'selected' : '' }}>Not Publish</option>
                                    <option value="1" {{ (old('status', $client->status ?? '') == '1') ? 'selected' : '' }}>Is Publish</option>
                                </select>
                            </div>
                    
                            <div class="col-md-6">
                                <label for="company_image" class="form-label">Company Image</label>
                                <input type="file" id="myDropify2" name="company_image" class="form-control">
                            </div>
                        </div>
                    
                        <!-- Submit -->
                        <div class="row tabs-footer mt-4">
                            <div class="col-12">
                                <button id="submit-form" type="submit" class="btn btn-info mr-2">{{ __('Save') }}</button>
                                <a onclick="onListPanel()" href="javascript:void(0);" class="btn btn-danger">{{ __('Cancel') }}</a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@push('scripts')
    <!-- css/js -->
    <script type="text/javascript">
        var TEXT = [];
        TEXT['Do you really want to edit this record'] =
            "{{ __('Do you really want to edit this record') }}";
        TEXT['Do you really want to delete this record'] =
            "{{ __('Do you really want to delete this record') }}";
        TEXT['Do you really want to publish this records'] =
            "{{ __('Do you really want to publish this records') }}";
        TEXT['Do you really want to draft this records'] =
            "{{ __('Do you really want to draft this records') }}";
        TEXT['Do you really want to delete this records'] =
            "{{ __('Do you really want to delete this records') }}";
        TEXT['Please select action'] = "{{ __('Please select action') }}";
        TEXT['Please select record'] = "{{ __('Please select record') }}";

    </script>
    <!-- Plugin js for this page -->

    <script src="{{ asset('admin/pages/client.js') }}"></script>
    <script src="{{ asset('admin/vendors/easymde/easymde.min.js')}}"></script>
    <script src="{{ asset('admin/vendors/ace-builds/src-min/ace.js') }}"></script>
	<script src="{{ asset('admin/vendors/ace-builds/src-min/theme-chaos.js') }}"></script>
    <script src="{{ asset('admin/js/easymde.js ') }}"></script>
	<script src="{{ asset('admin/js/ace.js ') }}"></script>
    <script src="{{ asset('admin/vendors/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/js/dropify.js') }}"></script>
    
   
        
@endpush
