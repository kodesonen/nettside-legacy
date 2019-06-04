<?php

	echo "
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src='https://www.googletagmanager.com/gtag/js?id=UA-138307048-1'></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-138307048-1');
	</script>
	";

// Hjemmesiden

if($_GET['side'] == 'home'){
	echo "
			<meta property='og:title' content='Kodesonen'>
			<meta property='og:description' content='Vi har som formål å skape et trivelig, teknologisk og utfordrende miljø for våre medlemmer. '>
			<meta property='og:image' content=''>
			<meta property='og:url' content='https://kodesonen.no'>
		 ";
}

// Bli Medlem

if($_GET['side'] == 'medlem'){
	echo "
			<meta property='og:title' content='Bli Medlem i Kodesonen'>
			<meta property='og:description' content=''>
			<meta property='og:image' content=''>
			<meta property='og:url' content='https://kodesonen.no/?side=medlem'>
		 ";
}

// Kurskatalog

if($_GET['side'] == 'kurskatalog'){
	echo "
			<meta property='og:title' content='Kodesonen Kurskatalog'>
			<meta property='og:description' content='Utforsk komplette kurs i alt fra programmering, webutvikling og datavitenskap på norsk, helt gratis!'>
			<meta property='og:image' content=''>
			<meta property='og:url' content='https://kodesonen.no/?side=kurskatalog'>
		 ";
}

?>
