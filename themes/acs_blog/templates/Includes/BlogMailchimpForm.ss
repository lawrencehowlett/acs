<form $AttributesHTML>
	<% if $Message %>
		<p id="{$FormName}_error" class="message $MessageType">$Message</p>
	<% else %>
		<p id="{$FormName}_error" class="message $MessageType" style="display: none"></p>
	<% end_if %>

	$Fields.dataFieldByName(Name)
	$Fields.dataFieldByName(Email)
	$Fields.dataFieldByName(SecurityID)
	<% loop $Actions %>$Field<% end_loop %>
</form>
