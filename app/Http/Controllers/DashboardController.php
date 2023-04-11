<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{

    private $url,$header,$token;

    public function __construct()
    {
        $this->url =  "http://localhost/vtiger/api/";
        $this->token = "dc724af18fbdd4e59189f5fe768a5f8311527050";
        $this->header = ["Content-Type" => "application/json", "Authorization" => $this->token];
    }
    //
    public function index(Request $request){
     
        $data = array(
            "start"     => $request["start"],
            "length"    => $request["length"],
            "action"    => "view",
            "search"    => $request["search"],
            "filter"    => $request["filter"],
            "id"        => session("user_details")["id"]
        );



        $result = Http::withHeaders($this->header)->post($this->url."getcontactlist.php",$data);
        return $result;
        
    }

    public function dashboardCount(){

        $result = Http::withHeaders($this->header)->get($this->url."getdashboardcount.php");
        $result = json_decode($result,true);
        return json_encode($result["Result"]);
    }

    public function edit($id = null){

        if(!empty($id)){

            $result = Http::withHeaders($this->header)->post($this->url."getcontactlist.php",array("action" => "edit","id" => $id));
            $result = json_decode($result,true);
            return view("contents/contact_edit",$result["Result"]);

        }
        else{
            return redirect("Dashboard");
        }

        

       
    }

    public function delete($id = null){
        if(!empty($id)){

            $result = Http::withHeaders($this->header)->post($this->url."getcontactlist.php",array("action" => "delete","id" => $id));
            $result = json_decode($result,true);

        }

        return redirect("Dashboard");
    }


    public function save(Request $request){

        $data = array(
            "action"        => "save",
            "id"            => $request["id"],
            "firstname"     => $request["firstname"],
            "lastname"      => $request["lastname"],
            "mobile"       => $request["mobile"]
        );

        $result = Http::withHeaders($this->header)->post($this->url."getcontactlist.php",$data);
        echo $result;

    }

   
}
