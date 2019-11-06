<!-- USER ID -->
<input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">

<form id="form-privilege" >
    <?php echo get_temp_privilege($data['user_id']); ?>
    <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit" name="submit" value="Save Privilege">
</form>
