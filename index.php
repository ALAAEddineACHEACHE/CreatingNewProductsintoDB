<?php include 'connexion.php'; ?>
<?php include 'fonctions_produit.php'; ?>
<?php include 'fonctions_categorie.php'; ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'head.php' ?>
<body>
    <div class="container">
        <?php if(!isset($_GET['update'])) { ?>
        <div class="row mb-3">
            <div class="col-md-6 mx-auto mt-3">
                <form>
                    <div class="form-group row">
                        <label for="productName" class="col-sm-3 col-form-label">Product Name: </label>
                        <div class="col-sm-9">
                            <input type="text" name="productName" class="form-control" id="productName" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Quantity: </label>
                        <div class="col-sm-9">
                            <input type="text" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label">Price: </label>
                        <div class="col-sm-9">
                            <input type="text" name="price" class="form-control" id="price" placeholder="Price">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="category" class="col-sm-3 col-form-label">Category: </label>
                        <div class="col-sm-9">
                            <select name="category" class="form-control" id="category">
        <?php echo chargerCategorie();?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" name="insert" class="btn btn-outline-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <?php } else { ?>
        <div class="row mb-3">
            <div class="col-md-6 mx-auto mt-3">
                <form>
                    <input type="hidden" name="productId" value="<?php echo $product['id']; ?>" />
                    <div class="form-group row">
                        <label for="productName" class="col-sm-3 col-form-label">Product Name: </label>
                        <div class="col-sm-9">
                            <input type="text" name="productName" class="form-control" id="productName" value="<?php echo $product['productName']; ?>" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quantity" class="col-sm-3 col-form-label">Quantity: </label>
                        <div class="col-sm-9">
                            <input type="text" value="<?php echo $product['quantity']; ?>" name="quantity" class="form-control" id="quantity" placeholder="Quantity">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="price" class="col-sm-3 col-form-label">Price: </label>
                        <div class="col-sm-9">
                            <input type="text" value="<?php echo $product['price']; ?>" name="price" class="form-control" id="price" placeholder="Price">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <button type="submit" name="save" class="btn btn-outline-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <?php }?>
        <div class="row">
            <div class="col-md-6 m-auto">
                <table class="table table-striped">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Qte</th>
                        <th scope="col">Price</th>
                        <th scope="col">Actions</th>
                    </tr>
                    <?php echo chargerProduit(); ?>
                </table>
            </div>
        </div>
    </div>
    <script>
        function deleteConfirmation() {
            return confirm('Are you sure to remove this item ?');
        }

    </script>
</body>

</html>