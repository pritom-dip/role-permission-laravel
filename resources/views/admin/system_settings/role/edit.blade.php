@extends('admin.layouts.layout')
@section('title', 'Edit Role')

@section('content')
@include('admin.partials.breadcumbs', $title)


<section class="content">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-success">

                <div class="box-header with-border">
                    <h3 class="box-title">Role Create</h3>
                    <div class="box-tools pull-right">
                        <a href="{{route('role.index')}}" class="btn btn-xs btn-success pull-left text-white router-link-active" title="Add New">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>

                <form class="form-horizontal" method="POST" action="{{route('role.update', $role->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputRole" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" required class="form-control" id="inputRole" placeholder="Role Name" value="{{$role->name}}" />
                            </div>
                        </div>

                    </div>

                    <div class="box-body">
                        <div class="form-group">
                            <label for="guard" class="col-sm-2 control-label">Guard</label>

                            <div class="col-sm-10">

                                @php

                                @endphp

                                <select name="guard" class="form-control" id="guard" required>
                                    <option value="">Please Select</option>
                                    <option value="admin" @php if($role->guard=='admin') echo "selected" @endphp >Admin</option>
                                    <option value="teacher" @php if($role->guard=='teacher') echo "selected" @endphp >Teacher</option>
                                    <option value="guardian" @php if($role->guard=='guardian') echo "selected" @endphp >Guardian</option>
                                    <option value="web" @php if($role->guard=='web') echo "selected" @endphp >Student</option>
                                </select>

                            </div>
                        </div>

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-right">Submit</button>
                    </div>

                </form>
            </div>

        </div>

    </div>

</section>

@endsection