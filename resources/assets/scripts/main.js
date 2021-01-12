// Routes
import home from './routes/home'

// Components
import ClassToggler from './components/ClassToggler'
import MobileNav_Menu from './components/MobileNav_Menu'
import UpgradeButton from './components/UpgradeButton'

// Define routes
const routes = [
  {
    class: home,
    bodyClass: '.home',
  },
]

// Define components
const components = [
  {
    class: ClassToggler,
    selector: '.js-ClassToggler',
  },
  {
    class: UpgradeButton,
    selector: '.js-UpgradeButton',
  },
  {
    class: MobileNav_Menu,
    selector: '.glbl-MobileNav_Menu',
  },
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
