let addEmployee = function(){
    let first_name = $('#first_name').val();
    let last_name = $('#last_name').val();
    let birthday = $('#birthday').val();
    let kids = $('#kids').val();
    let use_car = $('#use_car').val();
    let salary = $('#salary').val();
    $.ajax({
        url: '/add-employee',
        method: 'POST',
        dataType: 'json',
        data: {
            first_name: first_name,
            last_name: last_name,
            birthday: birthday,
            kids: kids,
            use_car: use_car,
            salary: salary
        },
        cache: false,
        success: function (data) {
            console.log(data);
        }
    });
}