
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Job Test K-24</title>

    <!-- Global stylesheets -->
        @include('layouts.css')

    <!-- /global stylesheets -->

    <!-- Core JS files -->
        @yield('style')

    <!-- /core JS files -->

    <!-- Theme JS files -->

    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
@include('layouts.navbar')
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main sidebar -->
    @include('layouts.sidebar')
    <!-- /main sidebar -->


    <!-- Secondary sidebar -->

    <!-- /secondary sidebar -->


    <!-- Main content -->
    <div class="content-wrapper">



        <!-- Content area -->
        <div class="content">
        @yield('content')

            <!-- Sidebars overview -->


        </div>
        <!-- /content area -->


        <!-- Footer -->
        <div class="navbar navbar-expand-lg navbar-light">
            <div class="text-center d-lg-none w-100">
                <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
                    <i class="icon-unfold mr-2"></i>
                    Footer
                </button>
            </div>

            <div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; {{date('Y')}} <a href="#">Dashboard By</a>  <a href="mailto:fauzanadhima1234.com" target="_blank">Fauzan Adhima</a>
					</span>


            </div>
        </div>
        <!-- /footer -->

    </div>
    <!-- /main content -->

</div>
<!-- /page content -->
@include('layouts.js')
<script>
    $(document).ready(function () {

        $(".alert-success").delay(4000).slideUp(200, function() {
            $(this).alert('close');
        });

        var url = window.location;
        $('a[href="'+url+'"]').parent('li').addClass('active');
        // let asu =   $('li .nav-item  a[href="' + url + '"]').addClass('active');
        // console.log(asu);
        $('li .nav-item  a[href="' + url + '"]').parents().closest('li').addClass('open active');
        $(document).on('click', '.delete-data-table', function(a){
            a.preventDefault();
            swal({
                title: 'Are you sure?',
                text: "Do you realy want to delete this records? This process cannot be undone.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                    a.preventDefault();
                    var url = $(this).attr('href');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        method: 'delete',
                        success: function () {
                            swal(
                                'Deleted!',
                                'data has been deleted.',
                                'success'
                            )
                            table1.ajax.reload();
                            if(typeof table2){
                                table2.ajax.reload();
                            }
                        }
                    })
                }
            })
        });
        $(document).on('click', '.delete-data-table-kusus', function(a){
            a.preventDefault();
            swal({
                title: 'Are you sure?',
                text: "Do you realy want to delete this records? This process cannot be undone.",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Delete!'
            }).then((result) => {
                if (result.value) {
                    a.preventDefault();
                    var url = $(this).attr('href');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: url,
                        method: 'delete',
                        success: function () {
                            swal(
                                'Deleted!',
                                'data has been deleted.',
                                'success'
                            )
                            table1.ajax.reload();

                            location.reload();
                            if(typeof table2){
                                table2.ajax.reload();
                            }

                        }
                    })
                }
            })
        });
    })
</script>
@stack('js')
</body>
</html>
