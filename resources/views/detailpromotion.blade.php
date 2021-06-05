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


<div id="layoutSidenav_content">
    <main>
        <div class="card-body text-left">
            <div class="container-md" style="margin-top:1rem">
                <br><br><br><br>
                <div class="card">
                    <div class="row">


                        <div class="col-lg-3"><br>
                            @foreach($item as $item)

                            <img src="{{asset('/')}}uploads/{{($item ['img_promotion'])}}" class="img-thumbnail "
                                alt="Cinque Terre" width="250" height="300"
                                style=" margin-left:1.5rem;margin-top:0.5rem">
                        </div>
                        <div class="col-lg-9">
                            <div class="card-body text-left"><br>
                                <h5 class="card-title" style="font-size:22px" value="{{$item['name']}}">
                                    {{$item['productname']}} {!! $item['productdetail'] !!}</h5>

                                <p class="card-text " style="font-size:20px; color:red">
                                    ฿ {{$item['promotion_price']}}.00 <br>
                                    <g class="text-secondary" style="font-size:15px;">
                                        ฿ {{$item['costproduct']}}.00</g>
                                </p>
                                <p class="card-text " style="font-size:15px" value="{{$item['weight']}}">
                                    <i class="fas fa-weight"></i> น้ำหนัก :
                                    {{$item['weightpro']}} กรัม
                                </p>
                                <p class="card-text" style="font-size:15px; color:green"><i class="fas fa-truck"
                                        style='color:green'></i> การจัดส่ง :
                                    {{$item['datetosend']}} </p>

                                    @php
                                    $userid = Auth::id();
                                    $u_s = \App\Shop::where('id','=', $item->shop_id)->first()['user_id'];
                                    
                                    @endphp
                                    @if(Auth::check()&&$u_s!=$userid)
                                <form action="{{route('postpromotiontocart')}}" method="POST">
                                    <p class="card-text">จำนวน :
                                        @if($item['amount'] == 1)
                                        <a class="btn text-light" style="background-color: #4b0082;" role="button"
                                            disabled>-</a>
                                        @elseif($item['amount'] >=2)
                                        <a class="btn text-light" style="background-color: #4b0082;" role="button" href="{{route('minuspromotion',['id'=>
                                                                $item->id])}}">-</a>
                                        @endif

                                        <input class="btn text-dark" name="amountpro" type="button"
                                            style="width:5%;background-color:white;" value="{{$item['amount']}}"
                                            disabled>
                                        <a class="btn text-light" style="background-color: #4b0082;" href="{{route('pluspromotion',['id'=>
                                            $item->id])}}">+</a>
                                    </p>
                                    <br>
                                    <div class="row">
                                        <div class='col-lg-2'>
                                            <input type="hidden" name="_token" value="<?php echo csrf_token();?>">
                                            <input type="hidden" name="product_id" value="{{$item['product_id']}}">
                                            <input type="hidden" name="productname" value="{{$item['productname']}}">
                                            <input type="hidden" name="promotion_price"
                                                value="{{$item['promotion_price']}}">
                                            <input type="hidden" name="amountpro" value="{{$item['amount']}}">
                                            <input type="hidden" name="weight" value="{{ $item['weightpro'] }}">
                                            <input type="hidden" name="shippingcost"
                                                value="{{ $item['shippingcost'] }}">
                                            <input type="hidden" name='shop_id' value="{{$item['shop_id']}}">
                                            <button class="btn text-light card-text" style="background-color: #4b0082;"
                                                type="submit" onclick="alerts()">เพิ่มลงตะกร้า</button>

                                </form>
                            </div>
                            <div class='col-lg-1'>
                                <form action="{{route('salenow')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="name" value="{{$item['productname']}}">
                                    <input type="hidden" name="cost" value="{{$item['costproduct']}}">
                                    <input type="hidden" name="weight" value="{{$item['weightpro']}}">
                                    <input type="hidden" name="shippingcost" value="{{$item['shippingcost']}}">
                                    <input type="hidden" name='product_id' value="{{$item['proid']}}">
                                    <input type="hidden" name='shop_id' value="{{$item['shop_id']}}">
                                    <input type="hidden" name="amountpro" value="{{$item['amount']}}">
                                    <button class="btn btn-danger card-text" type="submit"> ซื้อตอนนี้เลย</button>

                                </form>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

                </div>
            </div><br><br>
        </div>

        <div class="card">
            <div class="card-header">
                <h4>รายละเอียดสินค้า<h4>
            </div>
            <div class="card-body">
                <p class="lead">{!! $item['productdetail'] !!}</p>
            </div>
        </div>
        <div class="card">
            <h4 class="card-header">รีวิวสินค้า</h4>
            <div class="card-body">
                <div class="form-group">
                    <div class="mb-3">
                    </div>


                    @foreach($item3 as $item)
                    <div class="card">

                        <div class="card-body">

                            <p>
                                <a class="float-left"><strong>@ {{$item['username']}} </strong></a>

                                @php
                                $i = $item['rating'];
                                while($i>0){
                                echo('<span class="float-right"><i class="text-danger fa fa-star"></i></span>');
                                $i--;
                                }
                                @endphp


                            </p>
                            <div class="clearfix"></div>
                            <p style="margin-left:1rem">{{$item['text']}}</p>
                            <p class="text-right">{{$item['date']}}
                        </div>

                    </div><br>
                    @endforeach

                    @if(Auth::check())
                    
                    @if( !$reviewproduct->isEmpty() && $canreview ->isEmpty())

                    <div class="card">
                        <div class="card-body">

                            <form action="{{route('reviewpro')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="product_id" value="{{$productid['product_id']}}">
                                <label for="formGroupExampleInput" class="form-label" style='font-size:16px'>คุณ :
                                    {{ Auth::user()->name }}  <span class="badge bg-success " >คุณเคยซื้อสินค้านี้</span></label><br>


                                <label for="exampleFormControlTextarea1">กล่องแสดงความคิดเห็น</label>
                                <textarea class="form-control" name="text" id="exampleFormControlTextarea1"
                                    rows="3"></textarea>
                        </div>
                        <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input
                                type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio"
                                name="rating" value="2" id="2"><label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                        </div>
                        <input class="btn text-light float-right" style="background-color: #4b0082;" type="submit"
                            value="โพสต์">
                        </form>
                    </div>

                </div>
                 
                @endif
                @endif

            </div>
        </div><br>
</div>
</div>
</main>
</div>

@endsection