@extends('layout.Status')

@section('title', 'จองห้องประชุม')
@section('reserv')

<!-- Formula -->
<meta chatset = "utf-8">
<meta name = "viewport" content = "width=devide-width, initial-scale=1">

<!-- SORCE -->
<link rel="stylesheet" href="{{ url('assets/dist/css/fillinformation.css') }}">
<script src="{{ url('assets/dist/css/LineAPI_Verification.js') }}"></script>
<link rel="stylesheet" href="{{ url('assets/dist/css/LineAPI_Verification.css') }}">

 <!-- /.Fill Information--> 

<section class="reserv">

<div class="textHead">
    กรอกข้อมูลการจอง
</div>


    <form action = "{{route('fill_Information.add')}}" method = "post">
    @csrf
    @method('post')

<div class="row">

    <div class="inputBox" id="first_name">
        <input type="text" required="required" class = "form-control" name = "first_name" placeholder = "ชื่อ">
    </div>

    <div class="inputBox" id="last_name">
        <input type="text" required="required" class = "form-control" name = "last_name" placeholder = "นามสกุล">
    </div>

</div>

<div class="row">
    <div class="inputBox" id="telenum">
    <input type="text" required="required" class = "form-control" name = "telenum" placeholder = "เบอร์โทรศัพท์">
    </div>
</div>

<div class="row" >
    <div class="inputBox" id="agenda">
    <input type="text" required="required" class = "form-control" name = "agenda" placeholder = "วาระการประชุม">
    </div>
</div>


<div class="row" id="confirm">
    <div class="boxConfirm">
        <button type="submit" class="btn btn-info">Submit</button>
    </div>
</div>
</form>

@endsection