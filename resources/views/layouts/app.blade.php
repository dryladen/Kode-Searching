<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>{{ $title ?? 'Pages'}}</title>
</head>

<body>
    <x-sidebar />
    <main class="p-2 sm:ml-60">
        @yield('content')
    </main>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @if (session('success'))
        <script>
            var sweetAlertDemo = function() {
                var initDemo = function() {
                    swal({
                        title: "{{ session('success') }}",
                        text: "{{ session('success') }}",
                        icon: "success",
                        buttons: {
                            confirm: {
                                text: "Oke",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                };
                return {
                    init: function() {
                        initDemo();
                    },
                };
            }();

            jQuery(document).ready(function() {
                sweetAlertDemo.init();
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            var sweetAlertDemo = function() {
                var initDemo = function() {
                    swal({
                        title: "{{ session('error') }}",
                        text: "{{ session('error') }}",
                        icon: "error",
                        buttons: {
                            confirm: {
                                text: "Oke",
                                value: true,
                                visible: true,
                                className: "btn btn-success",
                                closeModal: true
                            }
                        }
                    });
                };
                return {
                    init: function() {
                        initDemo();
                    },
                };
            }();

            jQuery(document).ready(function() {
                sweetAlertDemo.init();
            });
        </script>
    @endif
</body>

</html>
