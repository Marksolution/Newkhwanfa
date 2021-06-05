@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid">
      <h1 class="mt-4" style="color:#660066"><i class="fas fa-layer-group mr-1"></i>ประเภทสินค้า</h1><br>
     
         
      <div class="card mb-4">
        <div class="card-header">
          <i class="fas fa-table mr-1"></i>ตารางประเภทสินค้าทั้งหมด
          <a href="{{ url('/producttypecreate') }}" 
            style="float:right" 
            class="btn btn-primary text-right">
            <i class="fas fa-plus mr-1"></i> เพิ่มสินค้าใหม่</a>
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
                  <th>ชื่อประเภทสินค้า</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                {{-- วนลูปการทำงาน นำตัวแปรจาก controller, ทุกรอบของการวนลูป จะทำการใส่ข้อมูลแต่ละแถวใน products array ลงใน item --}}
                @foreach($data as $item)
                    <tr>
                        {{-- นำข้อมูลตัวแปร item ที่ได้ มาแสดงผลในแต่ละฟิลตามชื่อคอลัมของตาราง --}}
                        <td>{{ $item->name }}</td>
                        <td>
                            <a href="/producttype/{{ $item->id }}" class="btn btn-outline-warning"><i class="fas fa-pen mr-1"></i></a>

                            <a href="/producttypeDelete/{{ $item->id }}" class="btn btn-outline-danger"><i class="fas fa-trash-alt mr-1"></i></a>
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