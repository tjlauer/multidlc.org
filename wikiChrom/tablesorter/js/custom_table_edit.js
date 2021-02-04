// JavaScript Document
$(document).ready(function(){
$('#data_table').Tabledit({
deleteButton: false,
editButton: false,
columns: {
identifier: [0, 'id'],
editable: [[1, 'title'], [2, 'author'], [3, 'year'], [4, 'ref']]
},
hideIdentifier: true,
url: 'live_edit.php'
});
});