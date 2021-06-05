@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid">
      <h1 class="mt-4" style="color:#660066">แก้ไขประเภทผู้ใช้งาน</h1><br>
     
         
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table mr-1"></i>ข้อมูลผู้ใช้งาน
     
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('usersupdate') }}">
                @csrf
                <input name="id" type="hidden" value="{{$data->id}}">
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ชื่อ') }}</label>

                    <div class="col-md-6">                        
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" required autofocus readonly>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('ประเภทผู้ใช้งาน') }}</label>

                    <div class="col-md-6">                                                
                        <select id="type" name="type" class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelect">
                            @if($data->role == 0)
                            <option value="0" selected>ผู้ดูแลระบบ</option>
                            <option value="1">ผู้ใช้งาน</option>
                            @else
                            <option value="0">ผู้ดูแลระบบ</option>
                            <option value="1" selected>ผู้ใช้งาน</option>
                            @endif
                          </select>
                        @error('type')
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