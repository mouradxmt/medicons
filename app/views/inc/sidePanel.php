<?php if($_SESSION['userType']=='admin'):?>

<aside class="widget widget_title">
<div class="special-heading">
       <h6><a id="users" href="javascript:void(0)">Utilisateurs</a></h6>
    </div>
    <div class="special-heading">
       <h6><a id="services" href="javascript:void(0)">Services</a></h6>
    </div>
    <div class="special-heading">
       <h6><a id="patients" href="javascript:void(0)">Patients</a></h6>
    </div>
    <div class="special-heading">
       <h6><a id="medecins" href="javascript:void(0)">Medecins</a></h6>
    </div>
    <div class="special-heading">
       <h6><a id="consultationsAll" href="javascript:void(0)">Consultations</a></h6>
    </div>
</aside>


<?php else:?>
<aside class="widget widget_title">
<div class="special-heading">
       <h6><a id="profile" href="javascript:void(0)">Profil</a></h6>
    </div>
</aside>
<aside class="widget widget_categories" id="compte-page">

    <div class="special-heading">
        <h6>Mon panneau</h6>
    </div>
    <ul>
        <?php if($_SESSION['userType']=='medecin'):?>
        <li><a id="consultationsMe" href="javascript:void(0)">Mes consultations</a></li>
        <li><a id="consultationsMeAtt" href="javascript:void(0)">Mes consultations <i>(En Attente)</i></a></li>
        <li><a id="consultationsAll" href="javascript:void(0)">Consultations de tous les medecins</a></li>
        <li><a id="consultationsAllAtt" href="javascript:void(0)">Consultations de tous les medecins <i>(En
                    Attente)</i></a></li>
        <?php endif;
    if($_SESSION['userType']=='patient'):
    ?>
        <li><a id="askConsult" href="javascript:void(0)">Demander une consultation</a></li>
        <li><a id="mesConsultations" href="javascript:void(0)">Mes consultations</a></li>
        <?php endif;?>
    </ul>
    <?php endif;?>
</aside>
<script>

</script>