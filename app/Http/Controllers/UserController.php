<?php
     
namespace App\Http\Controllers;
     
use App\User;
use Illuminate\Http\Request;
use DataTables;

//This below  lines to find the online users and last seen details
use Carbon\Carbon;
use Cache;
     
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arr['users'] = User::all();
        return view('users')->with($arr);
    }

     /**
     * Show user online status.
     */
    public function userOnlineStatus()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id))
                echo $user->name . " is online. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
            else
                echo $user->name . " is offline. Last seen: " . Carbon::parse($user->last_seen)->diffForHumans() . " <br>";
        }
    }
}