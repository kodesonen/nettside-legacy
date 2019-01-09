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
	<title>Admin kontrollpanel - <?php echo $core->name; ?></title>
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
			<h1>Admin kontrollpanel</h1><br/>
			<p>Denne siden er kun for Kodesonens administratorer.</p>			
		</div>

		<div class="box-wrapper">
			<a href='#' class='box_thread'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-cogs"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Generelle innstillinger</h2>
                    <h4>Diverse innstillinger for sideoppsett.</h4>
                </div>
            </a>

			<a href='/?side=endre-medlemmer' class='box_thread'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-users"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Endre medlemmer</h2>
                    <h4>Se oversikt og behandle medlemmer her.</h4>
                </div>
            </a>

            <a href='/?side=kursbehandler' class='box_thread'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-list-ol"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Kursbehandler</h2>
                    <h4>Endre kurskatalogen og opprett nye kurs her.</h4>
                </div>
            </a>

            <a href='#' class='box_thread'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-code"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Endre utfordringer</h2>
                    <h4>Se oversikt og behandle utfordringer her.</h4>
                </div>
            </a>

            <a href='#' class='box_thread'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-envelope"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Send e-post</h2>
                    <h4>Her kan du sende e-post til alle medlemmer.</h4>
                </div>
            </a>

            <a href='#' class='box_thread'>
                <div class='box_symbol'>
                    <h1><i class="fas fa-file-alt"></i></h1>
                </div>

                <div class='box_info'>
                    <h2>Logg-panel</h2>
                    <h4>Alle handlinger på nettsiden loggføres her.</h4>
                </div>
            </a>
		</div>
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
