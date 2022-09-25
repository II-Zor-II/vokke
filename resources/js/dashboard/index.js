$(() => {
    console.log(

    );

    let selectedKangarooId = 0;
    let selectionChangedRaised = false;
    axios.get('/api/user').then(function (response) {
        console.log(response.data.data);
        $('#user-kangaroo-grid').dxDataGrid({
            selection: {
                mode: 'single',
            },
            dataSource: response.data.data,
            keyExpr: 'id',
            columns: ['name', 'nickname', {
                dataField: 'birth_date', caption: 'birthday'
            }, 'color', 'friendliness', 'gender', 'height', 'weight'],
            showBorders: true,
            onSelectionChanged(selectedItems) {
                const data = selectedItems.selectedRowsData[0];
                selectionChangedRaised = true;
                if (data) {
                    selectedKangarooId = data.id;
                    $('#name').val(data.name);
                    $('#nickname').val(data.nickname);
                    $('#gender').val(data.gender);
                    $('#friendliness').val(data.friendliness);
                    $('#weight').val(data.weight);
                    $('#height').val(data.height);
                    $('#birthday').val((new Date(data.birth_date)).toISOString().substring(0, 10))
                    $('#update-kangaroo-button').show();
                    $('#add-kangaroo-button').hide();
                    $('#add-kangaroo-header').hide();
                    $('#update-kangaroo-header').show();
                }
            },
            onRowClick(e) {
                if (!selectionChangedRaised) {
                    var dataGrid = e.component;
                    var keys = dataGrid.getSelectedRowKeys();
                    dataGrid.deselectRows(keys);
                    $('#name').val('');
                    $('#nickname').val('');
                    $('#gender').val('');
                    $('#friendliness').val('');
                    $('#weight').val('');
                    $('#height').val('data.height');
                    $('#birthday').val('')
                    $('#update-kangaroo-button').hide();
                    $('#add-kangaroo-button').show();
                    $('#add-kangaroo-header').show();
                    $('#update-kangaroo-header').hide();
                }
                selectionChangedRaised = false;
            }
        });
    });

    $('#update-kangaroo-button').click(function (event) {
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
        axios.put(`/api/kangaroo/${selectedKangarooId}`, payload).then(function (response) {
            console.log(response.status);
            if (response.status == 200) {
                $('#errors-left').empty();
                $('#errors-right').empty();
                $('.errors').hide();
                $('#update-success-alert').show().delay(2000).fadeOut();
            }
        }).catch(displayErrors);
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
            if (response.status == 201) {
                $('#errors-left').empty();
                $('#errors-right').empty();
                $('.errors').hide();
                $('#add-success-alert').show().delay(2000).fadeOut();
            }
        }).catch(displayErrors);
    });

    function displayErrors(err) {
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
    }

});
