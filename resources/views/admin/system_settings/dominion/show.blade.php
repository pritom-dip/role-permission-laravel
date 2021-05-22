@extends('admin.layouts.layout')
@section('title', 'Show Dominion')

@section('content')

<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Role View</h3>
            <div class="box-tools pull-right">
                <a href="{{route('dominion.index')}}" class="btn btn-xs btn-success pull-left text-white router-link-active" title="Add New"><i class="fa fa-arrow-left"></i> <span>Back</span></a>
            </div>
        </div>
        <div class="box-body box-min-height">
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    
                    <tr>
                        <th class="text-capitalize">Name</th>
                        <td><span>{{$dominion->name}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">Created at</th>
                        <td><span>{{$dominion->created_at}}</span></td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
    <!---->
</section>


@endsection