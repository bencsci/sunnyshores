<?php
//checkoutProcess.php
// Ben Le
// A00454115

displayReceipt($db, $customerID);

$query = 
    "SELECT
            my_Order.order_id,
            my_Order.customer_id,
            my_Order.order_status,
            my_OrderItem.*
     FROM
            my_OrderItem, my_Order
     WHERE
            my_Order.order_id = my_OrderItem.order_id and
            my_Order.order_status = 'IP'           and
            my_Order.customer_id = $customerID";

$orderInProgress = mysqli_query($db,$query);
$orderInProgressArray = mysqli_fetch_array($orderInProgress);
$orderID = $orderInProgressArray[0];

markOrderPaid($db, $customerID, $orderID);
markOrderItemsPaid($db, $orderID);
mysqli_close($db);


function displayReceipt($db, $customerID)
{
    $items = getExistingOrder($db, $customerID);
    $numRecords = mysqli_num_rows($items);
    if ($numRecords == 0)
    {
        echo 
        "<h4 class='w3-center'>Shopping Cart</h4>
        <h4 class='w3-center'>Your shopping cart is empty.</h4>
        <h4 class'w3-center'>To continue shopping, please
        <a href='pages/catalog.php'>click here</a></h4>";
        exit(0);
    } else {
        displayReceiptHeader();
        $grandTotal = 0;
        for ($i=1; $i<=$numRecords;$i++)
        {
            $row = mysqli_fetch_array($items, MYSQLI_ASSOC);
            $grandTotal += displayItemAndReturnTotalPrice($db, $row);
        }
    }
}

function getExistingOrder($db, $customerID)
{
    $query = "SELECT my_Order.order_id,
                     my_Order.customer_id,
                     my_Order.order_status,
                     my_OrderItem.*
              FROM my_OrderItem, my_Order
              WHERE my_Order.order_id = my_OrderItem.order_id and
                    my_Order.order_status = 'IP'              and
                    my_Order.customer_id = $customerID";
    $items = mysqli_query($db, $query);
    return $items;
}

function displayReceiptHeader()
{
    $date = date("F j, Y");
    $time = date('g:ia');
    echo 
    "<p class='w3-center'><strong>*****R E C E I P T *****</strong></p>
    <h4 class='w3-center'>
        Payment Received from
        $_SESSION[salutation]
        $_SESSION[first_name]
        $_SESSION[middle_initial]
        $_SESSION[last_name] on $date at $time.
    </h4>";
    echo 
    "<div style='overflow-x:auto;'><table class'w3-table w3-border 
        w3-bordered'>
            <tr>
                <th>Product Image</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>";
}

function displayItemAndReturnTotalPrice($db, $row)
{
    $productID = $row['product_id'];
    $query = "SELECT * FROM my_Product WHERE product_id = '$productID'";
    $product = mysqli_query($db, $query);
    $rowProd = mysqli_fetch_array($product, MYSQLI_ASSOC);
    $productPrice = $rowProd['price'];
    $productPriceAsString = sprintf('$%1.2f', $productPrice);
    $totalPrice = $row['quantity'] * $row['price'];
    $totalPriceAsString = sprintf("$%1.2f", $totalPrice);
    $imageFile = $rowProd['image_file'];
    echo 
    "<tr>
        <td class='w3-center'>
            <img width='125' src='images/products/$imageFile' alt='Product Image'>
        </td><td>
            $rowProd[name]
        </td><td class='w3-right-align'>
            $productPriceAsString
        </td><td class='w3-center'>
            $row[quantity]
        </td><td class='w3-right-align'>
            $totalPriceAsString
        </td>
    </tr> ";
    return $totalPrice;
}

function displayReceiptFooter($grandTotal)
{
    $grandTotalAsString = sprintf('$%1.2f', $grandTotal);
    echo 
    "<tr>
        <td class'w3-center' colspan='4'>
            <strong>Grand Total</strong>
        </td><td class='w3-right-align'>
            <strong>$grandTotalAsString</strong>
        </td>
    </tr><tr>
        <td colspan='5'>
            <p class='w3-center'> Your order has been process.
            <br> Thank you very much for shopping with Sunny Shores.
            <br> We appreciate your purchase of the above product(s).
            <br> You may print a copy of this page for your permanent record.
            <br> To return to our e-store options page please
                <a href='pages/estore.php'>click here</a>
            </p>
        </td>
    </tr>
</table></div>";
}

function markOrderPaid($db, $customerID, $orderID)
{
    $query = "UPDATE my_Order
             SET order_status = 'PD'
             WHERE customer_id='$customerID' and
                   order_id ='$orderID'";
    $success = mysqli_query($db, $query);
    if (!$success)
    {
        echo "Error: UPDATE failure to mark order paid in checkoutProcess";
        exit(0);
    }
}

function markOrderItemsPaid($db, $orderID)
{
    $query = "SELECT *
              FROM my_OrderItem
              WHERE order_id = '$orderID'";
    $orderItems = mysqli_query($db, $query);
    if ($orderItems != NULL)
    {
        $numRecords = mysqli_num_rows($orderItems);
    }
    else
    {
        echo "Error: SELECT failure in markOrderItemsPaid";
        exit(0);
    }
    for ($i =1; $i<=$numRecords;$i++)
    {
        $row=mysqli_fetch_array($orderItems, MYSQLI_ASSOC);
        $query = "UPDATE my_OrderItem
                  SET order_item_status = 'PD'
                  WHERE order_item_id = $row[order_id]";
        $success = mysqli_query($db, $query);
        if (!$success)
        {
            echo "Error: UPDATE failure in markOrderItemsPaid in checkoutProcess";
            exit(0);
        }
        reduceInventory($db, $row['product_id'],$row['quantity']);
    }
}

function reduceInventory($db, $productID, $quantityPurchased)
{
    $query = "SELECT * FROM my_Product WHERE product_id = '$productID'";
    $product = mysqli_query($db, $query);
    $row = mysqli_fetch_array($product, MYSQLI_ASSOC);
    $row['quantity'] -= $quantityPurchased;
    $query = "UPDATE my_Product
              SET quantity = $row[quantity]
              WHERE product_id=$row[product_id]";
    mysqli_query($db, $query);
}
?>