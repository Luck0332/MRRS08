@extends('layout.Status')

@section('title', 'ยืนยันตัวตน')
@section('reserv')

<!-- Formula -->
<meta chatset = "utf-8">
<meta name = "viewport" content = "width=devide-width, initial-scale=1">

<!-- SORCE -->
<link rel="stylesheet" href="{{ url('assets/dist/css/LineAPI_Verification.css') }}">
<script src="{{ url('assets/dist/css/LineAPI_Verification.js') }}"></script>

<section class="reserv">

<!-- /.ALERT LINE API VERIFICATION --> 

<div id="popup" class="popup" style="display:none;">
  <div class="popup-content">
    <h2>Line ยืนยันตัวตน!</h2>
    <p>โปรดเข้าสู่ระบบไลน์เพื่อยืนยันตัวตน:</p>
    <button onclick="window.location.href = '{{ route('line.auth') }}'">เข้าสู่ระบบ Line</button>
  </div>
</div>


</script>
  </div>
</div>

@endsection
