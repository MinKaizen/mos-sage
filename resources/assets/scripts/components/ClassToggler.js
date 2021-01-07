export default class ClassToggler {
  constructor(element) {
    const targetElement = document.querySelector(element.dataset.targetSelector)
    const toggleClass = element.dataset.toggleClass
    element.addEventListener('click', () => {
      console.log(`${toggleClass}, ${targetElement}`)
      console.log(targetElement)
      targetElement.classList.toggle(toggleClass)
    })
  }
}