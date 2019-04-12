<table>
    <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Weight</th>
    </tr>
    <tbody id="data"> <!--- data will be displayed here-->

    </tbody>
</table>

<script>
    //call ajax
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "data.php";
    var asynchronous = true;

    ajax.open(method, url, asynchronous);
    // sending ajax request 
    ajax.send();
    
    //receiving response from data.php
    ajax.onreadystatechange = function()
    {
        if (this.readyState == 4 && this.status == 200)
        {
            //converting JSON back to array
            var data = JSON.parse(this.responseText);
            console.log(data); // for debugging

            //html value for <tbody>
            var html = "";
            // looping through the data
            for (var a = 0; a < data.length; a++)
            {
                var Name = data[a].Name;
                var Age = data[a].Age;
                var Weight = data[a].Weight;

                //appending at html
                html += "<tr>";
                    html += "<td>" + Name + "</td>";
                    html += "<td>" + Age + "</td>";
                    html += "<td>" + Weight + "</td>";
                html += "</tr>";
            }
            // replaceing the <tbody> for <table>
            document.getElementById("data").innerHTML = html;
        } 
    }
</script>