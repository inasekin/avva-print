//получаем данные из json файла
const calculatorSectionInterior = document.querySelector('.calculator-section-interior');
const requestURL = 'https://avvaprint.dev.dice-group.ru/local/templates/avvaprint_tpl/calculator/data/data.json';
const request = new XMLHttpRequest();
const currentUrl = window.location.pathname;
const keyTitle = document.querySelector('.page-welcome__title');
let formulaLimits;

request.open('GET', requestURL);

request.responseType = 'json';
request.send();

const renderCalculator = (data) => {

    calculatorSectionInterior.innerHTML = `
    <div class='calculator-section__content _container'>
        <div class='calculator-section__title'>Рассчитать стоимость</div>
        <div class="calculator">
            <div class="calculator__row">
                <div class="calculator__column">
                    <div class="calculator__property property">
                        <div class="property__label">Тип материала</div>
                        <div class="property__select">
                            <div class="item-active item-letter">Выберите материал</div>
                            <div class="property-list hidden">
                                ${data.material_types.map(item => `<div class="property-list__item">${item}</div>`).join('')}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="calculator__row">
                <div class="calculator__column">
                    <div class="calculator__property property">
                        <div class="property__label">Длина (метры)</div>
                        <div class="property__input input" style="margin-right: 30px;">
                             <input type="number" placeholder="Введите длину" class="input__length blocked">
                        </div>
                    </div>
                </div>
                <div class="calculator__column">
                    <div class="calculator__property property">
                        <div class="property__label">Ширина (метры)</div>
                        <div class="property__input input">
                            <input type="number" placeholder="Введите ширину" class="input__width blocked">
                        </div>
                    </div>
                </div>
            </div>
            <div class="explanation">
                *Стоимость зависит от кол-ва заказанных вами кв.м. <br/>
                *Сначала выберите тип материала <br/>
                *Стоимость пересчитается после изменения поля ширина
            </div>
            
            <div class="calculator__row additional-props-row">
                <div class="calculator__column--full">
                    <div class="calculator__property additional-property">
                        <div class="property__label">Выберите дополнительные услуги</div>
                        <div class="additional-property__select blocked">
                            <div class="additional-property__active">Дополнительные услуги</div>
                            <div class="additional-property__list hidden additional-property-list">
                                ${data.additional_properties.map(item => `
                                    <div class="additional-property-list__row">
                                        <div class="description-text-select">
                                            <input class="description-text__checkbox" type="checkbox">
                                            <div class="description-text__text">
                                                <div class="description-text__title">${item.name}</div>
                                                <div class="description-text__description">${item.name}</div>
                                            </div>
                                        </div>
                                        <div class="price">
                                            <span class="price-value-span">${item.price}</span> руб. за кв.м.
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

    if (currentUrl.includes('interior_printing')) {
        // console.log(keyTitle.innerText);
        // console.log(currentUrl);
        switch (keyTitle.innerText) {
            case "Холсты":
                renderCalculator(data.service_interior_printing[0]);
                formulaLimits = data.service_interior_printing[0].floor_area_price[0];
                const additionalPropsRow = document.querySelector('.additional-props-row');
                if (data.service_interior_printing[0].additional_properties.length === 0) {
                    additionalPropsRow.remove();
                }
                break;
            case "Баннеры":
                renderCalculator(data.service_interior_printing[1]);
                formulaLimits = data.service_interior_printing[1].floor_area_price[0];
                break;
            case "Постеры":
                console.log(data.service_interior_printing[2]);
                renderCalculator(data.service_interior_printing[2]);
                formulaLimits = data.service_interior_printing[2].floor_area_price;

                if (data.service_interior_printing[2].additional_properties.length === 0) {
                    document.querySelector('.additional-props-row').remove();
                }
                break;
            case "Пленка":
                console.log(data.service_interior_printing[3]);
                renderCalculator(data.service_interior_printing[3]);
                formulaLimits = data.service_interior_printing[3].floor_area_price;

                if (data.service_interior_printing[3].additional_properties.length === 0) {
                    additionalPropsRow.remove();
                }
                break;
            case "Пластик":
                renderCalculator(data.service_interior_printing[4]);
                formulaLimits = data.service_interior_printing[4].floor_area_price[0];

                if (data.service_interior_printing[4].additional_properties.length === 0) {
                    setTimeout(() => {
                        document.querySelector('.additional-props-row').remove();
                    }, 1000);
                }
                break;
            case "Бэклит":
                renderCalculator(data.service_interior_printing[5]);
                formulaLimits = data.service_interior_printing[5].floor_area_price[0];

                if (data.service_interior_printing[5].additional_properties.length === 0) {
                    setTimeout(() => {
                        document.querySelector('.additional-props-row').remove();
                    }, 1000);
                }
                break;
            default:
                console.log("Значение не определяется " + keyTitle.innerText + ".");
        }

    } else {
        console.log(data.service_interior_printing);
    }
}

