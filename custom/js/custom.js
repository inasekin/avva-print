//modal window
const modal = document.querySelector('.modal-auth');
const bodyEl = document.body;
const productBtnsEl = document.querySelectorAll('.product__btn');

if (modal) {
    const overlay = document.querySelector('.overlay');
    const btnCloseModal = document.querySelector('.close-modal');
    const btnsOpenModal = document.getElementById('openAuthModal');

    const openModal = function (evt) {
        evt.preventDefault();
        modal.classList.remove('hidden');
        overlay.classList.remove('hidden');
        bodyEl.classList.add('no-scroll');
    };

    const closeModal = function () {
        modal.classList.add('hidden');
        overlay.classList.add('hidden');
        bodyEl.classList.remove('no-scroll');
    };

    btnsOpenModal.addEventListener('click', openModal);
    btnCloseModal.addEventListener('click', closeModal);
    overlay.addEventListener('click', closeModal);

    document.addEventListener('keydown', function (evt) {
        if (evt.key === 'Escape') {
            if (!modal.classList.contains('hidden')) {
                closeModal();
            }
        }
    });
}

//forms
const btnCallFormConsultation = document.querySelectorAll('.btn-consultation');
const overlayFormConsultation = document.querySelector('.overlay-modal');
const formConsultation = document.querySelector('.modal-consultation');
const btnCloseFormConsultation = document.querySelector('.close-modal-consultation');

const formOrderService = document.querySelector('.modal-order-service');
const btnCloseOrderService = document.querySelector('.close-order-service');

const btnDesignBuroConsultation = document.getElementById('btnConsultation');
const btnOrderService = document.querySelector('#orderService');

if (btnDesignBuroConsultation) {
    btnDesignBuroConsultation.addEventListener('click', (evt) => {
        evt.preventDefault();
        overlayFormConsultation.classList.remove('hidden');
        formConsultation.classList.remove('hidden');
        bodyEl.classList.add('no-scroll');
    });
}

for (let i = 0; i < btnCallFormConsultation.length; i++) {
    btnCallFormConsultation[i].addEventListener('click', (evt) => {
        evt.preventDefault();
        overlayFormConsultation.classList.remove('hidden');
        formConsultation.classList.remove('hidden');
        bodyEl.classList.add('no-scroll');
    });
}

btnCloseFormConsultation.addEventListener('click', () => {
    overlayFormConsultation.classList.add('hidden');
    formConsultation.classList.add('hidden');
    bodyEl.classList.remove('no-scroll');
})

if (btnOrderService) {
    btnOrderService.addEventListener('click', (evt) => {
        evt.preventDefault();
        formOrderService.classList.remove('hidden');
        overlayFormConsultation.classList.remove('hidden');
        bodyEl.classList.add('no-scroll');
    })

    btnCloseOrderService.addEventListener('click', () => {
        overlayFormConsultation.classList.add('hidden');
        formOrderService.classList.add('hidden');
        bodyEl.classList.remove('no-scroll');
    })
}

//modal
const modalAddedToCart = document.querySelector('.modal-added-to-cart');
const overlayModalAddToCart = document.querySelector('.overlay-cart');
const closeModalAddedToCart = document.querySelector('.close-modal-added-to-cart');
const modalBtnGoBack = document.querySelector('.go-back');

//modal info
const modalInfoTextTitle = document.querySelector('.info-text__title');
const modalInfoTextPrice = document.querySelector('.info-text__price');
const modalInfoImageEl = document.querySelector('.modal-added-to-cart__image');

//product card
const productImageEl = document.querySelectorAll('.product-item-image-original');
const productItemTitleEl = document.querySelectorAll('.product__name');
const productPriceEl = document.querySelectorAll('.product__price');


const openModal = function () {
    modalAddedToCart.classList.remove('hidden');
    overlayModalAddToCart.classList.remove('hidden');
};

