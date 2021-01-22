// Routes
import home from './routes/home'

// Components
import AfflinkCopy from './components/AfflinkCopy'
import ClassToggler from './components/ClassToggler'
import MobileNav_Menu from './components/MobileNav_Menu'
import UpgradeButton from './components/UpgradeButton'
import SidebarToggle from './components/SidebarToggle'

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
    class: AfflinkCopy,
    selector: '.js-AfflinkCopy',
  },
  {
    class: ClassToggler,
    selector: '.js-ClassToggler',
  },
  {
    class: SidebarToggle,
    selector: '.js-SidebarToggle',
  },
  {
    class: UpgradeButton,
    selector: '.js-UpgradeButton',
  },
  {
    class: MobileNav_Menu,
    selector: '.mn-Menu',
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
