<!-- This is basic form html compatible with the styles provided. Absent in the design. -->

<form>
	<p class="field">
		<label>Label text</label>
		<input type="text" name="somefield">
	</p>
	<p class="field">
		<label>Label text</label>
		<input type="text" name="somefield">
	</p>
	<p class="field">
		<label>Label text</label>
		<input type="text" name="somefield">
	</p>
	<p class="field">
	<label>Select something</label>
	<span class="select">
	<span class="value">Primary business type</span>
	<select name="business-type" required>
		<option value="0">Primary business type</option>
		<option value="1">Option One</option>
		<option value="2">Something Else</option>
		<option value="3">Yet another one</option>
	</select>
	</span></p>
	<p class="check"><input type="checkbox" name="newsletter" value="1" id="newsletter"><label for="newsletter">Yes I want your monthly newsletter with great tips to improve 
	my business</label></p>
	<p class="submit"><button type="submit">Submit</button></p>
</form>