const closeModal = function () {
    modalAddedToCart.classList.add('hidden');
    overlayModalAddToCart.classList.add('hidden');
};

for (let i = 0; i < productBtnsEl.length; i++) {
    productBtnsEl[i].addEventListener('click', () => {
        setTimeout(() => {
            const bitrixPopupWindowOverlay = document.querySelector('.popup-window-overlay');
            const bitrixPopupWindow = document.querySelector('.popup-window.popup-window-with-titlebar');
            bitrixPopupWindowOverlay.remove();
            bitrixPopupWindow.remove();
        }, 200);

        let price = productPriceEl[i].innerText;
        let title = productItemTitleEl[i].textContent.trim();
        let image_src = productImageEl[i].attributes[1].nodeValue;

        modalInfoTextPrice.innerText = price;
        modalInfoTextTitle.textContent = title;
        modalInfoImageEl.innerHTML = `<img src="${image_src}" alt="">`;
        openModal();
    });
}

document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        if (!modalAddedToCart.classList.contains('hidden')) {
            closeModal();
        }
    }
});

if (closeModalAddedToCart) {
    closeModalAddedToCart.addEventListener('click', () => closeModal());
    modalBtnGoBack.addEventListener('click', (evt) => {
        evt.preventDefault();
        closeModal();
    });
}

const btnRegistrationModal = document.getElementById('registration-modal');
const modalAuthForm = document.querySelector('.modal-auth--auth');
const modalAuthRegistrationForm = document.querySelector('.modal-auth--registration');

const modalAuthForgot = document.querySelector('.modal-auth--forgot');
const btnModalAuthForgot = document.querySelector('.remember-content__link');

if (btnRegistrationModal) {
    btnRegistrationModal.addEventListener('click', (evt) => {
        evt.preventDefault();
        modalAuthForm.classList.add('hidden');
        modalAuthRegistrationForm.classList.remove('hidden');
        modalAuthRegistrationForm.querySelector('.close-modal').addEventListener('click', () => {
            bodyEl.classList.remove('no-scroll');
            modalAuthRegistrationForm.classList.add('hidden');
            overlay.classList.add('hidden');
        });
    });

    btnModalAuthForgot.addEventListener('click', (evt) => {
        evt.preventDefault();
        modalAuthForm.classList.add('hidden');
        modalAuthForgot.classList.remove('hidden');
        modalAuthForgot.querySelector('.close-modal').addEventListener('click', () => {
            bodyEl.classList.remove('no-scroll');
            modalAuthForgot.classList.add('hidden');
            overlay.classList.add('hidden');
        });
    });
}

const selectTypeForm = document.querySelector('.select-type-form');
const selectTypeFormInput = document.querySelectorAll('.select-type-form__input');
const mainRegisterForm = document.querySelector('.main-register-form');
const mainRegisterFormBackBtn = document.querySelector('.main-register-form__back');
const registerFormBackLogin = document.querySelector('.back-login');
const selectedPersonText = document.querySelector('.selected-person');
const urProperties = document.querySelectorAll('.corporate-property');
let chosenPerson;

for (let i = 0; i < selectTypeFormInput.length; i++) {
    selectTypeFormInput[i].addEventListener('change', () => {
        chosenPerson = selectTypeFormInput[i].getAttribute("value");
        selectTypeForm.classList.add('hidden');
        mainRegisterForm.classList.remove('hidden');
        mainRegisterFormBackBtn.classList.remove('hidden');
        if (selectedPersonText) {
            if (chosenPerson === 'F') {
                selectedPersonText.innerText = 'физическое лицо';

                for (let j = 0; j < urProperties.length; j++) {
                    urProperties[j].classList.add('hidden');
                }
            } else {
                selectedPersonText.innerText = 'юридическое лицо';

                for (let j = 0; j < urProperties.length; j++) {
                    urProperties[j].classList.remove('hidden');
                }
            }
        }
    });
}

