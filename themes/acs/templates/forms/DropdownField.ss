<span class="select">
	<span class="value">$Title.XML</span>
	<select $AttributesHTML>
	<% loop $Options %>
		<option value="$Value.XML"<% if $Selected %> selected="selected"<% end_if %><% if $Disabled %> disabled="disabled"<% end_if %>>$Title.XML</option>
	<% end_loop %>
	</select>
	
</span>