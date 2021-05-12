<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cityList = User::select('city_name')->distinct()->take(11)->get();
        $cityCount = [];
        foreach ($cityList as $city) {
            $cityCount[$city->city_name] = User::where('city_name', '=', $city->city_name)->count();
        }
        $usersSenior = User::where('exp_level', '=', 'senior')->count();
        $usersWithCours = User::where('educational_requirements', '=', 'yes')->count();
        $categories = Category::all();
        $userCount = User::All()->count();
        $latestUsers = User::latest('created_at')->where('active_status', '=', '0')->take(5)->get();
        arsort($cityCount);
        return view('home', compact(['categories','cityCount','cityList','userCount','latestUsers','usersSenior','usersWithCours']));
    }
    public function indexAbout()
    {
        return view('about');
    }
    public function getEmployees(Request $request){

        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page

        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');

        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value

        // Total records
        $totalRecords = User::select('count(*) as allcount')->count();
        $totalRecordswithFilter = User::select('count(*) as allcount')->where('name', 'like', '%' .$searchValue . '%')->count();

        // Fetch records
        $records = User::orderBy($columnName,$columnSortOrder)
          ->where('users.name', 'like', '%' .$searchValue . '%')
          ->select('users.*')
          ->skip($start)
          ->take($rowperpage)
          ->get();

        $data_arr = array();

        foreach($records as $record){
           $id = $record->id;
           $average_rating = intval($record->average_rating);
           $name = $record->name;
           $email = $record->email;

           $data_arr[] = array(
             "id" => $id,
             "average_rating" => $average_rating,
             "name" => $name,
             "email" => $email
           );
        }

        $response = array(
           "draw" => intval($draw),
           "iTotalRecords" => $totalRecords,
           "iTotalDisplayRecords" => $totalRecordswithFilter,
           "aaData" => $data_arr
        );

        echo json_encode($response);
        exit;
      }

    public function indexBlog()
    {
        return view('blog.index');
    }

    public function indexVerificationPage()
    {
        return view('verificationPage');
    }
}
