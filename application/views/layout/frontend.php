<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/reset.min.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/main.css" type="text/css" media="screen" />
    
    <script src="<?php echo base_url() ?>assets/lib/jquery/jquery-1.4.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/lib/select_replacement/select_replacement.1.0.0.js" type="text/javascript"></script>
    <script src="<?php echo base_url() ?>assets/js/search.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/lib/select_replacement/style.css" type="text/css" />
    <!--[if lt IE 9]>
        <script src="js/html5.js" type="text/javascript"></script>
    <![endif]-->
    <script language="javascript">
        BASE_URL = '<?php echo base_url() ?>';
    </script>    
    <script type="text/javascript">
		$(document).ready(function() {
			$('select').replaceSelects();
		});
	</script>
</head>
<body>
    <div id="header">
        <div class="main_wrap">
            <div class="header_main">
                <div class="logo">
                    <a href="<?php echo base_url() ?>">
                        <img src="<?php echo base_url() ?>assets/img/frontend/header_logo.png"/>
                    </a>
                </div>
                <div class="links">
                    <?php if(!$this->authentication->logged()) :?>
                        <a href="<?php echo base_url() ?>login">Iniciar Sesion</a>
                        <span>-</span>
                        <a href="<?php echo base_url() ?>register">Registrarse</a>
                    <?php else: ?>
                        Bienvenido : <?php echo $this->session->userdata('username');?>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <div class="main_banner">
            <a href="">
                <img src="<?php echo base_url() ?>assets/img/frontend/banner1.png"/>
            </a>
            <form action="<?php echo base_url() ?>search" method="GET">
                <div class="search_input">
                    <input id="key" type="text" name="string" value="<?php echo $string; ?>"/>
                    <button type="submit"></button>
                </div>
                <div class="search_select">
                <label>En:</label>
                    <select name="cat">
                        <option>Inmuebles</option>
                        <option>Compra / Venta en general</option>
                        <option>Salud</option>
                    </select>
                </div>
            </form>
        </div>
    </div><!-- #header -->
    <div id="container">
        <?php echo $content_for_layout ?>
    </div><!-- #container -->
    <div id="footer">
        &nbsp;
    </div><!-- #footer -->
</body>
</html>