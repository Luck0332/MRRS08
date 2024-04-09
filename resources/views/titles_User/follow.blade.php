@extends('layout.User')

@section('title', 'ติดตามการจอง')
@section('content')
    <link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/dist/css/follow.css') }}">

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css"
        href="{{ 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css' }}">

    <div class="f1">

        <div class="main">
            <script src="https://cdn.tailwindcss.com"></script>
            <div class="relative py-4 flex items-center">
                <input type="text" name="text" class="input" method="post" placeholder="รหัสการจอง">
                <label for="text" class="absolute left-2 top-6 pt-1 pl-3 text-gray-500"></label>
                <button id="detail" class="fa-solid fa-magnifying-glass ml-2" style="text-decoration: none;"></button>
                <div class="databox">
                    

                </div>
            </div>
        </div>
    </div>
@endsection
