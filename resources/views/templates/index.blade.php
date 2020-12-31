@extends('layouts.main')
@section('content')

<div class="container">
  <h2>Templates</h2>
  <p><a href="/create" class="btn btn-primary">ADD NEW TEMPLATE</a> <a href="/assign" class="btn btn-primary">ASSIGNN TEMPLATE</a></p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Template Name</th>
        <th>Action</th>
       
      </tr>
    </thead>
    <tbody>
        <?php foreach($templates as $template): ?>
        <tr>
        <td><?php echo $template->template_name;?></td>
        <td><a href="/edit/<?php echo $template->id;?>">Edit</a></td>
        
        </tr>
    <?php endforeach;?> 
    </tbody>
  </table>
</div>
</div>

@endsection