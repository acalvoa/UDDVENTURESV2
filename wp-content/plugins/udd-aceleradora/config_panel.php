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
    <?php    echo "<h2><i class='fa fa-cog'></i>  " . __( 'Configuraciónes de la pagina UDD Ventures Aceleradora', 'udd_alumnos' ) . "</h2>"; ?>
    </div>
    <div class="formulario">
      <form action="options.php" method="post">
          <div class="imagenes">
            <div class="titulo-section"><i class="fa fa-file-image-o"></i>  Configuracion de Imagenes y Videos</div>
            <?php 
                settings_fields('UDD_aceleradora_settings');
                do_settings_sections('UDD_aceleradora_settings');
            ?>
            <p>
              <label for="landing-loader">Imagen de Portada</label><br>
              <input type="text" name="landing-img" value="<?php echo get_aceleradora_image();?>">
              <input type="button" objof="landing-img" class="upload_image_button" value="Seleccionar Imagen">
            </p>
            <p>
              <label for="postula-img">Imagen de Sección Postula</label><br>
              <input type="text" name="postula-img" value="<?php echo get_postula_image();?>">
              <input type="button" objof="postula-img" class="upload_image_button" value="Seleccionar Imagen">
            </p>
            <p>
              <label for="postula-img-int">Imagen de Sección Postula Interior</label><br>
              <input type="text" name="postula-img-int" value="<?php echo get_postula_int_image();?>">
              <input type="button" objof="postula-img-int" class="upload_image_button" value="Seleccionar Imagen">
            </p>
            <p>
              <label for="eventos-img">Imagen de Sección Eventos</label><br>
              <input type="text" name="eventos-img" value="<?php echo get_eventos_image();?>">
              <input type="button" objof="eventos-img" class="upload_image_button" value="Seleccionar Imagen">
            </p>
            <p>
              <label for="faq-img">Imagen de Sección FAQ</label><br>
              <input type="text" name="faq-img" value="<?php echo get_faq_image();?>">
              <input type="button" objof="faq-img" class="upload_image_button" value="Seleccionar Imagen">
            </p>
            <p>
              <label for="landing-video">Link Youtube de video de portada</label><br>
              <input type="text" name="landing-video" value="<?php echo get_landing_video();?>">
            </p>
          </div>
          <div class="redessociales">
            <div class="titulo-section"><i class="fa fa-share-alt"></i>  Configuracion de Redes Sociales</div>
            <p>
              <label for="facebook-general">Facebook General de la Web</label><br>
              <input type="text" name="facebook-general" value="<?php echo get_facebook_general();?>">
            </p>
            <p>
              <label for="twitter-general">Twitter General de la Web</label><br>
              <input type="text" name="twitter-general" value="<?php echo get_twitter_general();?>">
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
      .formulario .redessociales{
        margin-top: 30px;
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