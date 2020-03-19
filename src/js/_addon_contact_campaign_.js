/*
 *  Entry point for contact campaign connection and form management
 */


// Class and Function Imports
import Form from './form';

// Class intialisation
let form = new Form();
form.showProgressStatus(true); 

console.log('WURST');


// JQuery $(document).ready function 
$(function() {
    
    form.init();
    console.log('Addon loaded new');
    form.showProgressStatus(false);
    
});