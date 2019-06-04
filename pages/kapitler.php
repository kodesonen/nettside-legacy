<?php $core->pageHead("Kurs kapitler"); ?>
<?php $core->getHeader(); ?>
<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=kurskatalog">Kurskatalog</a></li>
			<li><a href="/?side=kapitler&id=<?php echo $_GET['id']; ?>"><?php $core->requestData("kurskatalog", "navn"); ?></a></li>
		</ul>
	</div>
</div>

<div class="wrapper">
    <div class="kurs_info">
        <h1>Kurs kapitler</h1><br/>      
    </div>

    <div class="course_jump_break"></div>
	
	<?php $core->getChapters(); ?>
	
</div>

<?php $core->getFooter(); ?>
