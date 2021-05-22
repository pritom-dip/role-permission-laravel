@extends('admin.layouts.layout')
@section('title', 'List Role')

@push('page-css')
<link rel="stylesheet" href="{{asset('admin_assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" />
@endpush

@section('content')
@include('admin.partials.breadcumbs', $title)

<section class="content">
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-success">

                <div class="box-header with-border">

                    <div class="box-header pull-left">
                        <!-- <span class="box-title">All Roles</span> -->
                    </div>

                    @if(App\Model\Permission::roleHasSpecificPermission('role.create'))

                    <div class="box-tools pull-right">
                        <a href="{{route('role.create')}}" class="btn btn-xs btn-success pull-left text-white" title="Add New"><i class="fa fa-plus"></i> <span class="text-capitalize">Add Role</span></a>
                    </div>
                    @endif
                </div>

                <!-- /.box-header -->
                <div class="box-body box-min-height">

                    <table class="table table-bordered table-hover table-striped list-data">
                        <thead class="bg-purple text-white">
                            <tr>
                                <th class="serial">#</th>
                                <th>Role Name</th>
                                <th>Created at</th>
                                <th class="action">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $count = 0 @endphp
                            @foreach($roles as $role)

                            <tr>
                                <td>{{ $count + $roles->firstItem() }}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->created_at}}</td>

                                <td>

                                    @if(App\Model\Permission::roleHasSpecificPermission('role.show'))

                                    <a href="{{route('role.show', $role->id)}}" class="btn btn-xs btn-success action-view" title="View"><i class="fa fa-eye"></i></a>

                                    @endif

                                    @if(App\Model\Permission::roleHasSpecificPermission('role.edit'))

                                    <a href="{{route('role.edit', $role->id)}}" class="btn btn-xs btn-primary action-pencil" title="Edit"><i class="fa fa-pencil"></i></a>

                                    @endif

                                    @if(App\Model\Permission::roleHasSpecificPermission('role.destroy'))

                                    <form action="{{route('role.destroy', $role->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-xs btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>

                                    @endif
                                </td>
                            </tr>

                            @php $count++ @endphp

                            @endforeach

                        </tbody>

                    </table>
                    <div class="col-md-12">
                        <div class="pull-right">
                            {{$roles->links()}}
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@endsection

@push('page-scripts')
<script src="{{asset('admin_assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin_assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
@endpush