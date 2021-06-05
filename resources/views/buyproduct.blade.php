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
        <div id="layoutSidenav_content">
            <div class="container-md" style="margin-top:2.5rem">
                <br><br><br><br>
                <center>
                    <form action="{{route('postdataorder')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id">
                        <div class="card">
                            <h4 class="card-header">ยืนยันการชำระเงิน</h4>
                            <input type="hidden" value="{{$ad}}" name='ad'>
                            @foreach($data as $item)

                            <input type="hidden" value="{{$item['user_id']}}" name='user_id'>
                            <input type="hidden" value="{{$item['product_id']}}" name='product_id'>
                            <input type="hidden" value="{{$item['shop_id']}}" name='shop_id'>
                            <input type="hidden" value="{{ $m }}" name='shippingcost'>
                            <input type="hidden" value="{{ $z }}" name='total_price'>


                            @endforeach

                            <div class="card">
                                <div class="card-body">
                                    <img src="p71302270531.jpg" class="img-thumbnail" alt="..."><br><br>
                                    <h5 class="card-title">ชื่อบัญชี นางสาวสิรินาถ จริยพันธ์</h5>
                                    <h5 class="card-text">496-0-45545-4</h5>
                                </div>
                            </div>
                        </div>
                </center>

                <div class="card">
                    <br><br>
                    <center>
                        <h5 class="card-title">แจ้งรายละเอียดการโอนเงินด้วยการแนบสลิปเพื่อเป็นหลักฐานในการยืนชำระเงิน
                        </h5>
                    </center>

                    <div class="row py-4">
                        <div class="col-lg-6 mx-auto">

                            <div class="form-group">
                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                    <input id="upload" type="file" onchange="readURL(this);"
                                        id="exampleFormControlFile1" name="image" class="form-control border-0">
                                    <label id="upload-label" for="upload"
                                        class="font-weight-light text-muted">อัพโหลดรูปภาพ</label>
                                    <div class="input-group-append">
                                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <small
                                                class="text-uppercase font-weight-bold text-muted">อัพโหลดรูปภาพ</small></label>
                                    </div>
                                </div>

                                <!-- Uploaded image area-->
                                <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                                        class="img-fluid rounded shadow-sm mx-auto d-block" width='50%' name="image">
                                </div><br>
                                <center><button class="btn text-light btn-lg " onclick="success();"
                                        style="background-color: #4b0082;" type="submit">ยืนยันการแจ้งโอนเงิน</button>
                                </center>


                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
</div>


</div>
</div>
</div>


<br><br><br><br>
<style>
#upload {
    opacity: 0;
}

#upload-label {
    position: absolute;
    top: 50%;
    left: 1rem;
    transform: translateY(-50%);
}

.image-area {
    border: 2px dashed rgba(255, 255, 255, 0.7);
    padding: 1rem;
    position: relative;
}

.image-area::before {
    content: 'Uploaded image result';
    color: #fff;
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 0.8rem;
    z-index: 1;
}

.image-area img {
    z-index: 2;
    position: relative;
}

/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/
body {
    min-height: 100vh;

}
</style>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$(function() {
    $('#upload').on('change', function() {
        readURL(input);
    });
});

/*  ==========================================
    SHOW UPLOADED IMAGE NAME
* ========================================== */
var input = document.getElementById('upload');
var infoArea = document.getElementById('upload-label');

input.addEventListener('change', showFileName);

function showFileName(event) {
    var input = event.srcElement;
    var fileName = input.files[0].name;
    infoArea.textContent = 'File name: ' + fileName;
}
</script>
@endsection