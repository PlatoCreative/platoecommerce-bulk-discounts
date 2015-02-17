<tr>
	<td> 
		<% if Item.Product.isPublished %>
			<a href="$Item.Product.Link" target="_blank">$Item.Product.Title</a>
		<% else %>
			$Item.Product.Title
		<% end_if %>

		<br />
		$Item.SummaryOfOptions
		 
		<% if Message %>
			<div class="message $MessageType">$Message</div>
		<% end_if %>
	</td>
	
	<td>
		$Item.UnitPrice.Nice
		<% if $Item.BulkDiscountPercent %>
			<br />
			<span class="discount-buld-cart">
				{$Item.BulkDiscountPercent}% discount for purchasing $Item.BulkDiscountNumber or more.
			</span>
		<% end_if %>
	</td>

	<td>
		$Item.Quantity
	</td>
	
	<td class="totals-column"> 
		$Item.TotalPrice.Nice
	</td>
</tr>