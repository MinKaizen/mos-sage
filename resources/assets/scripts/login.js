const USERNAME_INPUT_SELECTOR = '#user_login'
const PASSWORD_INPUT_SELECTOR = '#user_pass'

main()

async function main() {
  injectPlaceholder(USERNAME_INPUT_SELECTOR, 'Username')
  injectPlaceholder(PASSWORD_INPUT_SELECTOR, 'Password')
}

async function injectPlaceholder(selector, placeholder) {
  const element = document.querySelector(selector)
  element.placeholder = placeholder
}
