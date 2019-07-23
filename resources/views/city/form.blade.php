 
@inject('model','App\model\Governorate')
     <div class="form-group">
     <label for="name" >Name</label> 
     {!! Form::text('name',null,[

       'class'=>'form-control'
     ]) !!}    
   </div>
   <div class="form-group">
    <label for="name" >Governorate</label> 
    {!! Form::select('governorate_id',$model->pluck('name','id')->toArray(),null, [

      'class'=>'form-control'
    ]) !!}    
  </div>
   <div class="form-group">
   <button class="btn btn-primary" type="submit">AddCity</button>  
   </div>
   