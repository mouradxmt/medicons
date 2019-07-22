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
</aside>
<script>

</script>