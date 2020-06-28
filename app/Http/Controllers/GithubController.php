<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GithubController extends Controller
{
     public function index( )
    {
        return view('github.index');
    }

    public function searchUser(Request $request)
    {
        if($request->ajax()){

            $output = '';
            $query = $request->get('query');

            if($query != ''){

                $curl = curl_init();

                curl_setopt($curl, CURLOPT_URL, "https://api.github.com/search/users?q=".$query);
                curl_setopt($curl, CURLOPT_HTTPHEADER,array(
                    'Accept: application/vnd.github.v3+json',
                    'User-Agent: Laravel Auth App'
                ));


                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

                $data = json_decode(curl_exec($curl));

                curl_close($curl);


            } else {
                $data = null;
            }
            $total_row = $data->total_count;

            if($total_row > 0){
                foreach($data->items as $row) {

                    $output .= '
                    <tr>
                    <td class="text-center" ><img src='.$row->avatar_url.' alt="Avatar" style="vertical-align: middle;width: 50px;height: 50px;border-radius: 50%;"></td>
                    <td  class="text-center" ><a href='.$row->html_url.'>'.$row->login.'</a></td>

                    </tr>
                    ';
                }
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="5">No Data Found</td>
                </tr>
                ';
            }

            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }



    }


}
