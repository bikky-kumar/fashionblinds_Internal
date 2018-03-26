
<?php ?>

<div id = "search">
        <input type=text placeholder = "Search Customer">
        <input type=submit value = "Search">
</div>

<div id = "list-filter">
<label for="show_list">Show Customer</label>
    <select id="show_list_by" name="show_list_by">
	<option value = "Default" selected>Default</option>
    <option value = "1">Last 7 Days</option>
    <option value = "2">Last 14 Days</option>
    <option value = "4">This Month</option>
    <option value = "12">Last 3 Months</option>
    <option value = "20">Ordered</option>
    <option value = "21">Quoted</option>
    <option value = "22">In Process</option>
    </select>
</div>





<script>

function updateList(){
var show_list_by = document.getElementById("show_list_by");
var table_data = document.getElementById("cusotmer-list");

var query_id = show_list_by.options[show_list_by.selectedIndex].value;
var url = '../customers/customerlist.php?query_id=' + query_id;
var xhr = new XMLHttpRequest();
xhr.open('GET', url, false);
xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200){
        table_data.innerHTML = xhr.responseText;
    }
}
xhr.send();
}

var show_list = document.getElementById("list-filter");
show_list.addEventListener("change", updateList);
</script>