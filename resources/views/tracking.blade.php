@extends('layouts.firstpage')

@section('content')
<div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <h1 class="mt-4" style="color:#660066"><i class="fas fa-truck-moving mr-1"></i> ข้อมูลการขนส่งสินค้า</h1><br>
            
               
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>หมายเลข {{ $barcode }}
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
                        <th>สถานะ</th>
                        <th>วันที่</th>
                        <th>สถานที่</th>
                        <th>รหัสไปรษณีย์</th>
                      </tr>
                    </thead>
                    
                    <tbody>

                      @foreach($items as $item)
                        <tr>
                          <td>{{$item['status_description']}}</td>
                          <td>{{$item['status_date']}}</td>
                          <td>{{$item['location']}}</td>
                          <td>{{$item['postcode']}}</td>
                        </tr>
                      @endforeach            
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
</div>
@endsection