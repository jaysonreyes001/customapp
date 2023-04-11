<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('bootstrap/css/bootstrap.min.css')}}">
    <title>Login</title>
</head>

<style>
    body{
        background: #f6f9ff;
    }
    .shadows{
       box-shadow:  0px 0 30px rgba(1, 41, 112, 0.1)
    }
    .color{
        color: #012970;
    }
</style>
<body>
    
    <div class="container " >
        <div class="row">
            <div class="col-xl-5 col-md-6 col-10 mx-auto " style="margin-top: 150px">
                <div class="card shadows p-3" style="border-radius:5px">
                    <div class="card-header bg-white border-white ">
                        <h3 class="card-title  color h2">Sign In</h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has("error_message"))
                        <div class="alert alert-danger text-center" style="font-weight:500">{{Session::get("error_message")}}</div>  
                          {{Session::forget("error_message")}}
    
                      @endif
                        <form action="{{url('/Process')}}" method="post" class="p-0 m-0">
                            {{ csrf_field() }}
                            
                        
                            <div class="form-group mb-3">
                                <label for="" class="form-label color"style="font-weight:500" >Username</label>
                                <input type="text " style="border: 1px solid #c0d4f7" placeholder="Enter Username" name="username" autocomplete="off" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label for="" class="form-label color" style="font-weight:500">Password</label>
                                <input type="password" style="border: 1px solid #c0d4f7" placeholder="Enter Password"  name="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-end">
                                    <div class="col-lg-3 col-md-12 col-12">
                                        <button class="btn btn-primary w-100" style="font-weight:500">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

</body>
</html>
<script src="{{url('bootstrap/css/bootstrap.min.css')}}"></script>

    

