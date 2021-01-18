export default class MobileNav_Menu {
  constructor(navElement) {
    const parentMenuLinks = navElement.querySelectorAll('.mn-Menu > .menu-item-has-children > a')
    parentMenuLinks.forEach(link => {
      link.addEventListener('click', (event) => {
        event.preventDefault()
        const subMenu = link.parentNode.querySelector('.sub-menu')
        subMenu.classList.toggle('is-Active')
      })
    })
  }
}
