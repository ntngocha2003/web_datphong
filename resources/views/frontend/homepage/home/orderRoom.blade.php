<div class="app__container"style="margin-top: 160px;">
    @include('frontend.homepage.home.breadcrumb',['title'=>$config['seo']['orderroom']['title']])
    <div class="grid wide">
        <div class="row sm-gutter app__content">
            <div class="col l-12 m-12 c-12">
                <div class="home-product">
                    <div class="row sm-gutter product-item"> 
                        @if(@isset($orders) && is_object($orders))
                            @foreach ($orders as $order)
                                <div class="col l-4 m-4 c-6">
                                    <div class="home-product-item">
                                        <h4 class="">{{$order->roomId}}</h4>
                                        <p class="price-room">Gía phòng: đ</p>
                                        <p>{{$order->checkIn}}</p>
                                        <p>{{$order->checkIn}}</p>
                                        <p>Tổng tiền: {{$order->totalMoney}} đ</p>
                                        <form>
                                            <button>Hủy</button>
                                        </form>                                        
                                    </div>
                                </div>                   
                            @endforeach
                        @endif
                    </div>
                </div>
                                                    
            </div>  
        </div>
    </div>
</div>