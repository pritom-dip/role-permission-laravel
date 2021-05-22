@foreach($sideMenus as $sideMenu)

@if(!empty($sideMenu->allChildrenMenus) && $sideMenu->allChildrenMenus->count() > 0 )

<li class="treeview">
    <a href="#">
        {!! $sideMenu->icon !!}</i> <span>{{$sideMenu->name}}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">

        <?php
        $count = count($sideMenu->allChildrenMenus);
        for ($i = 0; $i < $count; $i++) { ?>
            @if(!empty($sideMenu->allChildrenMenus[$i]->params))
            <li class="@if(Route::currentRouteName() == $sideMenu->allChildrenMenus[$i]->route_name ) active menu-activated @endif">
                <a href="{{route($sideMenu->allChildrenMenus[$i]->route_name,$sideMenu->allChildrenMenus[$i]->params)}}">
                    {!! $sideMenu->allChildrenMenus[$i]->icon !!}
                    {{$sideMenu->allChildrenMenus[$i]->name}}
                </a>
            </li>
            @else

            <li class="@if(Route::currentRouteName() == $sideMenu->allChildrenMenus[$i]->route_name ) active menu-activated @endif">
                <a href="{{route($sideMenu->allChildrenMenus[$i]->route_name)}}">
                    {!! $sideMenu->allChildrenMenus[$i]->icon !!}
                    {{$sideMenu->allChildrenMenus[$i]->name}}
                </a>
            </li>
            @endif
        <?php } ?>

    </ul>
</li>

@else

@if(!empty($sideMenu->route_name))
@if(App\Model\Permission::roleHasSpecificPermission($sideMenu->route_name))
<li class="@if(Route::currentRouteName() == $sideMenu->route_name ) active @endif">
    @if(!empty($sideMenu->params))
    <a href="{{route($sideMenu->route_name, $sideMenu->params)}}">
        {!! $sideMenu->icon !!} <span>{{$sideMenu->name}}</span>
    </a>

    @else
    <a href="{{route($sideMenu->route_name)}}">
        {!! $sideMenu->icon !!} <span>{{$sideMenu->name}}</span>
    </a>
    @endif
</li>
@endif
@endif
@endif

@endforeach