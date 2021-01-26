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
  },
}

export default class MosTable {
  constructor(element) {
    $(element).DataTable(options)
  }
}
