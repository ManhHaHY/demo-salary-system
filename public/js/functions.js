let addEmployee = function(){
    let first_name = $('#first_name').val();
    let last_name = $('#last_name').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let address = $('#address').val();
    let birthday = $('#birthday').val();
    let dependent_person = $('#dependent_person').val();
    let use_company_car = $('#use_company_car').val();
    let salary = $('#salary').val();
    $.ajax({
        url: '/add-employee',
        method: 'POST',
        dataType: 'json',
        data: {
            first_name: first_name,
            last_name: last_name,
            email: email,
            phone: phone,
            address: address,
            birthday: birthday,
            dependent_person: dependent_person,
            use_company_car: use_company_car,
            salary: salary
        },
        cache: false,
        success: function (data) {
            console.log(data);
        }
    });
}