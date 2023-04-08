<?php
if (!is_user_logged_in()) {
  setcookie('loginUrl', $_SERVER['REQUEST_URI'], time() + 60, "/");
  wp_redirect("/wp-admin");
} else {
  get_header();
}
?>

<?php
//******************* */
?>

<script>
  //******************* */
</script>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Indicadores de <strong>RH</strong></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">home</a></li>
        <li class="breadcrumb-item active">rh</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">

    <div class="row">
      <div class="col-12">
        <table id="team" class="table table-striped" style="width:100%">
          <?php
          $sql = "SELECT CODSEQ,NOMEFUNCIONARIO FROM FUNCIONARIO WHERE INATIVO = 0 ORDER BY 1 ASC;";
          echo DAE::oracle2table($sql);
          ?>
        </table>
      </div>
    </div>
    
  </section>

</main><!-- End #main -->

<?php get_footer(); ?>