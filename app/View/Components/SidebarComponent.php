<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Model\Permission;
use App\Model\Menu;
use Illuminate\Support\Facades\Auth;
use App\Helpers\GlobalHelper;

class SidebarComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $guard       = GlobalHelper::getGuard();
        $admin       = Auth::guard($guard)->user();

        $roleHasProcessList = Permission::getRollHasPermissionList($admin->role_id);

        $sideMenus = Menu::whereNull('parent_id')->with(['allChildrenMenus' => function ($query) use ($roleHasProcessList) {
            $query->wherein('process_id', $roleHasProcessList);
        }])->orderBy('position', 'asc')->get();

        // dd($sideMenus);

        return view('components.sidebar-component', compact('sideMenus'));
    }
}
