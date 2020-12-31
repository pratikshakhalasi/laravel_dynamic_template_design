@extends('layouts.main')
@section('content')

<div class="container">
   <h1> Design your tempate</h1><h2> <a href="{{ route('template')}}">Template List</a></h2>
   <hr>
   <br>
    <form name="frm_template" method="post" action="/add_field">
         @csrf
         <input type="hidden" name="id" value="{{ $template->id}}">
        <div class="row">
         <div class="form-group">
           
            <label>Template name</label>
            <input  class="form-control" type="text" value="{{$template->template_name}}" required name="template_name"/>
          
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label>Content label</label>
                <input  class="form-control" type="text" name="content_label"/>
            </div>
            <div class="form-group">
                 <label>Content Type</label>
                <select onchange="renderOptions(this.value);"  class="form-control" name="content_type">
                     <option value="text">text</option>
                    <option  value="checkbox">checkbox </option>
                    <option value="textarea">textarea</option>
                    <option value="select">select</option>
                    <option value="radio">radio</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12" id="content_area"></div>
    </div>
    <div class="row">
         <div class="form-group">
                <input type="submit" class="btn btn-primary" name="add_field" id="add_field" value="SAVE & ADD MORE"/>
                
        </div>
    </div>
    </div>
</form>

<div class="row">
    <div class="col-md-12">
        <?php if(!empty($template->content)):
                $content = unserialize($template->content);
            ?>

            @include('templates/content', ['content' => $content])
 
        <?php endif;?>
    </div>
</div>
    
</div>

@endsection

@section('scripts')
    <script type="text/javascript">
        function renderOptions($val)
        {
            if($val == 'select' || $val == 'radio' || $val == 'checkbox')
            {
               $content =  '<div id="select_options"><div class="form-group" >';
               $content += '<label>Option Label</label>';
               $content += '<input class="form-control" type="text" name="select_label[]"/>';
               $content += '</div>' ;
               $content += '<div class="form-group">';
               $content += '<label>Option Value</label>';
               $content += '<input  class="form-control" type="text" name="select_value[]"/>';
               $content += '</div></div>' ;
               $content += '<div id="more_select_options"></div>' ;
               $content += '<div class="form-group">';
               $content += '<button  class="btn btn-primary" onclick="return cloneme(\'select_options\');">ADD MORE</button>';
               $content += '</div>' ;
               
               $('#content_area').html($content);
            }
             
        }

        function cloneme(id)
        {
            var $content = $('#'+id).clone();
            $('#more_'+id).append($content);
            return false;
        }

    </script>
@endsection