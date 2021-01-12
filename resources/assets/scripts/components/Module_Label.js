export default class Module_Label {
  constructor(moduleLabelElement) {
    const lessonsElement = moduleLabelElement.parentNode.querySelector('.ldnv-Module_Lessons')
    moduleLabelElement.addEventListener('click', (event) => {
      event.preventDefault()
      lessonsElement.classList.toggle('is-Active')
    })
  }
}
