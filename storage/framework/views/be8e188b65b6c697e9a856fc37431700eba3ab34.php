<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper">
    <!-- Search for small screen -->
    <div class="header-search-wrapper grey hide-on-large-only">
        <i class="mdi-action-search active"></i>
        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
    </div>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l12 breadcrumbs-wrapper">
               <?php echo e(Breadcrumbs::render()); ?>

            </div>
        </div>
    </div>
</div>
<!--breadcrumbs end-->