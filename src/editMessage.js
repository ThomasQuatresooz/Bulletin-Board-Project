(() => {
  let message;

  let buttons = document.getElementsByClassName('editButton');
  let template = document.getElementsByTagName('template')[0];

  for (let buttonEdit of buttons) {
    let msgContainer = document.getElementById(`${buttonEdit.getAttribute('data-id')}`);

    buttonEdit.addEventListener('click', () => {
      message = msgContainer.innerHTML;

      msgContainer.style.display = 'none';

      let clone = template.content.cloneNode(true);

      let form = clone.querySelectorAll('form')[0];
      form.setAttribute('action', `editMessage.php?id=${buttonEdit.getAttribute('data-id')}`);

      let textarea = clone.querySelectorAll('textarea')[0];
      textarea.innerHTML = message;

      let link = clone.querySelectorAll('a')[0].addEventListener('click', () => {
        clone.style.display = 'none';
      });

      msgContainer.parentElement.appendChild(clone);
    });
  }
})();
