<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // challenge 2
    public function findDuplicateElements($arr)
    {

        $duplicates = array();

        foreach ($arr as $element => $count) {
            if ($count > 1) {
                $duplicates[] = $element;
            }
        }

        return $duplicates;
    }


    public function showResultChallenge2()
    {
        $arr = array(2, 3, 1, 2, 3);
        $result = $this->findDuplicateElements($arr);
        print_r($result);
    }
    // challenge 2 end


    // challenge 4

    public function groupByOwnersService($fileOwners)
    {
        $result = [];

        foreach ($fileOwners as $filename => $owner) {
            if (!array_key_exists($owner, $result)) {
                $result[$owner] = [];
            }

            $result[$owner][] = $filename;
        }

        return $result;
    }

    public function showResultChallenge4()
    {

        $fileOwners = [
            "insurance.txt" => "Company A",
            "letter.docx" => "Company A",
            "Contract.docx" => "Company B",
        ];

        $groupedFiles = $this->groupByOwnersService($fileOwners);
        print_r($groupedFiles);
    }

        // challenge 4

}