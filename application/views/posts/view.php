<h2><?php echo $post['title']; ?></h2>
<small class='post-date'>Publié le : <?php echo $post['created_at']; ?></small>
<div class="post-body">
	<?php echo $post['body']; ?>
</div>
<hr>
<!--note <a/> requires base_url to work or could use a form input as in delete-->
<a href="<?php echo base_url('/posts/edit/'.$post['slug']); ?>" class="btn btn-warning float-left">Edit</a>
<?php echo form_open('/posts/delete/' . $post['id']); ?>
	<input type="submit" value="Delete" class="btn btn-danger">	
<?php echo form_close(); ?>
