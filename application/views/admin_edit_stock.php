<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Edit a Stock item</h2>
  <form method="POST" action="http://ass2front.local/adminedit/finishstockedit">
    <table class="table">
        <thead>
            <tr>
            <th>Name</th>
            <th></th>
            <th>New value</th>
          </tr>
        </thead>
        <tbody>
            {stockData}
            <tr>
              <td>Name</td>
              <td></td>
              <td><input class="form-control" style="width:100px;" value="{name}"/></td>
            </tr>
            <tr>
              <td>Description</td>
              <td></td>
              <td><input class="form-control" style="width:100px;" value="{description}"/></td>
            </tr>
            <tr>
              <td>Price</td>
              <td></td>
              <td><input class="form-control" type="numeric" style="width:100px;" value="{price}"/></td>
            </tr>
            <tr>
              <td>Number Sold</td>
              <td></td>
              <td><input class="form-control" style="width:100px;" value="{num_sold}"/></td>
            </tr>
            {/stockData}
            <tr>
              <td><input type="submit" name="editStock" value="Edit"></td>
            </tr>
        </tbody>
    </table>
  </form>
</div>
