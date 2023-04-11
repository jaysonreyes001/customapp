

@extends("layouts.main")
@section("title","Edit Contact")
@section("content")
        <div class="row">
            <div class="pagetitle">
                <h1>Edit Contact</h1>
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('Dashboard')}}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Contact</li>
                  </ol>
                </nav>
              </div>


              <div class="card p-4">
                    <div class="card-body">
                        <form  id="form">
                          @csrf
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">First Name</label>
                                    <input type="text" name="firstname" value="{{$firstname}}" id="" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Last Name</label>
                                    <input type="text" name="lastname" id="" value="{{$lastname}}" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Contact No.</label>
                                    <input type="text" name="mobile" id="" value="{{$mobile}}" class="form-control">
                                </div>
                                <div class="d-flex justify-content-end">
                                  <a class="btn  btn-danger" href="{{url('Dashboard')}}" >Cancel</a>
                                  &nbsp; &nbsp;
                                    <button class="btn  btn-primary" >Save</button>
                                </div>
                                <input type="hidden" name="id" value="{{$id}}">
                          </form>                                
                    </div>
              </div>
        </div>
        <script>
          $.ajaxSetup({
            headers:{
              'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr("content")
            }
          })
              
              $("#form").on("submit",function(e){
                var form= $("#form");
                e.preventDefault();
                  $.ajax({
                    type:"POST",
                    url:"{{route('savecontact')}}",
                    data:form.serialize(),
                    success:function(data){
                      console.log(data);
                      swal({
                        "title":"Successfully save",
                        "icon" : "success",
                        customClass: "btn-primary",
                      }).then(function(){
                        location.href="{{url('Dashboard')}}"
                      });
                       
                    }
                  })
              })
     
        </script>
@endsection
