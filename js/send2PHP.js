/**
 * 
 */
 // send sql data to writeDB.php in order to update SQL DB
 //	sql: SQL query (String)
function sendDataToPHP(sql) {
    // alertMsg("selected" + " val=" + val + " row no= " + index + " id= " + cid
    // + "\n");
    $.ajax({
        type : "POST",
        url : "./writeDB.php",
        async : true,
        dataType : "json",
        data : {
            sqlquery : sql,
        }
    }).done(function(jsonData) {
        $('#results').html(jsonData.sql);
    }).fail(function(jqXHR, status, errorThrown) {
        $('#results').html('writeDB error: '+errorThrown);
    });
    return false;
}

 