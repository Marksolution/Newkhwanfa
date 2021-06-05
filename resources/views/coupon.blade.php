@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><i class="fas fa-tag mr-1"></i> คูปอง</h1>
            <ol class="breadcrumb mb-4">
                คูปองของคุณ
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>ตารางคูปองของคุณ
                    <a href="{{route('newcoupon')}}" style="float:right"
                        class="btn btn-outline-success text-right">
                        <i class="fas fa-plus mr-1"></i>เพิ่มคูปองใหม่</a>
                   
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    

                                    <th>โค้ดคูปอง</th>
                                    <th>ชื่อคูปอง</th>
                                    <th>รายละเอียดคูปอง</th>
                                    <th>ซื้อขั้นต่ำ</th>
                                    <th>ลดราคา</th>
                                    <th>วันที่เริ่มต้นคูปอง</th>
                                    <th>วันที่สิ้นสุดคูปอง</th>
                                    <th>จัดการ</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- วนลูปการทำงาน นำตัวแปรจาก controller, ทุกรอบของการวนลูป จะทำการใส่ข้อมูลแต่ละแถวใน products array ลงใน item --}}
                                @foreach ($coupon as $item)

                                <tr>
                                    {{-- นำข้อมูลตัวแปร item ที่ได้ มาแสดงผลในแต่ละฟิลตามชื่อคอลัมของตาราง --}}
                                    <td>{{ $item->code_coupon }}</td>
                                    <td>{{ $item->name_coupon }}</td>
                                    <td>{{ $item->detail_coupon }}</td>
                                    <td>{{ $item->minimum }}</td>
                                    <td>{{ $item->discount }}</td>
                                    <td>{{ $item->startdate }}</td>
                                    <td>{{ $item->enddate }}</td>
                                    <td>
                                        <a href="/editcoupon.{{$item->id}}" class="btn btn-outline-warning"><i
                                                class="fas fa-edit mr-1"></i>แก้ไข</a>
                                        &nbsp;
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-trash-alt mr-1"></i>
                                        ลบ
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">ลบสินค้า</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            คุณต้องการลบสินค้านี้หรือไม่ ?
                                            </div>
                                            <div class="modal-footer">
                                            <a href="/deletecoupon.{{$item->id}}" class="btn btn-outline-danger"><i
                                                class="fas fa-trash-alt mr-1"></i>ลบ</a>
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection