package tdt.it.soa.models;

public class Category {

	private String categoryID;
	private String categoryName;
	private int categoryDelete;
	
	public Category() {
		super();
	}
	
	public Category(String categoryID) {
		super();
		this.categoryID = categoryID;
	}

	public Category(String categoryID, String categoryName) {
		super();
		this.categoryID = categoryID;
		this.categoryName = categoryName;
	}
	public String getCategoryID() {
		return categoryID;
	}
	public void setCategoryID(String categoryID) {
		this.categoryID = categoryID;
	}
	public String getCategoryName() {
		return categoryName;
	}
	public void setCategoryName(String categoryName) {
		this.categoryName = categoryName;
	}
	public int getCategoryDelete() {
		return categoryDelete;
	}
	public void setCategoryDelete(int categoryDelete) {
		this.categoryDelete = categoryDelete;
	}
	
	
}
