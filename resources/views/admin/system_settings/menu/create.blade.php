@extends('admin.layouts.layout')
@section('title', 'Create Menu')

@section('content')
<section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-success">

        <div class="box-header with-border">
            <div class="box-header pull-left">
                <span class="box-title">Create Menu</span>
            </div>

            <div class="box-tools pull-right">
                <a href="{{route('menu.index')}}" class="btn btn-xs btn-success pull-left text-white" title="Add New"><i class="fa fa-arrow-left"></i> <span class="text-capitalize">back</span></a>
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">

                <form class="form-row" method="POST" action="{{route('menu.store')}}">
                    @csrf

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Parent Menu </label>

                            <select name="parent_id" class="form-control" >
                                <option value="">Please select</option>
                                @if(!empty($parentMenus))
                                @foreach( $parentMenus as $parentMenu )
                                <option value="{{$parentMenu->id}}">{{$parentMenu->name}}</option>
                                @endforeach
                                @endif
                            </select>

                        </div>  
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" required />
                        </div>  
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Dominion Name</label>
                            
                            <select name="dominion_id" class="form-control" id="dominionID">
                                <option value="">Please select</option>
                                @if(!empty($dominions))
                                @foreach( $dominions as $dominion )
                                <option value="{{$dominion->id}}">{{$dominion->name}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>  
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Process Name</label>
                            <select name="process_id" class="form-control" id="processId">
                                <option value="">Please select</option>
                                
                            </select>
                        </div>  
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Icon </label>
                            <input type="text" name="icon" placeholder="Icon" class="form-control" required />
                        </div>  
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Position</label>
                            <input type="number" name="position" placeholder="Position" class="form-control" required />
                        </div>  
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Params </label>
                            <input type="text" name="params" placeholder="Params" class="form-control" />
                        </div>  
                    </div>

                    <div class="col-md-12">
                        <div class="pull-right">
                            <button class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.box-body -->
        
    </div>

</section>
@endsection