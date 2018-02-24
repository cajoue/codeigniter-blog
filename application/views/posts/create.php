<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <input type="text" class="form-control" name="title" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Content</label>
    <textarea class="form-control" name="body" placeholder="Your content here"></textarea>	
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php	echo form_close(); ?>