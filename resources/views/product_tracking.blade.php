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
    <div class="container-md">
        <div class="container-fluid" style="margin-top:8rem">
            <div class="card">

                <div class="col-md-12">
                    <div class="card-body"><br>
                        <h2><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor"
                                class="bi bi-layout-text-sidebar-reverse" viewBox="0 0 16 16">
                                <path
                                    d="M12.5 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm0 3a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5zm.5 3.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 .5-.5zm-.5 2.5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1h5z" />
                                <path
                                    d="M16 2a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2zM4 1v14H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h2zm1 0h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5V1z" />
                            </svg> การสั่งซื้อของฉัน</h2><br>
                        <table class="table">
                            <thead>
                                <tr>

                                    <th scope="col" class="text-center">สินค้า</th>
                                    <th scope="col" class="text-center">จำนวน</th>
                                    <th scope="col" class="text-center">ราคาสินค้า (ไม่รวมค่าจัดส่ง)</th>
                                    <th scope="col" class="text-center">วันที่สั่งซื้อ</th>
                                    <th scope="col" class="text-center">ติดตามสินค้า</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data2 as $item)
                                <tr>
                                    <td class="text">{{ $item['productname']}}</td>
                                    <td class="text-center">{{ $item['quantity']}} ชิ้น</td>
                                    <td class="text-center">{{ $item['cost']}} บาท</td>
                                    <td class="text-center">{{ \Carbon\Carbon::parse($item['created_at'])->format('d.m.Y')}}</td>
                                    @if($item['orderstatus'] == 3 or $item['orderstatus'] == 5)
                                    <td class="text-center"> </a><a
                                            href="https://track.thailandpost.co.th/?trackNumber={{$item['tracking_number']}}"
                                            class="card-link  " style="color:red">สถานะสินค้า</a></td>
                                    @elseif($item['orderstatus'] == 4)
                                    <td><b class="text-danger">ออร์เดอร์ถูกยกเลิก</b></td>
                                    @else
                                    <td class="text-center">อยู่ระหว่างการตรวจสอบ</td>
                                    @endif
                                </tr>

                                @endforeach

                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection