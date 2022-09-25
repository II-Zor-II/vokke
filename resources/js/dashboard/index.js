$(() => {
    console.log(

    );
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
                    console.log('selected row');
                    console.log('edit this row...');
                    console.log(data);
                }
            }
        });
    });

    $('#add-kangaroo-button').click(function(event) {
        event.preventDefault();
        let payload = {
            'name' : $('#name').val(),
            'nickname' : $('#nickname').val(),
            'gender' : $('#gender').val(),
            'friendliness' : $('#friendliness').val(),
            'weight' : $('#weight').val(),
            'height' : $('#height').val(),
            'birth_date' : $('#birthday').val(),
        };
        axios.post('/api/kangaroo', payload).then(function(response){
            console.log(response.status);
           if (response.status == 201) {
                $('#add-success-alert').show().delay(2000).fadeOut();
           }
        });
    });
});
