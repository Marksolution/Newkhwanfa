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

        <div class="container-md" style="margin-top:9rem ;background-color:white"><br>
            <h2 class="">สินค้าโปรโมชัน</h2>
            <hr style="background-color:black">
        </div>

        <div class="container-md" style="margin-top:-1.5rem ;background-color:white">
            <div class="jumbotron " style="background-color:white">

                <div class="d-flex justify-content-start" style="background-color:white">
                    <div class="row">
                        @foreach($costpro as $item)
                        <div class="col-2">
                            <form action="{{route('postpromotiontocart')}}" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                <input type="hidden" name="id">
                                <input type="hidden" name="amountpro" value="1">
                                <a href="{{ route('detailpromotion', ['id'=>$item->id]) }}"
                                    style="color: inherit; text-decoration:none;">

                                    <div class="card" style="width: 11.5rem;">
                                        <img class="card-img-top" src="{{asset('/')}}uploads/{{($item->img_promotion)}}"
                                            class="img-thumbnail" alt="Cinque Terre" width="304" height="150">
                                        <div class="card-body ">
                                            <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                            <input type="hidden" name="weight" value="{{ $item->weightpro }}">
                                            <input type="hidden" name="shop_id" value="{{ $item->shop_id }}">
                                            <input type="hidden" class="card-title text-left" name="productname"
                                                value="{{ $item->productname }}"> <b
                                                class="d-inline-block text-truncate"
                                                style="max-width: 120px;">{{ $item->productname }}</b> <br>
                                            <input type="hidden" class="card-text text-left" name="detail"
                                                value="{{ $item->detail }}"> <b class="d-inline-block text-truncate"
                                                style="max-width: 120px;">{{ $item->detail }} </b><br>
                                            <input type="hidden" class="card-text text-left text-success"
                                                name="promotion_price" value="{{ $item->promotion_price }}">
                                            ฿{{ $item->promotion_price }} <br>

                                            <input type="hidden" class="card-text text-left text-success"
                                                name="costproduct" value="{{ $item->costproduct }}">
                                            <g class="text-danger" name="cost" value="{{ $item->costproduct  }}">฿
                                                {{ $item->costproduct }}</g>
                                            <br>

                                            <center>
                                                <div class="d-grid gap-2 d-md-block"><br>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80"
                                                        fill="currentColor " class="bi bi-bookmark-fill"
                                                        viewBox="0 0 30 30"
                                                        style="position: absolute; left: -8px; top: -1px; color: red; margin-top:0rem ">
                                                        <path
                                                            d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z" />
                                                    </svg><b
                                                        style="position: absolute; left: 2px; top: 10px; color: #ffff; ">Pro.</b>

                                                </div>

                                            </center>
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
                                    <div class="col-4" style="widih:300px; hight:5px;"> </div>
                        </div>
                        </form>
                        @endforeach
                    </div>
                </div>

            </div>

        </div>

        @endsection