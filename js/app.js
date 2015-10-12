/**
 * Created by danny on 03/10/2015.
 */
//Fonction qui v�rifie si c'est un nombre
function isNumber(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

/**
 * FORMULAIRE D'AJOUT
**/
//Formulaire de frais de port
$("#form-add-shipment").submit(function(e){
    e.preventDefault();
    var tarifShipment = $("input").first().val();
    var transportShipment = $("input").eq(1).val();
    var errorTarifShipment = $("input").first().next();
    var errorTransportShipment = $("input").eq(1).next();
    var valid = true;
    if(!isNumber(tarifShipment)){
        errorTarifShipment.removeClass("hide");
        valid = false;
    }
    else{
        errorTarifShipment.addClass("hide");
    }
    if (!transportShipment.trim()){
        errorTransportShipment.removeClass("hide");
        valid = false;
    }
    else{
        errorTransportShipment.addClass("hide");
    }
    if(valid === true){

        if(confirm("Voulez-vous ajouter ce nouveau format ? ")){
            $.post("form-add-shipment.php", $(this).serialize(), function(html){
                html = $.parseJSON(html);
                if(html.statut == 'error'){
                    $.each(html, function(index, value) {
                        if(index == "transport"){
                            errorTransportShipment.removeClass("hide");
                        }
                        else if (index == "tarif"){
                            errorTarifShipment.removeClass("hide");
                        }
                    });
                }
                else if (html.statut == 'success'){
                    sessionStorage.setItem("addShipment", true);
                    window.location.reload(true);
                }
            });
        }
    }
    return false;
});
//Formulaire de format
$("#form-add-format").submit(function(e){
    e.preventDefault();
    var tarifFormat = $("input[name*='tarif-format']");
    var nameFormat = $("input[name*='name-format']");
    var errorTarifFormat = tarifFormat.next();
    var errorNameFormat = nameFormat.next();
    var valid = true;
    if(!isNumber(tarifFormat.val())){
        errorTarifFormat.removeClass("hide");
        valid = false;
    }
    else{
        errorTarifFormat.addClass("hide");
    }
    if (!nameFormat.val().trim()){
        errorNameFormat.removeClass("hide");
        valid = false;
    }
    else{
        errorNameFormat.addClass("hide");
    }
    if(valid === true){

        if(confirm("Voulez-vous ajouter ce nouveau format ? ")){
            $.post("form-add-format.php", $(this).serialize(), function(html){
                console.log(html);
                html = $.parseJSON(html);
                if(html.statut == 'error'){
                    $.each(html, function(index, value) {
                        if(index == "format"){
                            errorNameFormat.removeClass("hide");
                        }
                        else if (index == "tarif"){
                            errorTarifFormat.removeClass("hide");
                        }
                        else if (index == "duplicate"){
                            errorNameFormat.parent().find("div").first().removeClass("hide");
                        }
                    });
                }
                else if (html.statut == 'success'){
                    sessionStorage.setItem("addFormat", true);
                    window.location.reload(true);
                }
            });
        }
    }
    return false;
});

/**
 * FORMULAIRE D'EDITION
 **/
//Formulaire de commande
$(document).on("submit", "#form-edit-order", function (e){
    e.preventDefault();
    if($("select[name*='statut-order'] option:selected").val() == ""){
        $("#msg-order").html("Sélectionner un statut de commande").addClass("alert-danger").removeClass("alert-success").toggleClass("hide");
    }else{
            $.post("form-edit-order.php",$(this).serialize(), function(html){
            console.log(html);
            html = $.parseJSON(html);
                if(html.statut == 'success'){
                    sessionStorage.setItem("editOrder", true);
                    window.location.reload(true);
                }
            });
        }
    return false;
});
//Formulaire de frais de port
$(document).on("click", "#openModal", function (){
    var idShipment = $(this).data('id');
    var tarifShipment = $(this).data('tarif');
    var transportShipment = $(this).data('transport');

    $('#editIdVal').val(idShipment);
    $('#editTarifVal').val(tarifShipment);
    $('#editTransportVal').val(transportShipment);

    $(document).on("click", "#validForm", function (){
        var  newIdShipment = $("input:hidden").val();
        var  newTarifShipment = $("input").val();
        var  newTransportShipment = $("textarea").val();
        $.post("form-edit-shipment.php", {id_shipment: newIdShipment, tarif_shipment : newTarifShipment, transport_shipment: newTransportShipment}, function(html){
            html = $.parseJSON(html);
                if(html.statut == 'success'){
                    sessionStorage.setItem("editShipment", true);
                    window.location.reload(true);
                }
        });
    });
});

//Formulaire de format
$(document).on("click", "#openModalFormat", function (){
    var idFormat = $(this).data('id');
    var tarifFormat = $(this).data('tarif');
    var nameFormat = $(this).data('format');

    $('#editIdValFormat').val(idFormat);
    $('#editTarifValFormat').val(tarifFormat);
    $('#editFormatValFormat').val(nameFormat);

    $(document).on("click", "#validFormFormat", function (){
        var  newIdFormat = $("input:hidden").val();
        var  newTarifFormat = $("input").val();
        var  newNameFormat = $("textarea").val();
        $.post("form-edit-format.php", {id_format: newIdFormat, tarif_format : newTarifFormat, name_format: newNameFormat}, function(html){
            html = $.parseJSON(html);
            if(html.statut == 'success'){
                sessionStorage.setItem("editFormat", true);
                window.location.reload(true);
            }
        });
    });
});

//Formulaire de profil
$(document).on("submit", "#form-edit-user", function (e){
    e.preventDefault();
    var valid = true;
    var inputTel = $("input[name='user-tel']");
    var fieldErrorTel = inputTel.next();
    if (!inputTel.val().match(/^\d+$/)){
       fieldErrorTel.toggleClass("hide");
       valid = false;
    }
        if(valid == true){
        if(confirm("Voulez-vous sauvegarder la modification de vos informations ?")) {
            $.post("form-edit-user.php",$(this).serialize(), function(html){
                console.log(html);
                html = $.parseJSON(html);
                if(html.statut == 'success'){
                    sessionStorage.setItem("Profil", true);
                    window.location.reload(true);
                }
            });
        }
    }
    return false;
});

/**
 * FORMULAIRE DE SUPPRESSION
 **/

//Formulaire de frais de port
$("table #deleteShipment").click(function(e){
    var link =$(this).parent().parent().find("td").first().text();
    e.preventDefault();
    if(confirm("Vous-vous supprimer ce frais de port ? ")){
        $.get("form-delete-shipment.php", {target: link }, function(html){
            html = $.parseJSON(html);
           if(html.statut == 'success'){
               sessionStorage.setItem("deleteShipment", true);
               window.location.reload(true);
           }
        });
    }
    return false;
});

//Formulaire de format
$("table tbody tr td button#deleteFormat").click(function(){
    var link =$(this).parent().parent().find("td").first().text();
    console.log(link);
    if(confirm("Vous-vous supprimer ce frais de port ? ")){
        $.get("form-delete-format.php", {target: link }, function(html){
            html = $.parseJSON(html);
            if(html.statut == 'success'){
                sessionStorage.setItem("deleteFormat", true);
                window.location.reload(true);
            }
        });
    }
});

//Affiche les messages des sessions lors du rechargement de la page
$(window).bind("load", function(){
    if (sessionStorage.getItem("editOrder")) {
        $("#msg-order").toggleClass("hide");
        sessionStorage.removeItem("editOrder");
    }
    else if (sessionStorage.getItem("Profil")) {
        $("#msg-user").toggleClass("hide");
        sessionStorage.removeItem("Profil");
    }
    else if (sessionStorage.getItem("addShipment")) {
        $("#msg-addShipment").toggleClass("hide");
        sessionStorage.removeItem("addShipment");
    }
    else if(sessionStorage.getItem("addFormat")){
        $("#msg-addFormat").toggleClass("hide");
        sessionStorage.removeItem("addFormat");
    }
    else if (sessionStorage.getItem("deleteShipment")) {
        $("#msg-deleteShipment").toggleClass("hide");
        sessionStorage.removeItem("deleteShipment");
    }
    else if (sessionStorage.getItem("editShipment")) {
        $("#msg-editShipment").toggleClass("hide");
        sessionStorage.removeItem("editShipment");
    }
    else if (sessionStorage.getItem("editFormat")) {
        $("#msg-editFormat").toggleClass("hide");
        sessionStorage.removeItem("editFormat");
    }
    else if (sessionStorage.getItem("deleteFormat")) {
        $("#msg-deleteFormat").toggleClass("hide");
        sessionStorage.removeItem("deleteFormat");
    }
});

// Ferme la div message
if($(".close").click(function(){
        $(this).parent().fadeOut(1000);
}));



