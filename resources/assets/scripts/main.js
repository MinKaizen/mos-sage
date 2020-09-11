import jsHello from './components/jsHello'

const components = [
  {
    class: jsHello,
    selector: '.js-hello'
  }
]

components.forEach(component => {
  if (document.querySelector(component.selector)) {
    document.querySelectorAll(component.selector).forEach(element => {
      new component.class(element);
    })
  }
})