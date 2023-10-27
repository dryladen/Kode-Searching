@extends('layouts.app')
@section('content')
    <div class="p-2 sm:p-16">
        <div class="flex flex-col gap-6 sm:bg-gray-300  p-8 rounded-lg sm:shadow-md">
            <span class="hidden lg:block bg-coklat-200 text-center text-4xl font-bold text-white p-4 rounded-lg shadow-md">Data</span>
            <div class="flex gap-4 flex-wrap w-full lg:justify-evenly ">
                <a href="{{ url('users') }}"
                    class="block shadow-md w-full lg:w-64 p-6 bg-coklat-200 border text-white rounded-lg ">
                    <h5 class="mb-2 text-2xl text-center font-bold tracking-tight dark:text-white">Users</h5>
                    <div class="flex items-center justify-center gap-4">
                        <svg class="w-16 h-16 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-card-list" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path
                                d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                        </svg>
                        <p class="font-normal text-5xl dark:text-gray-400">{{$data_user ?? '0'}}</p>
                    </div>
                </a>
                <a href="{{ url('templates') }}"
                    class="block shadow-md w-full lg:w-64 p-6 bg-coklat-200 border text-white rounded-lg ">
                    <h5 class="mb-2 text-2xl text-center font-bold tracking-tight dark:text-white">Templates</h5>
                    <div class="flex items-center justify-center gap-4">
                        <svg class="w-16 h-16 transition duration-75 dark:text-gray-400 group-hover:text-white dark:group-hover:text-white"
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-card-list" viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                            <path
                                d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zM4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0zm0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0z" />
                        </svg>
                        <p class="font-normal text-5xl dark:text-gray-400">{{$data_templates ?? '0'}}</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
