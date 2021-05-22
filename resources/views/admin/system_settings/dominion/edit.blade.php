@extends('admin.layouts.layout')
@section('title', 'Edit Dominion')

@section('content')


<section class="content">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <!-- Horizontal Form -->
            <div class="box box-success">

                <div class="box-header with-border">
                    <h3 class="box-title">Dominion Create</h3> 
                    <div class="box-tools pull-right">
                        <a href="{{route('dominion.index')}}" class="btn btn-xs btn-success pull-left text-white router-link-active" title="Add New">
                            <i class="fa fa-arrow-left"></i>
                            <span>Back</span>
                        </a>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-20">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(Session::has('message'))
                    <p class="alert alert-success m-20">{{ Session::get('message') }}</p>
                @endif

                <form class="form-horizontal" method="POST" action="{{route('dominion.update', $dominion->id)}}">
                    @csrf
                    @method('PUT')
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Name</label>

                            <div class="col-sm-10">
                                <input type="text" name="name" required class="form-control" id="name" placeholder="Role Name" value="{{$dominion->name}}" />
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
