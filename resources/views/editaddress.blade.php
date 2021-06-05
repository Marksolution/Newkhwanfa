@extends('layouts.firstpage')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div id="layoutSidenav_content">
            <div class="container-md" style="margin-top:2.5rem">
                <br><br><br><br>
                <form action="{{route('updatedataaddress')}}" method="GET" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    @csrf
                    <div class="col-5">
                        <div class="card">
                            <h4 class="card-header">ข้อมูลการจัดส่ง</h4>
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="mb-3">
                                        <label for="formGroupExampleInput" class="form-label">ชื่อ</label>
                                        <input type="text" name="firstname" value="{{$data['firstname']}}"
                                            class="form-control" id="formGroupExampleInput"
                                            placeholder="กรุณาระบุชื่อ"><br>
                                        <label for="formGroupExampleInput" class="form-label">นามสกุล</label>
                                        <input type="text" name="lastname" value="{{$data['lastname']}}"
                                            class="form-control" id="formGroupExampleInput"
                                            placeholder="กรุณาระบุนามสกุล"><br>
                                        <label for="formGroupExampleInput" class="form-label">เบอร์โทรศัพท์</label>
                                        <input type="text" name="telephone" value="{{$data['telephone']}}"
                                            class="form-control" id="formGroupExampleInput"
                                            placeholder="กรุณาระบุหมายเลขโทรศัพท์"><br>
                                        <label for="formGroupExampleInput" class="form-label">ที่อยู่</label>
                                        <input type="text" name="address" value="{{$data['address']}}"
                                            class="form-control" id="formGroupExampleInput"
                                            placeholder="กรุณาระบุที่อยู่ (บ้านเลขที่ , ถนน )"><br>

                                        <label for="formGroupExampleInput" class="form-label">จังหวัด</label>
                                        <select class="form-control" id="input_province" name="province_id"
                                            onchange="showAmphoes()">
                                            @if($data['id']==$data['id'])
                                            <option type="number" value="{{$data['amphure_id']}}" selected>
                                                {{$data['amphure_id']}}
                                            </option>
                                            @else
                                            <option type="number" value="{{$data['amphure_id']}}">
                                                {{$data['amphure_id']}}</option>
                                            @endif


                                            <!-- <option value="$data['province_id']" selected>{{$data['province_id']}}
                                            </option> -->
                                        </select><br>

                                        <label for="formGroupExampleInput" class="form-label">อำเภอ</label>
                                        <select class="form-control" id="input_amphoe" name="amphure_id"
                                            onchange="showTambons()">

                                            @if($data['id']==$data['id'])
                                            <option type="number" value="{{$data['amphure_id']}}" selected>
                                                {{$data['amphure_id']}}
                                            </option>
                                            @else
                                            <option type="number" value="{{$data['amphure_id']}}">
                                                {{$data['amphure_id']}}</option>
                                            @endif

                                            <!-- <option type="number" value="{{$data['amphure_id']}}" selected>
                                                {{$data['amphure_id']}}
                                            </option> -->
                                        </select><br>

                                        <label for="formGroupExampleInput" class="form-label">ตำบล</label>
                                        <select class="form-control" id="input_tambon" name="district_id"
                                            onchange="showZipcode()">

                                            <option type="number" value="{{$data['district_id']}}" selected>
                                                {{$data['district_id']}}
                                            </option>
                                        </select><br>


                                        <label for="formGroupExampleInput" class="form-label">รหัสไปรษณีย์</label>
                                        <input type="text" class="form-control" id="input_zipcode"
                                            placeholder="กรุณาระบุรหัสไปรษณีย์" value="{{$data['postcode']}}"><br>
                                        <input class="btn btn-primary float-right " style="padding: 7px 50px"
                                            type="submit" value="บันทึก">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><br>

                    <!-- End page content -->
            </div>
            </form>
        </div>
</div>
</div>
<br><br><br>




@endsection