<?php if (!empty($this->energy)) { ?>
<table>
	<thead>
		<tr>
			<th>Energy type</th>
			<th>Acties</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($this->energy as $energy) { ?>
		<tr>
			<td><?=$energy['type']          ?></td>
			<td>
				<a href="/energy/edit/<?=$energy['id'] ?>">bewerk</a>
				<a href="/energy/delete/<?=$energy['id'] ?>">verwijderen</a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php } else { ?>
<p>Er zijn geen energy</p>
<?php } ?>