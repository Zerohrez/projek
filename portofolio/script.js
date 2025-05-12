const form = document.getElementById('contact-form');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const messageInput = document.getElementById('message');
const nameError = document.getElementById('name-error');
const emailError = document.getElementById('email-error');
const messageError = document.getElementById('message-error');
const successMessage = document.querySelector('.success-message');


function validateForm(event) {
  event.preventDefault(); 

  let isValid = true;

  nameError.textContent = '';
  emailError.textContent = '';
  messageError.textContent = '';
  successMessage.textContent = '';


  if (nameInput.value.trim() === '') {
    nameError.textContent = 'Nama lengkap tidak boleh kosong';
    isValid = false;
  }


  const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  if (!emailRegex.test(emailInput.value.trim())) {
    emailError.textContent = 'Masukkan email yang valid';
    isValid = false;
  }

  if (messageInput.value.trim() === '') {
    messageError.textContent = 'Pesan tidak boleh kosong';
    isValid = false;
  }


  if (isValid) {
    successMessage.textContent = 'Terima kasih! Pesan Anda telah terkirim.';
    form.reset(); 
  }
}


form.addEventListener('submit', validateForm);
