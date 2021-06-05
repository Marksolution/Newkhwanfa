@extends('layouts.firstpage')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div id="layoutSidenav_content">
            <div class="container-md" style="margin-top:1rem">
                <br><br><br><br>
                <form action="{{route('newaddressbuy')}}" method="GET" enctype="multipart/form-data">
                    <div class="row gx-5">
                        <div class="col-6">
                            <div class="card">
                                <h4 class="card-header">ข้อมูลการจัดส่ง</h4>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="mb-3">
                                            <label for="formGroupExampleInput" class="form-label">ชื่อ</label>
                                            <input type="text" name="firstname" class="form-control"
                                                id="formGroupExampleInput" placeholder="กรุณาระบุชื่อ"><br>
                                            <label for="formGroupExampleInput" class="form-label">นามสกุล</label>
                                            <input type="text" name="lastname" class="form-control"
                                                id="formGroupExampleInput" placeholder="กรุณาระบุนามสกุล"><br>
                                            <label for="formGroupExampleInput" class="form-label">เบอร์โทรศัพท์</label>
                                            <input type="number" name="telephone" class="form-control"
                                                id="formGroupExampleInput" placeholder="กรุณาระบุหมายเลขโทรศัพท์"><br>
                                            <label for="formGroupExampleInput" class="form-label">ที่อยู่</label>
                                            <input type="text" name="address" class="form-control"
                                                id="formGroupExampleInput"
                                                placeholder="กรุณาระบุที่อยู่ (บ้านเลขที่ , ถนน )"><br>

                                            <label for="formGroupExampleInput" class="form-label">จังหวัด</label>
                                            <select name="province_id" id="province_id"
                                                class="form-control province_id">
                                                <option value="" name="firstname">กรุณาเลือกจังหวัด</option>
                                                @foreach ($province as $row)
                                                <option type="number" value="{{$row->id}}">{{$row->name_th}}</option>
                                                @endforeach
                                            </select><br>

                                            <label for="formGroupExampleInput" class="form-label">อำเภอ</label>
                                            <select name="amphure_id" id="amphure_id" class="form-control province_id">
                                                <option value="">กรุณาเลือกอำเภอ</option>
                                                @foreach ($amphure as $row)
                                                <option type="number" value="{{$row->id}}">{{$row->name_th}}</option>
                                                @endforeach
                                            </select><br>

                                            <label for="formGroupExampleInput" class="form-label">ตำบล</label>
                                            <select name="district_id" id="district_id"
                                                class="form-control province_id">
                                                <option value="">กรุณาเลือกตำบล</option>
                                                @foreach ($district as $row)
                                                <option type="number" value="{{$row->id}}">{{$row->name_th}}</option>
                                                @endforeach
                                            </select><br>

                                            <label for="formGroupExampleInput" class="form-label">รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" id="formGroupExampleInput"
                                                placeholder="กรุณาระบุรหัสไปรษณีย์"><br>
                                            <input class="btn btn-primary " style="padding: 7px 233px" type="submit"
                                                value="บันทึก">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="col-6">
                            <div class="card">
                                <h4 class="card-header">ข้อมูลคำสั่งซื้อ</h4>
                                <div class="card-body">
                                    <div class="card" style="width: 33.5rem;">
                                        <div class="card-body ">
                                            <p class="card-title">สิรินาถ จริยพันธ์<a href="#"
                                                    class="card-link float-right" data-toggle="modal"
                                                    data-target="#exampleModal">แก้ไข</a></p>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                รายการที่อยู่ของคุณ</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="flexRadioDefault1">
                                                                <label class="form-check-label" for="flexRadioDefault1">
                                                                    โทร 0610766798 112 ม.7 ต.หนองกอมเกาะ อ.เมือง
                                                                    จ.หนองคาย
                                                                    43000
                                                                </label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="flexRadioDefault2"
                                                                    checked>
                                                                <label class="form-check-label" for="flexRadioDefault2">
                                                                    โทร 0610766798 112 ม.7 ต.หนองกอมเกาะ อ.เมือง
                                                                    จ.หนองคาย
                                                                    43000
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="" class="btn btn-outline-danger"><i
                                                                    class="fas fa-trash-alt mr-1"></i>ยกเลิก</a>
                                                            <button type="button" class="btn btn-primary"
                                                                data-dismiss="modal">บันทึก</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="card-text">โทร 0610766798 112 ม.7 ต.หนองกอมเกาะ อ.เมือง จ.หนองคาย
                                                43000</p>
                                        </div>
                                    </div><br>
                                    <label for="formGroupExampleInput" class="form-label">จำนวนสินค้า</label><br>
                                    <label for="formGroupExampleInput" class="form-label">ค่าจัดส่ง</label><br>
                                    <label for="formGroupExampleInput" class="form-label">ยอดรวมทั้งสิ้น</label><br>
                                    <a href="{{ route('buyproduct') }}" class="btn btn-primary "
                                        style="padding: 7px 234px">สั่งซื้อ</a>
                                </div>
                            </div>
                        </div>
                        <!-- End page content -->
                    </div>
                </form>
            </div>
        </div>
</div>
<br><br><br>




@endsection