(function($) {
    'use strict';
     
        //users data table
        $(document).ready(function()
        {
    
            var searchable = [];
            var selectable = []; 
            
    
            var dTable = $('#all-policies').DataTable({
    
                order: [],
                lengthMenu: [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
                processing: true,
                responsive: false,
                serverSide: true,
                processing: true,
                language: {
                  processing: '<i class="ace-icon fa fa-spinner fa-spin orange bigger-500" style="font-size:60px;margin-top:50px;"></i>'
                },
                scroller: {
                    loadingIndicator: false
                },
                pagingType: "full_numbers",
    
                ajax: {
                    url: '/getpolicylist',
                    type: "get"
                },
                columns: [
                    {data:'id', name: 'id', orderable: false, searchable: false},
                    {data:'name', name: 'name'},
                    {data:'code', name: 'code'},
                    {data:'created_at', name: 'created_at'},
                    {data:'updated_at', name: 'updated_at'},
                    {data:'action', name: 'action'}
                ],

                columnDefs: [
                    {
                        targets: 3, // Target the created_at column
                        render: function(data, type, row, meta) {
                            // Assuming data is in 'yyyy-mm-dd H:i:s' format
                            var dateObj = new Date(data);
                            var day = dateObj.getDate().toString().padStart(2, '0');
                            var month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
                            var year = dateObj.getFullYear().toString();
                            var hours = dateObj.getHours().toString().padStart(2, '0');
                            var minutes = dateObj.getMinutes().toString().padStart(2, '0');
                            return day +'-'+ month + '-' + year +' '+ hours + ':' + minutes;
                        }
                    },
                    {
                        targets: 4, // Target the created_at column
                        render: function(data, type, row, meta) {
                            // Assuming data is in 'yyyy-mm-dd H:i:s' format
                            var dateObj = new Date(data);
                            var day = dateObj.getDate().toString().padStart(2, '0');
                            var month = (dateObj.getMonth() + 1).toString().padStart(2, '0');
                            var year = dateObj.getFullYear().toString();
                            var hours = dateObj.getHours().toString().padStart(2, '0');
                            var minutes = dateObj.getMinutes().toString().padStart(2, '0');
                            return day +'-'+ month + '-' + year +' '+ hours + ':' + minutes;
                        }
                    }
                ],
              
                initComplete: function () {
                    var api =  this.api();
                    api.columns(searchable).every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        input.setAttribute('placeholder', $(column.header()).text());
                        input.setAttribute('style', 'width: 140px; height:25px; border:1px solid whitesmoke;');
    
                        $(input).appendTo($(column.header()).empty())
                        .on('keyup', function () {
                            column.search($(this).val(), false, false, true).draw();
                        });
    
                        $('input', this.column(column).header()).on('click', function(e) {
                            e.stopPropagation();
                        });
                    });
    
                    api.columns(selectable).every( function (i, x) {
                        var column = this;
    
                        var select = $('<select style="width: 140px; height:25px; border:1px solid whitesmoke; font-size: 12px; font-weight:bold;"><option value="">'+$(column.header()).text()+'</option></select>')
                            .appendTo($(column.header()).empty())
                            .on('change', function(e){
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );
                                column.search(val ? '^'+val+'$' : '', true, false ).draw();
                                e.stopPropagation();
                            });
    
                        $.each(dropdownList[i], function(j, v) {
                            select.append('<option value="'+v+'">'+v+'</option>')
                        });
                    });
                }
            });
        });
        $('select').select2();
    })(jQuery);