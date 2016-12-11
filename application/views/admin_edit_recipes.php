<h1>Administrator Page</h1>
<br>
<br>

<div class=table-responsive>
  <h2>Edit a Recipe</h2>
  <form method="POST" action="http://ass2front.local/adminedit/finishrecipeedit">
    <table class="table">
        <thead>
            <tr>
            <th>Name</th>
            <th></th>
            <th>New value</th>
          </tr>
        </thead>
        <tbody>
            {recipesData}
            <tr>
              <td>Name</td>
              <td></td>
              <td><input class="form-control" style="width:100px;" value="{name}"/></td>
            </tr>
            <tr>
              <td>Number Yielded</td>
              <td></td>
              <td><input class="form-control" style="width:100px;" value="{numberYielded}"/></td>
            </tr>
            <tr>
              <td>Recipe</td>
              <td></td>
              <td><input class="form-control" type="numeric" style="width:300px;" value="{recipe}"/></td>
            </tr>
            {costs}
              <tr>
                <td>{itemName}</td>
                <td></td>
                <td><input class="form-control" type="numeric" style="width:300px;" value="{itemValue}"/></td>
              </tr>
            {/costs}
            {/recipesData}
            <tr>
              <td><input type="submit" name="editRecipe" value="Edit"></td>
            </tr>
        </tbody>
    </table>
  </form>
</div>
