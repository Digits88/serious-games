<?php
	$isAdmin = true;
	require_once('../inc/db/connect.php');
	require_once('../inc/globals/functions.php');
	verify_user();
	verify_admin();		
	$referenceID = $_GET['Rid'];
	$getReference = mysql_query('SELECT * FROM referencetable WHERE referenceID = "'.$referenceID.'"');
	$reference = mysql_fetch_assoc($getReference);
	require_once('../inc/header.php');	
?>
<div class="wrap">
	<div class="content two-col">
		<div class="sidebar secondary-col">
			<?php include('inc/php/admin_sidebar.php') ?>
		</div>
		<div class="main-col island">
			<h1>New Reference</h1>
			<p>Here you can create a reference that will display at the end of a lesson for a learner to use as further reading.</p>
			<form action="inc/php/add_reference.php" method="post" enctype="multipart/form-data">
            	<label for="reference-title">Reference Title</label>
                <input type="text" name="reference-title" value="<?php echo $reference['referenceTitle'];?>" class="input"/>
                <label for="reference-url">Reference URL</label>
                 <input type="text" name="reference-url" value="<?php echo $reference['referenceURL'];?>" class="input"/>
                <input type="submit" class="butt butt-primary alignright" value="Add Reference"/>
                <input type="hidden" name="module-id" value="<?php echo $reference['referenceLessonID'];?>" />
            </form>
		</div>
	</div>
</div>
<?php require_once('../inc/footer.php'); ?>