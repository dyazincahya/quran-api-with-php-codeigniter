<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>HOLY QURAN - API V1.0 - BY KANG-CAHYA.COM</title>
	<link rel="shortcut icon" href="<?=base_url(IMAGES."icon/default.png");?>">
	<link rel="stylesheet" href="<?=base_url(THEME."css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url(THEME."css/sticky-footer-navbar.css");?>">
	<style>
		ol {
			counter-reset: item;
		}
		li {
			display: block;
		}
		li:before {
			content: counters(item, ".") " ";
			counter-increment: item;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="display-4"><img src="<?=base_url(IMAGES."icon/default.png");?>" height="75" alt="Logo Icon"/> HOLY QURAN - API V1.0</h1>
			<div class="btn-toolbar mb-2 mb-md-0">
				<div class="row">
					<div class="col-3">
						<div class="btn-group mr-2">
							<a href="https://www.kang-cahya.com/" target="_blank" rel="dofollow" title="kang-cahya.com" class="btn btn-sm btn-success text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg></a>
							<a href="https://github.com/dyazincahya/quran-api-with-php-codeigniter" target="_blank" title="Source On Github" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a>
						</div>
					</div>
					<div class="col-9">
						<input type="text" id="filter-api" placeholder="Search API..." class="form-control">
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<h4>All API List :</h4>
				<ol>
					<li><a href="<?=site_url("juz");?>">Juz</a></li>
					<li><a href="<?=site_url("surah");?>">Surah</a>
						<ol>
							<?php 
								foreach ($surah as $k => $s) {
									echo "<li><a href='". site_url("surah/find/".($k+1)) ."'>". $s->titleAr ." (". $s->title .")</a></li>";
								}
							?>
						</ol>
					</li>
				</ol>
			</div>
			<div class="col-8" align="right">
				<h3>API V1.0</h3>
			</div>
	</div>
	<hr />
	<footer class="container">
		<p class="float-right"><a href="#">Back to top</a></p>
		<p>© 2013-<?=date("Y");?> <a href="https://www.kang-cahya.com/" rel="dofollow">Kang-cahya.com</a></p>
	</footer>

	<script src="<?=base_url(THEME."js/jquery-3.4.1.slim.min.js");?>"></script>
	<script src="<?=base_url(THEME."js/popper.min.js");?>"></script>
	<script src="<?=base_url(THEME."js/bootstrap.min.js");?>"></script>

	<script>
	$(document).ready(function(){
		$("#filter-api").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("ol > li").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
	</script>
</body>
</html>

