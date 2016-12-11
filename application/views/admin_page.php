<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Inventory</h2>
    <table class="table">
        <thead>
            <tr>
            <th>Item Name</th>
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Price</th>
            <th></th>
            <th><a href="/adminedit/addInventory"><button type="button" class="btn btn-default btn-danger btn-sm">Add</button></a></th>
          </tr>
        </thead>
        <tbody>
            {inventoryData}
            <tr>
              <td>{name}</td>
              <td>{supplier}</td>
              <td>{quantity}</td>
              <td>{price}</td>
              <td><a href="/adminedit/editInventory/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Edit</button></a></td>
              <td><a href="/adminedit/deleteInventory/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Delete</button></a></td>
            </tr>
            {/inventoryData}
        </tbody>
    </table>
</div>

<div class=table-responsive>
  <h2>Recipes</h2>
    <table class="table">
        <thead>
            <tr>
            <th>Item Name</th>
            <th>Number Yielded</th>
            <th>Recipe</th>
            <th></th>
            <th><a href="/adminedit/addRecipe"><button type="button" class="btn btn-default btn-danger btn-sm">Add</button></a></th>
          </tr>
        </thead>
        <tbody>
            {recipesData}
            <tr>
              <td>{name}</td>
              <td>{numberYielded}</td>
              <td>{recipe}</td>
              <td><a href="/adminedit/editRecipe/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Edit</button></a></td>
              <td><a href="/adminedit/deleteRecipe/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Delete</button></a></td>
            </tr>
            {/recipesData}
        </tbody>
    </table>
</div>

<div class=table-responsive>
  <h2>Stock</h2>
    <table class="table">
        <thead>
            <tr>
            <th>Item Name</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Amount Sold</th>
            <th></th>
            <th><a href="/adminedit/addStock"><button type="button" class="btn btn-default btn-danger btn-sm">Add</button></a></th>
          </tr>
        </thead>
        <tbody>
            {stockData}
            <tr>
              <td>{name}</td>
              <td>{description}</td>
              <td>{quantity}</td>
              <td>{price}</td>
              <td>{num_sold}</td>
              <td><a href="/adminedit/editStock/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Edit</button></a></td>
              <td><a href="/adminedit/deleteStock/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Delete</button></a></td>
            </tr>
            {/stockData}
        </tbody>
    </table>
</div>
