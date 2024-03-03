
<div class="app__container"style="margin-top: 160px;">
    @include('frontend.homepage.home.breadcrumb',['title'=>$config['seo']['roomdetail']['title']])
    <div class="grid wide">
        <div class="row sm-gutter app__content">
            <div class="col l-12 m-12 c-12">

                <div class="home-product">
                    <div class="row sm-gutter product-item product-block">
                        <div class="col l-5 m-12 c-12">
                            <div class="name-roomDetail">
                                <p class="">{{$room->nameRoom}}</p>
                            </div>
                        </div>

                        <div class="col l-7 m-12 c-12">
                            <h1 class="product-heading">{{$room->description}}</h1>
                            <p class="quantity-sold">Tình trạng: <span class="quantity">{{$room->status}}</span></p>

                            <form class="product-btn" id="add-to-cart-form">
                            
                                <div class="product-item-price-wrap">
                                    <p class="product-item-price">Gía phòng: <span class="price">{{$room->price}}</span>đ</p>
                                   
                                </div>
                               
                                <div class="product-transport">
                                    <p class="transport">Đặt phòng: </p>
                                    <div class="product-transport--free">
                                        <p class="">Thanh toán sau khi nhận phòng</p>
                                    </div>
                                </div>

                                @if($room->status ==='Đã được đặt')
                                    <p>Phòng này đã được đặt quý khách vui lòng chọn phòng khác</p>
                                    <a class="btn btn-danger mb15" href="{{route('home.index')}}" name="exit"value="">Quay lại</a>
                                @else
                                    @if (Auth::check())
                                        <a class="btn btn-primary mb15" href="{{route('home.roomConfirm', ['home' => $room->roomId, 'pageIndex' => $pageIndex])}}">Đặt phòng</a>
                                    @else
                                        <li><a href="{{route('user.create')}}" class="">Đăng ký</a></li>
                    
                                        <li><a href="{{route('auth.user')}}" class="">Đăng nhập</a></li>
                                    @endif
                                @endif
                            </form>
                            
                            <div class="product-ensure">
                                <p class="product-item-ensure">NgọcHà đảm bảo</p>
                                <p class="product-item-time">Phòng đúng như mô tả / hoàn tiền</p>
                            </div>
                        </div>

                    </div>
                    <div class="btn-action btn-action1">

                        <a href="{{route('home.index')}}" class="btn-back">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back to order</span>
                        </a>
                        
                    </div>
                    

                    {{-- <h2 class="product-description--heading">Chi tiết sản phẩm</h2>
                    <div class="row sm-gutter product-description">
                        <div class="col l-2 c-2 m-2">
                            <p class="title">Đến từ: </p>
                            <p class="title">Hàng chính hãng: </p>
                            <p class="title">Công dụng: </p>
                            <p class="title">Chi tiết: </p>
                        </div>
                        <div class="col l-10 c-10 m-10">
                            <p>Việt Nam</p>
                            <p>Có</p>
                            <p>Tạo cho bạn cảm giác thoải mái nhất bất cứ lúc nào, khi sợ hữu những bộ quần của chúng tôi</p>
                            <p>Sản phẩm được sản xuất và kiểm duyệt vô cùng nghiêm ngặt, khiến bạn yên tâm khi sử dụng</p>
                        </div>

                    </div> --}}

                </div>
            </div>  
        </div>
    </div>
</div>