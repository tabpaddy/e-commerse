<style>
         .product_img{
    width: 100px;
    object-fit: contain;
}
    </style>

    <div class="container mt-5">
        <h3 class="text-center">Edit Products</h3>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_title">Product Title</label>
                <input type="text" id="product_title" name="product_title" class="form-control" required>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_description">Product Description</label>
                <input type="text" id="product_description" name="product_description" class="form-control" required>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_keyword">Product Keyword</label>
                <input type="text" id="product_keyword" name="product_keyword" class="form-control" required>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
            <label class="form-label" for="">Product Category</label>
                <select class="form-select" name="product_category">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
            <label class="form-label" for="">Product Brand</label>
                <select class="form-select" name="product_brand">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                </select>
            </div>
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_image1">Product Image1</label>
                <div class="d-flex">
                <input type="file" id="product_image1" name="product_image1" class="form-control" required>
                <img src="./product_images/boAt Airdopes 111 1.webp" alt="img" class="product_img">
                </div>
            </div>            
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_image2">Product Image2</label>
                <div class="d-flex">
                <input type="file" id="product_image2" name="product_image2" class="form-control" required>
                <img src="./product_images/boAt Airdopes 111 1.webp" alt="img" class="product_img">
                </div>
            </div>            
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_image3">Product Image3</label>
                <div class="d-flex">
                <input type="file" id="product_image3" name="product_image3" class="form-control" required>
                <img src="./product_images/boAt Airdopes 111 1.webp" alt="img" class="product_img">
                </div>
            </div> 
            <div class="form-outline w-50 mb-3 m-auto">
                <label class="form-label" for="product_price">Product Price</label>
                <input type="text" id="product_price" name="product_price" class="form-control" required>
            </div>           
            <div class="w-50 m-auto mb-3">
                <input type="submit" name="edit_product" class="btn btn-info" required value="Update Data">
            </div>           

        </form>
    </div>
