@extends('layouts.shop')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4 text-left"><i class="fas fa-tag mr-1"></i> แก้ไขโปรโมชั่น</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('promotion')}}">โปรโมชั่น</a></li>
                <li class="breadcrumb-item active">เพิ่มโปรโมชั่นสินค้า</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-edit mr-1"></i>แก้ไขสินค้า
                </div>
                <div class="card-body text-left">
                    <form action="{{route('update_editpro')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id" value="{{$item[0]['id']}}">

                        
                         
                        <div class="input-group row mb-2">
                            <label for="name" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                            <div class="col-sm-9">
                                <select name="product_id" id="product_id" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelect">
                                    @foreach ($product as $item2)                            
                                        <option  type="text"  value="{{$item2['name']}}" >{{$item2['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       
                        <div class="input-group row mb-2">
                            <label for="name" class="col-sm-3 col-form-label">ชื่อโปรโมชั่น</label>
                            <div class="col-sm-9">
                                <input id="name" type="text" class="form-control" value="{{$item[0]['name']}}"
                                    name="name">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="detail" class="col-sm-3 col-form-label">รายละเอียด</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$item[0]['detail']}}" name="detail"
                                    id="detail">
                            </div>
                        </div>

                        

                        <div class="input-group row mb-2">
                            <label for="datepicker" class="col-sm-3 col-form-label">วันที่เริ่ม</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$item[0]['startdate']}}"
                                    name="startdate" id="datepicker">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="datepicker2" class="col-sm-3 col-form-label">วันที่สิ้นสุด</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$item[0]['enddate']}}" name="enddate"
                                    id="datepicker2">
                            </div>
                        </div>


                        <div class="input-group row mb-2">
                            <label for="promotion_price" class="col-sm-3 col-form-label">ราคาโปรโมชั่น</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{$item[0]['promotion_price']}}"
                                    name="promotion_price" id="promotion_price">
                            </div>
                        </div>

                        <div class="input-group row mb-2">
                            <label for="myFile" class="col-sm-3 col-form-label">รูปภาพ</label>
                            <div class="col-sm-9">
                                <input
                                    onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])"
                                    type="file" accept="image/*" id="myFile" class="btn btn-outline-primary"
                                    name="img_promotion" style="width: 100%;">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="img" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3 input-group-sm">
                                    <img id="img" width="30%" height="30%"
                                        src="{{asset('/')}}uploads/{{($item[0]['img_promotion'])}}">
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

@endsection