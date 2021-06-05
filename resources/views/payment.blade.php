@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid">
        <h1 class="mt-4" style="color:#660066">รายการชำระเงิน</h1><br>

        <div class="row">
            <div class="col-lg-5 col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        ข้อมูลการชำระเงิน
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="payment_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('รหัสการสั่งซื้อ') }}</label>
                            <div class="col-md-6">
                                <input id="payment_id" type="text"
                                    class="form-control @error('payment_id') is-invalid @enderror" name="payment_id"
                                    value="{{$data->payment_id}}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="total" class="col-md-4 col-form-label text-md-right">{{ __('ยอดรวม') }}</label>
                            <div class="col-md-6">
                                <input id="total" type="text" class="form-control @error('total') is-invalid @enderror"
                                    name="total" value="{{ number_format($data->totalprice) }}" readonly>
                            </div>
                        </div>
                        <form method="POST" action="{{ route('paymentupdate') }}">
                            @csrf
                            <input name="id" type="hidden" value="{{$data->id}}">
                            <div class="form-group row">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-right">{{ __('สถานะการชำระเงิน') }}</label>
                                <div class="col-md-6">
                                    <select id="status" name="status" class="custom-select my-1 mr-sm-2"
                                        id="inlineFormCustomSelect">
                                        <option value="1">รอการตรวจสอบ</option>
                                        <option value="2">ยืนยันการโอนเงินสมบูรณ์</option>
                                        <option value="4">ยกเลิกออร์เดอร์</option>
                                    </select>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('บันทึก') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        หลักฐานการโอน
                    </div>
                    <div class="card-body">
                        <center>
                            <img src="{{asset('/uploads/')}}/{{$data->image}}" style="width: 50%">
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection