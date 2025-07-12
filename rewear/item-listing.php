<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>ReWear – Product Detail</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f1f3f6;
      color: #333;
    }

    a {
      text-decoration: none;
    }

    /* HEADER */
    .wireframe-header {
      width: 100%;
      height: 65px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      border-bottom: 3px solid #1e1e1e;
      padding: 0 30px;
      background-color: #ffffff;
      position: sticky;
      top: 0;
      z-index: 1000;
    }

    .logo {
      font-weight: bold;
      font-size: 26px;
      color: #2874f0;
      display: flex;
      align-items: center;
    }

    .logo::before {
      content: "👕";
      margin-right: 10px;
    }

    .nav-links a {
      color: #333;
      margin: 0 12px;
      font-size: 15px;
      transition: color 0.3s;
    }

    .nav-links a:hover {
      color: #2874f0;
    }

    .search-box {
      display: flex;
    }

    .search-box input {
      padding: 8px 12px;
      border: 2px solid #2874f0;
      border-radius: 10px 0 0 10px;
      outline: none;
    }

    .search-box button {
      padding: 8px 14px;
      background-color: #2874f0;
      color: white;
      border: none;
      border-radius: 0 10px 10px 0;
      cursor: pointer;
    }

    /* MAIN PRODUCT SECTION */
    .product-container {
      max-width: 1150px;
      margin: 40px auto;
      padding: 20px;
      display: flex;
      gap: 40px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .left-image {
      flex: 1;
      max-width: 400px;
    }

    .left-image img {
      width: 100%;
      height: auto;
      border: 2px solid #ccc;
      border-radius: 12px;
    }

    .right-details {
      flex: 2;
    }

    .right-details h1 {
      font-size: 26px;
      margin-bottom: 15px;
      color: #2d3436;
    }

    .right-details p {
      font-size: 16px;
      line-height: 1.6;
      color: #444;
    }

    .specs {
      margin-top: 15px;
      font-size: 15px;
    }

    .specs span {
      display: inline-block;
      background: #dfe6e9;
      color: #2d3436;
      padding: 5px 10px;
      margin: 5px 5px 0 0;
      border-radius: 6px;
    }

    /* GALLERY */
    .related-images {
      max-width: 1150px;
      margin: 20px auto;
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
    }

    .related-images h2 {
      margin-bottom: 15px;
      font-size: 20px;
      color: #1e1e1e;
    }

    .image-gallery {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .image-gallery img {
      width: 180px;
      height: 240px;
      object-fit: cover;
      border-radius: 10px;
      border: 1px solid #ccc;
      transition: transform 0.2s ease;
    }

    .image-gallery img:hover {
      transform: scale(1.02);
    }

    /* FOOTER */
    .footer {
      margin-top: 40px;
      background-color: #222;
      color: #ccc;
      text-align: center;
      padding: 20px;
      font-size: 14px;
    }

    @media (max-width: 768px) {
      .product-container {
        flex-direction: column;
        align-items: center;
        padding: 15px;
      }

      .search-box {
        display: none;
      }

      .related-images h2 {
        text-align: center;
      }

      .image-gallery {
        justify-content: center;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="wireframe-header">
    <div class="logo">ReWear</div>
    <div class="nav-links">
      <a href="#">Home</a>
      <a href="#">Browse</a>
      <a href="#">Upload</a>
      <a href="#">Login</a>
      <a href="#">Sign Up</a>
    </div>
    <form class="search-box">
      <input type="text" placeholder="Search items..." />
      <button type="submit">Go</button>
    </form>
  </div>

  <!-- Product Section -->
  <div class="product-container">
    <div class="left-image">
      <img src="uploads/main-product.jpg" alt="Main Product">
    </div>
    <div class="right-details">
      <h1>Women's Floral Summer Dress</h1>
      <p>
        A soft cotton floral printed dress perfect for summer outings.
        Comfortable fit with beautiful pastel tones and knee-length design.
      </p>
      <div class="specs">
        <span>Size: M</span>
        <span>Condition: Gently Used</span>
        <span>Category: Casual</span>
        <span>Color: Peach Floral</span>
        <span>Material: Cotton</span>
      </div>
    </div>
  </div>

  <!-- Additional Images -->
  <div class="related-images">
    <h2>More Images</h2>
    <div class="image-gallery">
      <img src="uploads/img1.jpg" alt="View 1">
      <img src="uploads/img2.jpg" alt="View 2">
      <img src="uploads/img3.jpg" alt="View 3">
      <img src="uploads/img4.jpg" alt="View 4">
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    &copy; 2025 ReWear – Sustainable Clothing Exchange | All Rights Reserved.
  </div>

</body>
</html> what name i give