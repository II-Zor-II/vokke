$(() => {

    axios.get('/api/kangaroo').then(function(response){
        console.log(response.data.data);
        $('#user-kangaroo-grid').dxDataGrid({
            selection: {
                mode: 'single',
            },
            dataSource: response.data.data,
            keyExpr: 'id',
            columns: [
                'name',
                'nickname',
                {
                    dataField: 'birth_date',
                    caption: 'birthday'
                },
                'color',
                'friendliness',
                'gender',
                'height',
                'weight'
            ],
            showBorders: true,
            onSelectionChanged(selectedItems) {
                const data = selectedItems.selectedRowsData[0];
                if(data){
                    console.log('selected a row');
                    console.log('edit this row...');
                    console.log(data);
                }
            }
        });
    });

});
