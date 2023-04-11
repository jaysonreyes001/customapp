<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Key Fields</h2>
              @foreach ($result["keyfield"] as $key => $val)
                    <div class="row mb-3">
                        <div class="col" style="color: #808084">{{$key}}</div>
                        <div class="col" style="font-weight:600">{{$val}}</div>
                    </div>
              @endforeach
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                    <h2 class="card-title">Comments</h2>
                <div class="row mb-4">
                    <div class="form-group mb-2">
                        <textarea name="" id="" rows="2" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary" style="float: right;width:100px">Post</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                      
                        <div id="divcomment" style="font-size:13px"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){
       $.ajax({
            url:"{{url('Comment')}}/{{$id}}",
            method:"get",
            success:function(data){
                var jsondata = JSON.parse(data);
                if(jsondata.length > 0){
                var content = '<hr><h2 class="card-title mb-3" style="padding:0px">Recent Comments</h2>';
                for(var a=0;a<jsondata.length;a++){
                    content+="<div class='row'><div class='col'>";
                            content+="<div class='card mb-2'>";
                                content+="<div class='card-body mt-2'>";
                                    content+="<div><span  style='font-size:17px;font-weight:600'>"+jsondata[a].user+"</span>&nbsp;&nbsp;&nbsp;<span style='font-size:10px;color:#808084'>"+jsondata[a].createdtime+"</span></div>";
                                    content+="<div>"+jsondata[a].comment+"</div>";
                                    if(jsondata[a].reason != ""){
                                        content+="<div class='d-flex justify-content-between mt-2' ><span>Edit reason : "+jsondata[a].reason+"</span><span>Comment modified "+jsondata[a].modifiedtime+"</span></div>";
                                    }
                                content+="</div>";
                            content+="</div>";
                    content+="</div></div>"; 
                    
                    if(a == 4){
                        content+="<div class='text-center mt-2'><a href='#' class='link'>show more</a></div>";
                    }
                }
             
                $("#divcomment").html(content);
            }
            }
       })
    })
</script>