@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">

    <form action="{{route('createshop')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="container-fluid">
            <h1 class="mt-4" style="color:#000000"><i class="fas fa-store mr-1"></i> สร้างร้านค้าใหม่</h1><br>
            <div class="col-lg-10">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-info mr-1"></i> ข้อมูลร้านค้า
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="shopname"
                                class="col-md-2 col-form-label text-md-right">{{ __('ชื่อร้านค้า') }}</label>
                            <div class="col-md-8">
                                <input id="shopname" type="text" class="form-control" name="shopname" value=""
                                    maxlength="30">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="firstname"
                                class="col-md-2 col-form-label text-md-right">{{ __('ขื่อเจ้าของร้านค้า') }}</label>
                            <div class="col-md-4">
                                <input id="	firstname" type="text" class="form-control" name="firstname">
                            </div>
                            <div class="col-md-4 ">
                                <input id="	lastname" type="text" class="form-control" name="lastname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address1"
                                class="col-md-2 col-form-label text-md-right">{{ __('ที่อยู่') }}</label>
                            <div class="col-md-8">
                                <input id="address1" type="text" class="form-control" name="address1">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-2 form-label text-md-right">จังหวัด</label>
                            <div class="col-md-8">
                                <select class="form-control text-md-right" id="input_province" name="province_id"
                                    onchange="showAmphoes()">
                                    <option value="">กรุณาเลือกจังหวัด</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class=" col-md-2 form-label text-md-right">อำเภอ</label>
                            <div class="col-md-8">
                                <select class="form-control" id="input_amphoe" name="amphure_id"
                                    onchange="showTambons()">
                                    <option value="">กรุณาเลือกเขต/อำเภอ</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class=" col-md-2 form-label text-md-right">ตำบล</label>
                            <div class="col-md-8">
                                <select class="form-control" id="input_tambon" name="district_id"
                                    onchange="showZipcode()">
                                    <option value="">กรุณาเลือกแขวง/ตำบล</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 form-label text-md-right">รหัสไปรษณีย์</label>
                            <div class="col-md-8">
                                <input class="form-control" name="postcode" id="input_zipcode"
                                    placeholder="รหัสไปรษณีย์" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="telephone"
                                class="col-md-2 col-form-label text-md-right">{{ __('โทรศัพท์') }}</label>
                            <div class="col-md-8">
                                <input id="telephone" type="text" class="form-control" name="telephone" maxlength="10">
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="col-lg-10">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-info mr-1"></i> ข้อมูลทางการเงิน
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="shopname"
                                class="col-md-2 col-form-label text-md-right">{{ __('หมายเลขบบัญชี') }}</label>
                            <div class="col-md-8">
                                <input id="" type="text" class="form-control" name="account_number" value=""
                                    maxlength="10">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-2 col-form-label text-md-right">{{ __('ขื่อ-นามสกุล') }}</label>
                            <div class="col-md-4">
                                <input id="	" type="text" class="form-control" name="account_name">
                            </div>
                            <div class="col-md-4 ">
                                <input id="	" type="text" class="form-control" name="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address1"
                                class="col-md-2 col-form-label text-md-right">{{ __('ธนาคาร') }}</label>
                            <div class="col-md-8">
                                <input id="" type="text" class="form-control" name="bank">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="submit" class="col-md-2 col-form-label text-md-right"></label>
                            <div class="col-md-8">
                                <button type="submit" id="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> บันทึก
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
    </form>
</div>
<br>


</div>
<input type="hidden" name="_token" value="{{csrf_token()}}" />
<script type="text/Javascript">
    $(document).ready(function(){
            $('.province').change(function(){
                if($(this).val()!=''){
                    var select=$(this).val();
                    console.log(select);
                    var _token=$('input[name="_token"]').val();
                    $.ajax({
                        url:"{{route('fetch')}}",
                        method:"POST",
                        data:{select:select,_token:_token},
                        success:function(result){
                            $('.amphures').html(result);
                        }
                        
                    })
                }
            });
        });
</script>
@endsection