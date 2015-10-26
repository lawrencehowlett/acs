<form $FormAttributes>

	$Fields.dataFieldByName(FirstName)
	$Fields.dataFieldByName(Surname)
	$Fields.dataFieldByName(Email)
	$Fields.dataFieldByName(Telephone)
	$Fields.dataFieldByName(Address1)
	$Fields.dataFieldByName(City)
	$Fields.dataFieldByName(PostCode)

	$Fields.dataFieldByName(CoveringLetter)
	$Fields.dataFieldByName(CV)

	$Fields.dataFieldByName(JobID)	
	$Fields.dataFieldByName(SecurityID)	

	<% if $Actions %>
		<% loop $Actions %>$Field<% end_loop %>
	<% end_if %>

</form>