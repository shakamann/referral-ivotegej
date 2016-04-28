<?php



/**
 * IndexController Class
 *
 * Controls Initial Visit to the application
 */
class IndexController extends Controller
{

    /**
     * Displays the form for account creation
     *
     * @return  Illuminate\Http\Response
     */
    public function routeToDestination()
    {
        if (Confide::user()) {
            $currently_signed_in_username = Confide::user()->username;
            $referred_by = Confide::user()->referred_by;
            $user_group_code = Confide::user()->group_code;
            //return $referred_by;
            $all_downlines = DB::table('users')->where('referred_by', $currently_signed_in_username)->where('confirmed', 1)->get(); //use select clause here ltr to pick only whats needed
            //$group_members = DB::table('users')->where('group_code', $user_group_code)->where('username','!=' ,$currently_signed_in_username)->orderBy('downlines_count', 'desc')->get();
            $group_members = DB::table('users')->where('group_code', $user_group_code)->orderBy('downlines_count', 'desc')->orderBy('count_stamp', 'desc')->get();
            // changed hello view to dashboard below
            return View::make('dashboard',array('all_downlines' => $all_downlines , 'referred_by' => $referred_by, 'group_members' => $group_members));
           // ->with('referred_by', $referred_by);
        } else {
            return View::make(Config::get('confide::signup_form'));
        }

        // return View::make(Config::get('confide::signup_form'));

    }

}
