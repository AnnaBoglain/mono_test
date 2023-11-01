import './bootstrap';
import IMask from 'imask';
// Считываем поле ввода
let phoneInput = document.querySelector('.tel');
// Считываем кнопку
//let btn = document.querySelector(".btn");

// Создаем маску в инпуте
const phoneMask = new IMask(phoneInput, {
    mask: "+{7}(000)000-00-00",
});

// Обработчик события для инпута
// phoneInput.addEventListener("input", phoneInputHandler);
// Обработчик события для кнопки
//btn.addEventListener("click", btnHandler);

// IMask(
//     document.getElementById('phone'),
//     {
//         mask: '+{7}(000)000-00-00'
//     }
// )


