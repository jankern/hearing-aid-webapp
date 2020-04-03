/*
 *  Class addon
 */

export
default class AddonContactCampain {

    constructor() {
        this.formSectionList = [];
        this.currentFormSectionIndex = 0;
        this.topMargin = 0;
    }

    validateSections(isFieldCheck) {

        let stepIsValid = false;

        if (this.currentFormSectionIndex < this.formSectionList.length) {

            // validate Abschnitt
            let currentSectionElement = this.formSectionList[this.currentFormSectionIndex];
            stepIsValid = true;

            // Checkboxes and radio inputs
            let checkEl = currentSectionElement.find('input:radio, input:checkbox');

            if (checkEl[0] !== undefined) {
                let hasTobeValidated = currentSectionElement.data('validate-check');
                if (hasTobeValidated !== undefined && hasTobeValidated == true) {
                    // validate if checked or not 
                    let val = currentSectionElement.find('input:checked').val();
                    if (val === undefined) {
                        stepIsValid = false;
                    }
                }
            }

            // Email field is invalid
            let emailEl = currentSectionElement.find('input[type=email]');
            let emailElVal = emailEl.val();
            let emailRequired = emailEl.attr('required');
            if (emailElVal !== undefined) {
                let label = '';
                if (emailRequired !== undefined && emailElVal === '') {
                    // Message -> Sie müssen eine Email-Adresse angeben
                    emailEl.addClass('invalid');
                    label = currentSectionElement.find("label[for='" + emailEl.attr("id") + "']");
                    label.attr('data-error', 'Sie müssen eine Email angeben');
                    stepIsValid = false;
                } else {
                    let classList = emailEl.attr('class').split(" ");
                    for (let i = 0; i < classList.length; i++) {
                        if (classList[i] === 'invalid') {
                            emailEl.addClass('invalid');
                            label = currentSectionElement.find("label[for='" + emailEl.attr("id") + "']");
                            label.attr('data-error', 'Die Email ist noch nicht korrekt');
                            stepIsValid = false;
                        }
                    }
                }
            }

            // Text fields (List of fields) are invalid 
            let hasTextEl = currentSectionElement.find('input:text');
            if (hasTextEl[0] !== undefined) {
                let status = [];
                currentSectionElement.find('input:text').each((index, element) => {
                    let textEl = $(element);
                    let textElVal = $(element).val();
                    let textRequired = $(element).attr('required');
                    if (textElVal !== undefined) {
                        let label = '';
                        if (textRequired !== undefined && textElVal === '') {
                            textEl.addClass('invalid');
                            label = currentSectionElement.find("label[for='" + textEl.attr("id") + "']");
                            label.attr('data-error', 'Dieses feld darf nicht leer bleiben');
                            status.push(false);
                        }
                    }
                });

                // if only one field is invalid, screen can not be left
                if (status.length > 0) {
                    for (let i = 0; i < status.length; i++) {
                        if (!status[i]) {
                            stepIsValid = false;
                            break;
                        }
                    }
                }

            }


            // If something is not valid, section next button will be disabled
            if (!stepIsValid) {
                $('#contact-form-button').attr('disabled', 'disabled');
                $('#contact-form-submit-button').attr('disabled', 'disabled');
            } else {
                // enable next button if disabled
                $('#contact-form-button').removeAttr('disabled');
                $('#contact-form-submit-button').removeAttr('disabled');

                if (!isFieldCheck) {
                    // Move section to next screen (animation)
                    this.topMargin = this.topMargin - this.formSectionList[0].height();
                    $('.form-section-container').animate({
                        marginTop: this.topMargin + 'px'
                    }, 500);
                    // increase screen count
                    this.currentFormSectionIndex++;
                }
            }

            if (this.currentFormSectionIndex >= this.formSectionList.length - 1) {
                $("#contact-form-button").css({
                    "display": "none"
                });
                $("#contact-form-submit-button").css({
                    "display": "block"
                });
            }
        }

        return stepIsValid;
    }

    showProgressStatus(isHidden, callback) {
        if (isHidden) {
            $('.preloader-layer').css({ display: "block" });
            $('.preloader-layer').animate({ opacity: "1.0" }, 500);
        } else {
            $('.preloader-layer').animate({ opacity: "0" }, 500, () => {
                $('.preloader-layer').css({ display: "none" });
            });
        }
        // if calback function is present, execute
        if (callback) {
            callback();
        }
    }

    init() {

        $('.form-section').each((index, element) => {
            this.formSectionList.push($(element));
        });


        $('#contact-form-button').on('click', (e) => {
            // e.stopPropagation();
            this.validateSections(false);

        });

        // block tab key for each last input field of a section to avoid display error
        $('.form-section [data-no-tab]').each((index, element) => {
            $(element).keydown((e) => {
                if (e.keyCode === 9) {
                    e.preventDefault();
                }
            });
        });


        $('#concam-form').on('submit', (e) => {

            e.preventDefault();
            let isValid = this.validateSections(true);

            // console.log(isValid);

            if (isValid) {

                // start preloader screen
                this.showProgressStatus(true);

                let postUrl = $(e.currentTarget).attr('action'); //get form action url
                let requestMethod = $(e.currentTarget).attr('method'); //get form GET/POST method
                let formData = '';//new FormData(e.currentTarget); //Creates new FormData obje
                formData = $(e.currentTarget).serialize();


                $.ajax({
                    url: postUrl,
                    data: formData,
                    // contentType: false,
                    cache: false,
                    type: requestMethod
                }).done((response) => { //

                    $("#concam-response").html(response);
                    $("#concam-response").css({ display: 'block' });
                    $("#concam-form").css({ display: 'none' });
                    this.showProgressStatus(false);

                }).fail((error, status) => { // error: {"readyState":4,"responseText":"Captcha falsch, bidde nochmal","status":403,"statusText":"Forbidden"}

					if(error.status === 403){
						$("#capture-response-text").html(error.responseText);
						$("#concam-response").css({ display: "block" });
					}else{
						$("#concam-response").html(error.responseText);
						$("#concam-response").css({ display: 'block' });
						$("#concam-form").css({ display: 'none' });
					}
                    this.showProgressStatus(false);
                });
            }

        });

        $('.form-body').find('input:radio, input:checkbox').each((index, element) => {
            $(element).on('click', (e) => {
                // e.stopPropagation();
                this.validateSections(true);

            });
        });

        $('.form-section input:text, .form-section input[type=email]').each((index, element) => {
            $(element).on('blur', (e) => {
                this.validateSections(true);
            });
        });


    }

}

let addonContactCampaign = new AddonContactCampain();
addonContactCampaign.showProgressStatus(true); 

// JQuery $(document).ready function 
$(function() {
    
    addonContactCampaign.init();
    addonContactCampaign.showProgressStatus(false);
    //console.log('Addon loaded');
    
});