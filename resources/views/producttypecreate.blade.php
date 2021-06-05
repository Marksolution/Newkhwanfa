@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid">
      <h1 class="mt-4" style="color:#660066">เพิ่มประเภทสินค้า</h1><br>
     
         
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table mr-1"></i>ประเภทสินค้า
     
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('producttypeinsert') }}">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อประเภทสินค้า') }}</label>

                    <div class="col-md-6">                        
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

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
</div>
@endsection