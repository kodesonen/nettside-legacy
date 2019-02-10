
<?php $core->pageHead("Kurskatalog"); ?>

	<?php $core->getHeader(); ?>
	<div class="breadcrumbs">
		<div class="wrapper">
			<ul class="breadcrumb-nav">
				<li><a href="#">Kurskatalog</a></li>
			</ul>
		</div>
	</div>
	<div class="wrapper">
		<div class="kurs_info">
			<h1>Kurskatalog</h1><br/>
			<p>Utforsk fullstendige kurs via Kodesonens kurskatalog, her kan alle gå gjennom alt fra grunnleggende webutvikling til programmering og teori om datavitenskap. Våre kurs blir gitt ut av studenter og skal være av høy kvalitet.</p><br/>
		</div>

		<div class="box-wrapper">
			<?php $core->getCourses(); ?>
		</div>
		
	</div>

	<?php $core->getFooter(); ?>

