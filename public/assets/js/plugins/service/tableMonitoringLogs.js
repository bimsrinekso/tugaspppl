$(document).ready(function(){
   
    generateTable('#datatable-post', '/dashboard/monitoringLog', columnLogPost, orderLogPost);

    
    generateTable('#datatable-callback', '/dashboard/monitoringLog', columnLogCallBack, orderLogCallBack);


   
    generateTable('#datatable-error', '/dashboard/monitoringLog', columnLogError, orderLogError);
    
    
    
});