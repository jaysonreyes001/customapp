<style>
    label{
        color: #808084
    }
    span{
        font-weight:bold
    }
</style>

<div class="row">
    <div class="col">
@foreach($result as $keys => $vals)
<div class="card ">
    <div class="card-header pt-4">
        <h6 style="color:black">
            @php
                $test= explode("_",strtoupper($keys));
                if(count($test) > 1){
                    echo $test[1]." ".$test[2];
                }
                else{
                    echo $test[0]; 
                }
            @endphp
        </h6>
    </div>
    <div class="card-body pt-4 ">
        @php($a=0)
        @foreach ($vals as $key => $val)
                           @if ($a % 2 == 0)
                                <div class="row mb-3 ">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col">
                                                <label for="" st>{{$val["fieldlabel"]}}</label>
                                            </div>
                                            <div class="col">
                                                <span>{{$val["value"]}}</span>
                                            </div>
                                        </div>
                                    </div>   
                           @else
                                 <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <label for="">{{$val["fieldlabel"]}}</label>
                                        </div>
                                        <div class="col">
                                            <span>{{$val["value"]}}</span>
                                        </div>
                                    </div>
                                </div>
                           

                            @if (count($vals)-1 != $a)
                                </div>
                            @endif
                           @endif

         
                @if (count($vals)-1 == $a )
                
                      @if ($a % 2 == 0)
                      <div class="col">
                        <div class="row">
                            <div class="col">
                                <label for=""></label>
                            </div>
                            <div class="col">
                                <span></span>
                            </div>
                        </div>
                    </div>
              
                      @endif
                   
                    </div>


                
                    
                @endif
 
            @php($a++) 
            
        @endforeach
  
</div>

</div>
@endforeach
</div>
</div>