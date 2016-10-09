<h1>Receipt</h1>
<br>
<br>

<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title text-center">Item Bought: <strong>{name}</strong></h3>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Supplier</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Cost</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{name}</td>
                <td>{supplier}</td>
                <td>{price}</td>
                <td>{quantity}</td>
                <td><?php echo $price * $quantity; ?></td>
            </tr>
        </tbody>
    </table>
</div>
