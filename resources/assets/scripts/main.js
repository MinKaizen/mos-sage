// Autoload
import autoload from './autoload'

// Routes
import home from './routes/home'

// Components
import jsHello from './components/jsHello'

// Define routes
const routes = [
  {
    class: home,
    bodyClass: '.home'
  }
]

// Define components
const components = [
  {
    class: jsHello,
    selector: '.js-hello'
  }
]

// Initialise routes
routes.forEach(route => {
  if (document.querySelector(route.bodyClass)) {
    route.class.run();
  }
})

// Initialise components
components.forEach(component => {
  if (document.querySelector(component.selector)) {
    document.querySelectorAll(component.selector).forEach(element => {
      new component.class(element);
    })
  }
})