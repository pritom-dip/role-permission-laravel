@extends('admin.layouts.layout')
@section('title', 'Show Admin')

@section('content')

<section class="content">
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Admin View</h3>
            <div class="box-tools pull-right">
                <a href="{{route('admin.index')}}" class="btn btn-xs btn-success pull-left text-white router-link-active" title="Add New"><i class="fa fa-arrow-left"></i> <span>Back</span></a>
            </div>
        </div>
        <div class="box-body box-min-height">
            <table class="table table-bordered table-hover table-striped">
                <tbody>
                    
                    <tr>
                        <th class="text-capitalize">Name</th>
                        <td><span>{{$admin->name}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">Role</th>
                        <td><span>{{$admin->role->name}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">Email</th>
                        <td><span>{{$admin->email}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">Mobile</th>
                        <td><span>{{$admin->mobile}}</span></td>
                    </tr>
                    <tr>
                        <th class="text-capitalize">Address</th>
                        <td><span>{{$admin->address}}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <!---->
</section>

@endsection