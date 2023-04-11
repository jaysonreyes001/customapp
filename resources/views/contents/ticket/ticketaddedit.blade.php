@extends("layouts.main");
@section("title","Ticket | $title ")
@section("content")

    <div class="row">

        <div class="pagetitle">
            <h4>Ticket {{$title}}</h4>
        </div>
        <div class="card p-4 shadow">
            <div class="card-body">
                <form method="post" action="{{route('ticketsave')}}">
                    @csrf
                <div class="form-group mb-3">
                    <label for="" class="form-label">Ticket Title</label>
                    <input type="text" name="title" value="{{isset($data["title"]) ? $data["title"]:"" }}  " id="" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label">Ticket Priority</label>
                    <input type="text" name="priority" value="{{isset($data["priority"]) ? $data["priority"]:"" }}  " id="" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="" class="form-label">Ticket Status</label>
                    <input type="text" name="status" value="{{isset($data["status"]) ? $data["status"]:"" }}  " id="" class="form-control">
                </div>

                <div class="d-flex justify-content-end">
                    <a class="btn  btn-danger" href="{{url('Ticket')}}" >Cancel</a>&nbsp; &nbsp;
                      <button class="btn  btn-primary" >Save</button>
                  </div>
                  <input type="hidden" name="id" value="{{isset($data["id"]) ? $data["id"]:"" }}">
                  <input type="hidden" name="action" value="save">
                </form>

            </div>
        </div>

    </div>



  
@endsection