@extends('layouts.app')
 
<!--@inject('model', 'App\model\contact') -->


@section('content')

  <!-- Content Header (Page header) -->
  <section class="content-header">
        <h1>
            Order
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
                <h3 class="box-title">Order</h3>
      
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                          title="Collapse">
                    <i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
                </div>
              </div>
              <div class="box-body">
                  @include('flash::message')
                 @if(count($records))
                <div class="table-responsive">
                    <table class="table table-bordered">
                     
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">client_id</th>
                                <th class="text-center">name</th>
                                <th class="text-center">notice</th>
                                <th class="text-center">age</th>
                                <th class="text-center">blood</th>
                                <th class="text-center">number_bogs</th>
                                <th class="text-center">hospital_name</th>
                                <th class="text-center">hospital_address</th>
                                <th class="text-center">phone_number</th>
                                <th class="text-center">city</th>
                                <th class="text-center">latitude</th>
                                <th class="text-center">longitude</th>
                             
                                <th class="text-center">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ( $records as  $record)
                                <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="text-center">{{$record->client_id}}</td>
                                <td class="text-center">{{$record->name}}</td>
                                <td class="text-center">{{$record->notice}}</td>
                                <td class="text-center">{{$record->age}}</td>
                                <td class="text-center">{{$record->blood_id}}</td>
                                <td class="text-center">{{$record->number_bogs}}</td>      
                                <td class="text-center">{{$record->hospital_name}}</td>
                                <td class="text-center">{{$record->hospital_address}}</td>
                                <td class="text-center">{{$record->phone_number}}</td>
                                <td class="text-center">{{$record->citie_id}}</td>
                                <td class="text-center">{{$record->latitude}}</td>
                                <td class="text-center">{{$record->longitude}}</td>
                              
                              
                              
                                <td class="text-center"> {!! Form::model($record,[

                                    'action'=>['OrderController@destroy',$record->id],
                                    'method'=>'delete'
                                  ]) !!}
                                  

                                <button class="btn btn-danger"  class="text-center"><i class="fa fa-trash-o"></i> Delete </button>
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