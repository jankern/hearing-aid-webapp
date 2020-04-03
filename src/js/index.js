
// Webpack imports
// Global var to use it across components
import 'materialize-css/dist/js/materialize.min.js';
import 'materialize-css/dist/css/materialize.min.css';
import '../scss/styles.scss';


// Class and Function Imports
import Main from './template.main';

// Class intialisation
let main = new Main();

$(function() {

    main.initScrollSpy();
    main.initSlide();
    main.initModal();
    main.initLogoSlide();
    main.initMainMenu();
    main.initSelect();
    //console.log('Rendered');
    
});