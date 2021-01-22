const sidebarSelector = '.ldsb-Sidebar'
const sidebarToggleClass = 'ldsb-Sidebar-active'
const selfToggleClass = 'ldsbt-SidebarToggle-active'

export default class SidebarToggle {
  constructor(element) {
    main(element)
  }
}

async function main(element) {
  element.addEventListener('click', () => {
    toggleSelf(element)
    toggleSidebar()
  })
}

async function getSidebar() {
  const sideBar = document.querySelector(sidebarSelector)
  return sideBar
}

async function toggleSidebar() {
  const sideBar = await getSidebar()
  sideBar.classList.toggle(sidebarToggleClass)
}

async function toggleSelf(element) {
  element.classList.toggle(selfToggleClass)
}
