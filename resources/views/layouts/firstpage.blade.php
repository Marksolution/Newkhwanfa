<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">


<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <import React from 'react'>
        <import swal from '@sweetalert/with-react'>
            <import swal from 'sweetalert'>
                <title>{{ config('app.name', 'OTOP-ONLINE') }}</title>
                <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
                <!-- Scripts -->
                <script src="{{ asset('js/app.js') }}" defer></script>
                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
<link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<style>
body,
h1,
h2,
h3,
h4,
h5,
h6 {
    font-family: "Karma", sans-serif
}

.w3-bar-block .w3-bar-item {
    padding: 20px
}
</style>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
</script>
<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<link href="{{ asset('p.png') }}" rel="shortcut icon" type="image/x-icon" />
<!-- Styles -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css'>
<link href='https://use.fontawesome.com/releases/v5.8.1/css/all.css'>

<style>
ul.timeline {
    list-style-type: none;
    position: relative;
}

ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}

ul.timeline>li {
    margin: 20px 0;
    padding-left: 20px;
}

ul.timeline>li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;


}
</style>
<style>
g {
    text-decoration: line-through;
}

.rating {
    display: flex;
    flex-direction: row-reverse;
    justify-content: center
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 1em;
    font-size: 3vw;
    color: #FF0033;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}

.file {
    visibility: hidden;
    position: absolute;
}
</style>

<style>
.bs4-order-tracking {
    margin-bottom: 30px;
    overflow: hidden;
    color: #878788;
    padding-left: 0px;
    margin-top: 30px
}

.bs4-order-tracking li {
    list-style-type: none;
    font-size: 14px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400;
    color: #878788;
    text-align: center
}

.bs4-order-tracking li:first-child:before {
    margin-left: 15px !important;
    padding-left: 11px !important;
    text-align: left !important
}

.bs4-order-tracking li:last-child:before {
    margin-right: 5px !important;
    padding-right: 11px !important;
    text-align: right !important
}

.bs4-order-tracking li>div {
    color: #fff;
    width: 29px;
    text-align: center;
    line-height: 29px;
    display: block;
    font-size: 12px;
    background: #878788;
    border-radius: 50%;
    margin: auto
}

.bs4-order-tracking li:after {
    content: '';
    width: 150%;
    height: 2px;
    background: #878788;
    position: absolute;
    left: 0%;
    right: 0%;
    top: 15px;
    z-index: -1
}

.bs4-order-tracking li:first-child:after {
    left: 50%
}

.bs4-order-tracking li:last-child:after {
    left: 0% !important;
    width: 0% !important
}

.bs4-order-tracking li.active {
    font-weight: bold;
    color: #dc3545
}



.bs4-order-tracking li.active>div {
    background: #dc3545
}

.bs4-order-tracking li.active:after {
    background: #dc3545
}

.card-timeline {
    background-color: #fff;
    z-index: 0
}
</style>


<body class="sb-nav-fixed">
    <div id="app">
        <nav class="navbar fixed-top navbar-expand-md navbar-light  shadow-sm"
            style="background-color:#4b0082; margin-top:2.7rem">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/')}}">
                    <img src="{{ asset('logoband.png') }}" alt="" style="width: 170px; height: 40px;"
                        class="d-inline-block align-top">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    @yield('type')
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @yield('cart')
                    </ul>
                </div><br />

        </nav>

        <nav class="navbar fixed-top navbar-expand-md navbar-light "
            style="background-color:#4b0082;margin-top:-0.4rem">
            <div class="container">


                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link  text-light" href="{{ route('myshop') }}"><i
                                    class="fas fa-dollar-sign mr-1"></i>{{ __('ขายสินค้ากับ OTOP ONLINE') }} </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-light" style="margin-light:1rem"> /</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('guidebook') }}" class="nav-link  text-light" style="margin-light:1rem"><i
                                    class="fas fa-book mr-1"></i>
                                คู่มือการเปิดร้านค้า</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    &nbsp;&nbsp;

                    @guest
                    <li class="nav-item">
                        <a class="nav-link text-light " style="font-size: 14px;;margin-top: 0.25rem "
                            href="{{ route('login') }}">{{ __('เข้าสู่ระบบ') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-light text-border-right"
                            style="font-size: 14px; margin-right: 1rem ;margin-top: 0.25rem"
                            href="{{ route('register') }}">{{ __('สมัครสมาชิก') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:white; " href="#"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user mr-1"></i>{{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('tracking') }}">
                                {{ __('การซื้อของฉัน') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('senddataaddress') }}">
                                {{ __('จัดการที่อยู่') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('ออกจากระบบ') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest


                </ul>
            </div><br />

        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    <script>
    function up(max) {
        document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) + 1;
        if (document.getElementById("myNumber").value >= parseInt(max)) {
            document.getElementById("myNumber").value = max;
        }
    }

    function down(min) {
        document.getElementById("myNumber").value = parseInt(document.getElementById("myNumber").value) - 1;
        if (document.getElementById("myNumber").value <= parseInt(min)) {
            document.getElementById("myNumber").value = min;
        }
    }
    </script>
    <script>
    function alerts() {
        swal({
            title: "เพิ่มลงตะกร้าสินค้าแล้ว!",
            icon: "success",
        });

    }
    </script>
    <script>
    function login() {
        swal({
            title: "กรุณาเข้าสู่ระบบก่อนค่ะ!",
            icon: "warning",
        });

    }
    </script>
    <script>
    function notsale() {
        swal({
            title: "ไม่สามารถซื้อสินค้าของตัวเองได้!",
            icon: "warning",
        });

    }
    </script>
    <script>
    function success() {
        swal({
            title: "การสั่งซื้อเสร็จสิ้นแล้ว",
            icon: "success",
        });

    }
    </script>
    <script>
    function checkaddress() {

        swal({
            title: "กรุณาเลือกที่อยู่เพื่อดำเนินการต่อ !",
            icon: "warning",
        });
    }
    </script>
    <script>
    function check() {
        swal({
            title: "กรุณาตรวจสอบข้อมูลว่าครบถ้วน ถูกต้องหรือไม่ !",
            buttons: {
                cancel: true,
                confirm: true,
            },
            closeOnClickOutside: false,
            icon: "warning",
        });

    }
    </script>
    <script>
    function myFunction() {
        var x = document.getElementById("Demo");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
        } else {
            x.className = x.className.replace(" w3-show", "");
        }
    }
    </script>


    @yield('singlescript')

    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
    <script>
    $('#myModal').on('shown.bs.modal', function() {
        $('#myInput').trigger('focus')
    })
    </script>
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
    <script>
    var submit = false;
    $('form').submit(function(e) {
        if ($('#email').is(':checked')) {
            setTimeout(function() {
                alert("it's checked");
                submit = true;
                $("form").submit(); // if needed
            }, 2000);
            if (!submit)
                e.preventDefault();
        }
    });
    </script>
    <script>
    $('#form').submit(function(e) {
        e.preventDefault();
        setTimeout(sayit, 2000);
    });
    var sayit = function() {
        if ($('#email').prop('checked')) {
            alert('You chose email');
        } else {
            alert('You didn\' chose anything');
        }
    }
    </script>
</body>

</html>