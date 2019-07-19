<?php $core->pageHead("Admin login"); ?>

<?php $core->getHeader(); ?>
<div class="wrapper">
	<div class="medlem-form">
		<h1>Admin login</h1><hr/>
		<div class="wrapper">
			<?php if(isset($_POST['login'])){ $core->login(); } ?>
		</div>

		<form action='' method='POST'>
			<label for="email"><b>E-post:</b></label>
			<input type="text" placeholder="Oppgi e-post adresse" name="email" required>
			
			<label for="password"><b>Passord:</b></label>
			<input type="password" placeholder="Oppgi passord" name="password" required>
			
			<hr/><button type="submit" name="login" class="medlem-button add_course_select">Logg inn</button>
		</form>
	</div>
	
	<div class="sidebar-image">
		<img src="/assets/img/raw_svg/woman_with_backpack_and_robot.svg"/>
	</div>
</div>

<?php $core->getFooter(); ?>
