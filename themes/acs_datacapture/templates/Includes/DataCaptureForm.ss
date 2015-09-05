<form $AttributesHTML>
	<h2>$Controller.FormTitle</h2>

	<p class="field">
		$Fields.dataFieldByName(Name)
	</p>
	
	<p class="field">
		$Fields.dataFieldByName(Email)
	</p>

	<p class="field">
		$Fields.dataFieldByName(Phone)
	</p>

	<p class="field">
		$Fields.dataFieldByName(Business)
	</p>

	<p class="check">
		$Fields.dataFieldByName(Newsletter)
	</p>

	$Fields.dataFieldByName(SecurityID)

	<p class="submit">
		<% loop $Actions %>$Field<% end_loop %>
	</p>
</form>