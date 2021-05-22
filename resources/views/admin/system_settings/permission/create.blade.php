@extends('admin.layouts.layout')
@section('title', 'Create Permission')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Horizontal Form -->
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">Create Permission</h3>
                    <div class="box-tools pull-right">
                        <a href="{{route('permission.index')}}" class="btn btn-xs btn-success pull-left text-white router-link-active" title="Add New">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>

                <div class="box-body">
                    <div class="row">
                        <form class="form-row col-md-12" method="POST" action="{{route('permission.store')}}">
                            @csrf
                            <!------------ Single Input ------------>
                            <div class="form-group mb-2 col-md-3" :class="{ 'has-error': validation.hasError('data.role_id'), '': data.role_id }">
                                <label class="control-label">Role</label>
                                <select name="role_id" class="form-control form-control-sm" required>
                                    <option value>Select Role</option>
                                    @foreach($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!------------ Single Input ------------>
                            <div class="form-group col-1 pt-4" style="padding-top: 30px;">
                                <input type="checkbox" id="checkAll" />
                                <label class="col-form-label-sm font-weight-normal mb-0" for="checkAll">Check All</label>
                            </div>
                            <div class="w-100"></div>
                            <table class="table table-bordered table-hover">
                                @foreach($dominions as $dominion)
                                <tr>
                                    <td>{{$dominion->name}}</td>
                                    <td>
                                        <div class="row">
                                            @foreach($dominion->processes as $process)
                                            <div class="col-md-3">
                                                <input value="{{$process}}" name="permissions[]" type="checkbox" id="{{$process->id}}" />
                                                <label for="{{$process->id}}">{{$process->name}}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                    
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success pull-right">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection