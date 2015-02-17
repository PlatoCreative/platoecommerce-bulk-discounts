<tr>
	<td>
		<a href="#" data-item="$Item.ID" class="cart-summary-remove small-cross"></a>
	</td>

	<td> 
		<% if Item.Product.isPublished %>
			<a href="$Item.Product.Link" target="_blank">$Item.Product.Title</a>
		<% else %>
			$Item.Product.Title
		<% end_if %>

		<br />
		$Item.SummaryOfOptions
		
		<% if Message %>
			<div class="message $MessageType">
				$Message
			</div>
		<% end_if %>
	</td>
	
	<td>
		$Item.UnitPrice.Nice
		<% if $Item.BulkDiscountPercent %>
			<br />
			<span class="discount-buld-cart">
				{$Item.BulkDiscountPercent}% discount applied for purchasing $Item.BulkDiscountNumber or more.
			</span>
		<% end_if %>
	</td>

	<td>
		<div id="$Name" class="field $Type $extraClass">
			$titleBlock
			<div class="middleColumn">$Field</div>
			$rightTitleBlock
		</div>
	</td>
	
	<td>
		$Item.TotalPrice.Nice
	</td>
</tr>
