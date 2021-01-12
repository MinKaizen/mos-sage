export default class Module_Label {
  constructor(moduleLabelElement) {
    const moduleElement = moduleLabelElement.parentNode
    moduleLabelElement.addEventListener('click', (event) => {
      event.preventDefault()
      moduleElement.classList.toggle('ldnv-Module-active')
    })
  }
}
