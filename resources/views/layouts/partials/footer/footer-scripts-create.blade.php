<script>
    $(document).ready(function() {
        $('input[id$=tbDate]').datepicker({
            onClose: function(dateText, inst) {
                $("#tbToSetFocus").focus();
            }
        });
    });
</script>