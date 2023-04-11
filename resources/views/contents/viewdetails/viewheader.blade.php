<div class="row">
    <div class="col">
        <div class="card p-2">
            <div class="card-body pt-2">
                
                <h4 style="font-weight: 700">{{$header["mainheader"]}}</h4>
                @if (isset($header["subheader"]) || count($header["subheader"]) > 0)
                    @foreach ($header["subheader"] as $key => $val )
                        <p style="margin:0;p:0;font-size:13px"><span style="color: #808084;font-weight:200">{{$key}}</span> : {{$val}}</p>                   
                    @endforeach
                @endif
            </div>
        </div>
    </div>

</div>