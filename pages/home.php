<!-- Takk for at du tar en titt! Ønsker du hele kildekoden så sjekk oss ut på Github under https://github.com/kodesonen -->

<!doctype html>
<html class="no-js" lang="en" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/custom.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<title>Hjem - <?php echo $core->name; ?></title>
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
		<div class="front-content">
			<h1>En kodeklubb ved USN Kongsberg, hvor formålet er å ha et trivelig og utfordrende miljø for alle som har en interesse for programmering og teknologi.</h1>
		</div>

		<div class="front-tab">
			<h2><span><i class="fas fa-lightbulb"></i></span> Utfordringer</h2><br/>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</p>
			<div class="read-more"><a href="#"><h3>Les mer <i class="fas fa-long-arrow-alt-right"></i></h3></a></div>
		</div>

		<div class="front-tab">
			<h2><span><i class="fas fa-graduation-cap"></i></span> Kurskatalog</h2><br/>
			<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem.</p>
			<div class="read-more"><a href="#"><h3>Lær mer <i class="fas fa-long-arrow-alt-right"></i></h3></a></div>
		</div>

		<div class="front-tab">
			<h2><span><i class="fas fa-users"></i></span> Bli Medlem</h2><br/>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the.</p>
			<div class="read-more"><a href="#"><h3>Lær mer <i class="fas fa-long-arrow-alt-right"></i></h3></a></div>
		</div>

		<div class="front-picture-1"></div>
		<div class="front-text">
			<h1>Hvem er Kodesonen?</h1><br/>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p><br/>
			<p>But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>

		<div class="front-text">
			<h1>Hva slags utfordringer har vi?</h1><br/>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p><br/>
			<p>But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>

		<div class="front-picture-2"></div>
		<div class="front-picture-3"></div>
		<div class="front-text">
			<h1>Hvorfor bli medlem?</h1><br/>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p><br/>
			<p>But also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div>
	</div>

	<div class="footer">
		<div class="wrapper">
			<div class="footer-trademark">
				<p>© 2018 - <a href="/?side=hjem"><?php echo $core->name; ?>.no</a></p>
			</div>

			<div class="footer-hyperlinks">
				<a href="<?php echo $core->fb_link; ?>" target="_blank"><i class="fab fa-facebook"></i></a> 
				<a href="<?php echo $core->git_link; ?>" target="_blank"><i class="fab fa-github-square"></i></a> 
				<a href="<?php echo $core->insta_link; ?>" target="_blank"><i class="fab fa-instagram"></i></a> 
				<a href="<?php echo $core->twitter_link; ?>" target="_blank"><i class="fab fa-twitter-square"></i></a>
			</div>
		</div>
	</div>
</body>
</html>
