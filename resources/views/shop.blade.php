@extends('layouts.shop')

@section('content')
<div id="layoutSidenav_content">
        <main>
          <div class="container-fluid">
            <h1 class="mt-4" style="color:#660066"><i class="fas fa-city mr-1"></i> ร้านค้าทั้งหมด</h1><br>
            
               
            <div class="card mb-4">
              <div class="card-header">
                <i class="fas fa-table mr-1"></i>ร้านค้า OTOP
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
                        <th>ชื่อร้านค้า</th>
                        <th>เจ้าของร้าน</th>
                        <th></th>
                      </tr>
                    </thead>
                    
                    <tbody>

                      @foreach ($shops as $item)
                      <tr>
                        <td>{{$item->shopname}}</td>
                        <td>{{$item->username}}</td>
                        <td>
                          <a href="shops/{{$item->id}}" class="btn btn-outline-warning"><i class="fas fa-search mr-1"></i></a> 
                        </td>                   
                      </tr>
                      @endforeach
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </main>
        @endsection