<div class="app__container"style="margin-top: 160px;">
    @include('customer.homepage.home.breadcrumb',['title'=>$config['seo']['orderroom']['title']])
    <div class="grid wide">
        <div class="row sm-gutter app__content">
            <div class="col l-12 m-12 c-12">
                <div class="home-product">
                    <div class="row sm-gutter product-item"> 
                       
                        @if(@isset($orders) && is_object($orders))
                            @foreach ($orders as $order)
                    
                                <div class="col l-3 m-4 c-6">
                                   
                                    <div class="home-product-item">
                                        <p class="name-room">Tên phòng: {{$order->getNameRoom()}}</p>
                                        <p class="price-room">Gía phòng: {{$order->getPriceRoom()}} đ</p>
                                        <p class="price-room">Ngày nhận: {{$order->checkIn}}</p>
                                        <p class="price-room">Ngày Trả: {{$order->checkOut}}</p>
                                        <p class="price-room">Tình trạng: {{$order->status}}</p>
                                        <p class="price-room">Tổng tiền: {{$order->totalMoney}} đ</p>
                                        @if ($order->status==='Đang xác thực')
                                            <form style="text-align: center;"action="{{route('order.updateCancel', ['order' => $order->orderId])}}"  method="post" class="box">
                                                @csrf
                                              
                                                <button class="btn-cancel" type="submit">Hủy</button>
                                            </form>  
                                     
                                        @elseif($order->status==='Đã xác nhận đặt phòng')
                                            <form  style="text-align: center;" action="{{route('order.updateBack', ['order' => $order->orderId])}}"  method="post" class="box">
                                                @csrf
                                               
                                                <button class="btn-pay" type="submit">Trả phòng</button>
                                            </form> 
                                       
                                        @endif                                  
                                    </div>
                                </div>                   
                            {{-- @endfor --}}
                            @endforeach
                        @endif
                    </div>
                </div>
                                                    
            </div>  
        </div>
    </div>
</div>