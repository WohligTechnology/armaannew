<section class="panel">
<header class="panel-heading">
<h3 class="panel-title">feedback Details </h3>
</header>
<div class="panel-body">
<form class='form-horizontal tasi-form' method='post' action='<?php echo site_url("site/editfeedbacksubmit");?>' enctype= 'multipart/form-data'>
<input type="hidden" id="normal-field" class="form-control" name="id" value="<?php echo set_value('id',$before->id);?>" style="display:none;">
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Name</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="name" value='<?php echo set_value('name',$before->name);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Email</label>
<div class="col-sm-4">
<input type="email" id="normal-field" class="form-control" name="email" value='<?php echo set_value('email',$before->email);?>'>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Feedback</label>
<div class="col-sm-8">
<textarea name="feedback" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'feedback',$before->feedback);?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Phone</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="phone" value='<?php echo set_value('phone',$before->phone);?>'>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Address1</label>
<div class="col-sm-8">
<textarea name="address1" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'address1',$before->address1);?></textarea>
</div>
</div>
<div class=" form-group">
<label class="col-sm-2 control-label" for="normal-field">Address2</label>
<div class="col-sm-8">
<textarea name="address2" id="" cols="20" rows="10" class="form-control tinymce"><?php echo set_value( 'address2',$before->address2);?></textarea>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">City</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="city" value='<?php echo set_value('city',$before->city);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Country</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="country" value='<?php echo set_value('country',$before->country);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">Postcode</label>
<div class="col-sm-4">
<input type="text" id="normal-field" class="form-control" name="postcode" value='<?php echo set_value('postcode',$before->postcode);?>'>
</div>
</div>
<div class="form-group">
<label class="col-sm-2 control-label" for="normal-field">&nbsp;</label>
<div class="col-sm-4">
<button type="submit" class="btn btn-primary">Save</button>
<a href='<?php echo site_url("site/viewfeedback"); ?>' class='btn btn-secondary'>Cancel</a>
</div>
</div>
</form>
</div>
</section>
