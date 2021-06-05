@extends('layouts.firstpage')

@section('content')

<div id="layoutSidenav_content">
    <main>
    <div id="layoutSidenav_content"style="margin-top:1rem">
    <div class="container-md" >
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" >
  <ol class="carousel-indicators">
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="sl2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="2.png" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="3.png" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden"></span>
  </a>
</div>

<hr>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="{{ route('first_data') }}" style="font-size: 16px;">สินค้าทั้งหมด</a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item">
              <a class="nav-link  " style="font-size: 16px; color:violet" href="{{ route('loginbackend') }}">{{ __('สินค้าโปรโมชัน') }}</a>
      </li>
      <li class="nav-item">
              <a class="nav-link  " style="font-size: 16px; color:red" href="{{ route('loginbackend') }}">{{ __('ขายสินค้ากับ OTOP ONLINE') }}</a>
      </li>
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" style="font-size: 16px; color:green" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          หมวดหมู่สินค้า
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        @foreach ($type as $item2) 
          <a class="dropdown-item" href="#" type="number" value="{{$item2['name']}}">{{$item2['name']}}</a>
          <div class="dropdown-divider"></div>
        @endforeach
        </div>
      </li>
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>
</div>
      <div class="container-md">
      <div class="jumbotron bg-light">
              <h2 class="text-info">สินค้าทั้งหมด</h2>
              <ol class="breadcrumb mb-4">
                <a >สินค้าทั้งหมด</a>
            </ol>
              <div class="d-flex justify-content-start">
              <div class="row">
              @foreach($dataproduct as $item)
              <div class="col-4">
                <form action="{{route('')}}" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                  <input type="hidden" name="id" >
                          <a href="{{ route('detailproduct', ['id'=>$item->id]) }}" style="color: inherit; text-decoration:none;" >
                            <div class="card" >
                                <img class="card-img-top" src="https://images.unsplash.com/photo-1491637639811-60e2756cc1c7?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=669&q=80" alt="Card image cap " >
                                <div class="card-body ">
                                  <input type="hidden"  name="" value="" >
                                  <input type="hidden"  name="" value="" >
                                  <input type="hidden"  name="" value="" >
                                  <input type="hidden" class="card-title text-left" name="" value="">  <br>
                                  <input type="hidden" class="card-text text-left" name="" value="">  <br>
                                  <input type="hidden" class="card-text text-left text-success" name="" value=""> ฿ <br>
                                  <g class="text-danger">฿3,500</g><br>
                                  <input type="hidden" class="card-text text-right text-primary"  name="" value="">ขายแล้ว 600 ชิ้น <br>
                                  <center><div class="d-grid gap-2 d-md-block"><br>
                                  <button class="btn btn-primary"   style= "padding: 7px 80px"><a href="{{ route('sendaddress') }}"></a> สั่งซื้อ</button>
                                  <button class="btn" ><a href="{{ route('cart', ['id'=>$item->id]) }}"><img src="{{ asset('cart-plus-solid.svg') }}"  style="hight:35px;width:35px; color:red" alt=""></a></button>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor " class="bi bi-bookmark-fill" viewBox="0 0 30 30" style="position: absolute; left: -6px; top: 0px; color: red; margin-top:0rem ">
                                  <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
                                </svg><b style="position: absolute; left: 8px; top: 15px; color: #ffff; ">30%</b>

                                </div></center>
                                
                              </div>
                            
                        </div>
                        <div class="col-4" style="widih:300px; hight:5px;"> <br/></div>
                        </div>
                </form>
              @endforeach
              </div>
              </div>
              
                </div>
                <hr>
              </div>
        


              

<div class="container-md">
  <!-- About Section -->
  <div class="w3-container w3-padding-32 w3-center">  
    <h3>About Me, The Food Man</h3><br>
    <img src="sl1.png" alt="Me" class="w3-image" style="display:block;margin:auto" width="800" height="533">
    <div class="w3-padding-32">
      <h4><b>I am Who I Am!</b></h4>
      <h6><i>With Passion For Real, Good Food</i></h6>
      <p>Just me, myself and I, exploring the universe of unknownment. I have a heart of love and an interest of lorem ipsum and mauris neque quam blog. I want to share my world with you. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla. Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
    </div>
  </div>
  <hr>
  
  <!-- Footer -->
  <footer class="w3-row-padding w3-padding-32">
    <div class="w3-third">
      <h3>FOOTER</h3>
      <p>Praesent tincidunt sed tellus ut rutrum. Sed vitae justo condimentum, porta lectus vitae, ultricies congue gravida diam non fringilla.</p>
      <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </div>
  
    <div class="w3-third">
      <h3>BLOG POSTS</h3>
      <ul class="w3-ul w3-hoverable">
        <li class="w3-padding-16">
          <img src="sl1.png" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Lorem</span><br>
          <span>Sed mattis nunc</span>
        </li>
        <li class="w3-padding-16">
          <img src="sl1.png" class="w3-left w3-margin-right" style="width:50px">
          <span class="w3-large">Ipsum</span><br>
          <span>Praes tinci sed</span>
        </li> 
      </ul>
    </div>

    <div class="w3-third w3-serif">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
      </p>
    </div>
  </footer>

<!-- End page content -->
</div>


</script>
<style>
  <body>
  @media (max-width: 600px){
    .d-flex justify-content-start{
      flex-direction:column;
    }
  }</body>
</style>
@endsection