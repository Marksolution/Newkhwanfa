@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4">รายละเอียด ออเดอร์สินค้า</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('order') }}">ออเดอร์สินค้า</a></li>
                <li class="breadcrumb-item active">ตรวจสอบ</li>
            </ol>
            <div class="row">
                {{-- card ข้อมูลคำสั่งซื้อ --}}
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-info-circle mr-1"></i>ข้อมูลคำสั่งซื้อ
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="orderid"
                                    class="col-md-4 col-form-label text-md-right">{{ __('รหัสคำสั่งซื้อ') }}</label>
                                <div class="col-md-8">
                                    <input id="orderid" type="text" class="form-control" name="orderid"
                                        value="{{ $order->orderid }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="totalproce"
                                    class="col-md-4 col-form-label text-md-right">{{ __('ราคาสินค้า') }}</label>
                                <div class="col-md-8">
                                    <input id="totalproce" type="text" class="form-control" name="totalproce"
                                        value="{{($order->totalproce)-($order->shipping_cost) }}" readonly
                                        style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="shipping_cost"
                                    class="col-md-4 col-form-label text-md-right">{{ __('ค่าจัดส่ง') }}</label>
                                <div class="col-md-8">
                                    <input id="shipping_cost" type="text" class="form-control" name="shipping_cost"
                                        value="{{ ($order->shipping_cost) }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cost"
                                    class="col-md-4 col-form-label text-md-right">{{ __('ยอดรวม') }}</label>
                                <div class="col-md-8">
                                    <input id="cost" type="text" class="form-control" name="cost"
                                        value="{{ ($order->shipping_cost + ($order->totalproce)-($order->shipping_cost)) }}"
                                        readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cost"
                                    class="col-md-4 col-form-label text-md-right">{{ __('หักค่าคอมมิชชัน') }}</label>
                                <div class="col-md-8">
                                    <input id="cost" type="text" class="form-control" name="cost"
                                        value="{{ (($order->shipping_cost + ($order->totalproce)-($order->shipping_cost))*3)/100 }}"
                                        readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="cost"
                                    class="col-md-4 col-form-label text-md-right">{{ __('จะได้รับเงิน') }}</label>
                                <div class="col-md-8">
                                    <input id="cost" type="text" class="form-control" name="cost"
                                        value="{{ ($order->shipping_cost + ($order->totalproce)-($order->shipping_cost))-((($order->shipping_cost + ($order->totalproce)-($order->shipping_cost))*3)/100) }}"
                                        readonly style="width: 100%">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="created_at"
                                    class="col-md-4 col-form-label text-md-right">{{ __('วันที่สั่งซื้อ') }}</label>
                                <div class="col-md-8">
                                    <input id="created_at" type="text" class="form-control" name="created_at"
                                        value="{{ $order->created_at }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <hr>
                            {{-- ข้อมูลผู้สั่งซื้อ --}}
                            <div class="form-group row">
                                <label for="username"
                                    class="col-md-4 col-form-label text-md-right">{{ __('ผู้สั่งซื้อ') }}</label>
                                <div class="col-md-8">
                                    <input id="username" type="text" class="form-control" name="username"
                                        value="{{ $order->username }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="useremail"
                                    class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}</label>
                                <div class="col-md-8">
                                    <input id="useremail" type="text" class="form-control" name="useremail"
                                        value="{{ $order->useremail }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="userphone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('เบอร์โทรศัพท์') }}</label>
                                <div class="col-md-8">
                                    <input id="userphone" type="text" class="form-control" name="userphone"
                                        value="{{ $order->userphone }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <hr>
                            @if($order->status == 2)
                            <div class="form-group row">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-right">{{ __('สถานะ') }}</label>
                                <div class="col-md-8">
                                    <input id="status" type="text" class="form-control" name="status"
                                        value="รอส่งสินค้า" readonly style="width: 100%">
                                </div>
                            </div>
                            <form method="POST" action="{{ route('orderupdate') }}">
                                @csrf
                                <input type="hidden" name="orderid" value="{{ $order->orderid }}">

                                <div class="form-group row">

                                    <label for="trackingnumber"
                                        class="col-md-4 col-form-label text-md-right">{{ __('หมายเลขการขนส่ง') }}</label>
                                    <div class="col-md-8">

                                        <input id="trackingnumber" type="text" class="form-control"
                                            name="trackingnumber" value="" placeholder="ใส่หมายเลขพัศดุ"
                                            style="width: 100%">
                                        <div class="col-md-8 ">
                                            <p disable>(ตัวอย่าง : EF582568151TH)</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="status" class="col-md-4 col-form-label text-md-right"></label>
                                    <div class="col-md-8">
                                        <button type="submit" class="btn btn-primary" style="width: 100%">
                                            <i class="fas fa-save mr-1"></i> บันทึก
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @else
                            <div class="form-group row">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-right">{{ __('สถานะ') }}</label>
                                <div class="col-md-8">
                                    <input id="trackingnumber" type="text" class="form-control" name="trackingnumber"
                                        value="ส่งสินค้าแล้ว" style="width: 100%" readonly>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="trackingnumber"
                                    class="col-md-4 col-form-label text-md-right">{{ __('หมายเลขการขนส่ง') }}</label>
                                <div class="col-md-8">
                                    <input id="trackingnumber" type="text" class="form-control" name="trackingnumber"
                                        value="{{ $order->tracking_number }}" readonly style="width: 100%">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
                {{-- card ข้อมูลที่อยู่การจัดส่ง --}}
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-address-card mr-1"></i>ข้อมูลที่อยู่การจัดส่ง
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="addressname"
                                    class="col-md-4 col-form-label text-md-right">{{ __('ขื่อผู้รับ') }}</label>
                                <div class="col-md-8">
                                    <input id="addressname" type="text" class="form-control" name="addressname"
                                        value="{{ $order->addressfirstname.' '.$order->addresslastname }}" readonly
                                        style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address1"
                                    class="col-md-4 col-form-label text-md-right">{{ __('ที่อยู่') }}</label>
                                <div class="col-md-8">
                                    <input id="address1" type="text" class="form-control" name="address1"
                                        value="{{ $order->address1 }}" readonly style="width: 100%">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="districtname" class="col-md-4 col-form-label text-md-right">ตำบล</label>
                                <div class="col-md-8">
                                    <input id="districtname" type="text" class="form-control" name="districtname"
                                        value="{{ $order->district_id }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amphurname" class="col-md-4 col-form-label text-md-right">อำเภอ</label>
                                <div class="col-md-8">
                                    <input id="amphurname" type="text" class="form-control" name="amphurname"
                                        value="{{ $order->amphure_id }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="provincename" class="col-md-4 col-form-label text-md-right">จังหวัด</label>
                                <div class="col-md-8">
                                    <input id="provincename" type="text" class="form-control" name="provincename"
                                        value="{{ $order->province_id }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zipcode" class="col-md-4 col-form-label text-md-right">รหัสไปรษณีย์</label>
                                <div class="col-md-8">
                                    <input id="zipcode" type="text" class="form-control" name="zipcode"
                                        value="{{ $order->postcode }}" readonly style="width: 100%">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="addressphone"
                                    class="col-md-4 col-form-label text-md-right">{{ __('โทรศัพท์') }}</label>
                                <div class="col-md-8">
                                    <input id="addressphone" type="text" class="form-control" name="addressphone"
                                        value="{{ $order->addressphone }}" readonly style="width: 100%">
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- card รายการข้อมูลสินค้า --}}


                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-list mr-1"></i>รายการข้อมูลสินค้า
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ชื่อสินค้า</th>
                                            <th>จำนวนสั่งซื้อ</th>
                                            <th>วันที่สั่งซื้อสินค้า</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach($orderdetails as $item)
                                        <tr>
                                            <td>{{ $item->productname }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->updated_at }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

@endsection