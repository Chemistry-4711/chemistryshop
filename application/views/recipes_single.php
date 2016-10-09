
<h1>The Recipe for {name}</h1>
<br>
<br>
<!-- <p>
    Ingredients Required: <br>
    {ingredients}
        {costToMake} {name} {available}  ({inventory} in inventory)<br>
    {/ingredients}
    <br>
    {message}
</p> -->
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title text-center">Ingredients Required</h3>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Ingredient Name</th>
                <th>Required</th>
                <th>In Stock</th>
                <th>Do we have enough?</th>
            </tr>
        </thead>
        <tbody>
            {ingredients}
            <tr>
                <td>{name}</td>
                <td>{costToMake}</td>
                <td>{inventory}</td>
                <td>{available}</td>
            </tr>
            {/ingredients}
        </tbody>
    </table>
</div>
<br>
<h3>{message}</h3>
