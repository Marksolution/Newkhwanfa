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
        <div class="container-md" style="margin-top:9rem">

            <h2 class="mt-4"><img src="{{ asset('cart-plus-solid.svg') }}" style="hight:33px;width:33px" alt="">
                สรุปรายการสั่งซื้อ</h2>

            <div class="card-body text-left">
                <div class="container">
                    <div class="row">
                        <div class="col-7">
                            <div class="card">
                                <h4 class="card-header">รายการสั่งซื้อ</h4>

                                @foreach($m1 as $item=>$v)
                                @php
                                $thename = htmlspecialchars($item);
                                @endphp
                                <div class="p-2 mb-1  text-white" style="background-color:#4b0082">
                                    <h5 value="{{$item}}" style="margin-left:1rem;margin-top:0.5rem"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            style="margin-top:-0.3rem;margin-right:0.2rem;" fill="currentColor"
                                            class="bi bi-house-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                                            <path fill-rule="evenodd"
                                                d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                                        </svg> {{$item}}</h5>

                                </div>
                                @foreach($v as $new=>$item)
                                <div class="card-body">

                                    <div class="card " style="margin-top:-1rem">
                                        <div class="row">

                                            <div class="col-md-5">
                                                <div class="card-body">

                                                    <p class="card-title" value="{{$item['productname']}}"
                                                        style="font-size:12px">
                                                        <strong>
                                                            ชื่อสินค้า :
                                                            {{$item['productname']}}</strong>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <p class="card-text " style="font-size:12px; margin-top:1.3rem">
                                                    จำนวน :

                                                    {{$item['amount']}}

                                                    ชิ้น
                                                </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p class="card-text " value="{{$item['cost']}}"
                                                    style="font-size:12px;margin-top:1.3rem">ราคา
                                                    :
                                                    {{$item['cost']}} บาท / ชิ้น
                                                </p>
                                            </div>


                                        </div>

                                    </div>
                                </div>
                                @endforeach


                                <div class="card-body" style="margin-top:-1.3rem">
                                    <strong>
                                        <p class="card-text text-right" style="font-size:12px" name='ship'>
                                            ค่าจัดส่ง
                                            :
                                            {{ $w[$thename]['calweighttotal'] }}
                                            บาท
                                        </p>
                                    </strong>
                                    <strong>
                                        <p class="card-text text-right" style="font-size:12px" name='ship'>
                                            ราคารวม
                                            :
                                            {{ $w[$thename]['sum'] }}
                                            บาท
                                        </p>
                                    </strong>

                                </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="col-5">
                            <div class="card">
                                <h4 class="card-header">ข้อมูลคำสั่งซื้อ</h4>
                                <div class="card-body">
                                    <b class='text-danger'>* กรุณาเลือกที่อยู่ที่จะจัดส่งเพื่อดำเนินการต่อ</b><br>
                                    <div class="card">
                                        <div class="card-body ">
                                            <a href="#" class="card-link float-right" data-toggle="modal"
                                                data-target="#exampleModal">เลือกที่อยู่</a>

                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">
                                                                <i class="far fa-address-card"></i> รายการที่อยู่ของคุณ
                                                            </h5>

                                                            <a href="{{ route('senddataaddress') }}"
                                                                class="btn btn-outline-primary float-right">เพิ่มที่อยู่ใหม่</a>
                                                        </div>

                                                        <script
                                                            src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
                                                        </script>
                                                        <form action="{{route('buyproduct')}}" mathod="GET"
                                                            enctype="multipart/form-data">
                                                            <input type="hidden" name="_token"
                                                                value="<?php echo csrf_token(); ?>">
                                                            <fieldset class="form-group">
                                                                @foreach($address as $items)

                                                                <div class="modal-body">
                                                                    <div class="form-check ">

                                                                        <input class="form-check-input" type="radio"
                                                                            name="Radio" value="{{$items['id']}}">
                                                                        <label class="form-check-label"
                                                                            for="{{$items['id']}}" name="add_id">

                                                                            {{$items['firstname']}}
                                                                            {{$items['lastname']}} <br>
                                                                            ที่อยู่:{{$items['address']}}
                                                                            อ.{{$items['amphure_id']}}
                                                                            ต.{{$items['district_id']}}
                                                                            จ.{{$items['province_id']}}
                                                                            {{$items['postcode']}} <br> โทร:
                                                                            {{$items['telephone']}}
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                                <!-- <div>
                                                                    <input type="radio" name="option" id="email"
                                                                        value="email">
                                                                    <label for="{{$items['id']}}" name="add_id"
                                                                        value="{{$items['id']}}">
                                                                        {{$items['firstname']}}
                                                                        {{$items['lastname']}} <br>
                                                                        ที่อยู่:{{$items['address']}}
                                                                        อ.{{$items['amphure_id']}}
                                                                        ต.{{$items['district_id']}}
                                                                        จ.{{$items['province_id']}}
                                                                        {{$items['postcode']}} <br> โทร:
                                                                        {{$items['telephone']}}
                                                                    </label>
                                                                </div> -->

                                                                @endforeach()
                                                            </fieldset>
                                                            <div class="modal-footer">

                                                                <button class="btn btn-outline-success">บันทึก</button>
                                                            </div>

                                                    </div>
                                                </div>
                                            </div>
                                            @foreach($address2 as $items)
                                            <p class="card-title">{{$items['firstname']}} {{$items['lastname']}}</p>
                                            <p class="card-text"> {{$items['nameamphur']}}
                                                ที่อยู่:{{$items['address']}}
                                                อ.{{$items['amphure_id']}}
                                                ต.{{$items['district_id']}}
                                                จ.{{$items['province_id']}}
                                                {{$items['postcode']}} <br> โทร:
                                                {{$items['telephone']}}</p>
                                            @endforeach()
                                        </div>

                                    </div><br>
                                    <h6 class="text" style="margin-left:1rem">ราคาสินค้า : {{ $z }} บาท</h6>
                                    <h6 class="text" style="margin-left:1rem">ราคาค่าจัดส่ง : {{ $m }} บาท
                                    </h6>

                                    <h6 class="text-danger" style="margin-left:1rem "><strong>ยอดรวมทั้งหมด
                                            :
                                            {{ $t }} บาท</strong></h6>

                                    <br>
                                    <form action="{{route('postdataorder')}}" method="POST"
                                        enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                        <input type="hidden" name="id">
                                        @foreach($data as $item)
                                        <input type="hidden" value="{{$item['user_id']}}" name='user_id'>
                                        <input type="hidden" value="{{$item['product_id']}}" name='product_id'>
                                        <input type="hidden" value="{{$item['shop_id']}}" name='shop_id'>
                                        <input type="hidden" value="{{$item['shippingcost']}}" name='shippingcost'>

                                        @endforeach

                                        <!--   <a href="{{route('buyproduct')}}" class="btn text-light btn-lg btn-block"
                                            typ='submit' style="background-color: #4b0082;" role="button"
                                            aria-pressed="true">-->

                                        <a class="btn text-light btn-lg btn-block btn-success"
                                            onclick="checkaddress()">ยืนยันการสั่งซื้อ</a>
                                    </form>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>







@endsection