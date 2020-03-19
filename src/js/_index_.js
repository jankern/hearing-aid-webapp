/*
 *  ENVIRONMENT = 
 */

// Webpack imports
// import '../scss/styles.scss';
// Global var to use it across components
// import $ from 'jquery';
// import 'materialize-css';
// import 'materialize-css/dist/css/materialize.css';
import '../scss/styles.scss';


// Class and Function Imports
import Navigation from './navigation';

// Class intialisation
let navigation = new Navigation();


// JQuery $(document).ready function 
$(function() {
    
    navigation.initScrollSpy();
    navigation.initSlide();
    navigation.initModal();
    navigation.initLogoSlide();
    navigation.initMainMenu();
    navigation.initSelect();
    console.log('Rendered');

    
});