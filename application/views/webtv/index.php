<!DOCTYPE html>
<html lang="lt-LT">
	<head>
		<meta charset="utf-8">
		<meta author="PovilasC">
		<title>SR WEBTV</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="https://bootswatch.com/4/darkly/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
		<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-157703586-1"></script>
	</head>
	<body class="minwidth">
		<div class="container-fluid minwidth">
			<div class="row">
				<div class="classfix col-9">
					<video id="video" class="playeris" controls="" autoplay="" poster="assets/img/poster.jpg"></video>
				</div>
				<div class="classfix col-3 antrascol">
					<table class="table table-hover table-channels">
  						<tbody>
							<tr class="chbutton table-active" data-chid="tv3">
								<th scope="row"><img src="https://manoiptv.tk/assets/img/channels/tv3.png" alt></th>
								<td>Channel 1</td>
    						</tr>
    						<tr class="chbutton" data-chid="tv6">
								<th scope="row"><img src="https://manoiptv.tk/assets/img/channels/tv6.png" alt></th>
								<td>Channel 2</td>
    						</tr>
							
  						</tbody>
					</table> 
				</div>
			</div>
		</div>
		
		<script>
  			var video = document.getElementById('video');
			if(Hls.isSupported()) {
				var hls = new Hls();
				hls.loadSource('http://url.m3u8'); 
				hls.attachMedia(video);
				hls.on(Hls.Events.MANIFEST_PARSED,function() {
					video.play();
				});

			}
			else if (video.canPlayType('application/vnd.apple.mpegurl')) {
				video.src = 'http://url.m3u8';
				video.addEventListener('loadedmetadata',function() {
					video.play();
				});
			}
        </script>
		<style>
            
        </style>
	</body>
</html>
