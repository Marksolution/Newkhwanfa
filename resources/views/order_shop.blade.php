@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><i class="fas fa-bell mr-1"></i> ออเดอร์สินค้า</h1><br>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>ออเดอร์ทั้งหมด
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>รหัสบิล</th>
                                    <th>ชื่อผู้สั่งซื้อ</th>
                                    <th>วันที่สั่ง</th>
                                    <th>สถานะคำสั่งซื้อ</th>

                                    <th>หมายเลชพัศดุ</th>
                                    <th>อัพเดตล่าสุด</th>
                                    <th>ข้อมูลเพิ่มเติม</th>

                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->order_id }}</td>
                                    <th>{{ $item->username }}</th>
                                    <td>{{$item->created_at}}</td>
                                    {{-- สถานะคำสั่งซื้อ --}}

                                    @if($item->orderstatus == 1)
                                    <td>รอการยืนยันการโอนเงิน</td>
                                    @elseif($item->orderstatus == 2)
                                    <td><b class="text-info"> รอการกรอกหมายเลขพัสดุ</b></td>
                                    @endif
                                    @if($item->orderstatus == 3)
                                    <td><b class="text-success">จัดส่งแล้ว</b></td>
                                    @elseif($item->orderstatus == 4)
                                    <td><b class="text-danger"> ยกเลิกออร์เดอร์</b></td>
                                    @elseif($item->orderstatus == 5)
                                    <td><b class="text-success"> ได้รับเงินแล้ว</b></td>
                                    @endif

                                    <td>{{$item->tracking_number}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    @if($item->orderstatus == 1 or $item->orderstatus == 4 )
                                    <td></td>
                                    @elseif($item->orderstatus >= 2 && $item->orderstatus <=3 or $item->orderstatus ==5)
                                        <td><a href="orderdetail/{{$item->order_id}}" class="btn btn-outline-info"><i
                                                    class="fas fa-search mr-1"></a></td>
                                        @endif
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection