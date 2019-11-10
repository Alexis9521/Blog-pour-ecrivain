  
$(document).ready(function () {

    $('#error').remove();

    // création d'une méthode pour rendre la vérification de mail plus poussée
    $.validator.addMethod("mailverified", function (value, element, params) {
        let pattern = new RegExp(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/);
        return pattern.test(value);
    }, "Veuillez saisir une adresse mail valide");

    // la méthode principale de jQuery validation plugin
    $('#form_inscription').validate({

        rules: {

            "user_first_name": {
                required: true,
                maxlength: 100,
            },
            "user_name": {
                required: true,
                maxlength: 100,
            },
            "user_pseudo": {
                required: true,
                maxlength: 100,
            },
            "user_email": {
                required: true,
                mailverified: true, // remplace la propriété mail
                minlength: 3,
                maxlength: 100
            },
            "user_password": {
                required: true,
                maxlength: 100
            },
            "user_confirmpass": {
                required: true,
                maxlength: 100,
                equalTo: "#user_password"
            },
        },
        messages: {

            "user_first_name": {
                required: "Veuillez saisir votre prénom",
                maxlength: "Veuillez saisir un prénom valide"
            },
            "user_name": {
                required: "Veuillez saisir votre nom",
                maxlength: "Veuillez saisir un nom valide" 
            },
            "user_pseudo": {
                required: "Veuillez saisir votre pseudo",
                maxlength: "Veuillez saisir un pseudo moins long"
            },
            "user_email": {
                required: "Veuillez saisir votre adresse mail",
                mailverified: "Veuillez saisir une adresse mail valide", // remplace la propriété mail
                minlength: "Veuillez saisir une adresse mail valide",
                maxlength: "Veuillez saisir une adresse mail valide"
            },
            
            "user_password": {
                required: "Veuillez saisir votre mot de passe",
                maxlength: "Veuillez saisir un mot de passe moins long"
            },
            "user_confirmpass": {
                required: "Veuillez confirmer votre mot de passe",
                maxlength: "Veuillez saisir un mot de passe moins long",
                equalTo: "Veuillez saisir le même mot de passe"
            },
        }
    });
});