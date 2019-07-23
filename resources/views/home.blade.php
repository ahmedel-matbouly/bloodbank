@extends('layouts.app')

@inject('client','App\model\Client')
@inject('setting','App\model\Setting')
@inject('order','App\model\Order')
@inject('governorate','App\model\Governorate')
@inject('city','App\model\City')
@inject('category','App\model\Category')
@inject('post','App\model\Post')
@inject('contact','App\model\Contact')
@inject('role','App\model\Role')
@inject('user','App\User')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1>
          Blood bank
          <small>Statistic</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>

          <li class="active">Dashboaed</li>
        </ol>
      </section>

              <div class="box-body">
        

                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">governorate</span>
                      <span class="info-box-number">{{$governorate->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">category</span>
                      <span class="info-box-number">{{$category->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">city</span>
                      <span class="info-box-number">{{$city->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">contact</span>
                      <span class="info-box-number">{{$contact->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">Order</span>
                      <span class="info-box-number">{{$order->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">Client</span>
                      <span class="info-box-number">{{$client->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">settings</span>
                      <span class="info-box-number">{{$setting->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        
                    <div class="info-box-content">
                      <span class="info-box-text">Posts</span>
                      <span class="info-box-number">{{$post->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
        
              <div class="info-box-content">
                  <span class="info-box-text">role</span>
                  <span class="info-box-number">{{$role->count()}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                  <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>
      
            <div class="info-box-content">
                <span class="info-box-text">user</span>
                <span class="info-box-number">{{$user->count()}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
            </div>
          
      

@endsection



    