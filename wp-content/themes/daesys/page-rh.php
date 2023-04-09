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
        <li class="breadcrumb-item"><a href="/">home</a></li>
        <li class="breadcrumb-item active">rh</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">

    <div class="row">
      <div class="col-12">
        <br><h4>Funcionários</h4><br>
        <table id="team" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Código</th>
                <th>Nome do Funcionário</th>               
            </tr>
        </thead>
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