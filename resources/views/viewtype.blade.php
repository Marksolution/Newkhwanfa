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
        <div class="container-md" style="margin-top:9rem;background-color: white"><br>

            <h2 class="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                    class="bi bi-grid-fill" viewBox="0 0 16 16">
                    <path
                        d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zm8 0A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm-8 8A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm8 0A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3z" />
                </svg> หมวดหมู่สินค้า</h2>
            <hr>
            <div class="row">
                @foreach($datapromotion as $item)
                @php
                $i = 0;
                @endphp
                <div class="col-sm-6 col-md-3 col-lg-2">

                    <form action="{{route('postpromotiontocart')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id">

                        <a href="{{ route('detailpromotion', ['id'=>$item->id]) }}"
                            style="color: inherit; text-decoration:none;">
                            <div class="card-deck">
                                <div class="card">
                                    <img class="card-img-top" src="{{asset('/')}}uploads/{{($item->img_promotion)}}"
                                        class="img-thumbnail" alt="Cinque Terre" width="304" height="150">
                                    <div class="card-body ">
                                        <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                        <input type="hidden" name="weight" value="{{ $item->weightpro }}">
                                        <input type="hidden" name="shop_id" value="{{ $item->shop_id }}">
                                        <input type="hidden" class="card-title text-left" name="productname"
                                            value="{{ $item->productname }}">
                                        <h6 class="card-title d-inline-block text-truncate" style="max-width: 100px;">
                                            {{ $item->productname }}</h6><br>
                                        <input type="hidden" class="card-text text-left" name="detail"
                                            value="{{ $item->detail }}">
                                        <p class="card-text d-inline-block text-truncate" style="max-width: 100px;">
                                            {{ $item->detail }} </p><br>
                                        <input type="hidden" class="card-text text-left " name="promotion_price"
                                            value="{{ $item->promotion_price }}"> ฿{{ $item->promotion_price }}

                                        <input type="hidden" class="card-text text-left text-success" name="costproduct"
                                            value="{{ $item->costproduct }}"><br>
                                        <input type="hidden">
                                        <g class="text-danger" name="cost" value="{{ $item->costproduct }}">฿
                                            {{ $item->costproduct }}</g>
                                        <br>

                                        <center>
                                            <div class="d-grid gap-2 d-md-block"><br>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                                    fill="currentColor " class="bi bi-bookmark-fill" viewBox="0 0 30 30"
                                                    style="position: absolute; left: -8px; top: -1px; color: red; margin-top:0rem ">
                                                    <path
                                                        d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                                                </svg><b
                                                    style="position: absolute; left: 2px; top: 10px; color: #ffff; ">Pro.</b>

                                            </div>

                                        </center>

                                    </div>
                                </div>
                            </div>
                        </a>
                    </form>

                </div>
                @endforeach
            </div>
        </div>
        <div class="container" style="margin-top:-1.5rem;background-color: white">

            <div class="p-2 mb-1  text-red" style="background-color:white">
                <br><br>
                <h3>สินค้าทั่วไป</h3>
                <hr>
            </div>
            <div class="d-flex justify-content-start" style="background-color: white">
                <div class="row">
                    @foreach($notproduct as $item)

                    <div class="col-sm-6 col-md-3 col-lg-2">
                        <form action="{{route('postdatatocart')}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                            <input type="hidden" name="id">
                            <a href="{{ route('detailproduct', ['id'=>$item->id]) }}"
                                style="color: inherit; text-decoration:none;">

                                <div class="card-deck">
                                    <div class="card">
                                        <img class="card-img-top" src="{{asset('/')}}uploads/{{($item->img_product)}}"
                                            class="img-thumbnail" alt="Cinque Terre" width="304" height="150">
                                        <div class="card-body ">
                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                            <input type="hidden" name="weight" value="{{ $item->weight }}">
                                            <input type="hidden" name="shop_id" value="{{ $item->shop_id }}">
                                            <input type="hidden" class="card-title text-left" name="name"
                                                value="{{ $item->name }}"> <b class="d-inline-block text-truncate"
                                                style="max-width: 120px;">{{ $item->name }} </b><br>

                                            <input type="hidden" class="card-text text-left text-success" name="cost"
                                                value="{{ $item->cost }}"> ฿{{ $item->cost }} <br>

                                            <center><br>
                                                <div class="d-grid gap-2 d-md-block">


                                                @php
                                    $userid = Auth::id();
                                    $u_s = \App\Shop::where('id','=', $item->shop_id)->first()['user_id'];
                                    
                                    @endphp
                                    @if(Auth::check()&&$u_s!=$userid)
                                   
                                        <button class="btn text-light" style="background-color: #4b0082;"
                                            onclick="alerts()"><a
                                                href="{{ route('cart', ['id'=>$item->id]) }}"></a>เพิ่มลงตะกร้า
                                        </button>
                                    @else
                                    
                                    <button class="btn text-light" style="background-color: #4b0082;"
                                             disabled><a
                                                href="" hidden></a>เพิ่มลงตะกร้า
                                    </button>
                                    @endif
                                                </div>
                                            </center>


                                        </div>


                                    </div>
                                </div>
                                <div class="col-4" style="widih:300px; hight:5px;"> <br /></div>
                            </a>
                        </form>
                    </div>

                    @endforeach
                </div>
            </div>



        </div>
</div><br>

@endsection