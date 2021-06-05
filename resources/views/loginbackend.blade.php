@extends('layouts.login_backend')

@section('content')
<div id="layoutSidenav_content">
            <main>
            <div id="layoutSidenav_content">
                <div class="container-md">
                <br><br><br><br>
                    <div class="jumbotron">
                        <h1 class="display-4">มาเริ่มสมัครเปิดร้านกันเลย!</h1>
                        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
                        <hr class="my-4">
                        <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                        <p class="lead">
                            <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">สมัครตอนนี้</a>
                        </p>
                    </div>
                </div>
            </div>
</div>

@endsection