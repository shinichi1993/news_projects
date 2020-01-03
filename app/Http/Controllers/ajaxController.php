<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\NewsType;
use App\Category;

class ajaxController extends Controller
{
    //
    public function getNewsType($idCategory)
    {
    	$newstype = NewsType::where('idCategory',$idCategory)->get();
    	foreach($newstype as $nt)
    	{
    		echo "<option value='".$nt->id."'>".$nt->Name."</option>";
    	}
    }
}
