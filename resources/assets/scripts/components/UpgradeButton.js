const LEVELS = {
  'monthly_partner': {
    linkText: 'Upgrade to Partner',
    link: '/monthly-partner',
    class: 'UpgradeButton-monthly_partner',
  },
  'yearly_partner': {
    linkText: 'Upgrade to Yearly Partner',
    link: '/yearly-partner',
    class: 'UpgradeButton-yearly_partner',
  },
  'lifetime_partner': {
    linkText: 'Upgrade to Lifetime Partner',
    link: '/lifetime-partner',
    class: 'UpgradeButton-lifetime_partner',
  },
  'coaching': {
    linkText: 'Upgrade to Coaching',
    link: '/coaching',
    class: 'UpgradeButton-coaching',
  },
}

export default class UpgradeButton {
  constructor(menuItem) {
    init(menuItem)
  }
}

function init(menuItem) {
  const nextLevel = getNextLevel()

  if ( !( nextLevel in LEVELS ) ) {
    return
  }

  const menuLink = menuItem.querySelector('a')
  menuItem.classList.add(LEVELS[nextLevel].class)
  menuLink.textContent = LEVELS[nextLevel].linkText
  menuLink.setAttribute('href', LEVELS[nextLevel].link)
}

function getNextLevel() {
  const body = document.querySelector('body')
  let nextLevel
  if ( 'nextLevel' in body.dataset ) {
    nextLevel = body.dataset.nextLevel
  } else {
    nextLevel = ''
  }
  return nextLevel
}