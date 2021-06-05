@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid">
        <h1 class="mt-4" style="color:#660066">รายการชำระเงิน</h1><br>

        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        หลักฐานการโอน
                    </div>
                    <div class="card-body">
                        <center>
                            <img src="{{asset('/uploads/')}}/{{$data->image}}" style="width: 20%">
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-list mr-1"></i>รายการข้อมูลสินค้า
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="orderTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ชื่อสินค้า</th>
                                        <th>จำนวนสั่งซื้อ</th>
                                        <th>ราคา</th>
                                        <th>วันที่สั่งซื้อสินค้า</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($data2 as $item)
                                    <tr>

                                        <td>{{ $item->productname }}</td>
                                        <td>{{ $item['quantity'] }}</td>
                                        <td>{{ $item['cost'] }}</td>
                                        <td>{{ $item['updated_at'] }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        ข้อมูลการชำระเงิน
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="user_id"
                                class="col-md-4 col-form-label text-md-right">{{ __('รหัสการสั่งซื้อ') }}</label>
                            <div class="col-md-6">
                                <input id="user_id" type="text"
                                    class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                    value="{{ $data->payment_id }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="totalprice"
                                class="col-md-4 col-form-label text-md-right">{{ __('ราคาสินค้า') }}</label>
                            <div class="col-md-6">
                                <input id="totalprice" type="text"
                                    class="form-control @error('totalprice') is-invalid @enderror" name="totalprice"
                                    value="{{ number_format($no) }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="totalprice"
                                class="col-md-4 col-form-label text-md-right">{{ __('ค่าจัดส่ง') }}</label>
                            <div class="col-md-6">
                                <input id="totalprice" type="text"
                                    class="form-control @error('totalprice') is-invalid @enderror" name="totalprice"
                                    value="{{ number_format($value) }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="totalprice"
                                class="col-md-4 col-form-label text-md-right">{{ __('ราคารวมค่าจัดส่ง') }}</label>
                            <div class="col-md-6">
                                <input id="totalprice" type="text"
                                    class="form-control @error('totalprice') is-invalid @enderror" name="totalprice"
                                    value="{{ number_format($data->totalprice) }}" readonly>
                            </div>
                        </div>
                        @if($data['paymentstatus'] == 1)
                        <form method="POST" action="{{ route('paymentupdate') }}">
                            @csrf
                            <input name="id" type="hidden" value="{{$data->payment_id}}">

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
                    @endif
                    @if($data['paymentstatus'] >= 2)
                    <div class="form-group row">
                        <label for="status"
                            class="col-md-4 col-form-label text-md-right">{{ __('สถานะออร์เดอร์') }}</label>
                        <div class="col-md-6">

                            @if($data['paymentstatus'] == 2)
                            <td><b style="color:orange"> ยืนยันการชำระเงินแล้ว</b></td>
                            @elseif($data['paymentstatus'] == 3)
                            <td><b class="text-success">จัดส่งแล้ว</b></td>
                            @elseif($data['paymentstatus'] == 4)
                            <td><b class="text-danger">ยกเลิกออร์เดอร์</b></td>
                            @elseif($item['paymentstatus'] == 5)
                            <td><b class="text-success">โอนเงินไปยังร้านค้าแล้ว</b></td>
                            @endif
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @endif
                </div>
            </div>


        </div><br><br>
    </div>
</div>
@endsection