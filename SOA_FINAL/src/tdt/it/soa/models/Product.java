package tdt.it.soa.models;

public class Product {
	private String productID;
	private String categoryID;
	private String productName;
	private String productCode;
	private String productImage;
	private double productPrice;
	private String productDescription;
	private int productDelete;

	public Product(String productID, String categoryID, String productName,String productCode, String productImage, double productPrice,
			String productDescription) {
		super();
		this.productID = productID;
		this.categoryID = categoryID;
		this.productName = productName;
		this.productCode = productCode;
		this.productImage = productImage;
		this.productPrice = productPrice;
		this.productDescription = productDescription;
		
	}

	public Product() {

	}

	
	public String getProductCode() {
		return productCode;
	}

	public void setProductCode(String productCode) {
		this.productCode = productCode;
	}

	public Product(String productID) {
		super();
		this.productID = productID;
	}

	public int getProductDelete() {
		return productDelete;
	}

	public void setProductDelete(int productDelete) {
		this.productDelete = productDelete;
	}

	public String getProductID() {
		return productID;
	}

	public void setProductID(String productID) {
		this.productID = productID;
	}

	public String getCategoryID() {
		return categoryID;
	}

	public void setCategoryID(String categoryID) {
		this.categoryID = categoryID;
	}

	public String getProductName() {
		return productName;
	}

	public void setProductName(String productName) {
		this.productName = productName;
	}

	public String getProductImage() {
		return productImage;
	}

	public void setProductImage(String productImage) {
		this.productImage = productImage;
	}

	public double getProductPrice() {
		return productPrice;
	}

	public void setProductPrice(double productPrice) {
		this.productPrice = productPrice;
	}

	public String getProductDescription() {
		return productDescription;
	}

	public void setProductDescription(String productDescription) {
		this.productDescription = productDescription;
	}

}
