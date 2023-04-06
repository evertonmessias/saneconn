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
    <h1>Indicadores <strong>Operacionais</strong></h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">home</a></li>
        <li class="breadcrumb-item active">operacional</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-12">
        <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque enim enim, tincidunt quis eros nec, gravida consectetur orci. Vivamus at tortor sit amet metus ultricies tempor at in dolor. Nulla at accumsan sapien. Sed ut varius augue, ut facilisis magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean et maximus arcu. Fusce tincidunt est sed dolor fermentum tristique. Etiam ut magna a nisi malesuada dignissim.
        </p>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php get_footer(); ?>