<form $FormAttributes>

	$Fields.dataFieldByName(FirstName)
	$Fields.dataFieldByName(Surname)
	$Fields.dataFieldByName(Email)
	$Fields.dataFieldByName(Telephone)
	$Fields.dataFieldByName(Address1)
	$Fields.dataFieldByName(City)
	$Fields.dataFieldByName(PostCode)

	<label for="Form_JobApplicationForm_CoverLetter" style="padding-left:5px;">
		<b>Upload your cover letter <small>(.pdf, .doc &amp; .docx)</small></b>
	</label>
	$Fields.dataFieldByName(CoverLetter)

	<label for="Form_JobApplicationForm_CV" style="padding-left:5px;">
		<b>Upload your CV <small>(valid formats: .pdf, .doc &amp; .docx)</small></b>
	</label>
	$Fields.dataFieldByName(CV)

	$Fields.dataFieldByName(SecurityID)	

	<% if $Actions %>
		<% loop $Actions %>$Field<% end_loop %>
	<% end_if %>

</form>