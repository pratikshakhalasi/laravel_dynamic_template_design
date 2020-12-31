<hr>

<div class="container">
	<h2> Tempalet Preview </h2>
<hr>
<?php
	if(is_array($content)):
	foreach ($content as $con) { ?>

		<div class="row">
        <div class="col-12">
            <div class="form-group">
                <label><?php echo $con['label'];?></label>
                <?php if($con['content_type'] == 'text'):?>
               	   <input class="form-control" type="text"/>
               	<?php endif;?>
               	<?php if($con['content_type'] == 'textarea'):?>
               	   <textarea class="form-control"></textarea>
               	<?php endif;?>
               	<?php if($con['content_type'] == 'radio'):?>
               		<?php if(!empty($con['select_label'])): $i=0;?>
               			<?php foreach($con['select_label'] as $label): ?>
               			<label>{{ $label }}</label>
               			<?php if(isset($con['select_value'][$i])): ?>
               	   			<input  value="{{ $con['select_value'][$i] }}" type="radio"/>
               	   		<?php endif;?>
               	   	<?php $i++; endforeach;?>
               	   	<?php endif;?>
               	<?php endif;?>
               	<?php if($con['content_type'] == 'checkbox'):?>
               		<?php if(!empty($con['select_label'])): $i=0;?>
               			<?php foreach($con['select_label'] as $label): ?>
               			<label>{{ $label }}</label>
               			<?php if(isset($con['select_value'][$i])): ?>
               	   			<input  value="{{ $con['select_value'][$i] }}" type="checkbox"/>
               	   		<?php endif;?>
               	   	<?php $i++; endforeach;?>
               	   	<?php endif;?>
               	<?php endif;?>

               		<?php if($con['content_type'] == 'select'):?>
               		<?php if(!empty($con['select_label'])): $i=0;?>
               			<select class="form-control">
               			<?php foreach($con['select_label'] as $label): ?>
               			
               			<?php if(isset($con['select_value'][$i])): ?>
               	   			<option value="{{ $con['select_value'][$i] }}">{{ $label }}</option>
               	   		<?php endif;?>
               	   	<?php $i++; endforeach;?>
               	   </select>
               	   	<?php endif;?>
               	<?php endif;?>


            </div>
        </div>
    	</div>
		

	<?php }
endif;
?>
</div>