<script language="JavaScript">
var formfield;
jQuery(document).ready(function() {
jQuery('.upload_image_button').click(function() {
  formfield = jQuery(this).attr('objof');
  tb_show('', 'media-upload.php?type=image&TB_iframe=true');
  return false;
});

window.send_to_editor = function(html) {
  imgurl = jQuery('img',html).attr('src');
  jQuery("input[name='"+formfield+"']").val(imgurl);
  tb_remove();
}

});
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<div class="wrap">
    <div class="titulo">
    <?php    echo "<h2><i class='fa fa-cog'></i>  " . __( 'Configuraciónes de la pagina UDD Ventures Landing', 'udd_landing' ) . "</h2>"; ?>
    </div>
    <div class="formulario">
      <form action="options.php" method="post">
          <div class="imagenes">
            <div class="titulo-section"><i class="fa fa-file-image-o"></i>  Configuracion de Imagenes</div>
            <?php 
                settings_fields('UDD_landing_settings');
                do_settings_sections('UDD_landing_settings');
            ?>
            <p>
              <label for="landing-loader">Imagen de Portada Alumnos</label><br>
              <input type="text" name="landing-img-alumnos" value="<?php echo get_landing_alumnos_image();?>">
              <input type="button" objof="landing-img-alumnos" class="upload_image_button" value="Seleccionar Imagen">
            </p>
            <p>
              <label for="landing-loader">Imagen de Portada Aceleradora</label><br>
              <input type="text" name="landing-img-aceleradora" value="<?php echo get_landing_aceleradora_image();?>">
              <input type="button" objof="landing-img-aceleradora" class="upload_image_button" value="Seleccionar Imagen">
            </p>
           </div>
          <?php submit_button(); ?>
      </form>
    </div>
    <style>
      .titulo{
        padding-top: 20px;
        padding-bottom: 20px;
      }
      .formulario .imagenes{
        border: 1px #999 solid;
        padding: 10px;
        width: 50%;
        background: #F9F9F9;
      }
      .formulario input[type="text"]{
        width: 400px;
        border: 1px #999 solid;
        height: 35px;
      }
      .formulario input[type="button"]{
        width: 150px;
        border: 1px #00A0D2 solid;
        background: #00A0D2;
        color:#FFF;
        height: 35px;
      }
      .formulario label{
        font-weight: bold;
      }
      .formulario .titulo-section{
        font-size: 1.4em;
        padding: 15px;
      }
    </style>
</div>'