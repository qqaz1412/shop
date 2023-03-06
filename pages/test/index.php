<p class="ml-auto text-white">สต๊อก<span id="stock"> 0</span> ชิ้น <label class="mt-2 text-danger">* เพิ่มสต๊อก หากปล่อยให้บรรทัดใดว่าง สินค้าในบรรทัดนั้นจะว่าง !!</label></p>
<textarea id="inputItemData" placeholder="ลงสินค้าที่ต้องการจะส่งให้กับลูกค้า..." class="form-control" rows="5"></textarea> <br>
<script type="text/javascript">
	$(document).ready(function(){
		var items = $('#stock');
		$('#inputItemData').keydown(function(e) {
			newLines = $(this).val().split("\n").length;
			items.text(newLines);
		});
	});
</script>