export default class MobileNav_Menu {
  constructor(navElement) {
    const parentMenuItems = navElement.querySelectorAll('.glbl-MobileNav_Menu > .menu-item-has-children')
    parentMenuItems.forEach(menuItem => {
      menuItem.addEventListener('click', (event) => {
        event.preventDefault()
        const subMenu = menuItem.querySelector('.sub-menu')
        subMenu.classList.toggle('is-Active')
      })
    })
  }
}