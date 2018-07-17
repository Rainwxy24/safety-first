<!---- JavaScript codes ---->
<script type=text/javascript>
//Function for user selection of contact types
function openContacts(evt, contact) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(contact).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<!-- End JavaScript codes -->