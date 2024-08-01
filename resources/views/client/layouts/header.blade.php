 <!-- navigation -->
 <header class="navigation fixed-top">
     <div class="container">
         <nav class="navbar navbar-expand-lg navbar-white">
             <a class="navbar-brand order-1" href="{{ route('homeClient') }}">
                 <img class="img-fluid" width="100px" src="{{ asset('images/logo.png') }}"
                     alt="Reader | Hugo Personal Blog Template">
             </a>
             <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                 <ul class="navbar-nav mx-auto">
                     <li class="nav-item dropdown">
                         <a class="nav-link" href="{{ route('homeClient') }}"> Home </a>
                     </li>
                     <li class="nav-item dropdown">
                         <a class="nav-link" href="#!">About </a>
                     </li>

                     <li class="nav-item">
                         <a class="nav-link" href="#!">Contact</a>
                     </li>
                     {{-- <li class="nav-item">
                         <a class="nav-link" href="{{ route('listProduct') }}">Shop</a>
                     </li> --}}
                     <li class="nav-item dropdown">
                         <a class="nav-link" href="{{ route('listProduct') }}">
                             Shop <i class="ti-angle-down ml-1"></i>
                         </a>
                         <div class="dropdown-menu">
                             @foreach ($categorys as $value)
                                 <a class="dropdown-item" href="{{ route('categoryProduct', $value->id) }}">
                                     {{ $value->nameCategory }}</a>
                             @endforeach


                             {{-- <a class="dropdown-item" href="about-us.html">About Us</a> --}}

                         </div>
                     </li>
                 </ul>
             </div>

             <div class="order-2 order-lg-3 d-flex align-items-center">
                 <div class="m-2 border-0 bg-transparent">
                    <br>    
                     <div class="user-info">
                        @guest
                            <!-- Hiển thị liên kết đăng nhập nếu người dùng chưa đăng nhập -->
                            <a href="{{ route('login') }}">
                                <i class="fa-solid fa-user fa-xl"></i>
                            </a>
                        @else
                            <!-- Hiển thị thông tin người dùng nếu đã đăng nhập -->
                            <a href="{{ route('profile') }}">
                                <i class="fa-solid fa-user fa-xl"></i>
                            </a>
                            <p>Chào mừng bạn trở lại: {{ Auth::user()->name }}!</p>
                        @endguest
                    </div>
                     {{-- <a href="{{ route('login') }}"><i class="fa-solid fa-user fa-xl" style="color: black"></i></a> --}}
                 </div>

                 <!-- search -->
                 <form class="search-bar" action="{{ route('searchProduct') }}" method="get">
                     <input id="search-query" name="timkiem" type="search" placeholder="Nhập tên sản phẩm">
                 </form>

                 <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                     data-target="#navigation">
                     <i class="ti-menu"></i>
                 </button>
             </div>

         </nav>
     </div>
 </header>
 <!-- /navigation -->
