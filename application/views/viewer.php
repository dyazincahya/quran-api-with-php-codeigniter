<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>HOLY QURAN API - BY KANG-CAHYA.COM</title>
	<link rel="shortcut icon" href="<?=base_url(IMAGES."icon/default.png");?>">
	<link rel="stylesheet" href="<?=base_url(THEME."css/bootstrap.min.css");?>">
	<link rel="stylesheet" href="<?=base_url(THEME."css/sticky-footer-navbar.css");?>">
	<link rel="stylesheet" href="<?=base_url(THEME."css/jquery.json-viewer.css");?>">
</head>
<body>
	<div class="container">
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
			<h1 class="display-4">
				<img src="<?=base_url(IMAGES."icon/default.png");?>" height="75" alt="Logo Icon"/> 
				HOLY QURAN API
			</h1>
			<div class="btn-toolbar mb-2 mb-md-0">
				<div class="btn-group mr-2">
					<a href="https://www.kang-cahya.com/" target="_blank" rel="dofollow" title="kang-cahya.com" class="btn btn-sm btn-success text-white"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg></a>
					<a href="https://github.com/dyazincahya/quran-api-with-php-codeigniter" target="_blank" title="Source On Github" class="btn btn-sm btn-outline-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></a>
				</div>
				<a href="<?=site_url("/");?>" class="btn btn-sm btn-dark">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
					HOME
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="end-point">End Point</span>
					</div>
					<input type="text" class="form-control" value="<?=$url;?>" readonly="true" aria-describedby="end-point">
					<div class="input-group-append">
						<a href="<?=$url;?>" target="_blank" class="btn btn-warning" type="button">Run in new tab</a>
					</div>
				</div>
				<h6>RESULT :</h6>
				<pre id="json-renderer"></pre>
			</div>
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
	<script src="<?=base_url(THEME."js/jquery.json-viewer.js");?>"></script>

	<script>
		$(document).ready(function(){
			$("#filter-api").on("keyup", function() {
				var value = $(this).val().toLowerCase();
				$("ol > li").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
				});
			});
			$('#json-renderer').jsonViewer(<?=$json;?>, {rootCollapsable: false, collapsed: <?=$json_collapsed;?>, withQuotes: true, withLinks: false});
		});
	</script>
</body>
</html>

