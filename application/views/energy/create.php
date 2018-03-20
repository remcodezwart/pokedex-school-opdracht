<form method="post" action="/energy/createAction">
	<label>energy type</label><input placeholder="water, vuur etc" type="text" name="type"><br/ >

	<input type="hidden" name="CRSF_TOKEN" value="<?=$this->crsf_token ?>">
	<button type="submit">opslaan</button>
</form>
