/**
 * Created by http://gihyo.jp/design/serial/01/jquery-site-production/0017
 */
jQuery(function($) {
  $("select#accrebody").change(function(e) {
    // alert("menu selected");
    var current_tr = $(this).closest('tr')[0];
    var obj = document.getElementById("accrebody");
    var val = obj.value;
    setAccreBody(val);
  });
});

// Display the documents table in tableFrame iframe
function setAccreBody(ab) {
  $pstmsg = './displayTable.php?accrebody=' + ab;
  // $element = document.getElementById("iframe#tableFrame");
  // console.log($element);

  $('#tableFrame', parent.document)[0].contentDocument.location
    .replace($pstmsg);
  // alert($pstmsg);
};
