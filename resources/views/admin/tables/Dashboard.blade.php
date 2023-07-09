@extends('admin.master')

@section('main-admin')

{{-- <style>
#chartContainer .canvasjs-chart-canva{
    width: 50%;
}
</style> --}}

<div class="main-chart">
    <h1>Dashboard</h1>  
    
    <div class="dashboard-hotel">
        <div class="time">
            <div style="width: 18.2%;"><b>Từ ngày</b></div>
            <div><b>Đến ngày</b></div>
        </div>
        <input type="date" name="" id="hotel-start">
        <input type="date" name="" id="hotel-end">
        <button class="submit"> <i class="fa-solid fa-paper-plane"></i> </button>
    </div>
    <div style="display: flex">
        <div style="width:10%"></div>
        <div id="chartContainer" style="height: 370px; width: 80%; "></div>
        <div style="width:10%"></div>
    </div>
</div>



<script src="{{ asset('chart/min.js') }}"></script>
<script src="{{ asset('chart/cdn_min.js') }}"></script>
<script src="{{ asset('app/js/display/admin/thong_ke.js') }}"></script> 
@endsection


