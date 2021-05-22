@extends('admin.layouts.layout')
@section('title', 'Show Role')

@section('content')
@include('admin.partials.breadcumbs', $title)

<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Role View</h3>
            <div class="box-tools pull-right">
                <a href="{{route('role.index')}}" class="btn btn-xs btn-success pull-left text-white router-link-active" title="Add New"><i class="fa fa-arrow-left"></i> <span>Back</span></a>
            </div>
        </div>
        <div class="box-body box-min-height">
            <table class="table table-bordered table-hover table-striped">
                <tbody>

                    <tr>
                        <th class="text-capitalize">name</th>
                        <td><span>{{$role->name}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">guard</th>
                        <td><span>{{$role->guard}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">created at</th>
                        <td><span>{{$role->created_at}}</span></td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <!---->
</section>


@endsection