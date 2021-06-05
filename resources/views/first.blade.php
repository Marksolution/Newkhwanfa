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

<div class="container" style="margin-top:8rem;background-color:white">
    <div class="p-2 mb-1  text-red" style="background-color:white">
        <a class=" w3-button w3-round-xlarge w3-red text-right float-right "
            style="margin-top:1rem; text-decoration:none;"
            href="{{ route('viewpromotion') }}">{{ __('ดูโปรโมชันทั้งหมด') }}</a>
        <h2 style="margin-top:1rem">โปรโมชัน <i class="fas fa-tag mr-1" style="color:red"></i></h2>
        <hr>
    </div>

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
                                <b class="card-title d-inline-block text-truncate" style="max-width: 120px;">
                                    {{ $item->productname }}</b><br>
                                <input type="hidden" class="card-text text-left" name="detail"
                                    value="{{ $item->detail }}">
                                <p class="card-text d-inline-block text-truncate" style="max-width: 100px;">
                                    {{ $item->detail }} </p><br>
                                <input type="hidden" class="card-text text-left " name="promotion_price"
                                    value="{{ $item->promotion_price }}"> ฿{{ $item->promotion_price }}

                                <input type="hidden" class="card-text text-left text-success" name="costproduct"
                                    value="{{ $item->costproduct }}"><br>
                                <input type="hidden">
                                <g class="text-danger" style="font-size:12px" name="cost"
                                    value="{{ $item->costproduct }}">฿
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
    <br>
</div>


<div class="container" style="margin-top:2rem;background-color:white">
    <div class="p-2 mb-1  text-red" style="background-color:white">
        <br>
        <h2>สินค้าทั้งหมด</h2>
        <hr>
    </div>

    <div class="d-flex justify-content-start">
        <div class="row">
            @foreach($notproduct as $item)
            <div class="col-sm-6 col-md-3 col-lg-2">
                <form action="{{route('postdatatocart')}}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <input type="hidden" name="id">
                    <a href="{{ route('detailproduct', ['id'=>$item->id]) }}"
                        style="color: inherit; text-decoration:none;">
                        <div class="card ">
                            <img class="card-img-top" src="{{asset('/')}}uploads/{{($item->img_product)}}"
                                class="img-thumbnail" alt="Cinque Terre" width="304" height="150">
                            <div class="card-body ">
                                <input type="hidden" name="product_id" value="{{ $item->id }}">
                                <input type="hidden" name="weight" value="{{ $item->weight }}">
                                <input type="hidden" name="shop_id" value="{{ $item->shop_id }}">
                                <input type="hidden" name="shippingcost" value="{{ $item->shippingcost }}">
                                <input type="hidden" class="card-title text-left" name="name"
                                    value="{{ $item->name }}"><b class="d-inline-block text-truncate"
                                    style="max-width: 120px;">
                                    {{ $item->name }}
                                </b><br>
                                <input type="hidden" class="card-text text-left text-success" name="cost"
                                    value="{{ $item->cost }}">
                                ฿{{ $item->cost }}
                                <br>
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
                        <div class="col-sm-6 col-md-3 col-lg-2" style="widih:100px; hight:3px;"> <br />
                        </div>
            </div>
            </form>
            @endforeach

        </div>
    </div>

</div>

</div><br>
<!-- Image and text -->

<!-- <nav class="navbar navbar-light bg"style="background-color: #4b0082;">
<center><a class="navbar-brand text-light" >
  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16"style="color: white;">
  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
</svg> 0610766798  <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
</svg> jariyapun17@gmail.com <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
  <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
</svg> 112 หมู่ 7 ต.หนองกอมเกาะ อ.เมือง จ.หนองคาย 43000 บริการจัดส่งไปรษรณีย์ไทย
  </a></center>
</nav> -->


@endsection