/*
 *  Class Main
 */

export
default class Main {

    constructor() {}
    
    /*
     *  Initialaising main manu
     **/
    initMainMenu(){
        
        $('li div.sub-nav').on('mouseup', function(){
            $('li div.sub-nav').css({visibility: 'hidden', opacity: 0});
            $('header li').hover(
                function(){ 
                    $(this).children('div.sub-nav').css({visibility: 'visible', opacity: 0.9});
                },
                function(){ 
                    $(this).children('div.sub-nav').css({visibility: 'hidden', opacity: 0});
                }
            );
        });
        
        $(".button-collapse").sideNav({
            menuWidth: 300, // Default is 300
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true, // Choose whether you can drag to open on touch screens,
            onOpen: function(el) { }, // A function to be called when sideNav is opened
            onClose: function(el) { }, // A function to be called when sideNav is closed
        });
    }
    
    /*
     *  Initialaising scrollspy and Tooltip
     **/
    initScrollSpy(){
        console.log('init Scrollspy');
        $('.scrollspy').scrollSpy({scrollOffset:90});
        let elHeight = $('.single-scroll').height();
        $('.single-scroll').css({marginTop:-(elHeight/2)+'px'});
        // console.log('+++++++++++++++++++++tooooooltip');
        // $('.tooltipped').tooltip();
    }
    
    initSlide(){
        console.log('init Slide');
        // TODO multi element ability
        
        // data-indicators true/false attribute defines if there is an indicator navigation for the slider
        let hasIndicators = $('.slider').data("indicators") === 1?true:false;
        
        let windowHeight = $(window).height(); console.log(windowHeight);
        let menuHeight = $('header').height(); console.log(menuHeight);
        
        $('.slider').height(windowHeight-menuHeight+'px');
        
        if($('body').attr('class') === 'content-start'){
          $('.slider').slider({indicators:hasIndicators, height:windowHeight-menuHeight+'px'});
        }else{
          $('.slider').slider({indicators:hasIndicators});  
        }
        
        if($('.slider').data("picture-mode") !== undefined){

            // insert picture sources into indicator list navigation
            if($('.slider').data("picture-mode") === 1){
                // extract picture sources
                let pictureURLList = $('.slider').data("picture-url-list").split(';');
                let i = 0;
                $('.slider > ul.indicators > li').each(function(){
                    $(this).css({"background-image":"URL('index.php?"+pictureURLList[i]+"')", "width":"100px", height:"100px"});
                    i++;
                })
            }
        } 
    }
    
    initModal(){
        $('.modal').modal();
    }
    
    initLogoSlide(){
        if($('.logo-stepper-container') != undefined){
            
            // calculate width of .logo-stepper based on amount of logos
            let containerWidth = 0;
            let logoWidth = 0;
            let logoAllWidth = 0;
            let logoAmount = 0;
            let logoSrcList =[]; 
            
            let pictureTitle = '';
            let pictureLink = '';
            
            $('.logo-stepper-container > .logo-stepper > a').each(function(){
                logoWidth += parseInt($(this).css('width'));
                console.log($(this));
                console.log('logowith');
                console.log(logoWidth);
                logoAmount++;
                if($(this).attr('title') !== undefined){
                   pictureTitle = $(this).attr('title');
                }
                pictureLink = $(this).attr('href') !== undefined ? $(this).attr('href') : '#';
                logoSrcList.push([pictureLink, $(this).find('img').attr('src'), pictureTitle]);
            });
            
            $('.logo-stepper-container > .logo-stepper').css({width:logoWidth+'px', display:'inline-block'});
            
            containerWidth = parseInt($('.logo-stepper-container').css('width'));
            logoAllWidth = (Math.ceil((containerWidth*2)/logoWidth))*logoWidth;

            $('.logo-stepper-container > .logo-stepper').css({width:(logoAllWidth)+'px'});

            // Loop through logos to duplicate them
            let sectionLength = Math.ceil((containerWidth*2)/logoWidth);
            
            let ii = 1;
            for(let i = 1; i < sectionLength; i++){
                for(let j = 0; j < logoSrcList.length; j++){
                    //console.log(j);
                    $('.logo-stepper-container > .logo-stepper').append('<a href="'+logoSrcList[j][0]+'" title="'+logoSrcList[j][2]+'"><img style="width:280px" class="content" src="'+logoSrcList[j][1]+'" alt="'+logoSrcList[j][2]+'"></a>'); 
                }
                ii = i;
            }
            

            // Prepare animation
            $('.logo-stepper-container > .logo-stepper').css({position:'absolute'});

            // Function for stepper animation
            let animationIteration = 0;
            let easeMode = '';
            let animationSpeed = 0;
            let leftScroll = containerWidth >= logoWidth ? -(logoAllWidth/ii) : -(logoWidth); 

            let infiniteStepper = ()=>{
                // set stepper elemnt to left position
                $('.logo-stepper-container > .logo-stepper').css({left:'0px'});
                // define ease mode, easeInSine for the startup, linear for infinite loop
                easeMode = animationIteration <= 0?'easeInSine':'linear';
                animationSpeed = animationIteration <= 0?40000:20000;
                $('.logo-stepper-container > .logo-stepper').animate(
                    {
                        left: leftScroll+'px'
                    },
                    {
                        duration:animationSpeed, 
                        easing:easeMode,
                        complete: ()=>{
                            // Recursive call to create a infinite stepper animation
                            animationIteration++;
                            infiniteStepper();       
                        }
                    }
                );
            }

            // Init animation (after 0 seconds when page is ready)
            if(animationIteration <= 0){
                setTimeout(()=>{infiniteStepper()}, 0);
            }

            $( window ).resize(()=>{
               // TODO überlegen ob man initLogoSlide nochmals aufruft, wenn logoWidth <> containerWidth 
            });
                
        }
    }
    
    initSelect(){
        $('select').material_select();
    }

}