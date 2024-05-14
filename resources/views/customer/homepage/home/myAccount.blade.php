<div class="app__container"style="margin-top: 160px;">
    @include('customer.homepage.home.breadcrumb',['title'=>$config['seo']['myaccount']['title']])
    <div class="grid wide">
        <div class="row sm-gutter">
            <div class="col l-12 m-12 c-12">

                <div class="home-product">
                            <h1 class="info-user">Thông tin tài khoản</h1>
                                
                            <form method="POST" action="{{route('home.updateAccount', ['home' => Auth::user()->userId, 'pageIndex' => $pageIndex])}}" class="contact-content" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <div class="row sm-gutter product-item product-block">
                                        <div class="col l-5 m-5 c-5" style="border-right: 1px solid var(--primary-color);
                                                                            margin-left:20px">
                                            <div class="product-img">
                                                    <h2 class="title-user">Thông tin cá nhân</h2>
                                                  
                                                    <div class="block row">
                                                       
                                                        <div class="fullname col l-12 c-12 m-12" style="
                                                                                                display: flex;
                                                                                                align-items: center;
                                                                                                ">
                                                            <lable class="text-inner">Họ và tên: 
                                                                <p name="name"class="last-name input"style="width: 100%; color: #bbb;font-size:1.4rem">
                                                                   {{Auth::user()->name}}
                                                                </p>
                                                            </lable>
                                                            
                                                        </div>
                                                    </div>
                                    
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label"> Tuổi: 
                                                            <input
                                                                type="text"
                                                                name="age"
                                                                class="form-control"
                                                                placeholder=""
                                                            
                                                                value="{{Auth::user()->age}}"
                                                            />
                                                        
                                                        </label>
                                                    </div>
                                                    <div class="form-check-inline">
                                                        <label class="form-check-label"> CCCD: 
                                                            <input
                                                            type="text"
                                                            name="identification"
                                                            class="form-control"
                                                            placeholder=""
                                                        
                                                            value="{{Auth::user()->identification}}"
                                                        />
                                                        </label>
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="col l-4 m-4 c-4"style="margin-right:-40px;
                                                                            margin-left:20px">
                                            <h2 class="title-user">Số điện thoại, email</h2>
                                            <div class="ad-user" style="margin-bottom: 10px;">
                                                <div>
                                                    <label class="form-check-label"> Email: 
                                                        <input
                                                        type="text"
                                                        name="email"
                                                        class="form-control"
                                                        placeholder=""
                                                    
                                                        value="{{Auth::user()->email}}"
                                                    />
                                                    </label>
                                                </div>
                                                
                                            </div>
                                            <div class="ad-user">
                                                <div>
                                                   
                                                    <label class="form-check-label"> SĐT: 
                                                        <input
                                                        type="text"
                                                        name="phone"
                                                        class="form-control"
                                                        placeholder=""
                                                    
                                                        value="{{Auth::user()->phone}}"
                                                    />
                                                    </label>
                                                    
                                                </div>
                                            </div>

                                            <h2 class="title-user">Bảo mật</h2>
                                            <div class="ad-user">
                                                <div>
                                                    <i class="ti-unlock"></i> 
                                                    <a href="#">Đổi mật khẩu</a>
                                                </div>
                                                
                                            </div>

                                            <h2 class="title-user">Liên kết mạng xã hội</h2>
                                            <div class="ad-user">
                                                <div>
                                                    <i class="ti-facebook"></i> 
                                                    <a>Facebook</a>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col l-3 m-3 c-3">
                                            <div class="product-img">
                                                <h2 class="title-user">Địa chỉ cá nhân</h2>
                                                <div class="">
                                                    <label for="content"class="text-inner">Địa chỉ: </label><br>
                                                    <textarea id="content" name="address" rows="5" cols="28" 
                                                        style="font-size: 1.4rem; color:#bbb">{{Auth::user()->address}}</textarea><br>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="text-align: center;margin-top: 20px;">
                                        <input type="submit" name="save_change" class="btn-save-change" value="Lưu thay đổi"/>    
                                    </div>
                            </form>

                       

                </div>
                    
            </div>
        </div>  
    </div>
</div>