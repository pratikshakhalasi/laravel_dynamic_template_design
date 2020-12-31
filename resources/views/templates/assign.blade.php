@extends('layouts.main')
@section('content')

<div class="container">
   <h1> Assign Template</h1><h2> <a href="{{ route('template')}}">Template List</a></h2>
   <hr>
   <br>
   
     
      <div class="row">
         <div class="form-group">
           
            <label>Template name</label>
            <select id="select_template" onchange="PreviewTemplate(this.value);" class="form-control">
              <?php foreach ($templates as $template) {?>
                <option value="{{$template->id}}"> {{$template->template_name}}</option>
              <?php } ?>
            </select>   
          
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12" id="content_area"></div>
    </div>
    
    </div>



@endsection

@section('scripts')
    <script type="text/javascript">
      PreviewTemplate($('#select_template').val());
       function PreviewTemplate($val)
       {
          $.post( "/gettemplate", { id: $val ,"_token": "{{ csrf_token() }}"})
          .done(function( data ) {
            $('#content_area').html(data)
          });
       }

    </script>
@endsection