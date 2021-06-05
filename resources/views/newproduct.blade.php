@extends('layouts.shop')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><i class="fas fa-box mr-1"></i> เพิ่มสินค้า</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('shop')}}">คลังสินค้า</a></li>
                <li class="breadcrumb-item active">เพิ่มสินค้า</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>เพิ่มสินค้า
                </div>
                <div class="card-body text-left">
                    <form action="{{route('createnewproduct')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id">

                        <div class="input-group row mb-2">
                            <label for="name" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                            <div class="col-sm-9">
                                <input id="name" type="text" class="form-control" name="name"
                                    placeholder="กรุณากรอกชื่อสินค้า">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="Type_id" class="col-sm-3 col-form-label">หมวดหมู่</label>
                            <div class="col-sm-9">
                                <select id="status" name="type_id" class="custom-select my-1 mr-sm-2"
                                    id="inlineFormCustomSelect">
                                    @foreach ($type as $item2)
                                    <option type="number" value="{{$item2->id}}">{{$item2->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="cost" class="col-sm-3 col-form-label">ราคาสินค้า (บาท)</label>
                            <div class="col-sm-9">
                                <input id="cost" type="number" class="form-control"
                                    placeholder="กรุณากรอกราคาสินค้า เช่น '200' ไม่ต้องใส่คำว่าบาท" name="cost">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="weight" class="col-sm-3 col-form-label">น้ำหนักของสินค้า(กรัม)</label>
                            <div class="col-sm-9">
                                <input id="weight" type="number" class="form-control"
                                    placeholder="กรุณากรอกน้ำหนักสินค้า เช่น '500' ไม่ต้องใส่คำว่ากรัม" name="weight">
                            </div>
                        </div>

                        <div class="input-group row mb-2">
                            <label for="amount" class="col-sm-3 col-form-label">จำนวนสินค้าที่มี (ชิ้น)</label>
                            <div class="col-sm-9">
                                <input id="amount" type="number" class="form-control"
                                    placeholder="จำนวนสินค้าที่คุณมีและพร้อมขาย" name="amount">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="datetosend" class="col-sm-3 col-form-label">ส่งสิ้นค้าภายใน (กี่วัน)</label>
                            <div class="col-sm-9">
                                <select id="datetosend" name="datetosend" class="custom-select my-1 mr-sm-2"
                                    id="inlineFormCustomSelect">
                                    <option value="ภายใน 3 วัน">ภายใน 3 วัน</option>
                                    <option value="ภายใน 7 วัน">ภายใน 7 วัน</option>
                                    <option value="ภายใน 14 วัน">ภายใน 14 วัน</option>
                                </select>
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="amount" class="col-sm-3 col-form-label">รายละเอียดสินค้า หรือ เรื่องราวของสินค้า
                                :</label>
                            <div class="col-sm-9">
                                <textarea class="form-control " id="detail" name="detail"></textarea>
                                <script>
                                CKEDITOR.replace('detail');
                                CKEDITOR.editorConfig = function(config) {
                                    //config.removePlugins = 'image,pwimage';
                                    //config.removePlugins = 'forms,image';
                                };
                                </script>
                            </div>
                        </div>

                        <div class="input-group row mb-2">
                            <label for="myFile" class="col-sm-3 col-form-label">รูปภาพ</label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                                    <input id="upload" type="file" onchange="readURL(this);"
                                        id="exampleFormControlFile1" name="img_product" class="form-control border-0">
                                    <label id="upload-label" for="upload"
                                        class="font-weight-light text-muted">อัพโหลดรูปภาพ</label>
                                    <div class="input-group-append">
                                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <small
                                                class="text-uppercase font-weight-bold text-muted">อัพโหลดรูปภาพ</small></label>
                                    </div>
                                </div>

                                <!-- Uploaded image area-->
                                <div class="image-area mt-4"><img id="imageResult" src="#" alt=""
                                        class="img-fluid rounded shadow-sm mx-auto d-block" width='30%'
                                        name="img_product">
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