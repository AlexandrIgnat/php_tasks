const form = document.getElementById('form');
const validation = new JustValidate('#form');
const btn = document.querySelector('.btn');

validation
  .addField('.input-name', [
    {
      rule: 'minLength',
      value: 4,
    },
    {
      rule: 'maxLength',
      value: 30,
    },
    {
      rule: 'required',
      value: true,
      errorMessage: 'Введите имя!'
    }
  ])
  .addField('.input-mail', [
    {
      rule: 'required',
      value: true,
      errorMessage: 'Email обязателен',
    },
    {
      rule: 'email',
      value: true,
      errorMessage: 'Введите корректный Email',
    },
  ])
  .addField('.input-text', [
    {
      rule: 'required',
      errorMessage: 'Comment is required',
    },
    {
      rule: 'minLength',
      value: 20,
    },
  ])
  .onSuccess((event) => {
    // console.log('Validation passes and form submitted', event);

    // let formData = new FormData(event.target);

    // let xhr = new XMLHttpRequest();

    // xhr.open('POST', 'handler.php');
    // xhr.onreadystatechange = function () {
    //   if (xhr.readyState === 4 && xhr.status === 200) {
    //     response.innerHTML = xhr.responseText;
    //     if (response.innerHTML == 'Вход выполнен успешно!') {
    //       let form = document.querySelector('.container');
    //       hideElem(form);
    //       response.classList.remove('alert');
    //       btn.textContent = 'Переходи на сайт!';
    //       btn.classList.add('success');
    //     } else {
    //       response.classList.add('alert');
    //     }       
    //   }
    // }
    
    // xhr.send(formData);
    // let form = document.querySelector('.form');
    // form.action = '/handler.php';
    // form.method = 'POST';
    form.submit();
  })