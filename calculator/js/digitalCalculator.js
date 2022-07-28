//получаем данные из json файла
const calculatorSection = document.querySelector('.calculator-section');
const requestURL = 'https://avvaprint.dev.dice-group.ru/local/templates/avvaprint_tpl/calculator/data/data.json';
const request = new XMLHttpRequest();
const currentUrl = window.location.pathname;
const keyTitle = document.querySelector('.page-welcome__title');

request.open('GET', requestURL);

request.responseType = 'json';
request.send();

const renderCalculator = (data) => {

    calculatorSection.innerHTML = `
        <div class='calculator-section__content _container'>
        <div class='calculator-section__title'>Рассчитать стоимость</div>
        <div class="calculator">
            <div class="calculator__row">
                <div class="calculator__column">
                    <div class="calculator__property property">
                        <div class="property__label">${data.usual_properties[0].name}</div>
                        <div class="property__select">
                            <div class="item-active item-letter">Выберите услугу</div>
                            <div class="property-list hidden">
                                ${data.usual_properties[0].values.map(item => `<div class="property-list__item" data-cost="${item.price}">${item.name}</div>`).join('')}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calculator__column">
                    <div class="calculator__property property">
                        <div class="property__label">${data.usual_properties[1].name}</div>
                        <div class="property__select">
                            <div class="item-active item-size">Выберите услугу</div>
                            <div class="property-list hidden">
                                ${data.usual_properties[1].values.map(item => `<div class="property-list__item" data-cost="${item.price}">${item.name}</div>`).join('')}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calculator__row">
                <div class="calculator__column">
                    <div class="calculator__property property">
                        <div class="property__label">${data.usual_properties[2].name}</div>
                        <div class="property__select">
                            <div class="item-active item-printing">Выберите услугу</div>
                            <div class="property-list hidden">
                                ${data.usual_properties[2].values.map(item => `<div class="property-list__item" data-cost="${item.price}">${item.name}</div>`).join('')}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="calculator__column">
                    <div class="calculator__property property">
                        <div class="property__label">Тираж</div>
                        <div class="property__select">
                            <div class="item-active edition-item">Выберите услугу</div>
                            <div class="property-list hidden">
                                ${data.quantity.map(item => `<div class="property-list__item" data-coefficient="${item.coefficient}" data-quantity="${item.value}">${item.value}</div>`).join('')}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calculator__row">
                <div class="calculator__column--full">
                    <div class="calculator__property additional-property">
                        <div class="property__label">Выберите дополнительные услуги</div>
                        <div class="additional-property__select">
                            <div class="additional-property__active">Дополнительные услуги</div>
                            <div class="additional-property__list hidden additional-property-list">
                            ${data.additional_properties.map(item => `
                                <div class="additional-property-list__row">
                                    <div class="description-text-select">
                                        <input class="description-text__checkbox" type="checkbox">
                                        <div class="description-text__text">
                                            <div class="description-text__title">${item.value}</div>
                                            <div class="description-text__description">${item.value}</div>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <span class="price-value-span">${item.cost}</span> руб. за шт.
                                    </div>
                                </div>
                            `).join('')}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calculator__summary summary">
                <div class="summary__text">
                    <div class="ready-text">Готовность:</div>
                    <div class="total-text">Итоговая сумма:</div>
                </div>
                <div class="summary__value">
                    <div class="ready-value"><span class="ready-value__date"></span> при оформлении заказа сегодня до <span class="ready-value__time"></span></div>
                    <div class="total-value"><span class="total-value__value">0</span> руб.</div>
                </div>
            </div>
            <div class="calculator__buttons">
                <a href="#" class="button-order disabled">Заказать</a>
                <!--                <a href="#" class="button-consultation disabled">Получить консультацию</a>-->
            </div>
        </div>
    </div>
    `;
}

request.onload = function() {
    const data = request.response;

    if (currentUrl.includes('digital_printing')) {
        // console.log(keyTitle.innerText);
        // console.log(currentUrl);

        switch (keyTitle.innerText) {
            case "Визитки":
                // console.log(data.service_digital_printing[0]);
                renderCalculator(data.service_digital_printing[0]);
                break;
            case "Листовки":
                console.log(data.service_digital_printing[1]);
                break;
            case "Буклеты":
                console.log(data.service_digital_printing[2]);
                break;
            case "Наклейки":
                console.log(data.service_digital_printing[3]);
                break;
            default:
                console.log("Значение не определяется " + keyTitle.innerText + ".");
        }

    } else {
        console.log(data.service_interior_printing);
    }
}

