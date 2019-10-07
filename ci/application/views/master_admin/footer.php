    <!-- CHECKING BROWSER -->
    <input type="hidden" name="user_agent" value="<?php echo $this->agent->browser() ?>">

    <!-- BASE URL -->
    <input type="hidden" name="base_url" value="<?php echo base_url() ?>">

    <!-- JQUERY JS -->
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

    <!-- DATATABLES JS -->
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

    <!-- DATATABLES RESPONSIVE JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

    <!-- ADMIN JS -->
    <script src="<?php echo base_url('assets/js/admin.js') ?>"></script>

    <!-- ADMIN DATATABLES JS -->
    <script src="<?php echo base_url('assets/js/datatables.admin.js') ?>"></script>

    <!-- ADMIN MODAL -->
    <script src="<?php echo base_url('assets/js/modal.admin.js') ?>"></script>

    <!-- SWEETALERT2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

    <!-- PACE -->
    <script src="<?php echo base_url('assets/js/pace.min.js') ?>"  type="text/javascript"></script>

    </body>
</html>
