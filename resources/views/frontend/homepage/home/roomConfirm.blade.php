<div class="app__container"style="margin-top: 160px;">
    @include('frontend.homepage.home.breadcrumb',['title'=>$config['seo']['roomconfirm']['title']])
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
                            <form action="{{route('order.store', ['room' => $room->roomId,'order' => Auth::user()->userId])}}" method="post" class="form-confirm">
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                <div class="ibox-content">
                                    <div class="row sm-gutter">
                                        <div class="col l-6">
                                            <div class="form-row">
                                                <label class="control-label text-right">
                                                    Tên người đặt
                                                    <span class="text-danger">(*)</span>
                                                </label>
                                                <br/>
                                                <input
                                                    type="text"
                                                    name="name"
                                                    class="form-control"
                                                    placeholder=""
                                                   
                                                    value="{{Auth::user()->name}}"
                                                />
                                                <br/>
                                                @if ($errors->has('name'))
                                                    <span class="error-message">
                                                        *{{$errors->first('name')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
            
                                        <div class="col l-6">
                                            <div class="form-row">
                                                <label class="control-label text-right">
                                                    Điện thoại
                                                    <span class="text-danger">(*)</span>
                                                </label>
                                                <br/>
                                                <input
                                                    type="text"
                                                    name="phone"
                                                    class="form-control"
                                                    placeholder=""
                                                    value="{{Auth::user()->phone}}"
                                                />
                                                <br/>
                                                @if ($errors->has('phone'))
                                                    <span class="error-message">
                                                        *{{$errors->first('phone')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row sm-gutter">
            
                                        <div class="col l-12">
                                            <div class="form-row">
                                                <label class="control-label text-right">
                                                   Địa chỉ
                                                    <span class="text-danger">(*)</span>
                                                </label>
                                                <br/>
                                                <input
                                                    type="text"
                                                    name="address"
                                                    class="form-control"
                                                    placeholder=""
                                                    value="{{Auth::user()->address}}"
                                                />
                                                <br/>
                                                @if ($errors->has('address'))
                                                    <span class="error-message">
                                                        *{{$errors->first('address')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row sm-gutter">
            
                                        <div class="col l-6">
                                            <div class="form-row">
                                                <label class="control-label text-left">
                                                    Ngày nhận phòng
                                                    <span class="text-danger"></span>
                                                </label>
                                                <br/>
                                                <input
                                                    type="datetime-local"
                                                    name="checkIn"
                                                    class="form-control"
                                                    placeholder=""
                                                    autocomplete="off"
                                                 
                                                />
                                                <br/>
                                                @if ($errors->has('checkIn'))
                                                    <span class="error-message">
                                                        *{{$errors->first('checkIn')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
            
                                        <div class="col l-6">
                                            <div class="form-row">
                                                <label class="control-label text-left">
                                                    Ngày trả phòng
                                                    <span class="text-danger"></span>
                                                </label>
                                                <br/>
                                                <input
                                                    type="datetime-local"
                                                    name="checkOut"
                                                    class="form-control"
                                                    placeholder=""
                                                    autocomplete="off"
                                                   
                                                />
                                                <br/>
                                                @if ($errors->has('checkOut'))
                                                    <span class="error-message">
                                                        *{{$errors->first('checkOut')}}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
            
                                    </div>
                                    <button class="btn btn-primary mb15" type="submit"name="send"value="">Đặt ngay</button>
                                    <a class="btn btn-danger mb15" href="{{route('room.index')}}" name="exit"value="">Hủy bỏ</a>
                                </div>
                            </form>
                        </div>

                    </div>
                    <div class="btn-action btn-action1">

                        <a href="{{route('home.index')}}" class="btn-back">
                            <i class="fas fa-arrow-left"></i>
                            <span>Back to order</span>
                        </a>
                        
                    </div>

                </div>
            </div>  
        </div>
    </div>
</div>