const radioInputEls = document.querySelectorAll('input.image-radio');
const imgUrlInputEl = document.querySelector('input.image-url');
const imgFileInputEl = document.querySelector('input.image-file');



radioInputEls.forEach((radioInputEl) => {
    const fileRadio = (radioInputEl.getAttribute('value') === '0');
    const urlRadio = (radioInputEl.getAttribute('value') === '1');

    radioInputEl.addEventListener('click', function(){
        const value = radioInputEl.getAttribute('value');

        // ! '0' = File ; '1' = Url

        // <-- at the beginning none of the radio button is checked and both inputs for image upload are invisible

        // # click on radio label 'File'
        if(value === '0' && imgUrlInputEl.classList.contains('d-none') && imgFileInputEl.classList.contains('d-none')){
            imgFileInputEl.classList.remove('d-none');
        }
        // # click on radio label 'Url'
        else if (value === '1' && imgUrlInputEl.classList.contains('d-none') && imgFileInputEl.classList.contains('d-none')){
            imgUrlInputEl.classList.remove('d-none');
        }
        // # switching
        else if(value === '0' && imgFileInputEl.classList.contains('d-none') && !imgUrlInputEl.classList.contains('d-none')){
            imgFileInputEl.classList.remove('d-none');
            imgUrlInputEl.classList.add('d-none');
        } else if (value === '1' && imgUrlInputEl.classList.contains('d-none') && !imgFileInputEl.classList.contains('d-none')){
            imgFileInputEl.classList.add('d-none');
            imgUrlInputEl.classList.remove('d-none');
        }

    })

    // <-- in case of errors, the input value is populated
    if(imgUrlInputEl.getAttribute('value') !== ''){
        imgFileInputEl.classList.add('d-none');
        imgUrlInputEl.classList.remove('d-none');
    }
})





