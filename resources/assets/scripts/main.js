import jsHello from './components/jsHello'

// Define components
const components = [
  {
    class: jsHello,
    selector: '.js-hello'
  }
]

// Initialise components
components.forEach(component => {
  if (document.querySelector(component.selector)) {
    document.querySelectorAll(component.selector).forEach(element => {
      new component.class(element);
    })
  }
})