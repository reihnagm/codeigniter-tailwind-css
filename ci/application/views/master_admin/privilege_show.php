<!-- USER ID -->
<input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">

<form id="form-privilege" class="mt-3 ml-3">
    <?php echo get_temp_privilege($data['user_id']); ?>
    <div class="flex overflow-hidden justify-end items-end">
        <button id="form-submit-privilege" type="submit" name="submit" class="bg-pink-500 hover:bg-pink-400 text-white mt-8 w-1/4 py-2 px-4 rounded cursor-pointer">
            Save Privilege
        </button>
        <!-- <input id="form-submit-privilege" class="bg-pink-500 hover:bg-pink-400 text-white mt-8 py-2 px-4 rounded cursor-pointer" type="submit" name="submit" value="Save Privilege"> -->
    </div>
</form>
