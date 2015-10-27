$Body

<dl>
	<dt><strong>Applying to position</strong></dt>
	<dd style="margin: 4px 0 14px 0">$Application.Job.Title</dd>

	<dt><strong>First name</strong></dt>
	<dd style="margin: 4px 0 14px 0">$Application.FirstName</dd>

	<dt><strong>Surname</strong></dt>
	<dd style="margin: 4px 0 14px 0">$Application.Surname</dd>

	<dt><strong>Email</strong></dt>
	<dd style="margin: 4px 0 14px 0">$Application.Email</dd>

	<dt><strong>Telephone</strong></dt>
	<dd style="margin: 4px 0 14px 0">$Application.Telephone</dd>

	<dt><strong>Address1</strong></dt>
	<dd style="margin: 4px 0 14px 0">$Application.Address1</dd>

	<dt><strong>City</strong></dt>
	<dd style="margin: 4px 0 14px 0">$Application.City</dd>

	<dt><strong>Postcode</strong></dt>
	<dd style="margin: 4px 0 14px 0">$Application.PostCode</dd>

	<% if $Application.CoveringLetter %>
		<dt><strong>Cover leter</strong></dt>
		<dd style="margin: 4px 0 14px 0">
			{$Application.CoveringLetter.Title}.{$Application.CoveringLetter.Extension}
			<a href="$Application.CoveringLetter.Link">Download</a>
		</dd>
	<% end_if %>

	<% if $Application.CV %>
		<dt><strong>CV</strong></dt>
		<dd style="margin: 4px 0 14px 0">{$Application.CV.Title}.{$Application.CV.Extension} 
			<a href="$Application.CV.Link">Download</a>
		</dd>
	<% end_if %>

	<dt><strong>Admin link to the job application</strong></dt>
	<dd style="margin: 4px 0 14px 0">
		<a href="$AdminLink">$AdminLink</a>
	</dd>

</dl>
