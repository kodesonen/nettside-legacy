<!doctype html><html>
<?php $core->pageHead("Kurskatalog"); ?>

<body>
	<?php $core->getHeader(); ?>
	<div class="wrapper">
		<div class="kurs_info">
			<h1>Kurskatalog</h1><br/>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>			
		</div>

		<div class="box-wrapper">
			<?php $core->getCourses(); ?>
		</div>
	</div>

	<?php $core->getFooter(); ?>
</body>
</html>