if (mainRegisterFormBackBtn) {
    mainRegisterFormBackBtn.addEventListener('click', () => {
        selectTypeForm.classList.remove('hidden');
        mainRegisterForm.classList.add('hidden');
        mainRegisterFormBackBtn.classList.add('hidden');
    });

    registerFormBackLogin.addEventListener('click', () => {
        selectTypeForm.classList.remove('hidden');
        mainRegisterForm.classList.add('hidden');
        mainRegisterFormBackBtn.classList.add('hidden');

        modalAuthRegistrationForm.classList.add('hidden');
        modalAuthForm.classList.remove('hidden');
    })
}

//part of validation

//получаем элементы основного функционала
const btnSendBitrixRegistration = document.querySelector('.buttons__registration_input');
const btnCheckRegistraion = document.getElementById('check-registration');
// const errorReportEl = document.querySelectorAll('error-field'); - поле в которое у нас записывается ошибка
let checkFortmStatus;
const errorSvg = `<svg class="error-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 12C0 5.37321 5.37321 0 12 0C18.6268 0 24 5.37321 24 12C24 18.6268 18.6268 24 12 24C5.37321 24 0 18.6268 0 12ZM2.03571 12C2.03571 17.5018 6.49821 21.9643 12 21.9643C17.5018 21.9643 21.9643 17.5018 21.9643 12C21.9643 6.49821 17.5018 2.03571 12 2.03571C6.49821 2.03571 2.03571 6.49821 2.03571 12ZM11.0909 17.6234C10.8497 17.3823 10.7143 17.0553 10.7143 16.7143C10.7143 16.3733 10.8497 16.0463 11.0909 15.8052C11.332 15.564 11.659 15.4286 12 15.4286C12.341 15.4286 12.668 15.564 12.9091 15.8052C13.1503 16.0463 13.2857 16.3733 13.2857 16.7143C13.2857 17.0553 13.1503 17.3823 12.9091 17.6234C12.668 17.8645 12.341 18 12 18C11.659 18 11.332 17.8645 11.0909 17.6234ZM12.8571 13.5C12.8571 13.6179 12.7607 13.7143 12.6429 13.7143H11.3571C11.2393 13.7143 11.1429 13.6179 11.1429 13.5V6.21429C11.1429 6.09643 11.2393 6 11.3571 6H12.6429C12.7607 6 12.8571 6.09643 12.8571 6.21429V13.5Z" fill="#DA3849"/>
                </svg>`;

