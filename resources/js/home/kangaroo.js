
$(() => {

    axios.get('/api/kangaroo').then(function(response){
        console.log(response.data.data);
        $('#kangaroo-grid').dxDataGrid({
            dataSource: response.data.data,
            keyExpr: 'id',
            columns: ['owner.name', 'name', 'nickname', 'birth_date', 'color', 'friendliness', 'gender', 'height', 'weight'],
            showBorders: true,
        });
    });

});
