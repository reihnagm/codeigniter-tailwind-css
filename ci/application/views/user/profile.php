<div class="container mx-auto overflow-hidden">

    <div class="relative">
        <!-- BANNER -->
        <?php if ($banner): ?>
            <img src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" class="object-cover h-64 w-full cursor-pointer hover:opacity-75">
        <?php else:  ?>
            <img src="<?php echo base_url('assets/bg-primary-hero/bg-primary-hero.png'); ?>" class="object-cover h-64 w-full cursor-pointer hover:opacity-75">
        <?php endif; ?>

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
            <i class="fas fa-edit w-8 cursor-pointer hover:text-pink-400"></i>
        </p>

        <?php if(!empty($age)): ?>
            <i class="fas fa-birthday-cake w-8 cursor-pointer hover:text-pink-300"></i> <p class="text-2xl text-center px-2 -mx-2 py-2"> years <?php echo $age; ?> old</p>
        <?php endif; ?>

        <p class="text-xl text-center px-2 -mx-2 py-2">
            <i class="fas fa-envelope-square w-8"></i> <?php echo $email; ?>
            <i class="fas fa-edit w-8 cursor-pointer hover:text-pink-400"></i>
        </p>

        <div class="flex overflow-hidden justify-center my-4">
            <div class="w-1/6 mx-3">
                <?php echo $provinces; ?>
                
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Regencies
                </label>
                <select class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option>New Mexico</option>
                    <option>Missouri</option>
                    <option>Texas</option>
                </select>
            </div>
            <div class="w-1/6 mx-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Districts
                </label>
                <select class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500 my-3">
                    <option>New Mexico</option>
                    <option>Missouri</option>
                    <option>Texas</option>
                </select>
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                    Villages
                </label>
                <select class="block rounded appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    <option>New Mexico</option>
                    <option>Missouri</option>
                    <option>Texas</option>
                </select>
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
