<!DOCTYPE html>
<html >
<head>
	<title>Migraciones</title>
	<meta charset="utf-8" />
	<link type="text/css" href="<?=base_url();?>/css/bootstrap.css" rel="stylesheet">
	<style type="text/css">
      html { height: 100%; }
      body { height: 100%; margin: 0; padding: 0; }
    </style>
      <style>
  .custom-combobox {
    position: relative;
    display: inline-block;
  }
  .custom-combobox-toggle {
    position: absolute;
    top: 0;
    bottom: 0;
    margin-left: -1px;
    padding: 0;
    /* support: IE7 */
    *height: 1.7em;
    *top: 0.1em;
  }
  .custom-combobox-input {
    margin: 0;
    padding: 0.3em;
  }
  </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
    <script type="text/javascript" src="<?=base_url();?>/js/jquery.js"></script>
    <script type="text/javascript" src="<?=base_url();?>/js/rutas.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</head>
<body>
    <div class="container">
    <div class="header">
        <ul class="nav nav-pills pull-right">
          <li><a href="<?=base_url();?>index.php/principal">Principal</a></li>
          <li><a href="<?=base_url();?>index.php/nuevo/migrante">Nuevo migrante</a>
          <li class="active"><a href="<?=base_url();?>index.php/rutas">Rutas</a></li>
        </ul>
        <h3 class="text-muted">Proyecto migración</h3>
    </div>
	<hr/>
        <div class="row">
        	<div class="col-lg-4">
        		<h4>Busca migrante</h4>
                <div class="ui-widget">
                <select id="migrante" name="migrante">
                    <option></option>
                    <?php foreach ($migrantes as $migrante):?>
                            <option value="<?=$migrante->id;?>"><?=$migrante->usuario;?></option>
                    <?php endforeach; ?>
                </select>
                </div>
        	</div>
        	<div class="col-lg-8">
        		<h4>Ruta</h4>
        		<div id="map_canvas" style="height:400px; width: 80%;"></div>
        	</div>
        </div>
    </div>
    <div class="footer">
    	<hr/>
    	<p class="text-center">Desarrollado por:<br/>
    		Daniel García Alvarado - <a href="http://www.twitter.com/houseckleiin" target="_blank">@houseckleiin</a><br/>
    		Joel Humberto Gómez Paredes - <a href="http://www.twitter.com/dezkareid">@dezkareid</a>
    	</p>
    </div>
</body>
</html>
