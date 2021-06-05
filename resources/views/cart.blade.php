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
                ตะกร้าสินค้า <button type="button" class=" btn btn-primary" data-toggle="modal"
                    data-target="#exampleModalCenter">
                    ค่าขนส่ง
                </button></h2>

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
                                    <div class="form-group">
                                        <div class="card mb-3" style="margin-top:-0.5rem">
                                            <div class="row g-0">
                                                <div class="col-md-3">
                                                    <img class="card-img-top"
                                                        src="{{asset('/')}}uploads/{{($item['imgpro'])}}"
                                                        class="img-thumbnail" alt="Cinque Terre" width="100"
                                                        height="100" style="margin-top:0.8rem;margin-left:1.5rem">
                                                </div>
                                                <div class="col-md-9 ">
                                                    <div class="card-body" style="margin-top:-0.5rem">
                                                        <a href="/deletecart.{{$item['id']}}" class="float-right">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="25"
                                                                height="25" fill="currentColor" class="bi bi-trash-fill"
                                                                viewBox="0 0 16 16"
                                                                style="color:red ;margin-left:0rem ; margin-top:0.5rem">
                                                                <path
                                                                    d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                                            </svg></a>
                                                        <p class="card-title" value="{{$item['productname']}}"
                                                            style="font-size:12px">
                                                            <strong>
                                                                ชื่อสินค้า :
                                                                {{$item['productname']}}</strong>
                                                        </p>

                                                        <p class="card-text " value="{{$item['weight']}}"
                                                            style="font-size:12px">
                                                            น้ำหนัก :
                                                            {{$item['weight']}} กรัม / ชิ้น</p>


                                                        <p>จำนวน :

                                                        @if($item['amount'] == 1)
                                                        <a class="btn text-light" style="background-color: #4b0082;" role="button"
                                                            disabled>-</a>
                                                        @elseif($item['amount'] >=2)
                                                        <a class="btn text-light" style="background-color: #4b0082;" role="button" href="{{route('minuspro',['id'=>
                                                                                $item->id])}}">-</a>
                                                        @endif

                                                            <input class="btn text-dark" type="button"
                                                                style="width:10%;background-color:white;"
                                                                value="{{$item['amount']}}" disabled>

                                                            <a class="btn text-light" style="background-color: #4b0082;"
                                                                href="{{route('plus',['id'=>
                                                                $item['id']])}}">+</a>
                                                        </p>

                                                        <p class="card-text " value="{{$item['cost']}}"
                                                            style="font-size:12px">ราคา
                                                            :
                                                            {{$item['cost']}} บาท / ชิ้น
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                @endforeach


                                <div class="card-body" style="margin-top:-2rem">
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

                                    <h6 class="text" style="margin-left:1rem" name='price' value="{{ $z }}">ราคาสินค้า :
                                        {{ $z }}
                                        บาท
                                    </h6>
                                    <h6 class="text" style="margin-left:1rem">ราคาค่าจัดส่ง : {{ $m }} บาท
                                    </h6>

                                    <h6 class="text-danger" style="margin-left:1rem "><strong>ยอดรวมทั้งหมด
                                            :
                                            {{ $t }} บาท</strong></h6><br>

                                    <a href="{{ route('bill') }}" class="btn text-light btn-lg btn-block"
                                        style="background-color: #4b0082;" role="button"
                                        aria-pressed="true">ดำเนินการสั่งซื้อ</a>



                                </div>
                            </div>
                        </div>
                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">ค่าขนส่งไปรษณีย์ไทย</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <center>
                                            <img src="{{ asset('2021-04-19_15-25-38.png') }}" style="width: 100%">
                                        </center>
                                    </div>
                                    <div class="modal-footer">

                                    </div>
                                </div>
                            </div>
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