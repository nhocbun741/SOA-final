package tdt.it.soa.daos;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

import tdt.it.soa.models.Category;
import tdt.it.soa.models.Product;
import tdt.it.soa.services.DBConnect;

public class ProductDao {
	public ArrayList<Product> getListProductByCategory(String category_id) throws SQLException {
		Connection connection = DBConnect.getConnection();
		String sql = "SELECT * FROM product WHERE category_id = '" + category_id + "'";
		PreparedStatement ps = connection.prepareCall(sql);
		ResultSet rs = ps.executeQuery();
		ArrayList<Product> list = new ArrayList<>();
		while (rs.next()) {
			Product product = new Product();
			product.setProductID(rs.getString("product_id"));
			product.setProductName(rs.getString("product_name"));
			product.setProductImage(rs.getString("product_image"));
			product.setProductPrice(rs.getDouble("product_price"));
			product.setProductDescription(rs.getString("product_description"));
			list.add(product);
		}
		return list;
	}
	
	public ArrayList<Product> getAllProduct() throws SQLException {
		Connection connection = DBConnect.getConnection();
		String sql = "SELECT * FROM product ";
		PreparedStatement ps = connection.prepareCall(sql);
		ResultSet rs = ps.executeQuery();
		ArrayList<Product> list = new ArrayList<>();
		while (rs.next()) {
			Product product = new Product();
			product.setProductID(rs.getString("product_id"));
			product.setCategoryID(rs.getString("category_id"));
			product.setProductName(rs.getString("product_name"));
			product.setProductCode(rs.getString("product_code"));
			product.setProductImage(rs.getString("product_image"));
			product.setProductPrice(rs.getDouble("product_price"));
			product.setProductDescription(rs.getString("product_description"));
			product.setProductDelete(rs.getInt("product_delete"));
			list.add(product);
		}
		return list;
	}
	
	
	public boolean insert(Product c) throws SQLException {
	    try {
	         Connection connection = DBConnect.getConnection();
	         String sql = "INSERT INTO product VALUE(?,?,?,?,?,?,?,1)";
	         PreparedStatement ps = connection.prepareCall(sql);
	         ps.setString(1, c.getProductID());
	         ps.setString(2, c.getCategoryID());
	         ps.setString(3, c.getProductName());
	         ps.setString(4, c.getProductCode());
	         ps.setString(5, c.getProductImage());
	         ps.setDouble(6, c.getProductPrice());
	         ps.setString(7, c.getProductDescription());
	         
	         int temp = ps.executeUpdate();
	         return temp == 1;
	    } catch (Exception e) {
	         return false;
	    }
	}
	
	

public boolean delete(Product c) throws SQLException {
    try {
         Connection connection = DBConnect.getConnection();
         String sql = "UPDATE product SET product_delete = 0 WHERE product_id = ?";
         PreparedStatement ps = connection.prepareCall(sql);
         ps.setString(1, c.getProductID());
         int temp = ps.executeUpdate();
         return temp == 1;
    } catch (Exception e) {
         return false;
    }
}
	
	public static void main(String[] args) throws SQLException {
		ProductDao productDao = new ProductDao();
		System.out.println(productDao.delete(new Product("1")));
		
	}
}
