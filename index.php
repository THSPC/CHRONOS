<!DOCTYPE html>
<html lang="en">
<head>
	<title>CHRONOS - Tenafly High School</title>
	<meta name="description" content="Digital Signage System for Tenafly High School" />
	<meta name="viewport" content="width=device-width" />
	<meta name="author" content="Yuya Jeremy Ong" />
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/style.css">	
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,100,100italic,300,300italic,400italic,500,500italic,900,900italic,700italic' rel='stylesheet' type='text/css'>
</head>

<body>

	<canvas id="seen-canvas"></canvas>
	<div id="top_container">
		<div class="left">
			<span class="time">
				<span id="hours"></span>:
				<span id="min"></span>
			</span>
			<span id="date"></span>
		</div>
		<div class="right">-</div>
	</div>
	
	<div id="period_container">
		<div class="period">-</div>
	</div>
	
	<!-- Javascript & JQuery -->
	<script src="js/jquery.js"></script>
	<script src="js/plugins.js"></script>
    <script src="js/ion.sound.js"></script>
	<script src="js/clock.js"></script>
	<script src="js/seen.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/coffee-script/1.7.1/coffee-script.min.js"></script>
	<script type="text/coffeescript" src="lib/simplex-noise.coffee"></script>
	<script type="text/javascript">
		var canvas = document.getElementById("seen-canvas");
		canvas.width = screen.width;
		canvas.height = screen.height;
	</script>
	<script type="text/coffeescript">
	    width               = screen.width
	    height              = screen.height
	    equilateralAltitude = Math.sqrt(3.0) / 2.0
	    triangleScale       = 70
	    patch_width         = width * 2.5
	    patch_height        = height * 3.0

	    # Create patch of triangles that spans the view
	    shape = seen.Shapes.patch(
	      patch_width / triangleScale / equilateralAltitude
	      patch_height / triangleScale
	    )
	    .scale(triangleScale)
	    .translate(-patch_width/2, -patch_height/2 + 50, -100)
	    .rotx(-0.3)
	    seen.Colors.randomSurfaces2(shape)

	    # Create scene and render context
	    scene = new seen.Scene
	      fractionalPoints : true
	      model            : seen.Models.default().add(shape)
	      viewport         : seen.Viewports.center(width, height)

	    context = seen.Context('seen-canvas', scene).render()

	    # Apply animated 3D simplex noise to patch vertices
	    noiser = new Simplex3D(Math.random())
	    context.animate()
	      .onBefore((t)->
	        t *= -
	        for surf in shape.surfaces
	          for p in surf.points
	            p.z = 2*noiser.noise(p.x/8, p.y/8, t * 1e-4)
	          # Since we're modifying the point directly, we need to mark the surface dirty
	          # to make sure the cache doesn't ignore the change
	          surf.dirty = true
	      )
	      .start()
  	</script>
	<script src="js/main.js"></script>
</body>

</html>