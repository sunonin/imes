<?php require 'vendor/autoload.php'; ?>

<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>IMES | <?php emptyblock('title'); ?></title>

    <meta name="description" content="" />

    <?php include 'public/css.php'; ?>
    
    <script src="assets/vendor/js/helpers.js"></script>
    <script src="assets/js/config.js"></script>
  </head>

  <body>
    <div class="layout-wrapper layout-content-navbar layout-without-menu">
      <div class="layout-container">
        <div class="layout-page">
          <?php include 'layouts/navbar.php' ?>
          <div class="content-wrapper">
          
            <div class="container-xxl flex-grow-1 container-p-y">
              <?php emptyblock('content') ?>  
              <!--/ Layout Demo -->
            </div>


            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  © 2022, developed by IMES IT Group
                </div>
              </div>
            </footer>
            <div class="content-backdrop fade"></div>
          </div>
        </div>
      </div>
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <?php include 'public/js.php' ?>
    <?php emptyblock('custom-js') ?>
  </body>
</html>
