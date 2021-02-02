const newClasses = [
  {
    selector: '.gfield_required',
    newClass: 'gf-Required',
  },
  {
    selector: '.instruction',
    newClass: 'gf-Instruction',
  },
  {
    selector: '.ui-datepicker-calender',
    newClass: 'gf-DatePicker',
  },
  {
    selector: '.gform_wrapper form',
    newClass: 'gf-GravityForm',
  },
  {
    selector: '.gform_body',
    newClass: 'gf-Body',
  },
  {
    selector: '.gform_fields',
    newClass: 'gf-Fields',
  },
  {
    selector: '.gfield',
    newClass: 'gf-Field',
  },
  {
    selector: '.gfield_error',
    newClass: 'gf-Field-error',
  },
  {
    selector: '.gfield.field_sublabel_below',
    newClass: 'gf-Field-label-below',
  },
  {
    selector: '.gfield.field_sublabel_above',
    newClass: 'gf-Field-label-above',
  },
  {
    selector: '.gfield.hidden_label',
    newClass: 'gf-Field-label-hidden',
  },
  {
    selector: '.gfield.field_description_below',
    newClass: 'gf-Field-description-below',
  },
  {
    selector: '.gfield.field_description_above',
    newClass: 'gf-Field-description-above',
  },
  {
    selector: '.gfield.field_visibility_visible',
    newClass: 'gf-Field-visible',
  },
  {
    selector: '.gfield.field_visibility_hidden',
    newClass: 'gf-Field-hidden',
  },
  {
    selector: '.gfield.gfield_contains_required',
    newClass: 'gf-Field-required',
  },
  {
    selector: '.gfield_label',
    newClass: 'gf-Label',
  },
  {
    selector: '.gfield_label.gfield_label_before_complex',
    newClass: 'gf-Label-before-complex',
  },
  {
    selector: '.ginput_complex label',
    newClass: 'gf-SubLabel',
  },
  {
    selector: '.gfield_description',
    newClass: 'gf-Description',
  },
  {
    selector: '.gfield_consent_description',
    newClass: 'gf-Description-consent',
  },
  {
    selector: '.ginput_container',
    newClass: 'gf-InputContainer',
  },
  {
    selector: '.ginput_complex',
    newClass: 'gf-InputContainer-complex',
  },
  {
    selector: '.ginput_container input',
    newClass: 'gf-Input',
  },
  {
    selector: '.ginput_left',
    newClass: 'gf-InputContainer_Left',
  },
  {
    selector: '.ginput_right',
    newClass: 'gf-InputContainer_Right',
  },
  {
    selector: '.gform_footer',
    newClass: 'gf-Footer',
  },
  {
    selector: '.gform_footer .gform_button',
    newClass: 'gf-Submit',
  },
  {
    selector: '.validation_error',
    newClass: 'gf-Error',
  },
  {
    selector: '.validation_message',
    newClass: 'gf-ErrorMessage',
  },
  {
    selector: '.gform_title',
    newClass: 'gf-Title',
  },
  {
    selector: '.gfield_radio',
    newClass: 'gf-Radio',
  },
  {
    selector: '.gfield_radio > li',
    newClass: 'gf-RadioItem',
  },
  {
    selector: '.gfield_checkbox',
    newClass: 'gf-Checkbox',
  },
  {
    selector: '.gfield_checkbox > li',
    newClass: 'gf-CheckboxItem',
  },
  {
    selector: '.gfield_select[multiple="multiple]',
    newClass: 'gf-Select-multi',
  },
  {
    selector: 'select',
    newClass: 'gf-Select',
  },
  {
    selector: 'select option',
    newClass: 'gf-SelectOption',
  },
  {
    selector: '.textarea',
    newClass: 'gf-Textarea',
  },
]

export default class GravityForm {
  constructor(formElement) {
    main(formElement)
  }
}

async function main(formElement) {
  Promise.all(newClasses.map(async (item) =>{
    injectClass(formElement, item)
  }))
}

async function injectClass(formElement, item) {
  formElement.querySelectorAll(item.selector).forEach(async (element) => {
    element.classList.add(item.newClass)
  })
}
