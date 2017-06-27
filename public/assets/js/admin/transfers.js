$(document).ready(function() {
   var loadTxUrl = $('#loadTxUrl').data('url');
   var acceptTxUrl = $('#acceptTxUrl').data('url');
   var rejectTxUrl = $('#rejectTxUrl').data('url');
   var table = $('#tableBody');
   var html;

   $.ajax({
       url: loadTxUrl,
       type: 'get',
       success: function(data) {
           if(data.count == 0) {
                table.html('<tr><td colspan="5">No Pending Transfers</td></tr>');
           } else {
               $.each(data.transfers, function(tx) {
                   html += '<tr><td>'+tx.cid+'</td><td>'+tx.name+'</td><td>'+tx.rating+'</td><td class="simple-tooltip" title="'+tx.reason+'">'+tx.from_facility+'</td><td><button class="btn btn-success btn-xs accept"><i class="fa fa-check"></i></button><button class="btn btn-danger btn-xs reject"><i class="fa fa-times"></i></button></td></tr>';
               });
               table.html(html);
           }
       }
   });
});