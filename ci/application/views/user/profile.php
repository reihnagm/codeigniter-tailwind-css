<div class="container mx-auto overflow-hidden">

    <div class="relative">
        <!-- BANNER -->
        <?php if ($banner): ?>
            <img id="banner-trigger" src="<?php echo base_url('assets/avatar/'.$avatar); ?>" class="object-cover h-64 w-full cursor-pointer hover:opacity-75">
        <?php else:  ?>
            <img id="banner-trigger" src="<?php echo base_url('assets/bg-primary-hero/bg-primary-hero.png'); ?>" class="object-cover h-64 w-full cursor-pointer hover:opacity-75">
        <?php endif; ?>
        <form id="form-banner">
            <input id="banner" type="file" class="hidden" name="banner">
        </form>

        <!-- AVATAR -->
        <?php if ($avatar): ?>
            <img id="avatar-trigger" src="<?php echo base_url('assets/avatar/'.$avatar); ?>" class="absolute cursor-pointer hover:opacity-75 left-0 right-0 block mx-auto rounded-full h-48 w-48" style="top: 50%;">
        <?php else:  ?>
            <img id="avatar-trigger" src="<?php echo base_url('assets/avatar/default/default.png'); ?>" class="absolute cursor-pointer hover:opacity-75 left-0 right-0 block mx-auto rounded-full h-48 w-48" style="top: 50%;">
        <?php endif; ?>
        <form id="form-avatar">
            <input id="avatar" type="file" class="hidden" name="avatar">
        </form>
    </div>

    <div class="py-20">

        <p class="text-2xl text-center px-2 -mx-2 py-2">
            <?php echo ucfirst($first_name); ?>
            <?php echo ucfirst($last_name); ?>
            <i id="edit-name" class="fas fa-edit w-8 cursor-pointer hover:text-gray-600"></i>
        </p>

        <?php if(!empty($age)): ?>
            <i class="fas fa-birthday-cake w-8 cursor-pointer hover:text-gray-600"></i> <p class="text-2xl text-center px-2 -mx-2 py-2"> years <?php echo $age; ?> old</p>
        <?php else:  ?>
            <span class="block text-center px-2 mx-2 py-2">
                <i class="fas fa-birthday-cake w-8"></i>
                <i class="fas fa-edit w-8 cursor-pointer hover:text-gray-600"></i>
            </span>
        <?php endif; ?>

        <p class="text-xl text-center px-2 -mx-2 py-2">
            <i class="fas fa-envelope-square w-8"></i> <?php echo $email; ?>
            <i class="fas fa-edit w-8 cursor-pointer hover:text-gray-600"></i>
        </p>

        <?php if($village_id): ?>
            <?php
                $address = display_villages($village_id);
            ?>
                <p class="text-xl text-center px-2 -mx-2 py-2">
                    <i class="fas fa-address-card w-8"></i>
                    <?php echo ucwords(strtolower($address->name_province)); ?>,
                    <?php echo ucwords(strtolower($address->name_district)); ?>,
                    <?php echo ucwords(strtolower($address->name_regency)); ?>,
                    <?php echo ucwords(strtolower($address->name_village)); ?>
                    <i onclick="show_change_address('<?php echo $village_id; ?>')" class="fas fa-edit w-8 cursor-pointer hover:text-gray-600"></i>
                </p>
        <?php else: ?>
            <div class="rounded shadow-lg w-1/2 mx-auto">
                <div class="px-3 py-3">
                    <div class="flex overflow-hidden justify-center my-4">
                        <div class="mx-3">
                            <div id="container-provinces">
                                <?php echo $provinces; ?>
                            </div>
                            <div id="container-districts">
                                <?php echo $districts; ?>
                                <!-- LOAD FROM AJAX -->
                            </div>
                        </div>
                        <div class="mx-3">
                            <div id="container-regencies">
                                <?php echo $regencies; ?>
                                <!-- LOAD FROM AJAX -->
                            </div>
                            <div id="container-villages">
                                <?php echo $villages; ?>
                                <!-- LOAD FROM AJAX -->
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button id="save-address" class="bg-gray-700 hover:bg-gray-600 text-white font-bold py-2 px-4 m-4 rounded-full text-right">
                            Save Address
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="modal-show-address opacity-0 pointer-events-none z-50 fixed w-full h-full top-0 left-0 flex items-center justify-center">

            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

            <div onclick="close_show_change_address();" class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                </svg>
                <span class="text-sm">(Esc)</span>
            </div>

            <div class="modal-content py-4 text-left px-6 w-full">
                <h1>Hello World</h1>
            </div>

        </div>

    </div>
</div>

<script type="text/javascript">
    <?php if($this->session->flashdata("msg_verified")): ?>
        const title       = '<?php echo $this->session->flashdata("msg_verified")["title"]; ?>'
        const description = '<?php echo $this->session->flashdata("msg_verified")["description"]; ?>'
        const type        = '<?php echo $this->session->flashdata("msg_verified")["type"]; ?>'

        Swal.fire(
            title,
            description,
            type
        )
    <?php endif; ?>
</script>
