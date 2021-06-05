@extends('layouts.shop')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><i class="fas fa-box mr-1"></i> แก้ไขสินค้า</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('shop')}}">คลังสินค้า</a></li>
                <li class="breadcrumb-item active">แก้ไขสินค้า</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>แก้ไขสินค้า
                </div>
                <div class="card-body text-left">
                    <form action="{{route('update_edit')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id" value="{{$item[0]['id']}}">

                        <div class="input-group row mb-2">
                            <label for="name" class="col-sm-3 col-form-label">ชื่อสินค้า</label>
                            <div class="col-sm-9">
                                <input id="name" type="text" class="form-control" value="{{$item[0]['name']}}"
                                    name="name">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="Type_id" class="col-sm-3 col-form-label">หมวดหมู่</label>
                            <div class="col-sm-9">
                                <select id="status" name="type_id" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelect">
                                    @foreach ($type as $item2) 
                                        <option  type="number" value="{{$item2->id}}">{{$item2->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="cost" class="col-sm-3 col-form-label">ราคาสินค้า</label>
                            <div class="col-sm-9">
                                <input id="cost" type="text" class="form-control" value="{{$item[0]['cost']}}"
                                    name="cost">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="weight" class="col-sm-3 col-form-label">น้ำหนักของสินค้า(กรัม)</label>
                            <div class="col-sm-9">
                                <input id="weight" type="number" class="form-control"  value="{{$item[0]['weight']}}"
                                    name="weight">
                            </div>
                        </div>
                        
                        <div class="input-group row mb-2">
                            <label for="amount" class="col-sm-3 col-form-label">จำนวนสินค้า</label>
                            <div class="col-sm-9">
                                <input id="amount" type="number" class="form-control" value="{{$item[0]['amount']}}"
                                    name="amount">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="amount" class="col-sm-3 col-form-label">รายละเอียดสินค้า หรือ เรื่องราวของสินค้า :</label>
                            <div class="col-sm-9">
                            <textarea class="form-control" id="detail" name="detail">{{$item[0]['detail']}}</textarea>
                        <script>
                        CKEDITOR.replace( 'detail' );
                        CKEDITOR.editorConfig = function( config ) {
                        //config.removePlugins = 'image,pwimage';
                        //config.removePlugins = 'forms,image';
                        };
                        </script>
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="myFile" class="col-sm-3 col-form-label">รูปภาพ</label>
                            <div class="col-sm-9">
                                <input
                                    onchange="document.getElementById('img').src = window.URL.createObjectURL(this.files[0])"
                                    type="file" accept="image/*" id="myFile" class="btn btn-outline-primary"
                                    name="img_product" style="width: 100%;">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="img" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <div class="input-group mb-3 input-group-sm">
                                    <img id="img" width="30%" height="30%"
                                        src="{{asset('/')}}uploads/{{($item[0]['img_product'])}}">
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

@endsection