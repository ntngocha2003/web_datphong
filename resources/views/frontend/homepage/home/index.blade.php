 {{-- phần slider --}}
 @include('frontend.homepage.component.slider')
 <div class="app__container">
    <div class="grid wide">
        <div class="app_heading">
            <h2>Gợi ý hôm nay</h2>
        </div>
        <div class="row sm-gutter app__content">
            <div class="col l-12 m-12 c-12">
                <div class="home-product">
                    <div class="row sm-gutter product-item"> 
                        @if(@isset($rooms) && is_object($rooms))
                            @foreach ($rooms as $room)
                                <div class="col l-2 m-4 c-6">
                                    <a class="home-product-item" href="{{route('home.roomDetail', ['home' => $room->roomId, 'pageIndex' => $pageIndex])}}">
                                        <div class="name-room">
                                            <p class="">{{$room->nameRoom}}</p>
                                        </div>
                                        <h4 class="home-product-item__name">{{$room->description}}</h4>
                                        <div class="home-product-item__price">
                                            <span class="price-room">{{$room->price}}đ</span>
                                        </div>
                                        <div class="home-product-item__action">
                                            <span class="home-product-item__sold"> {{$room->status}}</span>
                                            <div class="eye-room">
                                                <i class="home-product-item--icon fas fa-eye" id=""></i>
                                            </div>
                                                   
                                        </div>                                                 
                                    </a>
                                </div>                   
                            @endforeach
                        @endif
                    </div>
                </div>
                                                    
            </div>  
        </div>
                                
        {{-- phân trang --}}
        @include('frontend.homepage.component.paginating')
    </div> 
   
</div> 