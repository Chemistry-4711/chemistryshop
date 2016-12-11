<h1>Inventory List</h1>
<br>
<br>
<div class=table-responsive>
    <table class="table">
        <thead>
            <tr>
                <th>Ingredients</th>
                <th>Bulk Quantity</th>
                <th>Bulk Price</th>
            </tr>
        </thead>
        <tbody>
            <tbody>
                {inventory}
                <tr>
                    <td>{name}</td>
                    <td>{quantity}</td>
                    <td>${price}</td>
                    <td><a href="/receiving/buy/{id}"><button type="button" class="btn btn-default btn-danger btn-sm">Order Now!</button></a></td>
                </tr>
                {/inventory}
            </tbody>
        </tbody>
    </table>
</div>
