@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1>
            Setting
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{url('/home')}}"><i class="fa fa-dashboard"></i> Home</a></li>

         
        </ol>
      </section>
  

      <!-- Main content -->

       
      <section class="content">

            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Edit Setting</h3>
      
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">

                  {!! Form::model($model,[

                    'action'=>['settingcontroller@update',$model->id],
                    'method'=>'put'
                  ]) !!}
                  @include('flash::message')
                @include('patials.errors')
                 
               

     <div class="form-group">
      <label for="name" >about_us</label> 
      {!! Form::text('about_us',null,[
 
        'class'=>'form-control'
      ]) !!}  
       <label for="name" >facebook_url</label> 
       {!! Form::text('facebook_url',null,[
  
         'class'=>'form-control'
       ]) !!}  
        <label for="name" >twitter_url</label> 
        {!! Form::text('twitter_url',null,[
   
          'class'=>'form-control'
        ]) !!}  
        
          <label for="name" >instagram_url</label> 
          {!! Form::text('instagram_url',null,[
     
            'class'=>'form-control'
          ]) !!}  
           <label for="name" >whatsapp_url</label> 
           {!! Form::text('whatsapp_url',null,[
      
             'class'=>'form-control'
           ]) !!}  
             <label for="name" >google_url</label> 
             {!! Form::text('google_url',null,[
        
               'class'=>'form-control'
             ]) !!}      
    </div>
    <div class="form-group">
    <button class="btn btn-primary" type="submit">Addsetting</button>  
    </div>
    

                {!! Form::close()!!}
                 
              </div>
             
      
          </section>
          
      

@endsection