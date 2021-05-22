@extends('admin.layouts.layout')
@section('title', 'Edit Process')

@section('content')
<section class="content">
    <!-- SELECT2 EXAMPLE -->
    <div class="box box-success">

        <div class="box-header with-border">
            <div class="box-header pull-left">
                <span class="box-title">Edit Process</span>
            </div>

            <div class="box-tools pull-right">
                <a href="{{route('process.index')}}" class="btn btn-xs btn-success pull-left text-white" title="Add New"><i class="fa fa-arrow-left"></i> <span class="text-capitalize">back</span></a>
            </div>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <form class="form-row" method="POST" action="{{route('process.update', $process->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dominion Name</label>
                            
                            <select name="dominion_id" class="form-control" required>
                                <option value="">Please select</option>
                                @foreach( $dominions as $dominion )
                                <option value="{{$dominion->id}}" @php if($dominion->id == $process->dominion_id) echo 'selected' @endphp >{{$dominion->name}}</option>
                                @endforeach
                            </select>

                        </div>  
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>Name (index, create, store, show, edit, update, destroy)</label>
                            <input type="text" name="name" placeholder="Name" class="form-control" required value="{{$process->name}}" />
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