<?php $core->pageHead("Kurskatalog"); ?>
<?php $core->getHeader(); ?>
<div class="breadcrumbs">
	<div class="wrapper">
		<ul class="breadcrumb-nav">
			<li><a href="/?side=kurskatalog">Kurskatalog</a></li>
		</ul>
	</div>
</div>

<div class="wrapper">
	<div class="kurs_info">
		<h1>Kurskatalog</h1><br/>
		<p>Utforsk fullstendige kurs via Kodesonens kurskatalog. Her kan alle gå gjennom alt fra grunnleggende webutvikling til programmering og teori om datavitenskap. Våre kurs blir gitt ut av studenter og skal være av høy kvalitet.</p><br/>

		<?php $core->labelText("ERROR", "OBS", "Kurskatalogen er ikke klar enda og vi jobber fortsatt med å skrive ferdig kursinnlegg. Vi gir dere beskjed når alt er klart! ;)"); ?>
	</div>

	<div class="box-wrapper">
		<?php $core->getCourses(); ?>
	</div>
	
</div>

<?php $core->getFooter(); ?>
