<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    { 
        $savemenu=$this->getMenu(0);

        View::share('mainmenu', $savemenu);
    }
    
    private function getMenu($root_id)
    {
        $menu=[];
        $query=Menu::where('root_id', '=', $root_id)
        ->where('status', '1');
        $query->orderBy('position', 'ASC');
        $mainmenus = $query->get();
        foreach($mainmenus as $mainmenu)
        {
            $menu[]=[
                'id'=>$mainmenu->id,
                'title_ka'=>$mainmenu->title_ka,
                'title_en'=>$mainmenu->title_en,
                'title_ru'=>$mainmenu->title_ru,
                'children'=>$this->getMenu($mainmenu->id)
            ];
        }
        
        return $menu; 
    }
}

