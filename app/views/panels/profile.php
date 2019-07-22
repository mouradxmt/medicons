<div  class="up-form container-fluid text-left">
<div class="vcard">
			<ul>
				<li class="v-heading">
					Données personnelles
				</li>
				<li>
					<span class="item-key">Nom &amp; Prénoms</span>
					<?php if($data->type=='medecin'):?>
					<div class="vcard-item"><?=$data->nomMedecin?> <?=$data->prenomMedecin?></div>
					<?php elseif($data->type=='patient'):?>
					<div class="vcard-item"><?=$data->nomPatient?> <?=$data->prenomPatient?></div>
					<?php endif;?>
				</li>
				<li>
					<span class="item-key">Date de naissance</span>
					<?php if($data->type=='medecin'):?>
					<div class="vcard-item"><?=$data->dateNaissanceMedecin?></div>
					<?php elseif($data->type=='patient'):?>
					<div class="vcard-item"><?=$data->dateNaissancePatient?></div>
					<?php endif;?>
				</li>
				<li>
					<span class="item-key">Adresse</span>
					<?php if($data->type=='medecin'):?>
					<div class="vcard-item"><?=$data->adresseMedecin?></div>
					<?php elseif($data->type=='patient'):?>
					<div class="vcard-item"><?=$data->adressePatient?></div>
					<?php endif;?>
				</li>
				<li>
					<span class="item-key">Sexe</span>
					<?php if($data->type=='medecin'):?>
					<div class="vcard-item"><?=$data->sexeMedecin?></div>
					<?php elseif($data->type=='patient'):?>
					<div class="vcard-item"><?=$data->sexePatient?></div>
					<?php endif;?>
				</li>
				<li>
					<span class="item-key">E-mail</span>
					<div class="vcard-item"><?=$data->email?></div>
				</li>
				<li>
					<span class="item-key">Type du compte</span>
					<div class="vcard-item"><?=$data->type?></div>
				</li>
				<li class="v-heading">
					Autre
				</li>
                <?php if($data->type == 'medecin'):?>
                <li>
					<span class="item-key">Service</span>
					<div class="vcard-item"><?=$data->codeService?></div>
				</li>
				<?php elseif($data->type == 'patient'):?>
                <?php endif; ?>
			</ul>
		</div>
</div>