<?php include "src/database.php"; 
// check for form submission
if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    // get data from form
    $name = $_POST['customer_name'];
    $email = $_POST['email'];
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    //$total_price = $quantity * $price:
    
    // insert the data into oder form table
    // SQL query
    $query = "INSERT INTO orders (customer_name,email,product_name,quantity,price,order_date)
            VALUES(?,?,?,?,?,NOW() )
    ";
    $statement = $connection -> prepare($query);
    $statement -> bind_param("sssid",$name,$email,$product_name,$quantity,$price);
    if( !$statement -> execute() ) {
        // there's an error
         echo $connection -> error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<?php include "fragments/head.php"; ?>

<body>
    <?php include "fragments/pageheader.php"; ?>
    <!-- carousel -->
    <!-- <div class="main-carousel" data-flickity='{ "autoPlay": true, "cellAlign": "left", "contain": true }'>
        <div class="slide">
            <h2>Black Friday Sale</h2>
            <a href="#" class="slide-button">Shop Black Friday</a>
        </div>
        <div class="slide">2</div>
        <div class="slide">3</div>
        <div class="slide">4</div>
    </div> -->
    <main class="content">
        <div class="card">
            <div class="card-content">
                <form id="contact" method="post" action="/order.php">
                    <h1>Oder Form</h1>
                    <label for="customer_name">Customer_Name</label>
                    <input required id="customer_name" name="customer_name" type="text" placeholder="Gemma Smith">
                    <label for="email">Email</label>
                    <input required id="email" name="email" type="email" placeholder="gemma@example.com">
                    <label for="product_name">Product Name</label>
                    <input required id="product_name" name="product_name" type="product_name" placeholder="inquiry">
                    <label for="quantity">Quantity</label>
                    <input require id="quantity" name="quantity" type="number" min="1" value="-1">
                    <label for="price">Price</label>
                    <input require id="price" name="price" type="number" min="0.99" step="0.5" value="1.99">
                    <button type="submit" class="form-button">Send</button>
                </form>
            </div>
        </div>
         
    </main>
    <?php include "fragments/footer.php"; ?>
</body>

</html>