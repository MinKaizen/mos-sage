const PARENT_LINKS_SELECTOR = '.mn-Menu_Item-has-children > .mn-Menu_Item_Link'
const SUBMENU_SELECTOR = '.mn-Submenu'
const TOGGLE_CLASS = 'mn-Submenu-active'

export default class MobileNav_Menu {
  constructor(navElement) {
    const parentMenuLinks = navElement.querySelectorAll(PARENT_LINKS_SELECTOR)
    parentMenuLinks.forEach(link => {
      link.addEventListener('click', (event) => {
        event.preventDefault()
        const subMenu = link.parentNode.querySelector(SUBMENU_SELECTOR)
        subMenu.classList.toggle(TOGGLE_CLASS)
      })
    })
  }
}
