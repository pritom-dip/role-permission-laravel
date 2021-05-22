@extends('admin.layouts.layout')
@section('title', 'Profile')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">

                    @if(!empty($admin->image))
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('storage/images/'.$admin->image) }}" alt="User profile picture" />
                    @else
                    <img class="profile-user-img img-responsive img-circle" src="{{asset('admin_assets/lte/dist/img/user1-128x128.jpg.jpg')}}" alt="User profile picture" />

                    @endif

                    <h3 class="profile-username text-center">{{$admin->name}}</h3>
                    <p class="text-muted text-center">{{$admin->role->name}}</p>
                    
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Contact Information</h3>
                </div>
                <!-- /.box-header -->

                <div class="box-body">
                    <strong><i class="fa fa-envelope-o margin-r-5"></i></strong> {{$admin->email}}

                    @if(!empty($admin->mobile))
                    <hr> 
                    <strong><i class="fa fa-phone margin-r-5"></i></strong> {{$admin->mobile}}
                    @endif
                    @if(!empty($admin->address))
                    <hr>
                    <strong><i class="fa fa-map margin-r-5"></i></strong> {{$admin->address}}
                    @endif
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">Settings</a></li>
                    <li><a href="#password" data-toggle="tab">Change Password</a></li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane active" id="settings">

                        <form class="profile-form-wrapper" method="POST" action="{{route('admin.updateprofile', Auth::id())}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Name" id="name" value="{{$admin->name}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mobile">Mobile</label>
                                        <input type="text" name="mobile" class="form-control" placeholder="Mobile No" id="mobile"  value="{{$admin->mobile}}">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="image">Profile Pic</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first">Address</label>
                                        <textarea name="address" class="form-control"> {{$admin->address}}</textarea>
                                        
                                    </div>
                                </div>

                            </div>

                            <div class="profile-submit-btn-wrapper">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>

                    </div>

                    <div class="tab-pane" id="password">
                        <form class="profile-form-wrapper" method="POST" action="">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first">Old Password</label>
                                        <input type="password" class="form-control" placeholder="" id="first">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first">New Password</label>
                                        <input type="password" class="form-control" placeholder="" id="first">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="first">Confirm Password</label>
                                        <input type="password" class="form-control" placeholder="" id="first">
                                    </div>
                                </div>
                            </div>

                            <div class="profile-submit-btn-wrapper">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>  
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
            <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>

@endsection