// const USERNAME_INPUT_SELECTOR = '#user_login'
// const PASSWORD_INPUT_SELECTOR = '#user_pass'

main()

async function main() {
  console.log('This is the main function which should be hoisted')
  // injectPlaceholder(USERNAME_INPUT_SELECTOR, 'Username')
  // injectPlaceholder(PASSWORD_INPUT_SELECTOR, 'Password')
  console.log(document.querySelector('body'))
  console.log('end')
}

// async function injectPlaceholder(selector, placeholder) {
//   const element = document.querySelector(selector)
//   element.placeholder = placeholder
// }
