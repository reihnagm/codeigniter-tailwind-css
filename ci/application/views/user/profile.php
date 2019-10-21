<div class="py-10">
    <div class="container mx-auto">
        <div class="relative">
          <img src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" class="object-cover h-64 w-full cursor-pointer hover:opacity-75">

          <img src="https://images.unsplash.com/photo-1459262838948-3e2de6c1ec80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=80" class="absolute border-dashed border-4 border-pink-500 cursor-pointer hover:opacity-75 left-0 right-0 block mx-auto rounded-full h-48 w-48" style="top: 50%;">
        </div>
        <div class="py-20">
            <p class="text-2xl text-center block px-2 -mx-2 py-2">
                <?php echo ucfirst($first_name); ?>
                <?php echo ucfirst($last_name); ?>
                 <i class="fas fa-edit w-8"></i>
            </p>
            <?php if(!empty($age)): ?>
                <span class="block text-center"> years <?php echo $age; ?> old</span>
            <?php endif; ?>

            <p class="text-xl text-center block px-2 -mx-2 py-2"><i class="fas fa-envelope-square w-8"></i> <?php echo $email; ?> <i class="fas fa-edit w-8"></i> </p>

        </div>
    </div>
</div>
