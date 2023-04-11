@extends('layouts.main')
@section('title','Ticket')
@section('content')
    <div class="row">
        <div class="pagetitle">
            <div class="d-flex justify-content-between align-items-center">
                <h4>Ticket</h4>
                <a href="{{url("Ticket/View/Add")}}" class="btn btn-sm btn-primary shadow"><span class="fas fa-plus"></span> Add ticket</a>
            </div>

        </div>

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
                        <table class="table table-striped" id="ticket_table">
                            <thead>
                                <th></th>
                                <th>Ticket Title</th>
                                <th>Ticket Priority</th>
                                <th>Ticket Status</th>
                            </thead>
                        </table> 
                    </div>
              </div>
            </div>    
        </div>
    </div>
    <script>
         var table = "";
        $(function(){
          table =  $("#ticket_table").DataTable({
                ordering:false,
                searching:false,
                serverSide:true,
                ajax:{
                    url:"{{url('ticketlist')}}",
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
                name:"title"
            },
            {
                name:"priority"
            }
            ,
            {
                name:"status"
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

            
        })

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


