@extends("layouts.main")
@section("title","Dashboard")
@section('content')
    <div class="row">


        <div class="pagetitle">
            <h1>Dashboard</h1>
            {{-- <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </nav> --}}
          </div>
       

             <!-- Sales Card -->
             <div class="col-xl-4 col-md-6">
                <div class="card info-card sales-card">
  
                  <div class="card-body">
                    <h5 class="card-title">Tickets</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-ticket"></i>
                      </div>
                      <div class="ps-3">
                        <h6 id="ticket-count"></h6>
                 
  
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Sales Card -->

              <!-- Sales Card -->
             <div class="col-xl-4 col-md-6">
                <div class="card info-card sales-card">
  
                  <div class="card-body">
                    <h5 class="card-title">Users</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-person"></i>
                      </div>
                      <div class="ps-3">
                        <h6 id="user-count"></h6>
             
  
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Sales Card -->

              <!-- Sales Card -->
             <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">
  
                  <div class="card-body">
                    <h5 class="card-title">Group</h5>
  
                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6 id="group-count"></h6>
 
  
                      </div>
                    </div>
                  </div>
  
                </div>
              </div><!-- End Sales Card -->

            <div class="card p-4">
                <div class="card-header" style="border-bottom: none">
                    <div class="d-flex justify-content-end">
                        <select name="" id="select_searchfilter" class="form-select" style="width: 25%;">
                          <option value="" disabled selected>--SELECT FILTER--</option>
                        </select>
                        &nbsp;&nbsp;
                        <input type="search" id="searchfilter" placeholder="search" class="form-control" style="width: 25%;">

                        <button class="btn btn-primary btn-sm px-3" onclick="datatable_search()" id="datatable_search"><i class="fas fa-search"></i></button>
                        <button class="btn btn-danger btn-sm px-3" onclick="datatable_cancel()" id="datatable_cancel" style="display:none"><i class="fas fa-times"></i></button>
                        <span id="btn-search"></span>
                    </div>
                </div>
                <div class="card-body">
                    
                  <div class="table-responsive">
                        <div class="table-bordered">
                            <table class="table table-striped" id="customer_table">
                                <thead>
                                    <th></th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Contact No</th>
                                </thead>
                            </table> 
                        </div>
                  </div>
                </div>    
            </div>    
        </div>    
     

    <script> 
    var table = ""; 
$(document).ready( function () {


    
    getdashboardcount();

    table =  $('#customer_table').DataTable({
        serverSide:true,
        searching:false,
        ordering:false,
        ajax:{
                url:"{{url('ContactList')}}" ,
                data:function(d){
                    return $.extend({},d,{
                        "search" : $("#searchfilter").val(),
                        "filter" : $("#select_searchfilter").val()
                    })
                }
        },
        columns:[
            {
                name:"",
            },
            {
                name:"Firstname"
            },
            {
                name:"Lastname"
            }
            ,
            {
                name:"Contact No"
            }
        ],
        columnDefs:[
            {
                target:0,
                className:"dt-body-center"
            }
        ]
    });

    var columns = table.settings().init().columns;
table.columns().every(function(index) { 
        if(index != 0){
            $("#select_searchfilter").append(new Option(columns[index].name,index));
        }
        
}) 
});


    function getdashboardcount(){
        $.get("{{url('DashboardCount')}}").done(function(data){
            var details = JSON.parse(data);
            $("#ticket-count").html(details[0].ticketcount)
            $("#user-count").html(details[0].usercount)
            $("#group-count").html(details[0].groupusercount)
        })  
    }

    function datatable_search(){
        if($("#searchfilter").val()!= ""){
            $("#datatable_cancel").css("display","block");
            $("#datatable_search").css("display","none");

            table.draw();
        }
    }

    function datatable_cancel(){
        if($("#searchfilter").val()!= ""){
          $("#searchfilter").val("");
            $("#datatable_search").css("display","block");
            $("#datatable_cancel").css("display","none");

            table.draw();
        }
    }

    $("#searchfilter").on("search",function(){
      $("#datatable_search").css("display","block");
            $("#datatable_cancel").css("display","none");
      table.draw();
    })

    </script> 

@endsection

