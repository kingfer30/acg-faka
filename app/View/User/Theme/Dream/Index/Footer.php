<div class="content-icp"><?php echo $data['setting']['icp']; ?></div>
<!--start::HOOK-->
<?php hook(\App\Consts\Hook::USER_VIEW_INDEX_BODY); ?>
<!--end::HOOK-->
</body>
<!--start::HOOK-->
<?php hook(\App\Consts\Hook::USER_VIEW_INDEX_FOOTER); ?>
<!--end::HOOK-->
</html>