<div>
    <table border = "1" class= "list">
        <tr>
            <th>Type</th>
            <th>Subtype</th>
            <th>Location</th>
            <th>Drop CM</th>
            <th>Width CM</th>
            <th>&nbsp;</th>
            <th>Price</th>
            <th>&nbsp;</th>
        </tr>
        <tr>
            <td>
                <select id="product_type" name="product_type" onchange="populate_subtype()">
                    <option>None</option> 
                    <?php  $product_set = product_list(); 
                    while($products = mysqli_fetch_assoc($product_set)){ ?>
                    <option value = "<?php echo h($products['product_id'])?>"><?php echo h($products['product_name'])?></option>
                    <?php } ?>
                </select>
            </td>
            <td>
                <select id="product_subtype" name="product_subtype">
                </select>
            </td>
            <td>
                <input type="text" id="product_placement" name="product_placement">
            </td>
            <td>
                <div id="measurement">
                <select id="measurement_drop" name="measurement_drop">
                    <option value = "CM">CM</option>
                    <option value = "MM">MM</option>
                </select>
                <div>
                <input type="number" id="drop" name="drop">
            </td>
            <td>
                <div id="measurement">
                    <select id="measurement_width" name="measurement_width">
                        <option value = "CM">CM</option>
                        <option value = "MM">MM</option>
                    </select>
                <div>    
                <input type="number" id="width" name="width">
            </td>
            <td id = "action"><button>+</button></td>
            <td><span id="pricetag"><?php echo "300"; ?></span></td>    
            <td id = "action"><button>+</button></td>
        </tr>           
    </table>
</div>


<script>
    
function populate_subtype(){

var product_type = document.getElementById("product_type");
var product_subtype = document.getElementById("product_subtype");

var product_id = product_type.options[product_type.selectedIndex].value;
var url = 'ajax.php?product_id=' + product_id;
var xhr = new XMLHttpRequest();
xhr.open('GET', url, false);
xhr.send(null);
product_subtype.innerHTML = xhr.responseText;
}

</script>

