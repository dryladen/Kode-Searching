<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $itle ?? 'Guest Page' }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="h-screen w-screen flex flex-col justify-center px-4 sm:px-80 bg-coklat-100">
        <a class="absolute top-10 right-20 font-bold text-lg text-amber-800 flex items-center gap-2"
            href="{{ url('login') }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
                <path fill-rule="evenodd"
                    d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
            </svg>Login</a>
        <form action="/templates/search" method="get">
            <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-coklat-200 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" id="default-search" name="code"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-full bg-gray-50 focus:ring-coklat-50 focus:border-coklat-50 "
                    placeholder="Masukan kode..." required>
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-coklat-200 hover:bg-amber-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-r-full text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        @if (session('result'))
            <div class=" flex flex-col gap-4 items-center rounded-lg mt-4 bg-coklat-100">
                {{-- <span class="font-bold text-lg bg-white px-2 text-green-500 rounded-md">Kode ditemukan</span> --}}
                <!-- Modal toggle -->
                <button data-modal-target="templates-modal " data-modal-toggle="templates-modal"
                    class="px-5 py-2.5 text-sm font-medium text-white inline-flex items-center bg-coklat-200 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-coklat-200 rounded-lg text-center"
                    type="button">
                    <svg class="w-3.5 h-3.5 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 16">
                        <path
                            d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                        <path
                            d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                    </svg>
                    Buka Kode
                </button>
            </div>
        @endif
    </div>


    <!-- Main modal -->
    <div id="templates-modal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-coklat-100 rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <button type="button"
                        class="text-white bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="templates-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div id="controls-carousel" class="relative w-full" data-carousel="static">
                        <!-- Carousel wrapper -->
                        <div class="relative h-56 overflow-hidden rounded-lg md:h-96 ">
                            <!-- Item 1 -->
                            <div class="duration-75 ease-in-out flex flex-col gap-4 items-center" data-carousel-item>
                                <span
                                    class="p-6 mx-14 text-center min-w-full flex justify-center font-bold text-lg bg-coklat-50 shadow-lg rounded-lg">{{ session('result.request_letter') ?? 'Selamat kode ditemukan' }}</span>
                                <div class="h-52 w-52 bg-cover bg-center rounded-full"
                                    style="background-image: url({{ asset('/images/default.png') }})"></div>
                            </div>
                            <!-- Item 2 -->
                            <div class="duration-75 ease-in-out flex flex-col gap-4 mb-28 rounded-lg p-4 bg-white"
                                data-carousel-item>
                                <span
                                    class="text-center font-bold text-2xl">{{ session('result.title') ?? 'Mystique Special Message' }}</span>
                                <span
                                    class="p-4 first-letter:pl-6 break-words overflow-y-auto">{{ session('result.description') ??
                                        'Produk ini memiliki sejarah yg sgt unik bdjsnfiend bdjsnfiend bdjsnfiend bdjsnfiend bdjsnfiend  ' }}
                                </span>
                            </div>
                            <!-- Item 3 -->
                            <div class="hidden duration-75 ease-in-out" data-carousel-item>
                                <div class="bg-white p-4 flex flex-col rounded-lg items-end justify-end">
                                    <span>Diproduksi Oleh : {{ session('result.author') ?? 'Toni' }}</span>
                                </div>
                            </div>
                        </div>
                        <!-- Slider controls -->
                        <button type="button"
                            class="absolute top-32 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-prev>
                            <span
                                class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-coklat-200 dark:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M5 1 1 5l4 4" />
                                </svg>
                                <span class="sr-only">Previous</span>
                            </span>
                        </button>
                        <button type="button"
                            class="absolute top-32 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                            data-carousel-next>
                            <span
                                class="inline-flex items-center justify-center w-14 h-14 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-4 h-4 text-coklat-200 dark:text-gray-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 9 4-4-4-4" />
                                </svg>
                                <span class="sr-only">Next</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    @if (session('success'))
        <script>
            var sweetAlertDemo = function() {
                var initDemo = function() {
                    swal({
                        title: "{{ session('success') }}",
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
