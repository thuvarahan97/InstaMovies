<?php
include_once ('../db_config.php');

$theatreID = $_POST['theatreID'];
$sql_category = "SELECT * FROM `tbl_theater_seat_categories` WHERE theatre_id = '$theatreID'";
$result_category = mysqli_query($db, $sql_category);
while($row_category = mysqli_fetch_array($result_category))
{
?>
    <div id="category">
        <div class="form-group row">
            <label for="category_label" class="col-sm-4 col-form-label">Seat Category:</label>
            <div class="col-sm-8">
                <input type='text' class="form-control" value="<?php echo $row_category['category_name']; ?>" disabled="disabled">
                <input type='text' class="form-control" id='seat_category' name="seat_category[]" value="<?php echo $row_category['seat_category_id']; ?>" style="display: none;">
            </div>
        </div>

        <div class="form-group row">
            <label for="full_rate_label" class="col-sm-4 col-form-label">Full Ticket Rate:</label>
            <div class="col-sm-8">
                <div id="currency_input">
                    <input type='text' class="form-control" id='full_rate' name="full_rate[]" value="" data-type="currency" maxlength="5" placeholder="0.00" required="required">
                    <i>Rs.</i>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <label for="kids_rate_label" class="col-sm-4 col-form-label">Kids Ticket Rate:</label>
            <div class="col-sm-8">
                <div id="currency_input">
                    <input type='text' class="form-control" id='kids_rate' name="kids_rate[]" value="" data-type="currency" maxlength="5" placeholder="0.00">
                    <i>Rs.</i>
                </div>
            </div>
        </div>
    </div>
<?php } ?>


<script>
$("input[data-type='currency']").on({
    keyup: function() {
      formatCurrency($(this));
    },
    blur: function() { 
      formatCurrency($(this), "blur");
    }
});

function formatNumber(n) {
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}

function formatCurrency(input, blur) {
    var input_val = input.val();
    if (input_val === "") {
      return;
    }
    var original_len = input_val.length;
    if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);
        if (blur === "blur") {
            right_side += "00";
        }
        right_side = right_side.substring(0, 2);
        input_val = left_side + "." + right_side;
    } else {
        input_val = formatNumber(input_val);
        input_val = input_val;
        if (blur === "blur") {
            input_val += ".00";
        }
    }
    input.val(input_val);    
}
</script>    