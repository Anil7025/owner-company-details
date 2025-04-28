<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Company and owner information form">
    <meta name="author" content="Anil">
    <meta name="keywords" content="Company and owner information form">

    <title>Kamlesh - Company and owner information form</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/core/core.css') }}">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/flatpickr/flatpickr.min.css') }}">
    <!-- End plugin css for this page -->
    <link rel="stylesheet"
        href="{{ asset('admin/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/fonts/feather-font/css/iconfont.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <!-- endinject -->
    <link rel="stylesheet" href="{{ asset('admin/vendors/easymde/easymde.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/dropify/dist/dropify.min.css') }}">
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/demo2/style.css') }}">
    <!-- End layout styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/jquery.gritter.min.css') }}">
    {{-- <link rel="shortcut icon" href="{{ asset('admin/images/favicon.png') }}"
    /> --}}
</head>

<body>
    <div class="main-wrapper">
        <div class="container-fluid">

            <div class="page-content mt-3">

                <nav class="page-breadcrumb">
                    <ol class="breadcrumb mb-10">
                        <li class="breadcrumb-item active" aria-current="page">Company and owner information form</li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <span>{{ __('Fill up a current form') }}</span>
                                    </div>
                                </div>
                            </div>
                            <div id="form-panel" class="card-body">
                            <form class="forms-sample"
                                action="{{ url('/inquery-form-submit') }}"
                                data-validate="parsley" id="DataEntry_formId" method="POST"
                                enctype="multipart/form-data">@csrf
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <h5 class="mb-3">Please Select Correct Location <span
                                                    class="mendetory-field"> ( * ) </span></h5>
                                            <div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="location"
                                                        id="location1" value="delhi" checked>
                                                    <label class="form-check-label" for="location1">Delhi</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="location"
                                                        id="location2" value="mumbai">
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
                                                    <input type="radio" class="form-check-input" name="location"
                                                        id="location4" value="bangalore">
                                                    <label class="form-check-label"
                                                        for="location4">Bangalore</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input type="radio" class="form-check-input" name="location"
                                                        id="location5" value="other">
                                                    <label class="form-check-label" for="location5">Other</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="owner_name" class="form-label">Contact Name <span
                                                class="mendetory-field"> ( * ) </span></label>
                                        <input id="owner_name" name="owner_name" type="text"
                                            class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'name'" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Contact Email <span
                                                class="mendetory-field"> ( * ) </span></label>
                                        <input id="owner_email" name="owner_email" type="email"
                                            class="form-control mb-4 mb-md-0" data-inputmask="'alias': 'email'" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <label for="name" class="form-label">Role <span
                                                    class="mendetory-field"> ( * ) </span></label>
                                            <input id="designation" name="designation" type="text"
                                                class="form-control mb-4 mb-md-0"
                                                data-inputmask="'alias': 'designation'" required>
                                        </div>
                                        <div>
                                            <label class="form-label mt-2">Business Category: <span
                                                    class="mendetory-field"> ( * ) </span></label>
                                            <input id="business_cat" name="business_cat" type="text"
                                                class="form-control mb-4 mb-md-0"
                                                data-inputmask="business category" required/>
                                        </div>
                                        <div>
                                            <label class="form-label mt-2">Contact Mobile No: <span
                                                    class="mendetory-field"> ( * ) </span></label>
                                            <input id="owner_phone" name="owner_phone" type="number"
                                                class="form-control mb-4 mb-md-0"
                                                data-inputmask-alias="(+99) 9999-9999" required/>
                                        </div>
                                        <div>
                                            <label class="form-label mt-2">Website Link/URL:</label>
                                            <input name="company_website" type="text" id="company_website"
                                                class="form-control" data-inputmask="company website" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Owner Profile/Photo:</label>
                                        <input type="file" id="myDropify" name="owner_image" />
                                    </div>
                                </div>
                                <h6 class="card-title">Company Details</h6>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <label class="form-label">Business Name: <span class="mendetory-field"> ( * )
                                                </span></label>
                                            <input name="company_name" id="company_name" type="text"
                                                class="form-control mb-4 mb-md-0"
                                                data-inputmask="'alias': 'company name'" required/>
                                        </div>
                                        <div>
                                            <label class="form-label mt-2">Company GST No: </label>
                                            <input name="company_gst" type="text" id="company_gst"
                                                class="form-control" data-inputmask-alias="9999-9999-9999-9999" />
                                        </div>
                                        <div>
                                            <label class="form-label mt-2">Company Address: <span
                                                    class="mendetory-field"> ( * ) </span></label>
                                            <input name="company_address" type="text" id="company_address"
                                                class="form-control" data-inputmask="company address" required/>
                                        </div>
                                        <div>
                                            <label class="form-label mt-2">Video Youtube Link:</label>
                                            <input name="video" type="text" id="video"
                                                class="form-control mb-4 mb-md-0" data-inputmask="video link" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Brand Logo:</label><span
                                        class="mendetory-field"> ( * ) </span>
                                        <input type="file" id="myDropify1" name="company_logo" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <h4 class="card-title">About Us <span class="mendetory-field"> ( * ) </span>
                                    </h4>
                                    <textarea type="text" class="form-control" name="description"
                                        id="easyMdeExample" rows="6" required></textarea>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div>
                                            <label class="form-label mt-2">Facebook Link:</label>
                                            <input name="facebook" type="text" id="facebook"
                                                class="form-control mb-4 mb-md-0" data-inputmask="facebook link" />
                                        </div>
                                        <div>
                                            <label class="form-label mt-2">Youtube Link:</label>
                                            <input name="youtube" type="text" id="youtube" class="form-control"
                                                data-inputmask="youtube link" />
                                        </div>
                                        <div>
                                            <label class="form-label mt-2">Instagram Link:</label>
                                            <input name="instagram" type="text" id="instagram"
                                                class="form-control mb-4 mb-md-0" data-inputmask="instagram link" />
                                        </div>
                                        <div>
                                            <label class="form-label mt-2">Linkedin Link:</label>
                                            <input name="linkedin" type="text" id="linkedin"
                                                class="form-control mb-4 mb-md-0" data-inputmask="linkedin link" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Aadhaar Card:</label>
                                        <input type="file" id="myDropify2" name="company_image" />
                                    </div>
                                </div>
                                <div class="row tabs-footer mt-15">
                                    <div class="col-lg-12">
                                        <button id="submit-form" type="submit"
                                            class="btn btn-info mr-10">{{ __('Save') }}</button>
                                        <a onclick="onListPanel()" href="javascript:void(0);"
                                            class="btn btn-danger">{{ __('Cancel') }}</a>
                                    </div>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- core:js -->
    <script src="{{ asset('admin/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/core/core.js') }}"></script>
    <script src="{{ asset('admin/js/parsley.min.js') }}"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <script src="{{ asset('admin/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}">
    </script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('admin/js/data-table.js') }}"></script>
    <!-- inject:js -->
    <script src="{{ asset('admin/vendors/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/js/template.js') }}"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('admin/js/dashboard-dark.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.popupoverlay.min.js') }}"></script>
    <script src="{{ asset('admin/js/jquery.gritter.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/easymde/easymde.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/ace-builds/src-min/ace.js') }}"></script>
    <script src="{{ asset('admin/vendors/ace-builds/src-min/theme-chaos.js') }}"></script>
    <script src="{{ asset('admin/js/easymde.js ') }}"></script>
    <script src="{{ asset('admin/js/ace.js ') }}"></script>
    <script src="{{ asset('admin/vendors/dropify/dist/dropify.min.js') }}"></script>
    <script src="{{ asset('admin/js/dropify.js') }}"></script>
    <script src="{{ asset('admin/js/validate.min.js') }}"></script>

    @stack('scripts')
    <script>
        $(document).ready(function () {
            $("#DataEntry_formId").validate({
                rules: {
                    location: {
                        required: true
                    },
                    owner_name: {
                        required: true,
                        minlength: 3
                    },
                    owner_email: {
                        required: true,
                        email: true
                    },
                    designation: {
                        required: true
                    },
                    business_cat: {
                        required: true
                    },
                    owner_phone: {
                        required: true,
                        digits: true,
                        minlength: 10
                    },
                    company_website: {
                        url: true
                    },
                    company_name: {
                        required: true
                    },
                    company_gst: {
                        gst: true
                    },
                    company_address: {
                        required: true
                    },
                    video: {
                        url: true
                    },
                    facebook: {
                        url: true
                    },
                    youtube: {
                        url: true
                    },
                    instagram: {
                        url: true
                    },
                    linkedin: {
                        url: true
                    },
                    description: {
                        required: true
                    }
                },
                messages: {
                    owner_name: {
                        required: "Please enter the owner's name",
                        minlength: "Name must be at least 3 characters"
                    },
                    owner_email: {
                        required: "Please enter owner's email",
                        email: "Enter a valid email"
                    },
                    // Add other custom messages as needed...
                },
                errorElement: "div",
                errorClass: "invalid-feedback",
                highlight: function (element) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element) {
                    $(element).removeClass('is-invalid');
                },
                errorPlacement: function (error, element) {
                    if (element.parent('.input-group').length) {
                        error.insertAfter(element.parent());
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
        });

    </script>
    <script>
        function onListPanel() {
            location.reload();
        }

    </script>
    <!-- Success Modal -->
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{ session('success') }}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
    @if(session('success'))
        <script>
            $(document).ready(function () {
                $('#successModal').modal('show');
            });

        </script>
    @endif
</body>

</html>
