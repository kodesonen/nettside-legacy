<!-- ------------------------------------------------------------------------------------------------------------------ -->
<!-- Takk for at du tar en titt! Ønsker du hele kildekoden så sjekk oss ut på Github under https://github.com/kodesonen -->
<!-- ------------------------------------------------------------------------------------------------------------------ -->
<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/custom.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<title>Behandle kapitler - <?php echo $core->name; ?></title>
</head>

<body>
	<div class="header">
		<div class="wrapper">
			<div class="logo-section">
				<a href="/?side=hjem"><img src="/assets/img/original-vannrett_copy.png" alt="Kodesonen logo"/></a>
			</div>

			<?php $core->getHeader(); ?>
		</div>
	</div>

	<div class="wrapper">
		<div class="kurs_info">
			<h1>Behandle kapitler</h1><br/>
			<p>Denne siden er kun for Kodesonens administratorer.</p>			
		</div>

		<div class="course_jump_break">
			<h3>Alle kurskapitler:</h3>
		</div>

		<a href="/?side=nytt-kapittel" class="add_course_select">
			<div class="course_select_info">
				<h2><i class="fas fa-plus-circle" style="padding-right: 6px;"></i> Legg til nytt kapittel</h2>
			</div>
		</a>

		<a href="#" class="add_course_select">
			<div class="course_select_info">
				<h2><i class="fas fa-arrows-alt" style="padding-right: 6px;"></i> Endre rekkefølge</h2>
			</div>
		</a>

		<?php $core->getAdminChapters(); ?>
	</div>
	
	<div class="footer">
		<div class="wrapper">
			<div class="footer-trademark">
				<p>© 2018 - <a href="/?side=hjem"><?php echo $core->name; ?>.no</a></p>
			</div>

			<div class="footer-hyperlinks">
				<a href="mailto:<?php echo $core->contact; ?>"><i class="fas fa-envelope"></i></a> 
				<a href="<?php echo $core->facebook; ?>" target="_blank"><i class="fab fa-facebook"></i></a> 
				<a href="<?php echo $core->github; ?>" target="_blank"><i class="fab fa-github-square"></i></a> 
				<a href="<?php echo $core->instagram; ?>" target="_blank"><i class="fab fa-instagram"></i></a> 
				<a href="<?php echo $core->linkedin; ?>" target="_blank"><i class="fab fa-linkedin"></i></a> 
				<a href="<?php echo $core->twitter; ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
			</div>
		</div>
	</div>
</div>
</body>
</html>
