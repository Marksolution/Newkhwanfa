@extends('layouts.shop')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><i class="fas fa-tags mr-1"></i> เพิ่มโปรโมชันสินค้า</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('promotion')}}">โปรโมชันสินค้า</a></li>
                <li class="breadcrumb-item active">เพิ่มโปรโมชันสินค้า</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>เพิ่มโปรโมชันสินค้า
                </div>
                <div class="card-body text-left">
                    <form action="{{route('createnewpromotion')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id">

                        <div class="input-group row mb-2">
                            <label for="name" class="col-sm-3 col-form-label">สินค้า</label>
                            <div class="col-sm-9">
                                <select id="status" name="product_id" class="custom-select my-1 mr-sm-2"
                                    id="inlineFormCustomSelect">
                                    @foreach ($product as $item2)
                                    <option type="text" value="{{$item2['id']}}">{{$item2['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="name" class="col-sm-3 col-form-label">ชื่อโปรโมชัน</label>
                            <div class="col-sm-9">
                                <input id="name" type="text" class="form-control" name="name" require
                                    placeholder="กรอกชื่อโปรโมชั่นของคุณ">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="detail" class="col-sm-3 col-form-label">รายละเอียดโปรโมชัน</label>
                            <div class="col-sm-9">
                                <input id="detail" type="text" class="form-control" name="detail"
                                    placeholder="กรอกรายละเอียดโปรโมชั่นของคุณ">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="datepicker" class="col-sm-3 col-form-label">วันที่เริ่มใช้โปรโมชัน</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="datepicker" name="startdate"
                                    placeholder="เลือกวันที่เริ่มใช้โปรโมชั่น">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="datepicker2" class="col-sm-3 col-form-label">วันที่สิ้นสุดโปรโมชัน</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="datepicker2" name="enddate"
                                    placeholder="เลือกวันที่สิ้นสุดโปรโมชั่น">
                            </div>
                        </div>


                        <div class="input-group row mb-2">
                            <label for="promotion_price" class="col-sm-3 col-form-label">ราคาโปรโมชัน (บาท)</label>
                            <div class="col-sm-9">
                                <input id="promotion_price" type="number" class="form-control" name="promotion_price"
                                    placeholder="กรอกราคาที่จะทำโปรโมชัน">
                            </div>
                        </div>

                        <div class="input-group row mb-2">
                            <label for="myFile" class="col-sm-3 col-form-label">รูปภาพ</label>
                            <div class="col-sm-9">
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
                                        class="img-fluid rounded shadow-sm mx-auto d-block" width='30%' name="image">
                                </div>
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="img" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3 input-group-sm">

                                </div>
                            </div>
                        </div>

                        <script type="text/javascript">
                        $('#datepicker2').datepicker({
                            autoclose: true,
                            format: 'yyyy-mm-dd'
                        });
                        </script>
                        <script type="text/javascript">
                        $('#datepicker').datepicker({
                            autoclose: true,
                            format: 'yyyy-mm-dd'
                        });
                        </script>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>
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