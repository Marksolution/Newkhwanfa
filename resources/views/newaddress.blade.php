@extends('layouts.firstpage')

@section('content')
@section('type')
<div class="dropdown">
    <button class="btn  text-light dropdown-toggle " style="background-color:#4b0082" type="button" id="dropdownMenu2"
        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        หมวดหมู่สินค้า
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        @foreach ($type as $item2)
        <a class="dropdown-item" href="{{ route('viewtype',['id'=>$item2['id']]) }}">{{$item2['name']}}</a>

        @endforeach
    </div>
</div>
@endsection
@section('cart')

<li class="nav-item">
    @if (Auth::check())
    @foreach($cart as $item)
    <button type="button" class="btn  position-relative"><a
            href="{{ route('cart', ['id'=>$item->id]) }}">@endforeach<svg xmlns="http://www.w3.org/2000/svg" width="33"
                height="33" fill="currentColor" class="bi bi-cart-plus-fill " viewBox="0 0 16 16"
                style="color:white; margin-right:0.5rem ; margin-top:0.5rem ">
                <path
                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
            </svg></a>

    </button>

    @else()
    <button type="button" class="btn  position-relative" onclick="login()"><a href="{{ route('login') }}"><svg
                xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor"
                class="bi bi-cart-plus-fill " viewBox="0 0 16 16"
                style="color:white; margin-right:2rem ; margin-top:-0.5rem ">
                <path
                    d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z" />
            </svg></a>

    </button>
    @endif


</li>
@endsection
<div id="layoutSidenav_content">

    <div id="layoutSidenav_content">
        <div class="container-md" style="margin-top:2.5rem">
            <br><br><br><br>
            <form action="{{route('newaddressUser')}}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="row">
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

                                        <div>
                                            <label for="formGroupExampleInput" class="form-label">จังหวัด</label>
                                            <select class="form-control" id="input_province" name="province_id"
                                                onchange="showAmphoes()">
                                                <option value="">กรุณาเลือกจังหวัด</option>
                                            </select>
                                        </div><br>
                                        <div>
                                            <label for="formGroupExampleInput" class="form-label">อำเภอ</label>
                                            <select class="form-control" id="input_amphoe" name="amphure_id"
                                                onchange="showTambons()">
                                                <option value="">กรุณาเลือกเขต/อำเภอ</option>
                                            </select>
                                        </div><br>
                                        <div>
                                            <label for="formGroupExampleInput" class="form-label">ตำบล</label>
                                            <select class="form-control" id="input_tambon" name="district_id"
                                                onchange="showZipcode()">
                                                <option value="">กรุณาเลือกแขวง/ตำบล</option>
                                            </select>
                                        </div><br>

                                        <div>
                                            <label for="formGroupExampleInput" class="form-label">รหัสไปรษณีย์</label>
                                            <input class="form-control" name="postcode" id="input_zipcode"
                                                placeholder="รหัสไปรษณีย์" />
                                        </div>
                                        <br>
                                        <input class="btn btn-primary " style="padding: 7px 233px" type="submit"
                                            value="บันทึก">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <h4 class="card-header">ข้อมูลที่อยู่ของฉัน</h4>
                        <div class="card">
                            <div class="card-body">
                                @foreach ($data as $item)


                                <div class="card">
                                    <div class="card-body ">
                                        <p class="card-title">
                                            {{$item['firstname']}} {{$item['lastname']}}<a
                                                href="/deleteaddressme.{{$item['id']}}"
                                                class="card-link float-right">ลบ</a> </p>

                                        <p class="card-text"> ที่อยู่:{{$item['address']}}
                                            ต.{{$item['district_id']}} อ.{{$item['amphure_id']}}
                                            จ.{{$item['province_id']}}
                                            {{$item['postcode']}} <br> โทร: {{$item['telephone']}}</p>
                                    </div>
                                </div><br>
                                @endforeach
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