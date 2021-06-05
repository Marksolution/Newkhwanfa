@extends('layouts.shop')

@section('content')

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><i class="fas fa-tag mr-1"></i> เพิ่มคูปอง</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item" ><a href="{{route('coupon')}}">คูปองสินค้า</a></li>
                <li class="breadcrumb-item active">เพิ่มคูปอง</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>เพิ่มคูปองสินค้า
                </div>
                <div class="card-body text-left">
                    <form action="{{route('createnewcoupon')}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" >
                        <input type="hidden" name="id" >
                        <div class="input-group row mb-2">
                            <label for="code_coupon" class="col-sm-3 col-form-label">รหัสคูปอง</label>
                            <div class="col-sm-9">
                                <input id="code_coupon" type="number" class="form-control"  
                                    name="code_coupon" >
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="name" class="col-sm-3 col-form-label">ชื่อคูปองสินค้า</label>
                            <div class="col-sm-9">
                                <input id="name" type="text" class="form-control"  
                                    name="name" >
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="detail_coupon" class="col-sm-3 col-form-label">รายละเอียดคูปอง</label>
                            <div class="col-sm-9">
                                <input id="detail_coupon" type="text" class="form-control" 
                                    name="detail_coupon">
                            </div>
                        </div>
                        
                        <div class="input-group row mb-2">
                            <label for="minimum" class="col-sm-3 col-form-label">ซื้อขั้นต่ำ(บาท)</label>
                            <div class="col-sm-9">
                                <input id="minimum" type="text" class="form-control" 
                                    name="minimum">
                            </div>
                        </div>

                        <div class="input-group row mb-2">
                            <label for="Discount" class="col-sm-3 col-form-label">ลดราคา(บาท)</label>
                            <div class="col-sm-9">
                                <input id="Discount" type="number" class="form-control" 
                                    name="Discount">
                            </div>
                        </div>
                        
                        <div class="input-group row mb-2">
                            <label for="datepicker" class="col-sm-3 col-form-label">วันที่เริ่มใช้คูปอง</label>
                            <div class="col-sm-9">
                                <input  type="text" class="form-control" 
                                    id="datepicker" name="startdate">
                            </div>
                        </div>
                        <div class="input-group row mb-2">
                            <label for="datepicker2" class="col-sm-3 col-form-label">วันที่สิ้นสุดคูปอง</label>
                            <div class="col-sm-9">
                                <input  type="text" class="form-control"
                                  id="datepicker2" name="enddate">
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

@endsection