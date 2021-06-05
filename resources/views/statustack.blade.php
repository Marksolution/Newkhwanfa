@extends('layouts.firstpage')

@section('content')

<div class="container-md">
    <div class="container-fluid" style="margin-top:7rem">
        <div class="card-body">

            <div class="card card-timeline px-2 border-none"><br>
                <h5 class="text-left" style="margin-left:2rem"><b>หมายเลขคำสั่งซื้อ </b></h5>
                <hr>
                <ul class="bs4-order-tracking">
                    <li class="step active">
                        <div><i class="fa fa-user"></i></div> รับเข้าระบบ
                    </li>
                    <li class="step active">
                        <div><i class="fa fa-inbox"></i></div> ระหว่างขนส่ง
                    </li>
                    <li class="step">
                        <div><i class="fa fa-truck"></i></div> ออกไปนำจ่าย
                    </li>
                    <li class="step ">
                        <div><i class="fa fa-check"></i></div> นำจ่ายสำเร็จ
                    </li>
                </ul>


                <div class="container mt-5 mb-5">
                    <div class="row">
                        <div class="col-md-6 offset-md-3">
                       
                            <h4>ข้อมูลการจัดส่ง</h4>
                            <ul class="timeline">
                                <li>
                                    <a>วันที่</a>
                                    <a class="float-right">เวลา</a>
                                    <p>รายละเอียด</p>
                                </li>
                                <li>
                                    <a>วันที่</a>
                                    <a class="float-right">เวลา</a>
                                    <p>รายละเอียด</p>
                                </li>
                                <li>
                                    <a>วันที่</a>
                                    <a class="float-right">เวลา</a>
                                    <p>รายละเอียด</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
              
            </div>

        </div>

    </div>


</div>

@endsection