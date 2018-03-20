<form method="post" action="/energy/editAction/<?=$this->energy['0']['id'] ?>">
	<label>energy type</label>
	<input placeholder="water, vuur etc" value="<?=$this->energy['0']['type']?>" type="text" name="type"><br/ >

	<input type="hidden" name="CRSF_TOKEN" value="<?=$this->crsf_token ?>">
	<button type="submit">opslaan</button>
</form>