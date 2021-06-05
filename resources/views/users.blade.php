@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid">
      <h1 class="mt-4" style="color:#660066"><i class="fas fa-users mr-1"></i>ผู้ใช้งาน</h1><br>
     
         
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table mr-1"></i>ตารางผู้ใช้งานทั้งหมด          
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table
              class="table table-bordered"
              id="dataTable"
              width="100%"
              cellspacing="0"
            >
              <thead>
                <tr>
                  <th>ชื่อ</th>
                  <th>เมล</th>
                  <th>เบอร์โทรศัพท์</th>
                  <th>ประเภท</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->phone }}</td>
                        @if($item->role == 0)
                            <td>ผู้ดูแลระบบ</td>
                        @elseif($item->role == 1)
                            <td>เจ้าของร้านค้า</td>
                        @else
                          <td>ผู้ใช้งาน</td>
                        @endif
                        <td>
                            <a href="/users/{{ $item->id }}" class="btn btn-outline-warning"><i class="fas fa-pen mr-1"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection