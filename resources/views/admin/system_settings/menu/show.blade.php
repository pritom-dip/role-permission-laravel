@extends('admin.layouts.layout')
@section('title', 'Show Menu')

@section('content')

<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Menu View</h3>
            <div class="box-tools pull-right">
                <a href="{{route('menu.index')}}" class="btn btn-xs btn-success pull-left text-white router-link-active" title="Add New"><i class="fa fa-arrow-left"></i> <span>Back</span></a>
            </div>
        </div>
        <div class="box-body box-min-height">
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    
                    <tr>
                        <th class="text-capitalize">Menu Name</th>
                        <td><span>{{$menu->name}}</span></td>
                    </tr>

                    <tr>
                        <th class="text-capitalize">Dominion Name</th>
                        <td><span>{{$menu->dominion->name}}</span></td>
                    </tr>

                    <tr>
                        <th class="text-capitalize">Process Name</th>
                        <td><span>{{$menu->process->name}}</span></td>
                    </tr>

                    <tr>
                        <th class="text-capitalize">Route Name</th>
                        <td><span>{{$menu->route_name}}</span></td>
                    </tr>

                    <tr>
                        <th class="text-capitalize">Params</th>
                        <td><span>{{$menu->params}}</span></td>
                    </tr>

                    <tr>
                        <th class="text-capitalize">Position</th>
                        <td><span>{{$menu->position}}</span></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    <!---->
</section>

@endsection