setTimeout(() => {
    //Под копотом калькулятора
    const calculatorActiveItem = document.querySelectorAll('.item-active');
    const calculatorSelectMainPropertyList = document.querySelectorAll('.property-list');

    const btnOrder = document.querySelector('.button-order');
    // const btnConsultation = document.querySelector('.button-consultation');
    const totalValue = document.querySelector('.total-value__value');
    const readyValue = document.querySelector('.ready-value');
    const readyValueDate = document.querySelector('.ready-value__date');
    const readyValueTime = document.querySelector('.ready-value__time');

    let propsCost = [
        {propOne: ''},
        {propTwo: ''},
        {propThree: ''},
        {coefficient: ''},
        {quantity: ''},
        {additionalProp: ''},
    ];

    const checkTotalValue = () => {
        if (totalValue.textContent === '0') {
            btnOrder.classList.add('disabled');
            // btnConsultation.classList.add('disabled');
        } else if (Number(totalValue.textContent) > 0) {
            btnOrder.classList.remove('disabled');
            // btnConsultation.classList.remove('disabled');
        }
    }


    const checkReady = () => {
        const now = new Date();

        const arrayRandElement = (arr) => {
            const rand = Math.floor(Math.random() * arr.length);
            return arr[rand];
        }

        const arr = ['19:00', '16:00', '18:00', '17:00'];

        const month = now.getMonth();

        let fMonth = '';

        // Преобразуем месяца
        switch (month)
        {
            case 0: fMonth="января"; break;
            case 1: fMonth="февраля"; break;
            case 2: fMonth="марта"; break;
            case 3: fMonth="апреля"; break;
            case 4: fMonth="мае"; break;
            case 5: fMonth="июня"; break;
            case 6: fMonth="июля"; break;
            case 7: fMonth="августа"; break;
            case 8: fMonth="сентября"; break;
            case 9: fMonth="октября"; break;
            case 10: fMonth="ноября"; break;
            case 11: fMonth="декабря"; break;
        }

        const date = Number(now.getDate() + 1) + ' ' + fMonth;
        const time = arrayRandElement(arr);

        if (totalValue.textContent === '0') {
            readyValue.innerHTML = 'выберите параметры для расчета примерной даты готовности';
        } else {
            readyValue.innerHTML = `<span class="ready-value__date">${date}</span> при оформлении заказа сегодня до <span class="ready-value__time">${time}</span>`;
        }
    }

    const setFinalValue = (value) => {
        totalValue.textContent = value;
        checkReady();
        checkTotalValue();
    }

    const costingWithoutAdditionalServices = (obj) => {
        let additionalProps = obj[5].additionalProp;

        if (additionalProps === '') {
            var newAdditionalProps = 0;
        } else {
            var newAdditionalProps = Number(obj[5].additionalProp);
        }

        const costPerItem = Number(obj[0].propOne) + Number(obj[1].propTwo) + Number(obj[2].propThree) + newAdditionalProps;
        const finalCost = (costPerItem * Number(obj[4].quantity)) / Number(obj[3].coefficient);

        return Math.ceil(finalCost);
    }


    for (let i = 0; i < calculatorActiveItem.length; i++) {
        calculatorActiveItem[i].addEventListener('click', () => {
            calculatorActiveItem[i].classList.toggle('select--opened');
            calculatorSelectMainPropertyList[i].classList.toggle('hidden');

            const calculatorSelectMainPropertyListItem = calculatorActiveItem[i].nextElementSibling.querySelectorAll('.property-list__item');

            for (let j = 0; j < calculatorSelectMainPropertyListItem.length; j++) {
                calculatorSelectMainPropertyListItem[j].addEventListener('click', () => {
                    calculatorSelectMainPropertyListItem[j].parentNode.previousElementSibling.textContent = calculatorSelectMainPropertyListItem[j].textContent;

                    switch (i) {
                        case 0:
                            propsCost[0].propOne = calculatorSelectMainPropertyListItem[j].dataset.cost;
                            break;
                        case 1:
                            propsCost[1].propTwo = calculatorSelectMainPropertyListItem[j].dataset.cost;
                            break;
                        case 2:
                            propsCost[2].propThree = calculatorSelectMainPropertyListItem[j].dataset.cost;
                            break;
                        case 3:
                            propsCost[3].coefficient = calculatorSelectMainPropertyListItem[j].dataset.coefficient;
                            propsCost[4].quantity = calculatorSelectMainPropertyListItem[j].dataset.quantity;
                            calculatorSelectMainPropertyList[i].classList.add('hidden');
                            setFinalValue(costingWithoutAdditionalServices(propsCost));
                            break;
                        default:
                            console.log("Sorry, we are out of " + i + ".");
                    }

                    calculatorActiveItem[i].nextElementSibling.classList.add('hidden');
                });
            }
        });
    }

    let calculatorAdditionalActiveItem = document.querySelector('.additional-property__active');
    const calculatorAdditionalPropertyList = document.querySelector('.additional-property__list');

    calculatorAdditionalActiveItem.addEventListener('click', () => {
        calculatorAdditionalActiveItem.classList.toggle('select--opened');
        calculatorAdditionalPropertyList.classList.toggle('hidden');
    });

    const calculatorAdditionalPropertyListRow = document.querySelectorAll('.additional-property-list__row');
    let additionalProperties = [];

//проверка на пустую строку label доп свойств
    const checkString = (str) => {
        if (str === '') {
            calculatorAdditionalActiveItem.textContent = 'Дополнительные услуги';
        }
    }

//добавление в инпут доп свойств выбранных услуг
    const addPropertiesInTitle = (arr) => {
        const namesOfArr = arr.map(function(name) {
            return name;
        });

        calculatorAdditionalActiveItem.textContent = namesOfArr;
    }

//обработка кликов по инпуту доп свойств
    for (let i = 0; i < calculatorAdditionalPropertyListRow.length; i++) {
        calculatorAdditionalPropertyListRow[i].addEventListener('click', () => {
            if (calculatorAdditionalPropertyListRow[i].querySelector('.description-text__checkbox').hasAttribute('checked')) {
                calculatorAdditionalPropertyListRow[i].querySelector('.description-text__checkbox').removeAttribute('checked');

                const indexValueOfDescriptionTextTitle = additionalProperties.indexOf(calculatorAdditionalPropertyListRow[i].querySelector('.description-text__title').textContent);

                if (indexValueOfDescriptionTextTitle !== -1) {
                    additionalProperties.splice(indexValueOfDescriptionTextTitle, 1);
                }
                addPropertiesInTitle(additionalProperties);

                propsCost[5].additionalProp = '';

                setFinalValue(costingWithoutAdditionalServices(propsCost));
            } else {
                calculatorAdditionalPropertyListRow[i].querySelector('.description-text__checkbox').setAttribute('checked', '');
                additionalProperties.push(calculatorAdditionalPropertyListRow[i].querySelector('.description-text__title').textContent);
                addPropertiesInTitle(additionalProperties);

                propsCost[5].additionalProp = calculatorAdditionalPropertyListRow[i].querySelector('.price-value-span').textContent;

                setFinalValue(costingWithoutAdditionalServices(propsCost));
            }

            calculatorAdditionalActiveItem.classList.remove('select--opened');
            calculatorAdditionalPropertyList.classList.add('hidden');

            checkString(calculatorAdditionalActiveItem.textContent);
        })
    }

    checkReady();

//form
    const modalFormOrderCalculator = document.querySelector('.form-order-calculator');
    const btnCloseFormOrderCalculator = document.querySelector('.form-order-calculator__close');
    const overlayFormOrderCalculator = document.querySelector('.form-order-calculator-overlay');
    const dataList = document.querySelector('.data-list');

    const serviceNameValue = document.querySelector('.service-name-input');
    const paperDensityValue = document.querySelector('.paper-density-input');
    const flyerSizeValue = document.querySelector('.flyer-size-input');
    const fullColorPrintingValue = document.querySelector('.full-color-printing-input');
    const circlationValue = document.querySelector('.circulation-input');
    const addServiceValue = document.querySelector('.add-service-input');
    const priceValue = document.querySelector('.price-input');

    btnOrder.addEventListener('click', (evt) => {
        evt.preventDefault();
        modalFormOrderCalculator.classList.remove('hidden');
        overlayFormOrderCalculator.classList.remove('hidden');

        const itemLetter = document.querySelector('.item-letter'); // Плотность бумаги
        const itemSize = document.querySelector('.item-size'); // Размер
        const itemPrinting = document.querySelector('.item-printing'); // Полноцветная печать
        const editionItem = document.querySelector('.edition-item'); // Тираж

        dataList.innerHTML = `
        <div class="data-list__title">Состав заказа</div>
        <div class="data-list__service">Цифровая печать ${keyTitle.innerText.toLowerCase()}</div>
        <ul class="data-list__list list">
            <li class="list__item">
                Плотность бумаги: ${itemLetter.textContent}
            </li>
            <li class="list__item">
                Размер: ${itemSize.textContent}
            </li>
            <li class="list__item">
                Полноцветная печать: ${itemPrinting.textContent}
            </li>
            <li class="list__item">
                Тираж: ${editionItem.textContent}
            </li>
            <li class="list__item">
                Дополнительные услуги: ${calculatorAdditionalActiveItem.textContent === 'Дополнительные услуги' ? calculatorAdditionalActiveItem.textContent = 'без доп. услуг' : calculatorAdditionalActiveItem.textContent}
            </li>
        </ul>
        <div class="data-list__itog">Стоимость: ${totalValue.textContent} руб.</div>
    `;

        serviceNameValue.value = document.querySelector('.data-list__service').innerText;
        paperDensityValue.value = itemLetter.textContent;
        flyerSizeValue.value = itemSize.textContent;
        fullColorPrintingValue.value = itemPrinting.textContent;
        circlationValue.value = editionItem.textContent;
        addServiceValue.value = calculatorAdditionalActiveItem.textContent === 'Дополнительные услуги' ? calculatorAdditionalActiveItem.textContent = 'без доп. услуг' : calculatorAdditionalActiveItem.textContent;
        priceValue.value = totalValue.textContent;
    });

    btnCloseFormOrderCalculator.addEventListener('click', () => {
        modalFormOrderCalculator.classList.add('hidden');
        overlayFormOrderCalculator.classList.add('hidden');
    });
}, 1500);