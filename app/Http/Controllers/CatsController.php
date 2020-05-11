<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function GuzzleHttp\Promise\all;


class CatsController extends Controller
{
    public function index(Request $request, $id)
    {
        $maxValue = 1000000;
        $seconds  = 60;

        function catGenerator() {
            $cats = [];
            foreach(file(asset('storage/cats.txt')) as $line) {
                array_push($cats, $line);
            }
            $countCats = count($cats);
            $a = rand(0,$countCats-1);
            do {($b = rand(0,$countCats-1));}
                while ($b == $a);
            do {($c = rand(0,$countCats-1));}
            while ($c == $b || $c == $a);
            $randomCats = [$cats[$a], $cats[$b], $cats[$c]];
            return $randomCats;
        }


        if ($id > 0 && $id <= $maxValue) {
            if(Cache::has($id)){
                $cats =  implode(", ", Cache::get($id));
                echo $cats;
            }
            if(!Cache::has($id)){
                $temp = catGenerator();
                Cache::put($id, $temp, $seconds);
                $cats = implode(", ", Cache::get($id));
                echo $cats;
            }

            date_default_timezone_set('Europe/Vilnius');
            $date = date('Y-m-d h:i:s', time());
            $result=DB::insert("INSERT INTO visits (pageNumber) VALUES ($id)");
            $countAll = DB::table('visits')->get()->count();
            $countN = DB::table('visits')->where('pageNumber', '=', $id)->get()->count();
            $response = "\"datetime\":  $date, \"N\": $id,  \"Cats\": $cats,  \"countAll\": $countAll, \"countN\": $countN";
            $newJsonString = json_encode($response, JSON_PRETTY_PRINT);
            file_put_contents(base_path('storage/app/public/test.json'), stripslashes($newJsonString).PHP_EOL, FILE_APPEND);


        return view('cats');
        }
        else{
            return view('welcome');
        }
    }
}