setTimeout(() => {
    const propertySelect = document.querySelector('.property__select');
    const propertySelectItem = document.querySelector('.item-active');
    const propertyList = document.querySelector('.property-list');
    const propertyListItems = document.querySelectorAll('.property-list__item');
    const totalValue = document.querySelector('.total-value__value');
    const readyValue = document.querySelector('.ready-value');
    const readyValueDate = document.querySelector('.ready-value__date');
    const readyValueTime = document.querySelector('.ready-value__time');
    const btnOrder = document.querySelector('.button-order');

    const formOrderCalculator = document.querySelector('.form-order-calculator');
    const formOrderCalculatorOverlay = document.querySelector('.form-order-calculator-overlay');
    const btnFormOrderCalculatorClose = document.querySelector('.form-order-calculator__close');

    const inputLength = document.querySelector('.input__length');
    const inputWidth = document.querySelector('.input__width');
    let lengthValue;
    let widthValue;
    let finalCost;

    const dataList = document.querySelector('.data-list-interior');

    let calculatorAdditionalActiveItem = document.querySelector('.additional-property__active');
    const calculatorAdditionalPropertyList = document.querySelector('.additional-property__list');
    const additionalPropertySelect = document.querySelector('.additional-property__select');

    const calculatorAdditionalPropertyListRow = document.querySelectorAll('.additional-property-list__row');
    const priceValueSpan = document.querySelectorAll('.price-value-span');

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

        const date = Number(now.getDate() + 2) + ' ' + fMonth;
        const time = arrayRandElement(arr);

        if (totalValue.textContent === '0') {
            readyValue.innerHTML = 'выберите параметры для расчета примерной даты готовности';
        } else {
            readyValue.innerHTML = `<span class="ready-value__date">${date}</span> при оформлении заказа сегодня до <span class="ready-value__time">${time}</span>`;
        }
    }

    if (currentUrl.includes('posters')) {
        let cords = ['scrollX','scrollY'];
        window.addEventListener('unload', e => cords.forEach(cord => localStorage[cord] = window[cord]));
        window.scroll(...cords.map(cord => localStorage[cord]));
    }

    if (propertySelect) {
        propertySelect.addEventListener('click', () => {
            propertySelectItem.classList.toggle('select--opened');
            propertyList.classList.toggle('hidden');

            for (let i = 0; i < propertyListItems.length; i++) {
                propertyListItems[i].addEventListener('click', () => {
                    propertySelectItem.innerText = propertyListItems[i].innerText;
                    inputLength.classList.remove('blocked');
                    inputWidth.classList.remove('blocked');

                    if (additionalPropertySelect) {
                        additionalPropertySelect.classList.remove('blocked');
                    }

                    if (inputWidth.value) {
                        window.location.reload();
                    }

                    if (currentUrl.includes('posters') || currentUrl.includes('self-adhesive-tape')) {
                        formulaLimits = formulaLimits[i];
                        console.log(formulaLimits);
                    }
                })
            }
        });
    }

    if (calculatorAdditionalActiveItem) {
        calculatorAdditionalActiveItem.addEventListener('click', () => {
            calculatorAdditionalActiveItem.classList.toggle('select--opened');
            calculatorAdditionalPropertyList.classList.toggle('hidden');
        });
    }

    const сalculateArea = (length, width) => {
        return length * width;
    }

    if (inputWidth) {
        inputWidth.addEventListener('change', () => {
            const calcArea = сalculateArea(Number(inputLength.value), Number(inputWidth.value));
            let costPerMeter;
            console.log(calcArea); //кол-во квадртаных метров, которое мы получили
            console.log(formulaLimits); //условия

            for (let i = 0; i < formulaLimits.length; i++) {
                if (formulaLimits[i].meters === 10) {
                    if (calcArea <= 10) {
                        costPerMeter = formulaLimits[i].price;
                    }
                }

                if (formulaLimits[i].meters === 50) {
                    if (10 < calcArea || calcArea >= 50) {
                        costPerMeter = formulaLimits[i].price;
                    }
                }

                if (formulaLimits[i].meters === 100) {
                    if (calcArea > 100 || 50 < calcArea) {
                        costPerMeter = formulaLimits[i].price;
                    }
                }
            }
            console.log(costPerMeter);

            finalCost = Number(costPerMeter) * Number(calcArea);

            totalValue.innerText = finalCost;

            if (finalCost) {
                checkReady();
                btnOrder.classList.remove('disabled');
            }
        })
    }

    const getPriceWithAdds = (cost, adds) => {
        cost = (adds * сalculateArea(Number(inputLength.value), Number(inputWidth.value))) + cost;
        totalValue.innerText = cost;
    }

    const removePriceWithAdds = (cost, adds) => {
        cost = cost - (adds * сalculateArea(Number(inputLength.value), Number(inputWidth.value)));
        totalValue.innerText = cost;
    }

    for (let i = 0; i < calculatorAdditionalPropertyListRow.length; i++) {
        calculatorAdditionalPropertyListRow[i].addEventListener('click', () => {
            if (calculatorAdditionalPropertyListRow[i].querySelector('.description-text__checkbox').hasAttribute('checked')) {
                calculatorAdditionalPropertyListRow[i].querySelector('.description-text__checkbox').removeAttribute('checked');
                removePriceWithAdds(Number(totalValue.textContent), Number(priceValueSpan[i].textContent));
            } else {
                calculatorAdditionalPropertyListRow[i].querySelector('.description-text__checkbox').setAttribute('checked', '');
                getPriceWithAdds(Number(totalValue.textContent), Number(priceValueSpan[i].textContent));
            }
            calculatorAdditionalActiveItem.classList.remove('select--opened');
            calculatorAdditionalPropertyList.classList.add('hidden');
        });
    }

    const openOrderModal = (evt) => {
        evt.preventDefault();
        formOrderCalculator.classList.remove('hidden');
        formOrderCalculatorOverlay.classList.remove('hidden');

        dataList.innerHTML = `
        <div class="data-list__title">Состав заказа</div>
        <div class="data-list__service" style="margin-bottom: 20px">Интерьерная печать ${keyTitle.innerText.toLowerCase()}</div>
        <ul class="data-list__list list">
            <li class="list__item">
                Тип материала: ${propertySelectItem.textContent}
            </li>
            <li class="list__item">
                Длина: ${inputLength.value}
            </li>
            <li class="list__item">
                Ширина: ${inputWidth.value}
            </li>
        </ul>
        <div class="data-list__itog">Стоимость: ${totalValue.textContent} руб.</div>
        `;
    }

    const closeOrderModal = () => {
        formOrderCalculator.classList.add('hidden');
        formOrderCalculatorOverlay.classList.add('hidden');
    }

    if (btnOrder) {
        btnOrder.addEventListener('click', (evt) => {
            openOrderModal(evt);
        });

        btnFormOrderCalculatorClose.addEventListener('click', () => {
            closeOrderModal();
        });
    }

}, 1000);