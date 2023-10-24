let form = document.querySelector(".form-send");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    let form = document.querySelector('.form-send');
    let result = document.querySelector('.result');
    let payer_first_name = document.querySelector("#payer_first_name").value.trim();
    let surname = document.querySelector("#payer_last_name").value.trim();
    let order_id = document.querySelector("#order_id").value.trim();
    let order_amount = document.querySelector("#order_amount").value.trim();
    let order_currency = document.querySelector("#order_currency").value.trim();
    let order_description = document.querySelector("#order_description").value.trim();
    let payer_middle_name = document.querySelector("#payer_middle_name").value.trim();
    let payer_birth_date = document.querySelector("#birth_date").value.trim();
    let payer_address = document.querySelector("#payer_address").value.trim();
    let payer_address2 = document.querySelector("#payer_address2").value.trim();
    let payer_country = document.querySelector("#payer_country").value.trim();
    let payer_city = document.querySelector("#payer_city").value.trim();
    let payer_zip = document.querySelector("#payer_zip").value.trim();
    let payer_email = document.querySelector("#payer_email").value.trim();
    let payer_phone = document.querySelector("#payer_phone").value.trim();
    let card_number = document.querySelector("#cardNumber").value.trim();
    let card_exp_year = document.querySelector("#expYear").value.trim();
    let card_exp_month = document.querySelector("#expMonth").value.trim();
    let card_cvv2 = document.querySelector("#cvv2").value.trim();
    let client_key = document.querySelector("#client_key").value.trim();
    let client_pas = document.querySelector("#client_pas").value.trim();
    let data = {
        payer_first_name: payer_first_name,
        surname: surname,
        order_id: order_id,
        order_amount: order_amount,
        order_currency: order_currency,
        order_description: order_description,
        payer_middle_name: payer_middle_name,
        payer_birth_date: payer_birth_date,
        payer_address: payer_address,
        payer_address2: payer_address2,
        payer_country: payer_country,
        payer_city: payer_city,
        payer_zip: payer_zip,
        payer_email: payer_email,
        payer_phone: payer_phone,
        card_number: card_number,
        card_exp_year: card_exp_year,
        card_exp_month: card_exp_month,
        card_cvv2: card_cvv2,
        client_key: client_key,
        client_pas: client_pas,
    }
    fetch('/purchase', {
        method: "POST",
        headers: {
            'Content-Type': 'application/json;charset=utf-8'
        },
        body: JSON.stringify(data)
    })
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data.result == "SUCCESS") {
                form.style.display = "none";
                result.classList.add('alert-success');
                result.innerHTML = `${data.result}`;
            }
            else {
                result.classList.add('alert-danger');
                result.innerHTML += `<p>${data.error_message}</p>`
            }
        })


});



