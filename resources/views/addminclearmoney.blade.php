@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid">
        <h1 class="mt-4" style="color:#660066">โอนเงินให้ร้านค้า</h1><br>

        <div class="row">
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

            <div class="col-lg-6 col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        ข้อมูลการชำระเงิน
                    </div>
                    <div class="card-body">
                        @if($data['paymentstatus'] >= 2)
                        <div class="form-group row">
                            <label for="status"
                                class="col-md-5 col-form-label text-md-right">{{ __('สถานะออร์เดอร์') }}</label>
                            <div class="col-md-7">

                                @if($data['paymentstatus'] == 2)
                                <td><b style="color:orange"> ยืนยันการชำระเงินแล้ว</b></td>
                                @elseif($data['paymentstatus'] == 3)
                                <td><b class="text-success">จัดส่งแล้ว</b></td>

                                @elseif($data['paymentstatus'] == 4)
                                <td><b class="text-danger">ยกเลิกออร์เดอร์</b></td>
                                @endif
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        @endif
                        
                        @foreach($data2 as $item)
                        <form action="{{route('tranfermoney')}}" method="POST">
                            @csrf
                            <input name="id" type="hidden" value="{{$data->payment_id}}">
                            <input type="hidden" value="5" name=status>
                        <div class="form-group row">
                            <label for="user_id"
                                class="col-md-5 col-form-label text-md-right">{{ __('รหัสการสั่งซื้อ') }}</label>
                            <div class="col-md-6">
                                <input id="user_id" type="text"
                                    class="form-control @error('user_id') is-invalid @enderror" name="user_id"
                                    value="{{ $item['payment_id'] }}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="totalprice"
                                class="col-md-5 col-form-label text-md-right">{{ __('ยอดรวม') }}</label>
                            <div class="col-md-6">
                                <input id="totalprice" type="text"
                                    class="form-control @error('totalprice') is-invalid @enderror" name="totalprice"
                                    value="{{ number_format($item['total_price']) }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="totalprice"
                                class="col-md-5 col-form-label text-md-right">{{ __('หักค่าคอมมิชชัน 3 %') }}</label>
                            <div class="col-md-6">
                                <input id="totalprice" type="text"
                                    class="form-control @error('totalprice') is-invalid @enderror" name="totalprice"
                                    value="{{ (($item['total_price'])*3)/100 }}" readonly>
                            </div>
                        </div>
                        
                        
                            <div class="form-group row">
                                <label for="tranfer"
                                    class="col-md-5 col-form-label text-md-right text-success">{{ __('ยอดที่ต้องโอน') }}</label>
                                <div class="col-md-6">
                                    <input id="tranfer" type="text"
                                        class="form-control @error('totalprice') is-invalid @enderror" name="tranfer"
                                        value="{{ ($item['total_price'])-(($item['total_price'])*3)/100 }}" readonly>
                                </div>
                            </div><br>
                            <div class="form-group row">
                                <label for="tranfer"
                                    class="col-md-5 col-form-label text-md-right">{{ __('ร้าน') }}</label>
                                <div class="col-md-6">
                                    <input id="tranfer" type="text"
                                        class="form-control @error('totalprice') is-invalid @enderror"
                                        value="{{ $item['nameshop']}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tranfer"
                                    class="col-md-5 col-form-label text-md-right">{{ __('เลขบัญชีธนาคาร') }}</label>
                                <div class="col-md-6">
                                    <input id="tranfer" type="text"
                                        class="form-control @error('totalprice') is-invalid @enderror"
                                        value="{{ $item['account_number']}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tranfer"
                                    class="col-md-5 col-form-label text-md-right">{{ __('ชื่อบัญชีธนาคาร') }}</label>
                                <div class="col-md-6">
                                    <input id="tranfer" type="text"
                                        class="form-control @error('totalprice') is-invalid @enderror"
                                        value="{{ $item['account_name']}}" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="tranfer"
                                    class="col-md-5 col-form-label text-md-right">{{ __('ธนาคาร') }}</label>
                                <div class="col-md-6">
                                    <input id="tranfer" type="text"
                                        class="form-control @error('totalprice') is-invalid @enderror"
                                        value="{{ $item['bank']}}" readonly>
                                </div>
                            </div>
                            
                    </div>
                    <hr>
                    @endforeach
                    <div class="form-group row">
                                <label for="submit" class="col-md-5 col-form-label text-md-right"></label>
                                <div class="col-md-6">
                                    <button type="submit" id="submit" class="btn btn-primary">
                                        ยืนยันการโอน
                                    </button>
                                </div>
                            </div>
                        </form>
                </div>


            </div>
        </div>
        @endsection