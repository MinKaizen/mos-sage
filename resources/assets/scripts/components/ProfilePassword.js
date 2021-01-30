const newClasses = [
  {
    selector: '.gform_wrapper',
    newClass: 'mpp-FormWrapper',
  },
  {
    selector: '.gform_wrapper form',
    newClass: 'mpp-Form',
  },
  {
    selector: '.gform_body',
    newClass: 'mpp-Body',
  },
  {
    selector: '.gform_fields',
    newClass: 'mpp-Fields',
  },
  {
    selector: '.gfield',
    newClass: 'mpp-Field',
  },
  {
    selector: '.gfield_label',
    newClass: 'mpp-Label',
  },
  {
    selector: '.ginput_complex label',
    newClass: 'mpp-SubLabel',
  },
  {
    selector: '.gfield_description',
    newClass: 'mpp-Description',
  },
  {
    selector: '.ginput_container',
    newClass: 'mpp-InputContainer',
  },
  {
    selector: '.ginput_container span:nth-child(1)',
    newClass: 'mpp-InputContainer-new',
  },
  {
    selector: '.ginput_container span:nth-child(2)',
    newClass: 'mpp-InputContainer-confirm',
  },
  {
    selector: '.ginput_container input',
    newClass: 'mpp-Input',
  },
  {
    selector: '.ginput_container span:nth-child(1) input',
    newClass: 'mpp-Input-new',
  },
  {
    selector: '.ginput_container span:nth-child(2) input',
    newClass: 'mpp-Input-confirm',
  },
  {
    selector: '.gform_footer',
    newClass: 'mpp-Footer',
  },
  {
    selector: '.gform_footer .gform_button',
    newClass: 'mpp-Submit',
  },
]

export default class ProfilePassword {
  constructor(passwordElement) {
    main(passwordElement)
  }
}

async function main(passwordElement) {
  Promise.all(newClasses.map(async (item) =>{
    injectClass(passwordElement, item)
  }))
}

async function injectClass(passwordElement, item) {
  passwordElement.querySelectorAll(item.selector).forEach(async (element) => {
    element.classList.add(item.newClass)
  })
  console.log(item.selector)
}
