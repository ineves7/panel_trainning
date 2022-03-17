/*=========================================================================================
  File Name: auth-register.js
  Description: Auth register js file.
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: PIXINVENT
  Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function() {
    ('use strict');

    var assetsPath = '../../../app-assets/',
        registerMultiStepsWizard = document.querySelector('.register-multi-steps-wizard'),
        pageResetForm = $('.auth-register-form'),
        select = $('.select2'),
        creditCard = $('.credit-card-mask'),
        expiryDateMask = $('.expiry-date-mask'),
        cvvMask = $('.cvv-code-mask'),
        mobileNumberMask = $('.mobile-number-mask'),
        pinCodeMask = $('.pin-code-mask');

    if ($('body').attr('data-framework') === 'laravel') {
        assetsPath = $('body').attr('data-asset-path');
    }

    // jQuery Validation
    // --------------------------------------------------------------------
    if (pageResetForm.length) {
        pageResetForm.validate({
            /*
            * ? To enable validation onkeyup
            onkeyup: function (element) {
              $(element).valid();
            },*/
            /*
            * ? To enable validation on focusout
            onfocusout: function (element) {
              $(element).valid();
            }, */
            rules: {
                'name': {
                    required: true
                },
                'email': {
                    required: true,
                    email: true
                },
                'password': {
                    required: true
                }
            }
        });
    }

    // multi-steps registration
    // --------------------------------------------------------------------

    // Horizontal Wizard
    if (typeof registerMultiStepsWizard !== undefined && registerMultiStepsWizard !== null) {
        var numberedStepper = new Stepper(registerMultiStepsWizard),
            $form = $(registerMultiStepsWizard).find('form');
        $form.each(function() {
            var $this = $(this);
            $this.validate({
                rules: {
                    name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    'confirm-password': {
                        required: true,
                        minlength: 8,
                        equalTo: '#password'
                    },
                    'full-name': {
                        required: true
                    },
                },
                messages: {
                    password: {
                        required: 'Digite uma nova Senha',
                        minlength: 'Digite pelo menos 8 caracteres'
                    },
                    'confirm-password': {
                        required: 'Por favor confirme sua nova Senha',
                        minlength: 'Digite pelo menos 8 caracteres',
                        equalTo: 'A senhas não são iguais'
                    }
                }
            });
        });

        $(registerMultiStepsWizard)
            .find('.btn-next')
            .each(function() {
                $(this).on('click', function(e) {
                    numberedStepper.next();
                });
            });

        $(registerMultiStepsWizard)
            .find('.btn-prev')
            .on('click', function() {
                numberedStepper.previous();
            });

        $(registerMultiStepsWizard)
            .find('.btn-submit')
            .on('click', function() {
                var isValid = $(this).parent().siblings('form').valid();
                if (isValid) {
                    alert('Enviado!!');
                }
            });
    }

    // select2
    select.each(function() {
        var $this = $(this);
        $this.wrap('<div class="position-relative"></div>');
        $this.select2({
            // the following code is used to disable x-scrollbar when click in select input and
            // take 100% width in responsive also
            dropdownAutoWidth: true,
            width: '100%',
            dropdownParent: $this.parent()
        });
    });

    // credit card

    // Credit Card
    if (creditCard.length) {
        creditCard.each(function() {
            new Cleave($(this), {
                creditCard: true,
                onCreditCardTypeChanged: function(type) {
                    const elementNodeList = document.querySelectorAll('.card-type');
                    if (type != '' && type != 'unknown') {
                        //! we accept this approach for multiple credit card masking
                        for (let i = 0; i < elementNodeList.length; i++) {
                            elementNodeList[i].innerHTML =
                                '<img src="' + assetsPath + 'images/icons/payments/' + type + '-cc.png" height="24"/>';
                        }
                    } else {
                        for (let i = 0; i < elementNodeList.length; i++) {
                            elementNodeList[i].innerHTML = '';
                        }
                    }
                }
            });
        });
    }

    // Expiry Date Mask
    if (expiryDateMask.length) {
        new Cleave(expiryDateMask, {
            date: true,
            delimiter: '/',
            datePattern: ['m', 'y']
        });
    }

    // CVV
    if (cvvMask.length) {
        new Cleave(cvvMask, {
            numeral: true,
            numeralPositiveOnly: true
        });
    }

    // phone number mask
    if (mobileNumberMask.length) {
        new Cleave(mobileNumberMask, {
            phone: true,
            phoneRegionCode: 'BR'
        });
    }

    // Pincode
    if (pinCodeMask.length) {
        new Cleave(pinCodeMask, {
            delimiter: '',
            numeral: true
        });
    }

    // multi-steps registration
    // --------------------------------------------------------------------
});