<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Ốc - Register</title>

    <!-- Custom fonts for this template-->
    <link href="source/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="source/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Tạo Tài Khoản NV</h1>
                            </div>
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $er)
                            {{$er}}
                            @endforeach
                        </div>
                    @endif
                            <form class="user" action="{{route('signin')}}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Họ Tên" name="name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="tel" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Số Điện Thoại" name="phone" pattern="(\+84|0)\d{9,10}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Tên Đăng Nhập" name="username">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Mật Khẩu" name="pass">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Nhập Lại Mật Khẩu" name="repass">
                                    </div>
                                </div>




                                            <div class="form-group">
                                                <div class="custom-control">

                                                    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                                    @if($errors->has('g-recaptcha-response'))
                                                    <span class="invalid-feedback" style="display:block">
                                                        <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>






<div class="text-center">
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Đăng Ký</button>
                        </div>
</div>

                                <hr>

                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{route('login')}}"><i class="fas fa-key"></i> Đăng Nhập</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{route('index')}}"><i
                                class="fa fa-home"></i> Trang Chủ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="source/vendor/jquery/jquery.min.js"></script>
    <script src="source/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="source/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="source/js/sb-admin-2.min.js"></script>
     <script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>

</body>

</html>