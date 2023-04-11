<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class Auth extends Controller
{

    public function UserLogin(Request $request){
        $data = array(
           "username" =>  $request["username"],
           "password" => $request["password"]
        );
        //$data = json_encode($data);

       $result =  Http::withHeaders([
            'Authorization' => 'dc724af18fbdd4e59189f5fe768a5f8311527050',
            'Content-Type' => 'application/json',
        ])->post("http://localhost/vtiger/Api/GetUser.php",$data);

        
        $api_reply = json_decode($result,true);
        if($api_reply["Success"] === true){
            $data = $api_reply["Result"];
            session(["user_details" => $data]);
         
           
            return Redirect("/Dashboard");
        }
        else{
            session(["error_message" => $api_reply["Message"]]);
            return Redirect("/Login");
        }

      
    }

    public function Logout(){
        session()->flush();
        return redirect('Login');
    }
}
