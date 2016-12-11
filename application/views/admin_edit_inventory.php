<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Edit an Inventory item</h2>
    <form method="POST" action="http://ass2front.local/adminedit/finishinventoryedit">
      <table class="table">
          <thead>
              <tr>
              <th>Name</th>
              <th></th>
              <th>New value</th>
            </tr>
          </thead>
          <tbody>
              {inventoryData}
              <tr>
                <td>Name</td>
                <td></td>
                <td><input class="form-control" style="width:100px;" value="{name}"/></td>
              </tr>
              <tr>
                <td>Supplier</td>
                <td></td>
                <td><input class="form-control" style="width:100px;" value="{supplier}"/></td>
              </tr>
              <tr>
                <td>Price</td>
                <td></td>
                <td><input class="form-control" type="numeric" style="width:100px;" value="{price}"/></td>
              </tr>
              {/inventoryData}
              <tr>
                <td><input type="submit" name="editInventory" value="Edit"></td>
              </tr>
          </tbody>
      </table>
    </form>
</div>
