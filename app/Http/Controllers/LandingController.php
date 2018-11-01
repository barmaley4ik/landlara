<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mainland;
use App\Blockslider;
use App\Blockbaner;
use App\Onevideo;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\App;
use TCG\Voyager\Traits\Translatable;
use Voyager;
use Storage;


class LandingController extends Controller
{
	use Translatable;

	    public function index($locale=null)
    {
			/*установка локали*/ 
			$permissionlacale = array('en', 'ru','');
			if((($locale) || ($locale==''))&& (in_array($locale, $permissionlacale))){
			App::setLocale($locale);
			} else {
				 return abort(404);
			}  

			$agent = new Agent();
			/*страница лендинга*/
			$landing = Mainland::withTranslation($locale)->active();
			//$landing2 = Mainland::withTranslation('ru')->get();
  			if (isset($landing->facebook))
  				$socs[''] =$landing->facebook; 
			if (isset($landing->twitter))
  				$socs[''] =$landing->twitter; 
			if (isset($landing->instagramm))
  				$socs[''] =$landing->instagramm;   			  		
			if (isset($landing->youtube))
  				$socs[''] =$landing->youtube; 
  			if (isset($landing->pinterest))
  				$socs[''] =$landing->pinterest; 
  			if (isset($landing->googleplus))
  				$socs[''] =$landing->googleplus; 
			//$socials = '';
			if (isset($socs))
			$socials = sprintf('"%s"', implode('", "', ($socs ?? '')));
			/*бекграунд лендинга*/
			
			if ($landing->type_background==2){
			if ($agent->isPhone()){
				$landing_bg= Voyager::image($landing->thumbnail('small', 'image_background'));
				$video_bg = Voyager::image($landing->thumbnail('videobg_mobile', 'image_background'));
			}
			
			if ($agent->isTablet()){
				$landing_bg= Voyager::image($landing->thumbnail('medium', 'image_background'));
				$video_bg = Voyager::image($landing->thumbnail('videobg_tablet', 'image_background'));
			}
			
			if ($agent->isDesktop()){
				$landing_bg= Storage::disk('public')->url($landing->image_background);
				$video_bg = Storage::disk('public')->url($landing->image_background);
			}
						
				} elseif($landing->type_background == 1)
    		        $color =  $landing->color_background;

						
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
						
            return view ('landing', compact('landing','socials' ,'landing_bg', 'video_bg' ,'color','sliders','baners', 'agent'));
			//var_dump($baners); 
    }

}
