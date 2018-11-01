/*
 *  Entry point for contact campaign connection and form management
 */


// Class and Function Imports
import Form from './form';

// Class intialisation
let form = new Form();
form.showProgressStatus(true); 


// JQuery $(document).ready function 
$(function() {
    
    form.init();
    console.log('Addon loaded');
    form.showProgressStatus(false);
    
});