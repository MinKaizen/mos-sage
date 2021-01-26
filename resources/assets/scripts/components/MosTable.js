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
  }
}
