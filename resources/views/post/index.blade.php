@extends('layouts.app')

@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1>
          Posts
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
                <h3 class="box-title">list of Posts</h3>
      
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                 <a href="{{url(route('post.create'))}}" class="btn btn-primary"><i class="fa fa-plus"></i>New Post</a>
                 @include('flash::message')
                 @if(count($records))
                <div class="table-responsive">
                    <table class="table table-bordered">
                     
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">title</th>
                                <th class="text-center">body</th>
                                <th class="text-center">img</th>
                                <th class="text-center">category</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $records as  $record)
                                <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$record->title}}</td>
                                <td class="text-center">{{$record->body}}</td>
                                <td class="text-center">
                                    <img src="{{asset($record->img)}}" style="width:200px; height:100px"><i class="fa fa-edite btn-xs"></i>
                                </td> 
                                <td class="text-center">{{$record->category->name}}</td>

                                <td class="text-center"><a href="{{url(route('post.edit',$record->id))}}" class="btn btn-success"><i class="fa fa-edit"></i>Edit</a></td>
                                <td class="text-center"> {!! Form::model($record,[

                                    'action'=>['PostController@destroy',$record->id],
                                    'method'=>'delete'
                                  ]) !!}
                                  
                                <button class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete </button>
                                {!! Form::close()!!}
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                   @else
                   <div class="alert alert-danger" role="alert">
                     no data 
                   </div> 
                @endif
              </div>
             
      
          </section>
          
      

@endsection