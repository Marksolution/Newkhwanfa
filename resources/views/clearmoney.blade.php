@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4" style="color:#660066"><i class="fas fa-dollar-sign mr-1"></i> ตรวจสอบการโอนเงิน</h1>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>จัดการจ่ายเงินให้ร้านค้า OTOP
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                                    <thead>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>ผู้ซื้อสินค้า</th>
                                            <th>เบอร์โทรผู้ซื้อ</th>
                                            <th>ราคาสินค้ารวม</th>
                                            <th>สถานะ</th>
                                            <th>เพิ่มเติม</th>
                                        </tr>
                                    </thead>
                                    @foreach ($payment as $item)
                                    <tbody>
                                        <tr>
                                            <td>{{ $item['id']}}</td>
                                            <td>{{ $item['nameuser']}}</td>
                                            <td>{{ $item['phone']}}</td>
                                            <td>{{ $item['totalprice']}}</td>
                                            @if($item['paymentstatus'] == 1)
                                            @if($item['paymentstatus'] == null)
                                            <td>ยังไม่ชำระเงิน</td>
                                            @elseif($item['paymentstatus'] == 1)
                                            <td><b class="text-info">รอการยืนยันการโอนเงิน</b></td>
                                            @else
                                            <td>ยืนยันการชำระเงินแล้ว</td>
                                            @endif
                                            @elseif($item['paymentstatus'] == 2)
                                            <td><b style="color:orange"> ยืนยันการชำระเงินแล้ว</b></td>
                                            @elseif($item['paymentstatus'] == 3)
                                            <td><b class="text-success">จัดส่งแล้ว&nbsp;&nbsp;&nbsp;<a
                                                        href="/addminclearmoney/{{$item['id']}}"
                                                        class="btn btn-outline-success">โอนเงินไปยังร้านค้า</a></b></td>
                                            @elseif($item['paymentstatus'] == 4)
                                            <td><b class="text-danger">ยกเลิกออร์เดอร์</b></td>
                                            @elseif($item['paymentstatus'] == 5)
                                            <td><b class="text-success">โอนเงินไปยังร้านค้าแล้ว</b></td>

                                            @endif

                                            <td>
                                                <a href="/detailclearmoney/{{$item['id']}}"
                                                    class="btn btn-outline-warning"><i
                                                        class="fas fa-search mr-1"></i></a>
                                            </td>
                                        </tr>


                                    </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection