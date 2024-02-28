
<header class="header">
            <div class="grid wide">
                <nav class="header__navbar hide-on-mobile-tablet">
                   <ul class="header__navbar-list">
                       <li class="header__navbar-item header__navbar-item--has-qr header__navbar-item--separate">
                           <a href="{{route('home.index')}}" class="header__navbar-icon-link">Home</a>
                        </li>

                       <li class="header__navbar-item">                           
                            <a href="" class="header__navbar-icon-link">
                                Kết nối
                                <i class="header__navbar-icon fab fa-facebook"></i>
                            </a>
                       </li>
                   </ul>
 
                   <ul class="header__navbar-list">
                       <li class=" header__navbar-item header__navbar-item--has-notify">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon far fa-bell"></i>
                                Thông báo
                            </a>
                            
                            <div class="header__notify">
                                <header class="header__notify-header">
                                    <h3>Thông báo mới nhận</h3>
                                </header>
                                <div class="header__notify-list">
                                
                                    <p>Chào mừng bạn đến với NgọcHà_Shop</p>
    
                                </div>
                                
                            </div>
                       </li>
                       @if (Auth::user()->name!==null) 

                            <div class="header__navbar-item header__navbar-user" id="header__navbar-user">
                                
                                <!-- <img src="./admin/image/avatar.png" alt="" class="header__navbar-user-img"> --> 
                                <span class="header__navbar-user-name">{{Auth::user()->name}}</span>

                                <div class="header__navbar-user-menu">
                                    <div class="header__navbar-user-item">
                                        <a href="{{route('home.myaccount', ['home' => Auth::user()->userId])}}">Tài khoản của tôi</a>
                                    </div>
                                    <div class="header__navbar-user-item">
                                        <a href="{{route('order.myOrder',['user' => Auth::user()->userId])}}">Phòng đặt</a>
                                    </div>
        
                                    <div class="header__navbar-user-item header__navbar-user-item--separate">
                                        <a href="{{route('auth.logout')}}">Đăng xuất</a>
                                    </div>
                                    
                                </div>
                            </div>
                        @else
                        
                            <li><a href="./registerClient.php" class="header__navbar-item header__navbar-item--strong header__navbar-item--separate btn-start--register">Đăng ký</a></li>
                
                            <li><a href="./loginClient.php" class="header__navbar-item header__navbar-item--strong btn-start--login">Đăng nhập</a></li>
                        @endif  
                   </ul>
                </nav>
           
                <!-- Header with search -->
                <div class="header-with-search">
                    <label for="mobile-search-checkbox" class="header__mobile-search">
                        <i class="header__mobile-search-icon fas fa-search"></i>
                    </label>
                    <div class="header__logo hide-on-tablet hide-on-mobile">
                        <a href="{{route('home.index')}}"class="header__logo-link">
                            <i class="fas fa-heading header_logo-link--icon"></i>
                            _Ngọc Hà
                        </a>                                                        
                    </div>
                    <input type="checkbox" hidden id="mobile-search-checkbox" class="header__search-checkbox">
                    <div class="header__search">
                        <form action="home.php" method="POST" class="header__search-input-wrap">
                            
                            <input type="text" value=""name="search" class="header__search-input" placeholder="Tìm kiếm sản phẩm">
                            <button type="submit" name="btnSearch" class="header__search-btn">
                                <i class="header__search-btn-icon fas fa-search"></i>
                            </button>
                           
                        </form>
                        
                    </div>
                   
                </div>

                
            </div>
        </header>