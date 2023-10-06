$(document).ready(function(){
   
    generateTable('#pendingStatement', '/dashboard/estatement/qris', columnPenStatement, orderPenStatement);

    generateTable('#datatable-done', '/dashboard/estatement/qris', columnDonStatement, orderDonStatement);

});