<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mainland;
use App\Blockslider;
use App\Blockbaner;
use App\Onevideo;
use Illuminate\Support\Facades\DB;

class LandingController extends Controller
{
	
	    public function index()
    {
			
			/*страница лендинга*/
			$landing = Mainland::active();
			/*видео блок*/
			$video = Onevideo::where('id',  $landing->onevideo_id)->active();

						
			/*все дочерние слайдеры*/
			$sliders = DB::table('mainland_blockslider')
            ->leftJoin('blocksliders', 'mainland_blockslider.blockslider_id', '=', 'blocksliders.id')
			->leftJoin('oneslider_blockslider', 'blocksliders.id', '=', 'oneslider_blockslider.blockslider_id')
			->leftJoin('onesliders', 'oneslider_blockslider.oneslider_id', '=', 'onesliders.id')
			->where('mainland_blockslider.mainland_id', 2)
			->where('blocksliders.status', 1)
			->orderBy('blocksliders.sort_order')
			->orderBy('blocksliders.id')
			->orderBy('onesliders.sort_order')
			->orderBy('onesliders.id')
			->select('onesliders.*', 'blocksliders.*')
            ->get();
			
			/*все дочерние банеры*/
			$baners = DB::table('mainland_blockbaner')
            ->leftJoin('blockbaners', 'mainland_blockbaner.blockbaner_id', '=', 'blockbaners.id')
			->leftJoin('onebaner_blockbaner', 'blockbaners.id', '=', 'onebaner_blockbaner.blockbaner_id')
			->leftJoin('onebaners', 'onebaner_blockbaner.onebaner_id', '=', 'onebaners.id')
			->where('mainland_blockbaner.mainland_id', 2)
			->where('blockbaners.status', 1)
			->orderBy('blockbaners.sort_order')
			->orderBy('blockbaners.id')
			->orderBy('onebaners.sort_order')
			->orderBy('onebaners.id')
			->select('onebaners.*','blockbaners.*')
            ->get();
						
            return view ('landing', compact('landing', 'video','sliders','baners'));
			//var_dump($baners); 
    }

}
