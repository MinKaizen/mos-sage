const newClasses = [
  {
    selector: '.gform_wrapper',
    newClass: 'mpd-FormWrapper',
  },
  {
    selector: '.gform_wrapper form',
    newClass: 'mpd-Form',
  },
  {
    selector: '.gform_body',
    newClass: 'mpd-Body',
  },
  {
    selector: '.gform_fields',
    newClass: 'mpd-Fields',
  },
  {
    selector: '.gfield',
    newClass: 'mpd-Field',
  },
  {
    selector: '.gfield:last-child',
    newClass: 'mpd-Field-consent',
  },
  {
    selector: '.gfield_label',
    newClass: 'mpd-Label',
  },
  {
    selector: '.ginput_complex label',
    newClass: 'mpd-SubLabel',
  },
  {
    selector: '.gfield_description',
    newClass: 'mpd-Description',
  },
  {
    selector: '.ginput_container',
    newClass: 'mpd-InputContainer',
  },
  {
    selector: '.ginput_container_name',
    newClass: 'mpd-InputContainer-name',
  },
  {
    selector: '.ginput_container_name .name_first',
    newClass: 'mpd-InputContainer-first-name',
  },
  {
    selector: '.ginput_container_name .name_last',
    newClass: 'mpd-InputContainer-last-name',
  },
  {
    selector: '.ginput_container_email',
    newClass: 'mpd-InputContainer-email',
  },
  {
    selector: '.ginput_container_website',
    newClass: 'mpd-InputContainer-website',
  },
  {
    selector: '.ginput_container input',
    newClass: 'mpd-Input',
  },
  {
    selector: '.ginput_container_name .name_first input',
    newClass: 'mpd-Input-first-name',
  },
  {
    selector: '.ginput_container_name .name_last input',
    newClass: 'mpd-Input-last-name',
  },
  {
    selector: '.ginput_container_email input',
    newClass: 'mpd-Input-email',
  },
  {
    selector: '.ginput_container_website input',
    newClass: 'mpd-Input-website',
  },
  {
    selector: '.gform_footer',
    newClass: 'mpd-Footer',
  },
  {
    selector: '.gform_footer .gform_button',
    newClass: 'mpd-Submit',
  },
]

export default class ProfileDetails {
  constructor(detailsElement) {
    main(detailsElement)
  }
}

async function main(detailsElement) {
  Promise.all(newClasses.map(async (item) =>{
    injectClass(detailsElement, item)
  }))
}

async function injectClass(detailsElement, item) {
  detailsElement.querySelectorAll(item.selector).forEach(async (element) => {
    element.classList.add(item.newClass)
  })
  console.log(item.selector)
}
