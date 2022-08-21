
const varss = {
    apiKey: '1046586239619f819726cc74.36136687',
    siteId: '723471',
}
$("#send-inscription").on("submit", function(e) {
    e.preventDefault();
    Notiflix.Loading.circle("Chargement")

    var action = $(this).attr("action");
    var method = $(this).attr("method");
    var form_data = new FormData($(this)[0]);
    // form_data.append('amount', total)
    console.log('form_data',form_data.email);
    var form = $(this);

    $.ajax({
        url: action,
        dataType: 'json',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: method,

        success: function(response) {
            Notiflix.Loading.remove();

            if (response.success) {
                console.log('response',response.data);
                Notiflix.Report.success('Success', response.message, 'OK',

                    function() {
                        Notiflix.Loading.circle("Chargement")
                        CinetPay.setConfig({
                            apikey: varss.apiKey, //   YOUR APIKEY
                            site_id: varss.siteId, //YOUR_SITE_ID
                            notify_url: 'http://mondomaine.com/notify/',
                            mode: 'PRODUCTION'
                        });
                        CinetPay.getCheckout({
                            transaction_id: Math.floor(Math.random() *
                                100000000).toString(), // YOUR TRANSACTION ID
                            amount: 100,
                            currency: 'XOF',
                            channels: 'ALL',
                            description: 'Test de paiement',
                            //Fournir ces variables pour le paiements par carte bancaire
                            customer_name: "Joe", //Le nom du client
                            customer_surname: "Down", //Le prenom du client
                            customer_email: "down@test.com", //l'email du client
                            customer_phone_number: "088767611", //l'email du client
                            customer_address: "BP 0024", //addresse du client
                            customer_city: "Antananarivo", // La ville du client
                            customer_country: "CM", // le code ISO du pays
                            customer_state: "CM", // le code ISO l'état
                            customer_zip_code: "06510", // code postal

                        });
                        CinetPay.waitResponse(function(data) {
                            if (data.status == "REFUSED") {
                                Notiflix.Loading.remove();
                                if (alert("Votre paiement a échoué")) {
                                    window.location.reload();
                                }
                            } else if (data.status == "ACCEPTED") {
                                Notiflix.Loading.remove();

                                    window.location.href="https://systemepaiementcash.systeme.io/23da9e2e";

                            }
                        });
                        CinetPay.onError(function(data) {
                            console.log(data);
                        });

                    });
            } else {
                Notiflix.Report.failure('Échec', response.message, 'OK',
                    function() {

                    });
            }

        },
        error: function(response) {
            Notiflix.Loading.remove();

            // var data = (response.responseJSON || {});

            // Notiflix.Report.failure('Échec', data.message ||
            //     "Une erreur inconnu c'est produit, veuillez réessayer", 'OK',
            //     function() {

            //     });
        }
    })

    function validationErrorAlert(response) {
        $.each(response.responseJSON.errors, function(key, value) {
            $('#validation-errors-global-transaction').html(
                '<div class="alert alert-danger text-center" style="font-size:14px;">' +
                value + '</div');
        });
    }

});
