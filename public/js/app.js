$("#name").attr("placeholder", "Nom d'utilisateur")
$("#password").attr("placeholder", "Mot de passe")
$("#commentaire").attr({
    rows: 10,
    placeholder: "Laisser un commentaire"
})

if ($(".toHide")) {
    setTimeout(() => {
        $(".toHide").fadeOut()
    }, 2000);
}
