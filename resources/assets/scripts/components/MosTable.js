const $ = require('jquery');
require( 'datatables.net-dt' );
require( 'datatables.net-buttons-dt' );
require( 'datatables.net-buttons/js/buttons.html5.js' );

const OPTIONS = {
  dom: '<"dt-Top"Bf><"dt-TableWrapper"rt><"dt-Bottom"lp>',
  buttons: [
    {
      extend: 'csv',
      text: 'Export All',
      className: 'dt-Button',
    },
  ],
  language: {
    emptyTable: '(No data)',
    searchPlaceholder: 'Search',
    search: '',
    lengthMenu: 'Show <select>'+
      '<option value="10">10</option>'+
      '<option value="50">50</option>'+
      '<option value="100">100</option>'+
      '<option value="-1">All</option>'+
      '</select> rows',
    paginate: {
      'next': '>>',
      'previous': '<<',
    },
  },
}

const CUSTOM_CLASSES = [
  {
    selector: '.dataTables_filter',
    newClass: 'dt-Filter',
  },
  {
    selector: '.dataTables_filter label',
    newClass: 'dt-Filter_Label',
  },
  {
    selector: '.dataTables_filter input',
    newClass: 'dt-Filter_Input',
  },
  {
    selector: '.dt-buttons',
    newClass: 'dt-Buttons',
  },
  {
    selector: '.dataTables_length',
    newClass: 'dt-Length',
  },
  {
    selector: '.dataTables_length label',
    newClass: 'dt-Length_Label',
  },
  {
    selector: '.dataTables_length select',
    newClass: 'dt-Length_Select',
  },
  {
    selector: '.dataTables_length select option',
    newClass: 'dt-Length_Option',
  },
  {
    selector: '.dataTables_paginate',
    newClass: 'dt-Pagination',
  },
  {
    selector: '.dataTables_paginate span',
    newClass: 'dt-Pagination_Numbers',
  },
  {
    selector: '.dataTables_paginate .paginate_button',
    newClass: 'dt-Pagination_Button',
  },
  {
    selector: '.dataTables_paginate span .paginate_button',
    newClass: 'dt-Pagination_Button-number',
  },
  {
    selector: '.dataTables_paginate .paginate_button.previous',
    newClass: 'dt-Pagination_Button-prev',
  },
  {
    selector: '.dataTables_paginate .paginate_button.next',
    newClass: 'dt-Pagination_Button-next',
  },
  {
    selector: '.dataTables_paginate .paginate_button.current',
    newClass: 'dt-Pagination_Button-current',
  },
]

export default class MosTable {
  constructor(element) {
    main(element)
  }
}

async function main(element) {
  initDataTables(element, OPTIONS)
  .then(() => {
    Promise.all(CUSTOM_CLASSES.map(customClass))
  })
}

async function initDataTables(element, options) {
  $(element).DataTable(options)
}

async function customClass(item) {
  $(item.selector).addClass(item.newClass)
}
