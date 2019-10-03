<!-- CHECKING BROWSER -->
<input type="hidden" name="user_agent" value="<?php echo $this->agent->browser() ?>">

<!-- BASE URL -->
<input type="hidden" name="base_url" value="<?php echo base_url() ?>">

<div class="w-full mx-auto px-6">
    <div class="flex -mx-6">

        <!-- SIDEBAR -->
        <?php components('master_admin/sidebar', $navigation) ?>

        <!-- CONTENT -->
        <?php components('master_admin/content') ?>

    </div>
</div>
