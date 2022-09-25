$(() => {
    console.log(

    );
    axios.get('/api/kangaroo').then(function (response) {
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
                if (data) {
                    console.log('selected row');
                    console.log('edit this row...');
                    console.log(data);
                }
            }
        });
    });

    $('#add-kangaroo-button').click(function (event) {
        event.preventDefault();
        let payload = {
            'name': $('#name').val(),
            'nickname': $('#nickname').val(),
            'gender': $('#gender').val().toLowerCase(),
            'friendliness': $('#friendliness').val().toLowerCase(),
            'weight': $('#weight').val(),
            'height': $('#height').val(),
            'birth_date': $('#birthday').val(),
        };
        axios.post('/api/kangaroo', payload).then(function (response) {
            console.log(response.status);
            if (response.status == 201) {
                $('#errors-left').empty();
                $('#errors-right').empty();
                $('.errors').hide();
                $('#add-success-alert').show().delay(2000).fadeOut();
            }
        }).catch(function (err) {
            if (err.response.status == 422) {
                let err_left = ['name', 'gender', 'weight', 'birth_date'];
                let err_right = ['friendliness', 'height'];
                let errors = err.response.data.errors;
                Object.keys(errors).forEach(function (field) {
                    if (err_left.includes(field)) {
                        errors[field].forEach(function (msg) {
                            $('#errors-left').append(`<li>${msg}</li>`)
                        });
                    }
                    if (err_right.includes(field)) {
                        errors[field].forEach(function (msg) {
                            $('#errors-right').append(`<li>${msg}</li>`)
                        });
                    }
                });
                $('.errors').show();
            }
        });
    });
});
