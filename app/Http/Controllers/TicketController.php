<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TicketController extends Controller
{
    private $url,$header,$token;

    public function __construct()
    {
        $this->url =  "http://localhost/vtiger/api/";
        $this->token = "dc724af18fbdd4e59189f5fe768a5f8311527050";
        $this->header = ["Content-Type" => "application/json", "Authorization" => $this->token];
    }
    //
    public function list(Request $request){
     
        $data = array(
            "start"     => $request["start"],
            "length"    => $request["length"],
            "action"    => "view",
            "search"    => $request["search"],
            "filter"    => $request["filter"],
        );

        $result = Http::withHeaders($this->header)->post($this->url."ticket.php",$data);
        return $result;
        
    }

    public function delete($id = null){

        if(!empty($id)){

            $data = array(
                "id"        => $id,
                "action"    => "delete"
            );

            $result = Http::withHeaders($this->header)->post($this->url."ticket.php",$data);
        }
        return redirect("Ticket");

    }

    public function view($name = "Add",$id = null){
        $data = array();
        $output["title"] = $name;

        if( ($name == "Add" && $id != null) ){
            return redirect("Ticket");
        }

        if($name == "Edit" && $id != null){
            $data["action"] = "edit";
            $data["id"] = $id;
            $result = Http::withHeaders($this->header)->post($this->url."ticket.php",$data);
            $jsondata = json_decode($result,true);
            $output["data"] = $jsondata["Result"];
            
        }

        return view("contents.ticket.ticketaddedit",$output);
    }

    public function save(Request $request){

        $result = Http::withHeaders($this->header)->post($this->url."ticket.php",$request->post());
             return redirect("Ticket");
    }

    public function details($view="Details",$module,$id = null){

        $output["title"] = $module;
        $output["header"] = "test header";
        $output["tab"] = "test tabs";
        $output["information"] = "test information2";
        $output["id"] = $id;
        $output["view"] = $view;


        $tab = "";
        $active = "";
        $tablist = array("Summary","Details","Updates");
        foreach($tablist as $pertab){
            $href = "/".$pertab."/".$module."/".$id;
            $active = "";
            if($view == $pertab){
                $active = "active";
            }

            $tab .= '<li class="nav-item  "><a class="nav-link '.$active.' " href="'.url('Ticket').$href.'">'.$pertab.'</a></li>';
        }
        $output["tabheader"] = $tab;
    

 
        if($id == null){
            return redirect("Ticket");
        }
        $data = array(
            "module" => $module,
            "id"    => $id
        );

        $result = Http::withHeaders($this->header)->post($this->url."GetHeader.php",$data);
        $output["header"] = json_decode($result,true);
        if($view == "Details"){
            // switch ($module) {
            //     case 'HelpDesk':
                    
            //         break;
            // }
            $result = Http::withHeaders($this->header)->post($this->url."GetDetails.php",$data);
            $output["result"] = json_decode($result,true);
        } 
        else if ($view == "Summary"){

            $result = Http::withHeaders($this->header)->post($this->url."GetSummary.php",$data);
            $output["result"] = json_decode($result,true);

        }
           return view("contents.viewcontent",$output);
          
    }
    public function comment($id = null){

            $data = array("id" => $id);
            $result = Http::withHeaders($this->header)->post($this->url."GetComment.php",$data);
            echo $result;
    }

    
}
