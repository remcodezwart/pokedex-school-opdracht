
<form method="post" action="/energy/deleteAction/<?=$this->energy[0]['id'] ?>">
	<input type="hidden" name="CRSF_TOKEN" value="<?=$this->crsf_token ?>">
	<button type="submit">weet u zeker dat u de energie <?=$this->energy[0]['type'] ?> wil verwijderen?</button>
</form>

<a href="/energy">terug</a>