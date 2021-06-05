@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid">
      <h1 class="mt-4" style="color:#660066">ข้อมูลร้านค้า</h1><br>
     
         
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table mr-1"></i>ร้านค้า     
        </div>
        <div class="card-body">
                <input name="id" type="hidden" value="{{$data->id}}">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อร้านค้า') }}</label>
                    <div class="col-md-6">                        
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ $data->shopname }}" readonly>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อเจ้าของร้าน') }}</label>
                    <div class="col-md-6">                        
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ $data->username }}" readonly>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('อีเมล') }}</label>
                    <div class="col-md-6">                        
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ $data->email }}" readonly>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('เบอร์โทรศัพท์') }}</label>
                    <div class="col-md-6">                        
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                            name="name" value="{{ $data->phone }}" readonly>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

      
        </div>
      </div>
    </div>
</div>
@endsection