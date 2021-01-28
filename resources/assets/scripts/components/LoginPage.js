const NEW_CLASSES = [
  {
    selector: '.gfield_checkbox label',
    newClass: 'lg-Checkbox_Label',
  },
  {
    selector: '.gfield_checkbox input',
    newClass: 'lg-Checkbox_Check',
  },
  {
    selector: '.gfield_checkbox li',
    newClass: 'lg-Checkbox_Inner',
  },
  {
    selector: '.gfield_checkbox',
    newClass: 'lg-Checkbox',
  },
  {
    selector: '.gfield:nth-child(1) input',
    newClass: [
      'lg-Input',
      'lg-Input-username',
    ],
  },
  {
    selector: '.gfield:nth-child(2) input',
    newClass: [
      'lg-Input',
      'lg-Input-password',
    ],
  },
  {
    selector: '.gfield:nth-child(3) input',
    newClass: [
      'lg-Input',
      'lg-Input-remember',
    ],
  },
  {
    selector: '.gfield:nth-child(1) .ginput_container',
    newClass: [
      'lg-InputContainer',
      'lg-InputContainer-username',
    ],
  },
  {
    selector: '.gfield:nth-child(2) .ginput_container',
    newClass: [
      'lg-InputContainer',
      'lg-InputContainer-password',
    ],
  },
  {
    selector: '.gfield:nth-child(3) .ginput_container',
    newClass: [
      'lg-InputContainer',
      'lg-InputContainer-remember',
    ],
  },
  {
    selector: '.gfield:nth-child(1)',
    newClass: [
      'lg-Field',
      'lg-Field-username',
    ],
  },
  {
    selector: '.gfield:nth-child(2)',
    newClass: [
      'lg-Field',
      'lg-Field-password',
    ],
  },
  {
    selector: '.gfield:nth-child(3)',
    newClass: [
      'lg-Field',
      'lg-Field-remember',
    ],
  },
  {
    selector: '.gf_login_form',
    newClass: 'lg-LoginWrapper',
  },
  {
    selector: 'form',
    newClass: 'lg-LoginForm',
  },
  {
    selector: '.gform_body',
    newClass: 'lg-Body',
  },
  {
    selector: '.gform_footer',
    newClass: 'lg-Footer',
  },
  {
    selector: '.gform_fields',
    newClass: 'lg-Fields',
  },
  {
    selector: '.gfield_error',
    newClass: 'lg-Field-error',
  },
  {
    selector: '.gfield_label',
    newClass: 'lg-Label',
  },
  {
    selector: '.validation_message',
    newClass: 'lg-Error',
  },
  {
    selector: '.gform_button[type="submit"]',
    newClass: 'lg-Submit',
  },
  {
    selector: '.gf_login_links a:nth-child(1)',
    newClass: [
      'lg-Link',
      'lg-Link-signup',
    ],
  },
  {
    selector: '.gf_login_links a:nth-child(3)',
    newClass: [
      'lg-Link',
      'lg-Link-reset',
    ],
  },
  {
    selector: '.gf_login_links',
    newClass: 'lg-Links',
  },
]

export default class LoginPage {
  constructor(loginPageElement) {
    main()
    this.bodyElement = loginPageElement
  }
}

async function main() {
  Promise.all(NEW_CLASSES.map(injectClass))
}

async function injectClass(item) {
  const elements = document.querySelectorAll(item.selector)
  elements.forEach(element => {
    element.removeAttribute('class')
    if (Array.isArray(item.newClass)) {
      item.newClass.forEach(className => {
        element.classList.add(className)
      })
    } else if ((typeof item.newClass) == 'string') {
      element.classList.add(item.newClass)
    }
  })
}
