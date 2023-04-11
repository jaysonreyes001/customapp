<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth;
use App\Http\Controllers\DashboardController as Dashboard;
use App\Http\Controllers\TicketController as ticket;
use PHPUnit\Framework\Attributes\Ticket as AttributesTicket;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//login

Route::get('/', function () {
    return view('contents/login');
});
Route::get('Login', function () {
    return view('contents/login');
})->name("Login");
Route::get("Auth/Logout",[Auth::class,"Logout"]);
Route::post("Process",[Auth::class,"UserLogin"]);





//middleware check session 
Route::group(['middleware' => 'checksession'],function(){



//dashboard
Route::view("Dashboard","contents/dashboard");
Route::get("/DashboardCount",                   [Dashboard::class,'dashboardCount'])->name("dashboard-count");   



//contact
Route::get("/ContactList",                      [Dashboard::class,'index'])->name("contactlist");
Route::get("/Contact/Delete/{id?}",             [Dashboard::class,'delete'])->name("deletecontact");  
Route::get("/Contact/Edit/{id?}",               [Dashboard::class,'edit'])->name("editcontact");  
Route::post("/Contact/Save",                    [Dashboard::class,"save"])->name("savecontact");


//ticket
Route::view("/Ticket","contents/ticket/index");
Route::get("/ticketlist",                       [Ticket::class,'list'])->name("ticketlist");
Route::get("/Ticket/Delete/{id?}",              [Ticket::class,"delete"]);
Route::get("Ticket/View/{name?}/{id?}",         [Ticket::class,"view"]);
Route::post("/Ticket/Save",                     [Ticket::class,'save'])->name('ticketsave');
Route::get("Ticket/{view}/{module}/{id?}",      [ticket::class,'details']);

//comment
Route::get("Comment/{id?}",      [ticket::class,'comment']);
});