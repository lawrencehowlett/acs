<form $AttributesHTML>
	$Fields.dataFieldByName(CompanyName)
	$Fields.dataFieldByName(Name)
	$Fields.dataFieldByName(Email)
	$Fields.dataFieldByName(TelephoneNumber)
	$Fields.dataFieldByName(Message)
	$Fields.dataFieldByName(SecurityID)
	<% loop $Actions %>$Field<% end_loop %>
</form>