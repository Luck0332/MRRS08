@extends('layout.User')

@section('title', 'ติดตามการจอง')
@section('content')
<link rel="stylesheet" href="{{ url('assets/plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ url('assets/dist/css/follow.css') }}">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<link rel="stylesheet" type="text/css" href="{{'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'}}">
<div class="f1">
    <div class="main">
        <script src="https://cdn.tailwindcss.com"></script>
        <div class="relative py-4">
            <input type="text" name="text" class="input">
            <label for="text" class="absolute left-2 top-6 pt-1 pl-3 text-gray-500">รหัสการจอง</label>
            <a id="detail" style="color: #242424"><i class="fas fa-info-circle fa-lg"></i></a>
            {{-- <a><i class="fa-solid fa-magnifying-glass" id="detail"></i></a> --}}
            @foreach ($reservations as )

            @endforeach




        </div>
    </div>
    <style>
        .relative:focus-within label {
            top: 0;
            font-size: 16px;
        }
        label {
            position: absolute;
            color: #000;
            background-color: #fff;
            padding: 0 5px;
            transition: all 0.2s ease-in-out;
        }
        main{
            width: 300px;
            color: #ffffff;
            border: 2px solid #000000;
            border-radius: 20px;
            backdrop-filter: blur(10px);
        }
        .f1 {
            display: grid;
            justify-content: center;
            align-self: center;
        }
        input {
            border: 1px solid #e2e8f0; /* เลือกสีขอบของ input */
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); /* เลือกเงาของ input */
            padding-left: 10px; /* เลือกการเรียงตัวอักษรทางด้านซ้ายของ input */
            padding-top: 1.5rem; /* เลือกการเรียงตัวอักษรทางด้านบนของ input */
            width: 900px;
        }
        a{
            cursor: pointer;
            position: absolute;
            top: 25px;
            right: 10px;
            font-size: 25px;
            border: none;
            background: none;
            color: #6b6b6b;
        }
    </style>
   <div id="popup" class="hidden">
    <table style="width:100%;">
      <tr>
        <th colspan="2" style="background-color: #3b81f2; color: white; text-align: center;border-top-left-radius: 15px;border-top-right-radius: 15px;">
          รายละเอียดการจอง
        </th>
      </tr>
      <tr>
        <td style="text-align: center">รายละเอียดการจอง (Replace with actual content)</td>
      </tr>
      </table>
    <button type="button" id="close-popup">ปิด Popup</button>
  </div>
    <script>
        const openPopupBtn = document.getElementById("detail");
        const popup = document.getElementById("popup");
        const closePopupBtn = document.getElementById("close-popup");

        openPopupBtn.addEventListener("click", () => {
            popup.classList.add("show");
        });

        closePopupBtn.addEventListener("click", () => {
            popup.classList.remove("show");
        });
    </script>
</div>
@endsection
