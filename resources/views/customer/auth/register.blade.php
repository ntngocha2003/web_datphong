<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>NgocHa</title>

    <link href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="admin/css/animate.css" rel="stylesheet">
    <link href="admin/css/style.css" rel="stylesheet">
    <link href="admin/css/customize.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            {{-- <div class="col-md-6">
                <h2 class="font-bold">Welcome to NgocHa_Shop</h2>
            </div> --}}
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form"method="post" action="{{route('user.store')}}">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                        <div class="form-group">
                            <input 
                                type="text" 
                                name="name"
                                class="form-control" 
                                placeholder="Username" 
                                value="{{old('name')}}"
                                >
                                @if ($errors->has('name'))
                                    <span class="error-message">
                                        *{{$errors->first('name')}}
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <input 
                                type="text" 
                                name="email"
                                class="form-control" 
                                placeholder="Email" 
                                value="{{old('email')}}"
                                >
                                @if ($errors->has('email'))
                                    <span class="error-message">
                                        *{{$errors->first('email')}}
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <input 
                                type="password" 
                                name="password"
                                class="form-control" 
                                placeholder="Password" 
                                >
                                @if ($errors->has('password'))
                                    <span class="error-message">
                                        *{{$errors->first('password')}}
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <input 
                                type="password" 
                                name="re_password"
                                class="form-control" 
                                placeholder="Re_Password" 
                                >
                                @if ($errors->has('re_password'))
                                    <span class="error-message">
                                        *{{$errors->first('re_password')}}
                                    </span>
                                @endif
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Đăng ký</button>
                    </form>
                    <p class="m-t">
                        <small>Bạn đã có tài khoản<a href='{{route('auth.user')}}'>Đăng nhập</a></small>
                    </p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>