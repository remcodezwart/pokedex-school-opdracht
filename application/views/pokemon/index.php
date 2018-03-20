<?php if (!empty($this->pokemon)) { ?>
<table>
	<thead>
		<tr>
			<th>Naam</th>
			<th>Nick</th>
			<th>hp</th>
			<th>type</th>
			<th>weakness</th>
			<th>strength</th>
			<th>Aanvallen</th>
			<th>acties</th>
		</tr>
	</thead>
	<tbody>
		<tr>
		<?php foreach ($this->pokemon as $pokemon) { ?>
			<td><?=$pokemon['name']          ?></td>
			<td><?=$pokemon['nickname']      ?></td>		
			<td><?=$pokemon['hitpoints']     ?></td>
			<td><?=$pokemon['EnergyType']    ?></td>
			<td><?=$pokemon['weakness_id']   ?><br/>
				zwakte multiplyer <?=$pokemon['Weakness_multiplier']   ?>
			</td>
			<td>
				<?=$pokemon['resistance_id'] ?><br />
				sterkten multiplyer <?=$pokemon['Resistance_multiplier']   ?>	
			</td>
			<td>
				<?php foreach ($pokemon['attacks'] as $attack) { ?>
					<?=$attack['name']?> damage <?=$attack['damage'] ?> <br />
				<?php } ?>
			</td>
			<td>
				<a href="/pokemon/edit/<?=$pokemon['id'] ?>">bewerk</a>
				<a href="/pokemon/delete/<?=$pokemon['id'] ?>">verwijderen</a>
			</td>
		<?php } ?>
		</tr>
	</tbody>
</table>
<?php } else { ?>
<p>Er zijn geen pokemon</p>
<?php } ?>