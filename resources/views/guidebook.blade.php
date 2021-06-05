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
    <main>
        <div class="card-body text-left">
            <div class="container-md" style="margin-top:1rem">
                <br><br><br><br>
                <div class="card">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                    role="tab" aria-controls="nav-home" aria-selected="true">สมัครเปิดร้านค้า</a>
                                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="false">การสั่งซื้อสินค้า</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab">
                                <div class="card mb-3" style="max-width: 1200px;">
                                    <br>
                                    <h3 style="margin-left:2rem">วิธีการสมัครเปิดร้านค้ากับ OTOP ONLINE</h3>
                                    <hr>
                                    <p style="margin-left:2rem">1. สมัครสมาชิกเพื่อใช้ในการเข้าสู่ระบบ
                                        ด้วยการกรอกข้อมูลดังรูป</p>
                                    <img src="register.png" style="margin-left:6rem" width="500px" alt=""><br>
                                    <p style="margin-left:2rem">2. เมื่อทำการสมัครสมาชิกเรียบร้อยแล้ว ให้กดปุ่ม '
                                        ขายสินค้ากับ OTOP
                                        ONLINE ' ในหน้าแรก</p>
                                    <img src="goback.png" style="margin-left:6rem" width="500px" alt=""><br>
                                    <p style="margin-left:2rem">3. เมื่อกดปุ่มเข้ามาในหน้าสมัครเปิดร้านค้า
                                        ให้ทำการกรอกข้อมูลเพื่อทำการสมัครเปิดร้าน</p>
                                    <img src="newshop.png" style="margin-left:6rem" width="500px" alt=""><br>
                                    <br>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="card mb-3" style="max-width: 1200px;"><br>
                                    <h3 style="margin-left:2rem">วิธีการสั่งซื้อสินค้า</h3>
                                    <hr>
                                    <p style="margin-left:2rem">1. เพิ่มสินค้าที่ต้องการลงตะกร้าสินค้า</p>
                                    <img src="cart.png" style="margin-left:6rem" width="600px" alt=""><br>
                                    <p style="margin-left:2rem">2. กดเข้าไปในหน้าตะกร้าสินค้าในหน้านี้สามารถเพิ่มจำนวนสินค้าที่ต้องการได้ตามต้องการ จากนั้นกดปุ่มดำเนินการสั่งซื้อ</p>
                                    <img src="Ca2.png" style="margin-left:6rem" width="600px" alt=""><br>
                                    <p style="margin-left:2rem">3. ตรวจสอบข้อมูลสินค้าว่าครบถ้วนหรือไม่และเพิ่มที่อยู่ในการจัดส่งสินค้า จากนั้นกดปุ่มยืนยันการสั่งซื้อ</p>
                                    <img src="Ca3.png" style="margin-left:6rem" width="600px" alt=""><br>
                                    <p style="margin-left:2rem">4. โอนเงินตามยอดที่สั่งซื้อและแนบสลิปเพื่อเป็นหลักฐานในการชำระเงิน</p>
                                    <img src="Ca4.png" style="margin-left:6rem" width="600px" alt=""><br>
                                    <p style="margin-left:2rem">5. กดติดตามสถานะของสินค้า</p>
                                    <img src="Ca5.png" style="margin-left:6rem" width="600px" alt=""><br>
                                    <img src="Ca7.png" style="margin-left:6rem" width="600px" alt=""><br>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <div class="card">


                </div>
            </div>
    </main>
</div><br>


@endsection