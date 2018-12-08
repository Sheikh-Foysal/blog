@extends('layouts.backend.app')

@section('title', 'Settings')

@push('css')
@endpush

@section('content')
    <div class="container-fluid">
            <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    PROFILE UPDATE
                                </h2>
                            </div>
                            <div class="body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#profile_with_icon_title" data-toggle="tab" aria-expanded="ture">
                                            <i class="material-icons">face</i> UPDATE PROFILE
                                        </a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#home_with_icon_title" data-toggle="tab" aria-expanded="false">
                                            <i class="material-icons">star</i> PASSWORD
                                        </a>
                                    </li>
                                </ul>
    
                                <!-- Tab panes -->
                                <div class="tab-content">

                                    <div role="tabpanel" class="tab-pane fade active in" id="profile_with_icon_title">
                                        <form method="POST" action="{{ route('author.profile.update') }}" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            @method('PUT')

                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name">Name: </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" id="name_address_2" class="form-control" placeholder="Enter your name" name="name" value="{{ Auth::user()->name }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="email">Email: </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="email" id="email_address_2" class="form-control" placeholder="Enter your email" name="email" value="{{ Auth::user()->email }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="image">Image: </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="file" class="form-control"  name="image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="about">About: </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <textarea name="about" id="" cols="4" rows="4" class="form-control" placeholder="write about yourself">
                                                                {{ Auth::user()->about }}
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row clearfix">
                                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE PROFILE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="home_with_icon_title">
                                        
                                        <form method="POST" action="{{ route('author.password.update') }}" class="form-horizontal">
                                            @csrf
                                            @method('PUT')

                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="old_password">Old Password: </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="password" id="old_password" class="form-control" placeholder="" name="old_password" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                     
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="password">New Password: </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="password" id="password" class="form-control" placeholder="" name="password" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                     
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="confirm_password">Confirm Password: </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="password" id="confirm_password" class="form-control" placeholder="" name="password_confirmation" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                     
                                            <div class="row clearfix">
                                                <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">UPDATE PROFILE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
    </div>

    
@endsection

@push('js')
@endpush
