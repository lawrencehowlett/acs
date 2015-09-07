<form $AttributesHTML>
	<div class="form-content">
		<h2 class="section-title">$Controller.CallSpecialistBlock.Title</h2>

		<p class="fields">
			$Fields.dataFieldByName(CompanyName)
			$Fields.dataFieldByName(Name)
			$Fields.dataFieldByName(Email)
			$Fields.dataFieldByName(Telephone)
			$Fields.dataFieldByName(BestTimeToCall)
		</p>

		<p class="check">
			$Fields.dataFieldByName(Newsletter)
		</p>
		$Fields.dataFieldByName(SecurityID)
		<p class="submit">
			<% loop $Actions %>$Field<% end_loop %>
		</p>
	</div>
</form>