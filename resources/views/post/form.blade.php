 


     <div class="form-group">
     <label for="title" >title</label> 
     {!! Form::text('title',null,[

       'class'=>'form-control'
     ]) !!}    
   </div>

   <div class="form-group">
    <label for="body" >body</label> 
    {!! Form::text('body',null,[

      'class'=>'form-control'
    ]) !!}    
  </div>
  <div class="form-group">
    <label for="img" >img</label> 
    {!! Form::file('img',null,[

      'class'=>'form-control'
    ]) !!}    
  </div>

  <div class="form-group">
    <label for="name" >category_id</label> 
    {!! Form::select('category_id',$categores,[],[

      'class'=>'form-control'
    ]) !!}    
  </div>

   <div class="form-group">
   <button class="btn btn-primary" type="submit">AddPost</button>  
   </div>
   