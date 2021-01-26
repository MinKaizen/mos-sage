const $ = require('jquery');
require( 'datatables.net-dt' );
require( 'datatables.net-buttons-dt' );
require( 'datatables.net-buttons/js/buttons.html5.js' );

const options = {
  dom: '<"dt-Top"Bf>rt<"dt-Bottom"lp>',
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

export default class MosTable {
  constructor(element) {
    $(element).DataTable(options)
    $('.dataTables_filter').addClass('dt-Filter')
    $('.dataTables_filter label').addClass('dt-Filter_Label')
    $('.dataTables_filter input').addClass('dt-Filter_Input')
    $('.dt-buttons').addClass('dt-Buttons')
    $('.dataTables_length').addClass('dt-Length')
    $('.dataTables_length label').addClass('dt-Length_Label')
    $('.dataTables_length select').addClass('dt-Length_Select')
    $('.dataTables_length select option').addClass('dt-Length_Option')
    $('.dataTables_paginate').addClass('dt-Pagination')
    $('.dataTables_paginate span').addClass('dt-Pagination_Numbers')
    $('.dataTables_paginate .paginate_button').addClass('dt-Pagination_Button')
    $('.dataTables_paginate .paginate_button.previous').addClass('dt-Pagination_Button-prev')
    $('.dataTables_paginate .paginate_button.next').addClass('dt-Pagination_Button-next')
    $('.dataTables_paginate .paginate_button.current').addClass('dt-Pagination_Button-current')
  }
}