if (btnSendBitrixRegistration) {
    //получаем элементы для проверки
    const companyInput = document.querySelector('.company-input'); //наименование компании
    const indexInput = document.querySelector('.index-input'); // индекс
    const numberInput = document.querySelectorAll('.string'); //ИНН и КПП
    const loginInput = document.querySelector('.login-input'); // логин
    const emailInput = document.querySelector('.email-input'); //email
    const nameInput = document.querySelector('.name-input'); // поле Имя
    const telephoneInput = document.querySelector('.telephone-input'); //телефон
    const addressInput = document.querySelector('.address-input'); // адрес
    const cityInput = document.querySelector('.city-input'); // город
    const passwordInput = document.querySelector('.password-input');

//служебные функции

    const isNumber = (obj) => {
        if (/\d/.test(obj.value)) {
            return false; //есть числа
        }
        else {
            if (obj.value === '') {
                return false;
            } else {
                return true; //чисел нет
            }
        }
    }

    const checkIllegalChars = (value) => {
        return /^[a-zA-Z0-9]+$/.test(value); //проверка на запрещенные символы
    }

    const maskOptionsTelephone = {
        mask: '+7(000)000-00-00',
        lazy: false
    }

    const maskTelephone = new IMask(telephoneInput, maskOptionsTelephone);

    const checkForEmptyField = (field) => {
        if (field.value === '') {
            return false;
        } else {
            return true;
        }
    }

    const validateEmail = (email) => {
        const req = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        let address = email.value;
        if (req.test(address) == false) {
            return false;
        } else {
            return true;
        }
    }

    const passedInspection = (element) => {
        element.nextElementSibling.remove();
        console.log(element)
        element.nextElementSibling.classList.add('hidden');
        // element.classList.remove('error-input');
        // element.nextElementSibling.innerText = '';
    }

    const failedPassedInspection = (element, message) => {
        element.nextElementSibling.classList.remove('hidden');
        element.nextElementSibling.innerText = message;
        element.classList.add('error-input');
        element.insertAdjacentHTML('afterend', '<svg class="error-svg" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 12C0 5.37321 5.37321 0 12 0C18.6268 0 24 5.37321 24 12C24 18.6268 18.6268 24 12 24C5.37321 24 0 18.6268 0 12ZM2.03571 12C2.03571 17.5018 6.49821 21.9643 12 21.9643C17.5018 21.9643 21.9643 17.5018 21.9643 12C21.9643 6.49821 17.5018 2.03571 12 2.03571C6.49821 2.03571 2.03571 6.49821 2.03571 12ZM11.0909 17.6234C10.8497 17.3823 10.7143 17.0553 10.7143 16.7143C10.7143 16.3733 10.8497 16.0463 11.0909 15.8052C11.332 15.564 11.659 15.4286 12 15.4286C12.341 15.4286 12.668 15.564 12.9091 15.8052C13.1503 16.0463 13.2857 16.3733 13.2857 16.7143C13.2857 17.0553 13.1503 17.3823 12.9091 17.6234C12.668 17.8645 12.341 18 12 18C11.659 18 11.332 17.8645 11.0909 17.6234ZM12.8571 13.5C12.8571 13.6179 12.7607 13.7143 12.6429 13.7143H11.3571C11.2393 13.7143 11.1429 13.6179 11.1429 13.5V6.21429C11.1429 6.09643 11.2393 6 11.3571 6H12.6429C12.7607 6 12.8571 6.09643 12.8571 6.21429V13.5Z" fill="#DA3849"/>\n                </svg>');
    }

    btnCheckRegistraion.addEventListener('click', (evt) => {
        evt.preventDefault();

        // const clonedNode = companyInput.cloneNode(true);

        if (selectedPersonText.innerText === 'физическое лицо') {
            companyInput.remove();
        }

        if (selectedPersonText.innerText === 'юридическое лицо') {
            if (isNumber(companyInput)) {
                passedInspection(companyInput);
            } else {
                failedPassedInspection(companyInput, 'Уберите цифры или заполните поле');
            }
        }

        if (loginInput.value === '') {
            failedPassedInspection(loginInput, 'Заполните поле');
        } else {
            // passedInspection(loginInput);
        }

        if (loginInput.length <= 3) {
            failedPassedInspection(loginInput, 'Логин должен быть больше 3 символов');
        } else {
            passedInspection(loginInput);
        }

        if (emailInput.value === '' || !validateEmail(emailInput)) {
            failedPassedInspection(emailInput, 'Заполните поле или введите email корректно');
        } else {
            // passedInspection(emailInput);
        }

        if (passwordInput.value === '') {
            failedPassedInspection(passwordInput, 'Заполните поле');
            checkFortmStatus = false;
        } else {
            // passedInspection(passwordInput);
            checkFortmStatus = true;
        }

        if (checkFortmStatus) {
            const loginValue = loginInput.value;

            $.ajax({
                url: '/local/templates/avvaprint_tpl/ajax/login_check.php',
                type: 'post',
                cache: false,
                data: {'login': loginValue},
            }).done(function(data){
                if (data === false)  {
                    failedPassedInspection(loginInput, 'Логин уже используется');
                } else {
                    passedInspection(loginInput);
                    btnSendBitrixRegistration.click();
                }
            }).error(function(){
                console.log('ошибка в ajax');
            });
        } else {
            alert('Исправьте ошибки');
        }


        console.log('конец функции');
    });
}












