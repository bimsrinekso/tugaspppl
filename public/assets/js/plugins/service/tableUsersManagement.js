$(document).ready(function(){
    generateTable('#datatable-helpdesk', '/dashboard/listUsers', columnHelpdesk, orderHelpdesk);

    
    generateTable('#datatable-client', '/dashboard/listUsers', columnClient, orderClient);

     
   generateTable('#datatable-member', '/dashboard/listUsers',columnMember, orderMember);
    
});
