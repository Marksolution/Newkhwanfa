<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>OTOP-ONLINE</title>

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script>
    <link href="{{ asset('p.png') }}" rel="shortcut icon" type="image/x-icon" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark " style="padding: 1rem;">
        <a class="navbar-brand" href="{{ url('order') }}">
            <img src="{{ asset('logoband.png') }}" alt="" style="width: 170px; height: 40px;"> </a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <!-- Navbar-->
        <span class="navbar-text">{{Auth::user()->name}}</span>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">


                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('ออกจากระบบ') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">หน้าหลัก</div>
                        <a class="nav-link" href="{{ url('/') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-home"></i>
                            </div>
                            หน้าแรก
                        </a>
                        <div class="sb-sidenav-menu-heading">รายการแจ้งเตือนใหม่</div>
                        <a class="nav-link" href="{{ url('order') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-bell"></i>
                            </div>
                            ออเดอร์สินค้า
                        </a>
                        <div class="sb-sidenav-menu-heading">จัดการร้าน</div>
                        <a class="nav-link" href="{{ url('myshop') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-store"></i>
                            </div>
                            ร้านของฉัน
                        </a>
                        <a class="nav-link" href="{{ url('Shop_warehouse') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-warehouse"></i>
                            </div>
                            คลังสินค้า
                        </a>
                        <a class="nav-link" href="{{ url('Promotion') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-bullhorn mr-1"></i>
                            </div>
                            โปรโมชั่น
                        </a>


                        {{-- Admin menu --}}
                        @if(auth()->user()->role == 0)
                        <div class="sb-sidenav-menu-heading">ผู้จัดการระบบ</div>
                        <a class="nav-link" href="{{ url('shops') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-city"></i>
                            </div>
                            ร้านค้าทั้งหมด
                        </a>
                        <a class="nav-link" href="{{ url('users') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-users"></i>
                            </div>
                            ผู้ใช้งานระบบ
                        </a>
                        <a class="nav-link" href="{{ url('producttype') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-layer-group"></i>
                            </div>
                            ประเภทสินค้า
                        </a>
                        <div class="sb-sidenav-menu-heading">การเงิน</div>
                        <a class="nav-link" href="{{ url('clearmoney') }}">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-dollar-sign mr-1"></i>
                            </div>
                            จัดการการเงิน
                        </a>

                        @endif
                    </div>

                </div>
                <div class="sb-sidenav-footer">

                    OTOP-ONLINE &copy; 2020
                </div>
            </nav>
        </div>

        {{ csrf_field() }}


        @yield('content')


        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"
            crossorigin="anonymous">
        </script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous">
        </script>
        <script src="{{ asset('assets/demo/datatables-demo.js') }}"></script>
        <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            console.log("START");
            showProvinces();
        });

        function showProvinces() {
            //PARAMETERS
            fetch("{{ url('/') }}/api/provinces")
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_province = document.querySelector("#input_province");
                    input_province.innerHTML = "";
                    for (let item of result) {
                        let option = document.createElement("option");
                        option.text = item.province;
                        option.value = item.province;
                        input_province.add(option);
                    }
                    //QUERY AMPHOES
                    showAmphoes();
                });
        }

        function showAmphoes() {
            let input_province = document.querySelector("#input_province");
            fetch("{{ url('/') }}/api/province/" + input_province.value + "/amphoes")
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_amphoe = document.querySelector("#input_amphoe");
                    input_amphoe.innerHTML = "";
                    for (let item of result) {
                        let option = document.createElement("option");
                        option.text = item.amphoe;
                        option.value = item.amphoe;
                        input_amphoe.add(option);
                    }
                    //QUERY AMPHOES
                    showTambons();
                });
        }

        function showTambons() {
            let input_province = document.querySelector("#input_province");
            let input_amphoe = document.querySelector("#input_amphoe");
            fetch("{{ url('/') }}/api/province/" + input_province.value + "/amphoe/" + input_amphoe.value + "/tambons")
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_tambon = document.querySelector("#input_tambon");
                    input_tambon.innerHTML = "";
                    for (let item of result) {
                        let option = document.createElement("option");
                        option.text = item.tambon;
                        option.value = item.tambon;
                        input_tambon.add(option);
                    }
                    //QUERY AMPHOES
                    showZipcode();
                });
        }

        function showZipcode() {
            let input_province = document.querySelector("#input_province");
            let input_amphoe = document.querySelector("#input_amphoe");
            let input_tambon = document.querySelector("#input_tambon");
            fetch("{{ url('/') }}/api/province/" + input_province.value + "/amphoe/" + input_amphoe.value + "/tambon/" +
                    input_tambon.value + "/zipcodes")
                .then(response => response.json())
                .then(result => {
                    console.log(result);
                    //UPDATE SELECT OPTION
                    let input_zipcode = document.querySelector("#input_zipcode");
                    input_zipcode.value = "";
                    for (let item of result) {
                        input_zipcode.value = item.zipcode;
                        break;
                    }
                });

        }
        </script>

        <!-- <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
        </script> -->
        @yield('singlescript')
</body>

</html>