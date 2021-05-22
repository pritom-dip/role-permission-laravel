@extends('admin.layouts.layout')
@section('title', 'Show Process')

@section('content')

<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Process View</h3>
            <div class="box-tools pull-right">
                <a href="{{route('process.index')}}" class="btn btn-xs btn-success pull-left text-white router-link-active" title="Add New"><i class="fa fa-arrow-left"></i> <span>Back</span></a>
            </div>
        </div>
        <div class="box-body box-min-height">
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    
                    <tr>
                        <th class="text-capitalize">Name</th>
                        <td><span>{{$process->name}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">Dominion Name</th>
                        <td><span>{{$process->dominion->name}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">Route Name</th>
                        <td><span>{{$process->route_name}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">created at</th>
                        <td><span>{{$process->created_at}}</span></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    <!---->
</section>


@endsection