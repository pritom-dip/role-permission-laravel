@extends('admin.layouts.layout')
@section('title', 'Edit Admin')


@section('content')
<section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-success">

        <div class="box-header with-border">
            <div class="box-header pull-left">
                <span class="box-title">Edit Admin</span>
            </div>

            <div class="box-tools pull-right">
                <a href="{{route('admin.index')}}" class="btn btn-xs btn-success pull-left text-white" title="Add New"><i class="fa fa-arrow-left"></i> <span class="text-capitalize">back</span></a>
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">

                <form method="POST" action="{{route('admin.update', $admin->id)}}">

                    @csrf
                    @method('PUT')

                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" value="{{$admin->name}}" />
                        </div>

                        <div class="form-group">
                            <label>Role</label>
                            <select name="role_id" class="form-control">
                                <option value="">Please Select</option>
                                @foreach($roles as $role)                        
                                <option value="{{$role->id}}" @php if($admin->role_id == $role->id) echo 'selected' @endphp>{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Mobile</label>
                            <input type="text" name="mobile" placeholder="Mobile" class="form-control" value="{{$admin->mobile}}" />
                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" placeholder="Username" class="form-control" value="{{$admin->username}}" />
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" placeholder="Email" class="form-control" value="{{$admin->email}}" />
                        </div>
                        
                    </div>
                    <!-- /.col -->

                    <div class="col-md-12">
                        <div class="pull-right">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
    </div>
    <!-- /.box -->

    <!-- /.row -->
</section>
@endsection